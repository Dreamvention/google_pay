<?php 
$_['payment_google_pay_setting'] = array(
	'merchant_id' => '12345',
	'environment' => 'test',
	'debug' => 0,
	'merchant_gateway_code' => 'example',
	'card_networks_code' => array('amex', 'discover', 'jcb', 'mastercard', 'visa'),
	'auth_methods_code' => array('pan_only', 'cryptogram_3ds'),
	'accept_prepay_cards' => 'true',
	'bill_require_phone' => 'true',
	'ship_require_phone' => 'true',
	'button_color' => 'black',
	'button_type' => 'long',
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
					'value' => '3.40.0'
				),
				'braintree_environment' => array(
					'code' => 'braintree_environment',
					'name' => 'text_braintree_environment',
					'type' => 'select',
					'option' => array(
						'sandbox' => array(
							'code' => 'sandbox', 
							'name' => 'text_sandbox'
						),
						'production' => array(
							'code' => 'production', 
							'name' => 'text_production'
						)
					)
				),
				'braintree_merchant_id' => array(
					'code' => 'braintree_merchant_id',
					'name' => 'text_braintree_merchant_id',
					'type' => 'text',
					'value' => ''
				),
				'braintree_public_key' => array(
					'code' => 'braintree_public_key',
					'name' => 'text_braintree_public_key',
					'type' => 'text',
					'value' => ''
				),
				'braintree_private_key' => array(
					'code' => 'braintree_private_key',
					'name' => 'text_braintree_private_key',
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
				),
				'globalpayments_shared_secret' => array(
					'code' => 'globalpayments_shared_secret',
					'name' => 'text_globalpayments_shared_secret',
					'type' => 'text',
					'value' => ''
				),
				'globalpayments_environment' => array(
					'code' => 'globalpayments_environment',
					'name' => 'text_globalpayments_environment',
					'type' => 'select',
					'option' => array(
						'sandbox' => array(
							'code' => 'https://api.sandbox.realexpayments.com/epage-remote.cgi', 
							'name' => 'text_sandbox'
						),
						'production' => array(
							'code' => 'https://api.realexpayments.com/epage-remote.cgi', 
							'name' => 'text_production'
						)
					)
				),
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