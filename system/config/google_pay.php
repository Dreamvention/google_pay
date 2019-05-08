<?php 
$_['payment_google_pay_setting'] = array(
	'merchant_id' => '12345',
	'environment' => 'test',
	'debug' => 0,
	'merchant_gateway_code' => 'example',
	'card_networks_code' => array('amex', 'discover', 'jcb', 'mastercard', 'visa'),
	'auth_methods_code' => array('pan_only', 'cryptogram_3ds'),
	'accept_prepay_cards' => 1,
	'button_color' => 'default',
	'button_type' => 'long',
	'bill_require_phone' => 0,
	'ship_require_phone' => 0,
	'ship_allow_countries' => array(),
	'api_version_major' => 2,
	'api_version_minor' => 0,
	'merchant_gateways' => array(
		'example' => array(
			'code' => 'example_gateway',
			'name' => 'text_example_gateway',
			'fields' => array(
				'example_gateway_merchant_id' => array(
					'code' => 'example_gateway_merchant_id',
					'name' => 'text_example_gateway_merchant_id',
					'type' => 'text',
					'value' => '12345'
				)
			)
		),
		'braintree' => array(
			'code' => 'braintree',
			'name' => 'text_braintree',
			'fields' => array(
				'braintree_api_version' => array(
					'code' => 'braintree_api_version',
					'name' => 'text_braintree_api_version',
					'type' => 'text',
					'value' => 'v1'
				),
				'braintree_sdk_version' => array(
					'code' => 'braintree_sdk_version',
					'name' => 'text_braintree_sdk_version',
					'type' => 'text',
					'value' => ''
				),
				'braintree_merchant_id' => array(
					'code' => 'braintree_merchant_id',
					'name' => 'text_braintree_merchant_id',
					'type' => 'text',
					'value' => ''
				),
				'braintree_tokenization_key' => array(
					'code' => 'braintree_tokenization_key',
					'name' => 'text_braintree_tokenization_key',
					'type' => 'text',
					'value' => ''
				)
			)
		),
		'globalpayments' => array(
			'code' => 'globalpayments',
			'name' => 'text_globalpayments',
			'fields' => array(
				'globalpayments_merchant_id' => array(
					'code' => 'globalpayments_merchant_id',
					'name' => 'text_globalpayments_merchant_id',
					'type' => 'text',
					'value' => ''
				)
			)
		),
		'worldpay' => array(
			'code' => 'worldpay',
			'name' => 'text_worldpay',
			'fields' => array(
				'worldpay_merchant_id' => array(
					'code' => 'worldpay_merchant_id',
					'name' => 'text_worldpay_merchant_id',
					'type' => 'text',
					'value' => ''
				)
			)
		)
	),
	'card_networks' => array(
		'amex' => array(
			'code' => 'amex',
			'name' => 'text_card_amex',
		),
		'discover' => array(
			'code' => 'discover',
			'name' => 'text_card_discover'
		),
		'jcb' => array(
			'code' => 'jcb',
			'name' => 'text_card_jcb'
		),
		'mastercard' => array(
			'code' => 'mastercard',
			'name' => 'text_card_mastercard'
		),
		'visa' => array(
			'code' => 'visa',
			'name' => 'text_card_visa'
		)
	),
	'auth_methods' => array(
		'pan_only' => array(
			'code' => 'pan_only',
			'name' => 'text_pan_only'
		),
		'cryptogram_3ds' => array(
			'code' => 'cryptogram_3ds',
			'name' => 'text_cryptogram_3ds'
		)
	)
);