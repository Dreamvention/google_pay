<?php
class ControllerExtensionPaymentGooglePay extends Controller {
	private $error = array();

	public function index() {
		$this->load->language('extension/payment/google_pay');

		$this->document->setTitle($this->language->get('heading_title'));

		$this->load->model('setting/setting');

		if (($this->request->server['REQUEST_METHOD'] == 'POST') && $this->validate()) {
			$this->model_setting_setting->editSetting('payment_google_pay', $this->request->post);

			$this->session->data['success'] = $this->language->get('success_save');

			$this->response->redirect($this->url->link('marketplace/extension', 'user_token=' . $this->session->data['user_token'] . '&type=payment', true));
		}
		
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
			'href' => $this->url->link('common/dashboard', 'user_token=' . $this->session->data['user_token'], true)
		);

		$data['breadcrumbs'][] = array(
			'text' => $this->language->get('text_extension'),
			'href' => $this->url->link('marketplace/extension', 'user_token=' . $this->session->data['user_token'] . '&type=payment', true)
		);

		$data['breadcrumbs'][] = array(
			'text' => $this->language->get('heading_title'),
			'href' => $this->url->link('extension/payment/google_pay', 'user_token=' . $this->session->data['user_token'], true)
		);

		$data['action'] = $this->url->link('extension/payment/google_pay', 'user_token=' . $this->session->data['user_token'], true);
		$data['cancel'] = $this->url->link('marketplace/extension', 'user_token=' . $this->session->data['user_token'] . '&type=payment', true);

		$_config = new Config();
		$_config->load('google_pay');
		$config_setting = ($_config->get('payment_google_pay_setting')) ? $_config->get('payment_google_pay_setting') : array();
		
		if (isset($this->request->post['payment_google_pay_merchant_id'])) {
			$data['payment_google_pay_merchant_id'] = $this->request->post['payment_google_pay_merchant_id'];
		} elseif ($this->config->get('payment_google_pay_merchant_id')) {
			$data['payment_google_pay_merchant_id'] = $this->config->get('payment_google_pay_merchant_id');
		} else {
			$data['payment_google_pay_merchant_id'] = $config_setting['merchant_id'];
		}
		
		if (isset($this->request->post['payment_google_pay_merchant_name'])) {
			$data['payment_google_pay_merchant_name'] = $this->request->post['payment_google_pay_merchant_name'];
		} elseif ($this->config->get('payment_google_pay_merchant_name')) {
			$data['payment_google_pay_merchant_name'] = $this->config->get('payment_google_pay_merchant_name');
		} else {
			$data['payment_google_pay_merchant_name'] = $this->config->get('config_name');
		}

		if (isset($this->request->post['payment_google_pay_environment'])) {
			$data['payment_google_pay_environment'] = $this->request->post['payment_google_pay_environment'];
		} elseif ($this->config->get('payment_google_pay_environment')) {
			$data['payment_google_pay_environment'] = $this->config->get('payment_google_pay_environment');
		} else {
			$data['payment_google_pay_environment'] = $config_setting['environment'];
		}
		
		if (isset($this->request->post['payment_google_pay_debug'])) {
			$data['payment_google_pay_debug'] = $this->request->post['payment_google_pay_debug'];
		} elseif ($this->config->get('payment_google_pay_debug')) {
			$data['payment_google_pay_debug'] = $this->config->get('payment_google_pay_debug');
		} else {
			$data['payment_google_pay_debug'] = $config_setting['debug'];
		}
		
		if (isset($this->request->post['payment_google_pay_total'])) {
			$data['payment_google_pay_total'] = $this->request->post['payment_google_pay_total'];
		} else {
			$data['payment_google_pay_total'] = $this->config->get('payment_google_pay_total');
		}

		if (isset($this->request->post['payment_google_pay_geo_zone_id'])) {
			$data['payment_google_pay_geo_zone_id'] = $this->request->post['payment_google_pay_geo_zone_id'];
		} else {
			$data['payment_google_pay_geo_zone_id'] = $this->config->get('payment_google_pay_geo_zone_id');
		}

		if (isset($this->request->post['payment_google_pay_status'])) {
			$data['payment_google_pay_status'] = $this->request->post['payment_google_pay_status'];
		} else {
			$data['payment_google_pay_status'] = $this->config->get('payment_google_pay_status');
		}

		if (isset($this->request->post['payment_google_pay_sort_order'])) {
			$data['payment_google_pay_sort_order'] = $this->request->post['payment_google_pay_sort_order'];
		} else {
			$data['payment_google_pay_sort_order'] = $this->config->get('payment_google_pay_sort_order');
		}
		
		if (isset($this->request->post['payment_google_pay_merchant_gateway_code'])) {
			$data['payment_google_pay_merchant_gateway_code'] = $this->request->post['payment_google_pay_merchant_gateway_code'];
		} elseif ($this->config->get('payment_google_pay_merchant_gateway_code')) {
			$data['payment_google_pay_merchant_gateway_code'] = $this->config->get('payment_google_pay_merchant_gateway_code');
		} else {
			$data['payment_google_pay_merchant_gateway_code'] = $config_setting['merchant_gateway_code'];
		}

		if (isset($this->request->post['payment_google_pay_merchant_gateway'])) {
			$data['payment_google_pay_merchant_gateway'] = $this->request->post['payment_google_pay_merchant_gateway'];
		} else {
			$data['payment_google_pay_merchant_gateway'] = $this->config->get('payment_google_pay_merchant_gateway');
		}

		if (isset($this->request->post['payment_google_pay_card_networks_code'])) {
			$data['payment_google_pay_card_networks_code'] = $this->request->post['payment_google_pay_card_networks_code'];
		} elseif ($this->config->get('payment_google_pay_card_networks_code')) {
			$data['payment_google_pay_card_networks_code'] = $this->config->get('payment_google_pay_card_networks_code');
		} else {
			$data['payment_google_pay_card_networks_code'] = $config_setting['card_networks_code'];
		}

		if (isset($this->request->post['payment_google_pay_auth_methods_code'])) {
			$data['payment_google_pay_auth_methods_code'] = $this->request->post['payment_google_pay_auth_methods_code'];
		} elseif ($this->config->get('payment_google_pay_auth_methods_code')) {
			$data['payment_google_pay_auth_methods_code'] = $this->config->get('payment_google_pay_auth_methods_code');
		} else {
			$data['payment_google_pay_auth_methods_code'] = $config_setting['auth_methods_code'];
		}
		
		if (isset($this->request->post['payment_google_pay_accept_prepay_cards'])) {
			$data['payment_google_pay_accept_prepay_cards'] = $this->request->post['payment_google_pay_accept_prepay_cards'];
		} elseif ($this->config->get('payment_google_pay_accept_prepay_cards')) {
			$data['payment_google_pay_accept_prepay_cards'] = $this->config->get('payment_google_pay_accept_prepay_cards');
		} else {
			$data['payment_google_pay_accept_prepay_cards'] = $config_setting['accept_prepay_cards'];
		}

		if (isset($this->request->post['payment_google_pay_bill_require_phone'])) {
			$data['payment_google_pay_bill_require_phone'] = $this->request->post['payment_google_pay_bill_require_phone'];
		} elseif ($this->config->get('payment_google_pay_bill_require_phone')) {
			$data['payment_google_pay_bill_require_phone'] = $this->config->get('payment_google_pay_bill_require_phone');
		} else {
			$data['payment_google_pay_bill_require_phone'] = $config_setting['bill_require_phone'];
		}

		if (isset($this->request->post['payment_google_pay_ship_require_phone'])) {
			$data['payment_google_pay_ship_require_phone'] = $this->request->post['payment_google_pay_ship_require_phone'];
		} elseif ($this->config->get('payment_google_pay_ship_require_phone')) {
			$data['payment_google_pay_ship_require_phone'] = $this->config->get('payment_google_pay_ship_require_phone');
		} else {
			$data['payment_google_pay_ship_require_phone'] = $config_setting['ship_require_phone'];
		}

		if (isset($this->request->post['payment_google_pay_button_color'])) {
			$data['payment_google_pay_button_color'] = $this->request->post['payment_google_pay_button_color'];
		} elseif ($this->config->get('payment_google_pay_button_color')) {
			$data['payment_google_pay_button_color'] = $this->config->get('payment_google_pay_button_color');
		} else {
			$data['payment_google_pay_button_color'] = $config_setting['button_color'];
		}

		if (isset($this->request->post['payment_google_pay_button_type'])) {
			$data['payment_google_pay_button_type'] = $this->request->post['payment_google_pay_button_type'];
		} elseif ($this->config->get('payment_google_pay_button_type')) {
			$data['payment_google_pay_button_type'] = $this->config->get('payment_google_pay_button_type');
		} else {
			$data['payment_google_pay_button_type'] = $config_setting['button_type'];
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
		
		if (!isset($this->request->post['payment_google_pay_merchant_id']) || strlen($this->request->post['payment_google_pay_merchant_id']) <= 3 || strlen($this->request->post['payment_google_pay_merchant_id']) > 50) {
			$this->error['warning'] = $this->language->get('error_warning');
			$this->error['error_merchant_id'] = $this->language->get('error_merchant_id');
		}

		if (!isset($this->request->post['payment_google_pay_merchant_name']) || strlen($this->request->post['payment_google_pay_merchant_name']) <= 3 || strlen($this->request->post['payment_google_pay_merchant_name']) > 50) {
			$this->error['warning'] = $this->language->get('error_warning');
			$this->error['error_merchant_name'] = $this->language->get('error_merchant_name');
		}
		
		if (empty($this->request->post['payment_google_pay_card_networks_code'])) {
			$this->error['warning'] = $this->language->get('error_warning');
			$this->error['error_card_networks_code'] = $this->language->get('error_card_networks_code');
		}
		
		if (empty($this->request->post['payment_google_pay_auth_methods_code'])) {
			$this->error['warning'] = $this->language->get('error_warning');
			$this->error['error_auth_methods_code'] = $this->language->get('error_auth_methods_code');
		}

		return !$this->error;
	}
}