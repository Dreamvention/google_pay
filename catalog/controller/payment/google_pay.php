<?php
class ControllerPaymentGooglePay extends Controller {
	private $error = array();
	
	public function index() {
		$this->load->language('payment/google_pay');

		$this->load->model('checkout/order');
		
		$order_info = $this->model_checkout_order->getOrder($this->session->data['order_id']);

		$data['total_price'] = $this->currency->format($order_info['total'], $order_info['currency_code'], $order_info['currency_value'], false);
		$data['currency_code'] = $order_info['currency_code'];

		$_config = new Config();
		$_config->load('google_pay');
		$config_setting = ($_config->get('google_pay_setting')) ? $_config->get('google_pay_setting') : array();
		
		$data['api_version_major'] = $config_setting['api_version_major'];
		$data['api_version_minor'] = $config_setting['api_version_minor'];
		
		$data['merchant_id'] = $this->config->get('google_pay_merchant_id');
		$data['merchant_name'] = $this->config->get('google_pay_merchant_name');
		$data['environment'] = strtoupper($this->config->get('google_pay_environment'));
		$data['debug'] = $this->config->get('google_pay_debug');
		$data['accept_prepay_cards'] = $this->config->get('google_pay_accept_prepay_cards');
		$data['bill_require_phone'] = $this->config->get('google_pay_bill_require_phone');
		$data['ship_require_phone'] = $this->config->get('google_pay_ship_require_phone');
		$data['button_color'] = $this->config->get('google_pay_button_color');
		$data['button_type'] = $this->config->get('google_pay_button_type');
		
		$merchant_gateway_code = $this->config->get('google_pay_merchant_gateway_code');
		$merchant_gateway = $this->config->get('google_pay_merchant_gateway');
		$card_networks_code = $this->config->get('google_pay_card_networks_code');
		$auth_methods_code = $this->config->get('google_pay_auth_methods_code');
		
		$parameters = array();
		
		if ($merchant_gateway_code == 'example_gateway') {
			$parameters = array(
				'gateway' => 'example',
				'gatewayMerchantId' => $merchant_gateway[$merchant_gateway_code]['field']['example_gateway_merchant_id']
			);
		} elseif ($merchant_gateway_code == 'braintree') {
			$parameters = array(
				'gateway' => 'braintree',
				'braintree:apiVersion' => $merchant_gateway[$merchant_gateway_code]['field']['braintree_api_version'],
				'braintree:sdkVersion' => $merchant_gateway[$merchant_gateway_code]['field']['braintree_sdk_version'],
				'braintree:merchantId' => $merchant_gateway[$merchant_gateway_code]['field']['braintree_merchant_id'],
				'braintree:clientKey' => $merchant_gateway[$merchant_gateway_code]['field']['braintree_tokenization_key']
			);
		} elseif ($merchant_gateway_code == 'globalpayments') {
			$parameters = array(
				'gateway' => 'globalpayments',
				'gatewayMerchantId' => $merchant_gateway[$merchant_gateway_code]['field']['globalpayments_merchant_id']
			);
		}
		
		$data['tokenization_specification'] = array(
			'type' => 'PAYMENT_GATEWAY',
			'parameters' => $parameters
		);
	
		$data['allowed_card_networks'] = array();
		
		foreach ($card_networks_code as $card_network_code) {
			$data['allowed_card_networks'][] = strtoupper($card_network_code);
		}
				
		$data['allowed_card_auth_methods'] = array();
		
		foreach ($auth_methods_code as $auth_method_code) {
			$data['allowed_card_auth_methods'][] = strtoupper($auth_method_code);
		}
		
		if (VERSION >= '2.2.0.0') {
			return $this->load->view('payment/google_pay', $data);
		} elseif (file_exists(DIR_TEMPLATE . $this->config->get('config_template') . '/template/payment/google_pay.tpl')) {
			return $this->load->view($this->config->get('config_template') . '/template/payment/google_pay.tpl', $data);
		} else {
			return $this->load->view('default/template/payment/google_pay.tpl', $data);
		}
	}
	
	public function send() {
		$this->load->language('payment/google_pay');
		
		$this->load->model('checkout/order');
		
		$order_info = $this->model_checkout_order->getOrder($this->session->data['order_id']);

		$total_price = $this->currency->format($order_info['total'], $order_info['currency_code'], $order_info['currency_value'], false);
		$currency_code = $order_info['currency_code'];
		
		$merchant_gateway_code = $this->config->get('payment_google_pay_merchant_gateway_code');
		$merchant_gateway = $this->config->get('payment_google_pay_merchant_gateway');
		
		if (isset($this->request->post['data'])) {
			$json_data = json_decode(htmlspecialchars_decode($this->request->post['data']), true);
		}
		
		if (isset($json_data['paymentMethodData']['tokenizationData']['token']['error']['message'])) {
			$this->error['warning'] = $json_data['paymentMethodData']['tokenizationData']['token']['error']['message'];
		}
				
		if (!$this->error) {						
			if (isset($json_data['paymentMethodData']['tokenizationData']['token'])) {
				$token = json_decode($json_data['paymentMethodData']['tokenizationData']['token'], true);
			}

			if ($merchant_gateway_code == 'braintree') {
				if (isset($token['androidPayCards'][0]['nonce']) && $token['androidPayCards'][0]['nonce']) {
					require_once DIR_SYSTEM . 'library/google_pay/Braintree.php';
		
					$gateway = new Braintree_Gateway(array(
						'environment' => $merchant_gateway[$merchant_gateway_code]['field']['braintree_environment'],
						'merchantId' => $merchant_gateway[$merchant_gateway_code]['field']['braintree_merchant_id'],
						'publicKey' => $merchant_gateway[$merchant_gateway_code]['field']['braintree_public_key'],
						'privateKey' => $merchant_gateway[$merchant_gateway_code]['field']['braintree_private_key']
					));
		
					$result = $gateway->transaction()->sale(array(
						'amount' => $total_price,
						'paymentMethodNonce' => $token['androidPayCards'][0]['nonce'],
						'options' => array(
							'submitForSettlement' => true
						)
					));
		
					if (!$result->success) {
						if ($result->transaction) {
							$this->error['warning'] = $result->transaction->processorResponseCode . ' ' . $result->transaction->processorResponseText;
						} else {
							$this->error['warning'] = implode(' ', $result->errors->deepAll());
						}
					}					
				}
			} elseif ($merchant_gateway_code == 'globalpayments') {
				if ($token) {
					require_once DIR_SYSTEM .'library/google_pay/GlobalPayments.php';

					$config = new GlobalPayments\Api\ServicesConfig();
		
					$config->merchantId = $merchant_gateway[$merchant_gateway_code]['field']['globalpayments_merchant_id'];
					$config->accountId = 'internet';
					$config->sharedSecret = $merchant_gateway[$merchant_gateway_code]['field']['globalpayments_shared_secret'];
					$config->serviceUrl = $merchant_gateway[$merchant_gateway_code]['field']['globalpayments_environment'];
		
					GlobalPayments\Api\ServicesContainer::configure($config);
		
					$card = new GlobalPayments\Api\PaymentMethods\CreditCardData();
					
					$card->token = $json_data['paymentMethodData']['tokenizationData']['token'];
					$card->mobileType = GlobalPayments\Api\Entities\Enums\EncyptedMobileType::GOOGLE_PAY;

					try {    
						$response = $card->charge($total_price)->withCurrency($currency_code)->withModifier(GlobalPayments\Api\Entities\Enums\TransactionModifier::ENCRYPTED_MOBILE)->execute();
						
						$code = $response->responseCode;
						$message = $response->responseMessage;
    
						if ($code != '00') {
							$this->error['warning'] = $message;
						}
									
						$orderId = $response->orderId;
						$authCode = $response->authorizationCode;
						$paymentsReference = $response->transactionId;
					} catch (ApiException $e) {
						$this->error['warning'] = implode(' ', $e);
					}					
				}
			}
		}
				
		if (!$this->error) {
			$message = '';
													
			if (isset($json_data['paymentMethodData']['description'])) {
				$message .= $json_data['paymentMethodData']['description'];
			}
			
			$this->model_checkout_order->addOrderHistory($this->session->data['order_id'], $this->config->get('google_pay_order_status_id'), $message, false);
			
			$data['success'] = $this->url->link('checkout/success');
		}
		
		$data['error'] = $this->error;
				
		$this->response->addHeader('Content-Type: application/json');
		$this->response->setOutput(json_encode($data));
	}
}