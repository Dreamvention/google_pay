<?php
class ControllerExtensionPaymentGooglePay extends Controller {
	private $error = array();

	public function index() {
		$this->load->language('extension/payment/google_pay');

		$this->document->setTitle($this->language->get('heading_title'));

		$this->load->model('setting/setting');

		if (($this->request->server['REQUEST_METHOD'] == 'POST') && $this->validate()) {
			$this->model_setting_setting->editSetting('google_pay', $this->request->post);

			$this->session->data['success'] = $this->language->get('success_save');

			$this->response->redirect($this->url->link('extension/extension', 'token=' . $this->session->data['token'] . '&type=payment', true));
		}
		
		$data['heading_title'] = $this->language->get('heading_title');

		$data['text_edit'] = $this->language->get('text_edit');
		$data['text_enabled'] = $this->language->get('text_enabled');
		$data['text_disabled'] = $this->language->get('text_disabled');
		$data['text_all_zones'] = $this->language->get('text_all_zones');
		$data['text_yes'] = $this->language->get('text_yes');
		$data['text_no'] = $this->language->get('text_no');
		$data['text_general'] = $this->language->get('text_general');
		$data['text_gateway'] = $this->language->get('text_gateway');
		$data['text_advanced'] = $this->language->get('text_advanced');
		$data['text_button'] = $this->language->get('text_button');
		$data['text_production'] = $this->language->get('text_production');
		$data['text_test'] = $this->language->get('text_test');
		$data['text_default'] = $this->language->get('text_default');
		$data['text_black'] = $this->language->get('text_black');
		$data['text_white'] = $this->language->get('text_white');
		$data['text_long'] = $this->language->get('text_long');
		$data['text_short'] = $this->language->get('text_short');
		$data['text_card_amex'] = $this->language->get('text_card_amex');
		$data['text_card_discover'] = $this->language->get('text_card_discover');
		$data['text_card_jcb'] = $this->language->get('text_card_jcb');
		$data['text_card_mastercard'] = $this->language->get('text_card_mastercard');
		$data['text_card_visa'] = $this->language->get('text_card_visa');
		$data['text_pan_only'] = $this->language->get('text_pan_only');
		$data['text_cryptogram_3ds'] = $this->language->get('text_cryptogram_3ds');
		$data['text_example_gateway'] = $this->language->get('text_example_gateway');
		$data['text_example_gateway_merchant_id'] = $this->language->get('text_example_gateway_merchant_id');
		$data['text_braintree'] = $this->language->get('text_braintree');
		$data['text_braintree_api_version'] = $this->language->get('text_braintree_api_version');
		$data['text_braintree_sdk_version'] = $this->language->get('text_braintree_sdk_version');
		$data['text_braintree_merchant_id'] = $this->language->get('text_braintree_merchant_id');
		$data['text_braintree_tokenization_key'] = $this->language->get('text_braintree_tokenization_key');
		$data['text_firstdata'] = $this->language->get('text_firstdata');
		$data['text_firstdata_merchant_id'] = $this->language->get('text_firstdata_merchant_id');
		$data['text_globalpayments'] = $this->language->get('text_globalpayments');
		$data['text_globalpayments_merchant_id'] = $this->language->get('text_globalpayments_merchant_id');
		$data['text_worldpay'] = $this->language->get('text_worldpay');
		$data['text_worldpay_merchant_id'] = $this->language->get('text_worldpay_merchant_id');
		$data['text_not_enabled'] = $this->language->get('text_not_enabled');
		$data['text_no_gateways_enabled'] = $this->language->get('text_no_gateways_enabled');

		$data['entry_merchant_id'] = $this->language->get('entry_merchant_id');
		$data['entry_merchant_name'] = $this->language->get('entry_merchant_name');
		$data['entry_total'] = $this->language->get('entry_total');
		$data['entry_order_status'] = $this->language->get('entry_order_status');
		$data['entry_geo_zone'] = $this->language->get('entry_geo_zone');
		$data['entry_status'] = $this->language->get('entry_status');
		$data['entry_sort_order'] = $this->language->get('entry_sort_order');
		$data['entry_debug'] = $this->language->get('entry_debug');
		$data['entry_environment'] = $this->language->get('entry_environment');
		$data['entry_merchant_gateway'] = $this->language->get('entry_merchant_gateway');
		$data['entry_card_networks'] = $this->language->get('entry_card_networks');
		$data['entry_auth_methods'] = $this->language->get('entry_auth_methods');
		$data['entry_accept_prepay_cards'] = $this->language->get('entry_accept_prepay_cards');
		$data['entry_shipping_require_phone'] = $this->language->get('entry_shipping_require_phone');
		$data['entry_shipping_country_limit'] = $this->language->get('entry_shipping_country_limit');
		$data['entry_shipping_country_list'] = $this->language->get('entry_shipping_country_list');
		$data['entry_billing_require_phone'] = $this->language->get('entry_billing_require_phone');
		$data['entry_button_color'] = $this->language->get('entry_button_color');
		$data['entry_button_type'] = $this->language->get('entry_button_type');

		$data['help_merchant_id'] = $this->language->get('help_merchant_id');
		$data['help_merchant_name'] = $this->language->get('help_merchant_name');
		$data['help_debug'] = $this->language->get('help_debug');
		$data['help_total'] = $this->language->get('help_total');
		$data['help_shipping_restriction'] = $this->language->get('help_shipping_restriction');

		$data['button_save'] = $this->language->get('button_save');
		$data['button_cancel'] = $this->language->get('button_cancel');
		
		if (isset($this->error['warning'])) {
			$data['error_warning'] = $this->error['warning'];
		} else {
			$data['error_warning'] = '';
		}
		
		if (isset($this->error['error_merchant_id'])) {
			$data['error_merchant_id'] = $this->error['error_merchant_id'];
		} else {
			$data['error_merchant_id'] = '';
		}

		if (isset($this->error['error_merchant_name'])) {
			$data['error_merchant_name'] = $this->error['error_merchant_name'];
		} else {
			$data['error_merchant_name'] = '';
		}
				
		if (isset($this->error['error_card_networks_code'])) {
			$data['error_card_networks_code'] = $this->error['error_card_networks_code'];
		} else {
			$data['error_card_networks_code'] = '';
		}
		
		if (isset($this->error['error_auth_methods_code'])) {
			$data['error_auth_methods_code'] = $this->error['error_auth_methods_code'];
		} else {
			$data['error_auth_methods_code'] = '';
		}

		$data['breadcrumbs'] = array();

		$data['breadcrumbs'][] = array(
			'text' => $this->language->get('text_home'),
			'href' => $this->url->link('common/dashboard', 'token=' . $this->session->data['token'], true)
		);

		$data['breadcrumbs'][] = array(
			'text' => $this->language->get('text_extensions'),
			'href' => $this->url->link('extension/extension', 'token=' . $this->session->data['token'] . '&type=payment', true)
		);

		$data['breadcrumbs'][] = array(
			'text' => $this->language->get('heading_title'),
			'href' => $this->url->link('extension/payment/google_pay', 'token=' . $this->session->data['token'], true)
		);

		$data['action'] = $this->url->link('extension/payment/google_pay', 'token=' . $this->session->data['token'], true);

		$data['cancel'] = $this->url->link('extension/extension', 'token=' . $this->session->data['token'] . '&type=payment', true);

		$_config = new Config();
		$_config->load('google_pay');
		$config_setting = ($_config->get('google_pay_setting')) ? $_config->get('google_pay_setting') : array();
		
		if (isset($this->request->post['google_pay_merchant_id'])) {
			$data['google_pay_merchant_id'] = $this->request->post['google_pay_merchant_id'];
		} elseif ($this->config->get('google_pay_merchant_id')) {
			$data['google_pay_merchant_id'] = $this->config->get('google_pay_merchant_id');
		} else {
			$data['google_pay_merchant_id'] = $config_setting['merchant_id'];
		}
		
		if (isset($this->request->post['google_pay_merchant_name'])) {
			$data['google_pay_merchant_name'] = $this->request->post['google_pay_merchant_name'];
		} elseif ($this->config->get('google_pay_merchant_name')) {
			$data['google_pay_merchant_name'] = $this->config->get('google_pay_merchant_name');
		} else {
			$data['google_pay_merchant_name'] = $this->config->get('config_name');
		}

		if (isset($this->request->post['google_pay_environment'])) {
			$data['google_pay_environment'] = $this->request->post['google_pay_environment'];
		} elseif ($this->config->get('google_pay_environment')) {
			$data['google_pay_environment'] = $this->config->get('google_pay_environment');
		} else {
			$data['google_pay_environment'] = $config_setting['environment'];
		}
		
		if (isset($this->request->post['google_pay_debug'])) {
			$data['google_pay_debug'] = $this->request->post['google_pay_debug'];
		} elseif ($this->config->get('google_pay_debug')) {
			$data['google_pay_debug'] = $this->config->get('google_pay_debug');
		} else {
			$data['google_pay_debug'] = $config_setting['debug'];
		}
		
		if (isset($this->request->post['google_pay_total'])) {
			$data['google_pay_total'] = $this->request->post['google_pay_total'];
		} else {
			$data['google_pay_total'] = $this->config->get('google_pay_total');
		}
		
		if (isset($this->request->post['google_pay_order_status_id'])) {
			$data['google_pay_order_status_id'] = $this->request->post['google_pay_order_status_id'];
		} else {
			$data['google_pay_order_status_id'] = $this->config->get('google_pay_order_status_id');
		}

		$this->load->model('localisation/order_status');

		$data['order_statuses'] = $this->model_localisation_order_status->getOrderStatuses();

		if (isset($this->request->post['google_pay_geo_zone_id'])) {
			$data['google_pay_geo_zone_id'] = $this->request->post['google_pay_geo_zone_id'];
		} else {
			$data['google_pay_geo_zone_id'] = $this->config->get('google_pay_geo_zone_id');
		}

		if (isset($this->request->post['google_pay_status'])) {
			$data['google_pay_status'] = $this->request->post['google_pay_status'];
		} else {
			$data['google_pay_status'] = $this->config->get('google_pay_status');
		}

		if (isset($this->request->post['google_pay_sort_order'])) {
			$data['google_pay_sort_order'] = $this->request->post['google_pay_sort_order'];
		} else {
			$data['google_pay_sort_order'] = $this->config->get('google_pay_sort_order');
		}
		
		if (isset($this->request->post['google_pay_merchant_gateway_code'])) {
			$data['google_pay_merchant_gateway_code'] = $this->request->post['google_pay_merchant_gateway_code'];
		} elseif ($this->config->get('google_pay_merchant_gateway_code')) {
			$data['google_pay_merchant_gateway_code'] = $this->config->get('google_pay_merchant_gateway_code');
		} else {
			$data['google_pay_merchant_gateway_code'] = $config_setting['merchant_gateway_code'];
		}

		if (isset($this->request->post['google_pay_merchant_gateway'])) {
			$data['google_pay_merchant_gateway'] = $this->request->post['google_pay_merchant_gateway'];
		} else {
			$data['google_pay_merchant_gateway'] = $this->config->get('google_pay_merchant_gateway');
		}

		if (isset($this->request->post['google_pay_card_networks_code'])) {
			$data['google_pay_card_networks_code'] = $this->request->post['google_pay_card_networks_code'];
		} elseif ($this->config->get('google_pay_card_networks_code')) {
			$data['google_pay_card_networks_code'] = $this->config->get('google_pay_card_networks_code');
		} else {
			$data['google_pay_card_networks_code'] = $config_setting['card_networks_code'];
		}

		if (isset($this->request->post['google_pay_auth_methods_code'])) {
			$data['google_pay_auth_methods_code'] = $this->request->post['google_pay_auth_methods_code'];
		} elseif ($this->config->get('google_pay_auth_methods_code')) {
			$data['google_pay_auth_methods_code'] = $this->config->get('google_pay_auth_methods_code');
		} else {
			$data['google_pay_auth_methods_code'] = $config_setting['auth_methods_code'];
		}
		
		if (isset($this->request->post['google_pay_accept_prepay_cards'])) {
			$data['google_pay_accept_prepay_cards'] = $this->request->post['google_pay_accept_prepay_cards'];
		} elseif ($this->config->get('google_pay_accept_prepay_cards')) {
			$data['google_pay_accept_prepay_cards'] = $this->config->get('google_pay_accept_prepay_cards');
		} else {
			$data['google_pay_accept_prepay_cards'] = $config_setting['accept_prepay_cards'];
		}

		if (isset($this->request->post['google_pay_bill_require_phone'])) {
			$data['google_pay_bill_require_phone'] = $this->request->post['google_pay_bill_require_phone'];
		} elseif ($this->config->get('google_pay_bill_require_phone')) {
			$data['google_pay_bill_require_phone'] = $this->config->get('google_pay_bill_require_phone');
		} else {
			$data['google_pay_bill_require_phone'] = $config_setting['bill_require_phone'];
		}

		if (isset($this->request->post['google_pay_ship_require_phone'])) {
			$data['google_pay_ship_require_phone'] = $this->request->post['google_pay_ship_require_phone'];
		} elseif ($this->config->get('google_pay_ship_require_phone')) {
			$data['google_pay_ship_require_phone'] = $this->config->get('google_pay_ship_require_phone');
		} else {
			$data['google_pay_ship_require_phone'] = $config_setting['ship_require_phone'];
		}

		if (isset($this->request->post['google_pay_button_color'])) {
			$data['google_pay_button_color'] = $this->request->post['google_pay_button_color'];
		} elseif ($this->config->get('google_pay_button_color')) {
			$data['google_pay_button_color'] = $this->config->get('google_pay_button_color');
		} else {
			$data['google_pay_button_color'] = $config_setting['button_color'];
		}

		if (isset($this->request->post['google_pay_button_type'])) {
			$data['google_pay_button_type'] = $this->request->post['google_pay_button_type'];
		} elseif ($this->config->get('google_pay_button_type')) {
			$data['google_pay_button_type'] = $this->config->get('google_pay_button_type');
		} else {
			$data['google_pay_button_type'] = $config_setting['button_type'];
		}
		
		$data['merchant_gateways'] = $config_setting['merchant_gateways'];
		$data['card_networks'] = $config_setting['card_networks'];
		$data['auth_methods'] = $config_setting['auth_methods'];

		$this->load->model('localisation/order_status');

		$data['order_statuses'] = $this->model_localisation_order_status->getOrderStatuses();

		$this->load->model('localisation/geo_zone');

		$data['geo_zones'] = $this->model_localisation_geo_zone->getGeoZones();

		$this->load->model('localisation/country');

		$data['countries'] = $this->model_localisation_country->getCountries();

		$data['header'] = $this->load->controller('common/header');
		$data['column_left'] = $this->load->controller('common/column_left');
		$data['footer'] = $this->load->controller('common/footer');

		$this->response->setOutput($this->load->view('extension/payment/google_pay', $data));
	}

	protected function validate() {
		if (!$this->user->hasPermission('modify', 'extension/payment/google_pay')) {
			$this->error['warning'] = $this->language->get('error_permission');
		}
		
		if (!isset($this->request->post['google_pay_merchant_id']) || strlen($this->request->post['google_pay_merchant_id']) <= 3 || strlen($this->request->post['google_pay_merchant_id']) > 50) {
			$this->error['warning'] = $this->language->get('error_warning');
			$this->error['error_merchant_id'] = $this->language->get('error_merchant_id');
		}

		if (!isset($this->request->post['google_pay_merchant_name']) || strlen($this->request->post['google_pay_merchant_name']) <= 3 || strlen($this->request->post['google_pay_merchant_name']) > 50) {
			$this->error['warning'] = $this->language->get('error_warning');
			$this->error['error_merchant_name'] = $this->language->get('error_merchant_name');
		}
		
		if (empty($this->request->post['google_pay_card_networks_code'])) {
			$this->error['warning'] = $this->language->get('error_warning');
			$this->error['error_card_networks_code'] = $this->language->get('error_card_networks_code');
		}
		
		if (empty($this->request->post['google_pay_auth_methods_code'])) {
			$this->error['warning'] = $this->language->get('error_warning');
			$this->error['error_auth_methods_code'] = $this->language->get('error_auth_methods_code');
		}

		return !$this->error;
	}
}