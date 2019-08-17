<?php
// Heading
$_['heading_title']					 	= 'Google Pay';

// Text
$_['text_google_pay']				 	= '<img src="view/image/payment/googlepay.png" height="40" alt="Google Pay" title="Google Pay" style="border: 0px;" />';
$_['text_payments']					 	= 'Payments';
$_['text_edit']			 	 		 	= 'Edit Google Pay';
$_['text_general']				 	 	= 'General';
$_['text_gateway']					 	= 'Gateway';
$_['text_advanced']					 	= 'Advanced';
$_['text_button']					 	= 'Button';
$_['text_production']			 	 	= 'Production / Live';
$_['text_sandbox']		 		 		= 'Sandbox';
$_['text_test']			 			 	= 'Test';
$_['text_default']			 		 	= 'Default';
$_['text_black']			 		 	= 'Black';
$_['text_white']			 			= 'White';
$_['text_long']			 		 	 	= 'Long - "Buy with Google Pay"';
$_['text_short']			 		 	= 'Short - "Google Pay"';
$_['text_card_amex']			 	 	= 'American Express';
$_['text_card_discover']			 	= 'Discover';
$_['text_card_jcb']			 	 	 	= 'JCB';
$_['text_card_mastercard']			 	= 'Mastercard';
$_['text_card_visa']			 	 	= 'Visa';
$_['text_pan_only']			 	 	 	= 'Card payments';
$_['text_cryptogram_3ds']			 	= 'Android device tokens';
$_['text_example_gateway']			 	= 'Example Gateway';
$_['text_example_gateway_merchant_id']	= 'Example Gateway Merchant ID';
$_['text_braintree']			 	 	= 'Braintree';
$_['text_braintree_api_version']	 	= 'Braintree API Version';
$_['text_braintree_sdk_version']	 	= 'Braintree SDK Version';
$_['text_braintree_environment']	 	= 'Braintree Environment';
$_['text_braintree_merchant_id']	 	= 'Braintree Merchant ID';
$_['text_braintree_public_key']	 		= 'Braintree Public Key';
$_['text_braintree_private_key']	 	= 'Braintree Private Key';
$_['text_braintree_tokenization_key']	= 'Braintree Tokenization Key';
$_['text_globalpayments']			 	= 'Global Payments';
$_['text_globalpayments_merchant_id']	= 'Global Payments Merchant ID';
$_['text_globalpayments_shared_secret']	= 'Global Payments Shared Secret';
$_['text_globalpayments_environment']	= 'Global Payments Environment';

// Entry
$_['entry_merchant_id']			 		= 'Google Merchant ID';
$_['entry_merchant_name']			 	= 'Google Merchant Name';
$_['entry_total']					 	= 'Total';
$_['entry_order_status'] 				= 'Order Status';
$_['entry_geo_zone']				 	= 'Geo zone';
$_['entry_status']					 	= 'Status';
$_['entry_sort_order']				 	= 'Sort order';
$_['entry_debug']					 	= 'Debug logging';
$_['entry_environment']				 	= 'Environment';
$_['entry_merchant_gateway']	 	 	= 'Merchant Gateway';
$_['entry_card_networks']	 	 	 	= 'Accepted card types';
$_['entry_auth_methods']	 	 	 	= 'Auth methods';
$_['entry_accept_prepay_cards']	 	 	= 'Accept pre-pay cards';
$_['entry_shipping_require_phone']	 	= 'Require shipping phone number';
$_['entry_shipping_country_limit'] 	 	= 'Restrict shipping countries';
$_['entry_shipping_country_list'] 	 	= 'Allowed countries';
$_['entry_billing_require_phone']	 	= 'Require billing phone number';
$_['entry_button_color']	 	 	 	= 'Button colour';
$_['entry_button_type']	 	 	 		= 'Button type';

// Help
$_['help_merchant_id']		 	 		= 'This should be your merchant ID, this must be used for production environment. UTF-8 characters only.';
$_['help_merchant_name']		 	 	= 'This should be your merchant name, this may be used for customer support, or displayed on transaction notifications. UTF-8 characters only.';
$_['help_debug']					 	= 'Enabling debug will write sensitive data to a log file and the browser console. NO NOT enable unless you understand why you need it.';
$_['help_total']					 	= 'The checkout total the order must reach before this payment method becomes active.';
$_['help_auth_methods']		 	 	 	= 'Card payments will provide the user with their stored cards in the Google account, Android device tokens may not be supported by all merchant gateways.';
$_['help_shipping_restriction']		 	= 'By default shipping is allowed to all countries, or you can select what countries you allow.';

// Success
$_['success_save']		 			 	= 'Success: You have modified Google Pay account details!';

// Error
$_['error_permission']	 				= 'Warning: You do not have permission to modify payment Google Pay!';
$_['error_warning']          		 	= 'Warning: Please check the form carefully for errors!';
$_['error_merchant_id']		 	 		= 'Invalid Merchant ID, must be greater than 3 characters and less than 50';
$_['error_merchant_name']		 	 	= 'Invalid Merchant Name, must be greater than 3 characters and less than 50';
$_['error_card_networks_code']		 	= 'No Accepted card types is set, you must choose at least one.';
$_['error_auth_methods_code']		 	= 'No Auth method is set, you must choose at least one. Card payments should almost always be chosen.';