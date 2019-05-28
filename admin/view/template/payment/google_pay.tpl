<?php echo $header; ?><?php echo $column_left; ?>
<div id="content">
	<div class="page-header">
		<div class="container-fluid">
			<div class="pull-right">
				<button type="submit" form="form_payment" data-toggle="tooltip" title="<?php echo $button_save; ?>" class="btn btn-primary"><i class="fa fa-save"></i></button>
				<a href="<?php echo $cancel; ?>" data-toggle="tooltip" title="<?php echo $button_cancel; ?>" class="btn btn-default"><i class="fa fa-reply"></i></a>
			</div>
			<h1><?php echo $heading_title; ?></h1>
			<ul class="breadcrumb">
				<?php foreach ($breadcrumbs as $breadcrumb) { ?>
				<li><a href="<?php echo $breadcrumb['href']; ?>"><?php echo $breadcrumb['text']; ?></a></li>
				<?php } ?>
			</ul>
		</div>
	</div>
	<div class="container-fluid">
		<?php if ($error_warning) { ?>
		<div class="alert alert-danger"><i class="fa fa-exclamation-circle"></i> <?php echo $error_warning; ?>
			<button type="button" class="close" data-dismiss="alert">&times;</button>
		</div>
		<?php } ?>
		<div class="panel panel-default">
			<div class="panel-heading">
				<h3 class="panel-title"><i class="fa fa-pencil"></i> <?php echo $text_edit; ?></h3>
			</div>
			<div class="panel-body">
				<form action="<?php echo $action; ?>" method="post" enctype="multipart/form-data" id="form_payment" class="form-horizontal">
					<ul class="nav nav-tabs" id="tabs">
						<li class="active"><a href="#tab_general" data-toggle="tab"><?php echo $text_general; ?></a></li>
						<li><a href="#tab_gateway" data-toggle="tab"><?php echo $text_gateway; ?></a></li>
						<li><a href="#tab_advanced" data-toggle="tab"><?php echo $text_advanced; ?></a></li>
						<li><a href="#tab_button" data-toggle="tab"><?php echo $text_button; ?></a></li>
					</ul>
					<div class="tab-content">
						<div class="tab-pane active" id="tab_general">
							<div class="form-group required">
								<label class="col-sm-2 control-label" for="input_merchant_id"><span data-toggle="tooltip" title="<?php echo $help_merchant_id; ?>"><?php echo $entry_merchant_id; ?></span></label>
								<div class="col-sm-10">
									<input type="text" name="google_pay_merchant_id" value="<?php echo $google_pay_merchant_id; ?>" placeholder="<?php echo $entry_merchant_id; ?>" id="input_merchant_id" class="form-control"/>
									<?php if ($error_merchant_id) { ?>
									<div class="text-danger"><?php echo $error_merchant_id; ?></div>
									<?php } ?>
								</div>
							</div>
							<div class="form-group required">
								<label class="col-sm-2 control-label" for="input_merchant_name"><span data-toggle="tooltip" title="<?php echo $help_merchant_name; ?>"><?php echo $entry_merchant_name; ?></span></label>
								<div class="col-sm-10">
									<input type="text" name="google_pay_merchant_name" value="<?php echo $google_pay_merchant_name; ?>" placeholder="<?php echo $entry_merchant_name; ?>" id="input_merchant_name" class="form-control"/>
									<?php if ($error_merchant_name) { ?>
									<div class="text-danger"><?php echo $error_merchant_name; ?></div>
									<?php } ?>
								</div>
							</div>
							<div class="form-group">
								<label class="col-sm-2 control-label" for="input_environment"><?php echo $entry_environment; ?></label>
								<div class="col-sm-10">
									<select name="google_pay_environment" id="input_environment" class="form-control">
										<?php if ($google_pay_environment == 'production') { ?>
										<option value="production" selected="selected"><?php echo $text_production; ?></option>
										<option value="test"><?php echo $text_test; ?></option>
										<?php } else { ?>
										<option value="production"><?php echo $text_production; ?></option>
										<option value="test" selected="selected"><?php echo $text_test; ?></option>
										<?php } ?>
									</select>
								</div>
							</div>
							<div class="form-group">
								<label class="col-sm-2 control-label" for="input_debug"><span data-toggle="tooltip" title="<?php echo $help_debug; ?>"><?php echo $entry_debug; ?></span></label>
								<div class="col-sm-10">
									<select name="google_pay_debug" id="input_debug" class="form-control">
										<?php if ($google_pay_debug) { ?>
										<option value="1" selected="selected"><?php echo $text_enabled; ?></option>
										<option value="0"><?php echo $text_disabled; ?></option>
										<?php } else { ?>
										<option value="1"><?php echo $text_enabled; ?></option>
										<option value="0" selected="selected"><?php echo $text_disabled; ?></option>
										<?php } ?>
									</select>
								</div>
							</div>
							<div class="form-group">
								<label class="col-sm-2 control-label" for="input_order_status"><?php echo $entry_order_status; ?></label>
								<div class="col-sm-10">
									<select name="google_pay_order_status_id" id="input_order_status" class="form-control">
										<?php foreach ($order_statuses as $order_status) { ?>
										<?php if ($order_status['order_status_id'] == $google_pay_order_status_id) { ?>
										<option value="<?php echo $order_status['order_status_id']; ?>" selected="selected"><?php echo $order_status['name']; ?></option>
										<?php } else { ?>
										<option value="<?php echo $order_status['order_status_id']; ?>"><?php echo $order_status['name']; ?></option>
										<?php } ?>
										<?php } ?>
									</select>
								</div>
							</div>
							<div class="form-group">
								<label class="col-sm-2 control-label" for="input_total"><span data-toggle="tooltip" title="<?php echo $help_total; ?>"><?php echo $entry_total; ?></span></label>
								<div class="col-sm-10">
									<input type="text" name="google_pay_total" value="<?php echo $google_pay_total; ?>" placeholder="<?php echo $entry_total; ?>" id="input_total" class="form-control"/>
								</div>
							</div>
							<div class="form-group">
								<label class="col-sm-2 control-label" for="input_sort_order"><?php echo $entry_sort_order; ?></label>
								<div class="col-sm-10">
									<input type="text" name="google_pay_sort_order" value="<?php echo $google_pay_sort_order; ?>" placeholder="<?php echo $entry_sort_order; ?>" id="input_sort_order" class="form-control"/>
								</div>
							</div>
							<div class="form-group">
								<label class="col-sm-2 control-label" for="input_geo_zone"><?php echo $entry_geo_zone; ?></label>
								<div class="col-sm-10">
									<select name="google_pay_geo_zone_id" id="input_geo_zone" class="form-control">
										<option value="0"><?php echo $text_all_zones; ?></option>
										<?php foreach ($geo_zones as $geo_zone) { ?>
										<?php if ($geo_zone['geo_zone_id'] == $google_pay_geo_zone_id) { ?>
										<option value="<?php echo $geo_zone['geo_zone_id']; ?>" selected="selected"><?php echo $geo_zone['name']; ?></option>
										<?php } else { ?>
										<option value="<?php echo $geo_zone['geo_zone_id']; ?>"><?php echo $geo_zone['name']; ?></option>
										<?php } ?>
										<?php } ?>
									</select>
								</div>
							</div>
							<div class="form-group">
								<label class="col-sm-2 control-label" for="input_status"><?php echo $entry_status; ?></label>
								<div class="col-sm-10">
									<select name="google_pay_status" id="input_status" class="form-control">
										<?php if ($google_pay_status) { ?>
										<option value="1" selected="selected"><?php echo $text_enabled; ?></option>
										<option value="0"><?php echo $text_disabled; ?></option>
										<?php } else { ?>
										<option value="1"><?php echo $text_enabled; ?></option>
										<option value="0" selected="selected"><?php echo $text_disabled; ?></option>
										<?php } ?>
									</select>
								</div>
							</div>
						</div>
						<div class="tab-pane" id="tab_gateway">
							<div class="form-group">
								<label class="col-sm-2 control-label" for="input_merchant_gateway"><?php echo $entry_merchant_gateway; ?></label>
								<div class="col-sm-10">
									<select name="google_pay_merchant_gateway_code" id="input_merchant_gateway_code" class="form-control">
										<?php foreach ($merchant_gateways as $merchant_gateway) { ?>
										<?php if ($merchant_gateway['code'] == $google_pay_merchant_gateway_code) { ?>
										<option value="<?php echo $merchant_gateway['code']; ?>" selected="selected"><?php echo ${$merchant_gateway['name']}; ?></option>
										<?php } else { ?>
										<option value="<?php echo $merchant_gateway['code']; ?>"><?php echo ${$merchant_gateway['name']}; ?></option>
										<?php } ?>
										<?php } ?>
									</select>
								</div>
							</div>
							<?php foreach ($merchant_gateways as $merchant_gateway) { ?>
							<div class="merchant-gateway merchant-gateway-<?php echo $merchant_gateway['code']; ?>">
								<?php foreach ($merchant_gateway['fields'] as $field) { ?>
								<div class="form-group">
									<label class="col-sm-2 control-label" for="input_<?php echo $field['code']; ?>"><?php echo ${$field['name']}; ?></label>
									<div class="col-sm-10">
										<?php if ($field['type'] == 'text') { ?>
										<input type="text" name="google_pay_merchant_gateway[<?php echo $merchant_gateway['code']; ?>][field][<?php echo $field['code']; ?>]" value="<?php if (isset($google_pay_merchant_gateway[$merchant_gateway['code']]['field'][$field['code']])) { ?><?php echo $google_pay_merchant_gateway[$merchant_gateway['code']]['field'][$field['code']]; ?><?php } elseif (isset($field['value'])) { ?><?php echo $field['value']; ?><?php } ?>" class="form-control" />
										<?php } ?>
									</div>
								</div>
								<?php } ?>
							</div>
							<?php } ?>
						</div>
						<div class="tab-pane" id="tab_advanced">
							<div class="form-group">
								<label class="col-sm-2 control-label" for="input_card_networks"><?php echo $entry_card_networks; ?></label>
								<div class="col-sm-10">
									<div class="well well-sm" style="height: 160px; overflow: auto;">
										<?php foreach ($card_networks as $card_network) { ?>
										<div class="checkbox">
											<label>
												<?php if (in_array($card_network['code'], $google_pay_card_networks_code)) { ?>
												<input type="checkbox" name="google_pay_card_networks_code[]" value="<?php echo $card_network['code']; ?>" checked="checked" /> <?php echo ${$card_network['name']}; ?>
												<?php } else { ?>
												<input type="checkbox" name="google_pay_card_networks_code[]" value="<?php echo $card_network['code']; ?>" /> <?php echo ${$card_network['name']}; ?>
												<?php } ?>
											</label>
										</div>
										<?php } ?>
									</div>
									<?php if ($error_card_networks_code) { ?>
									<div class="text-danger"><?php echo $error_card_networks_code; ?></div>
									<?php } ?>
								</div>
							</div>
							<div class="form-group">
								<label class="col-sm-2 control-label" for="input_auth_method"><span data-toggle="tooltip" title="<?php echo $help_auth_methods; ?>"><?php echo $entry_auth_methods; ?></span></label>
								<div class="col-sm-10">
									<div class="well well-sm" style="height: 80px; overflow: auto;">
										<?php foreach ($auth_methods as $auth_method) { ?>
										<div class="checkbox">
											<label>
												<?php if (in_array($auth_method['code'], $google_pay_auth_methods_code)) { ?>
												<input type="checkbox" name="google_pay_auth_methods_code[]" value="<?php echo $auth_method['code']; ?>" checked="checked" /> <?php echo ${$auth_method['name']}; ?>
												<?php } else { ?>
												<input type="checkbox" name="google_pay_auth_methods_code[]" value="<?php echo $auth_method['code']; ?>" /> <?php echo ${$auth_method['name']}; ?>
												<?php } ?>
											</label>
										</div>
										<?php } ?>
									</div>
									<?php if ($error_auth_methods_code) { ?>
									<div class="text-danger"><?php echo $error_auth_methods_code; ?></div>
									<?php } ?>
								</div>
							</div>
							<div class="form-group">
								<label class="col-sm-2 control-label" for="input_accept_prepay_cards"><?php echo $entry_accept_prepay_cards; ?></label>
								<div class="col-sm-10">
									<select name="google_pay_accept_prepay_cards" id="input_accept_prepay_cards" class="form-control">
										<?php if ($google_pay_accept_prepay_cards == 'true') { ?>
										<option value="true" selected="selected"><?php echo $text_yes; ?></option>
										<option value="false"><?php echo $text_no; ?></option>
										<?php } else { ?>
										<option value="true"><?php echo $text_yes; ?></option>
										<option value="false" selected="selected"><?php echo $text_no; ?></option>
										<?php } ?>
									</select>
								</div>
							</div>
							<div class="form-group">
								<label class="col-sm-2 control-label" for="input_billing_require_phone"><?php echo $entry_billing_require_phone; ?></label>
								<div class="col-sm-10">
									<select name="google_pay_bill_require_phone" id="input_billing_require_phone" class="form-control">
										<?php if ($google_pay_bill_require_phone == 'true') { ?>
										<option value="true" selected="selected"><?php echo $text_yes; ?></option>
										<option value="false"><?php echo $text_no; ?></option>
										<?php } else { ?>
										<option value="true"><?php echo $text_yes; ?></option>
										<option value="false" selected="selected"><?php echo $text_no; ?></option>
										<?php } ?>
								</select>
								</div>
							</div>
							<div class="form-group">
								<label class="col-sm-2 control-label" for="input_shipping_require_phone"><?php echo $entry_shipping_require_phone; ?></label>
								<div class="col-sm-10">
									<select name="google_pay_ship_require_phone" id="input_shipping_require_phone" class="form-control">
										<?php if ($google_pay_ship_require_phone == 'true') { ?>
										<option value="true" selected="selected"><?php echo $text_yes; ?></option>
										<option value="false"><?php echo $text_no; ?></option>
										<?php } else { ?>
										<option value="true"><?php echo $text_yes; ?></option>
										<option value="false" selected="selected"><?php echo $text_no; ?></option>
										<?php } ?>
									</select>
								</div>
							</div>
						</div>
						<div class="tab-pane" id="tab_button">
							<div class="form-group">
								<label class="col-sm-2 control-label" for="input_button_color"><?php echo $entry_button_color; ?></label>
								<div class="col-sm-10">
									<select name="google_pay_button_color" id="input_button_color" class="form-control">
										<?php if ($google_pay_button_color == 'black') { ?>
										<option value="default"><?php echo $text_default; ?></option>
										<option value="black" selected="selected"><?php echo $text_black; ?></option>
										<option value="white"><?php echo $text_white; ?></option>
										<?php } elseif ($google_pay_button_color == 'white') { ?>
										<option value="default"><?php echo $text_default; ?></option>
										<option value="black"><?php echo $text_black; ?></option>
										<option value="white" selected="selected"><?php echo $text_white; ?></option>
										<?php } else { ?>
										<option value="default" selected="selected"><?php echo $text_default; ?></option>
										<option value="black"><?php echo $text_black; ?></option>
										<option value="white"><?php echo $text_white; ?></option>
										<?php } ?>
									</select>
								</div>
							</div>
							<div class="form-group">
								<label class="col-sm-2 control-label" for="input_button_type"><?php echo $entry_button_type; ?></label>
								<div class="col-sm-10">
									<select name="google_pay_button_type" id="input_button_type" class="form-control">
										<?php if ($google_pay_button_type == 'short') { ?>
										<option value="short" selected="selected"><?php echo $text_short; ?></option>
										<option value="long"><?php echo $text_long; ?></option>
										<?php } else { ?>
										<option value="short"><?php echo $text_short; ?></option>
										<option value="long" selected="selected"><?php echo $text_long; ?></option>
										<?php } ?>
									</select>
								</div>
							</div>
						</div>
					</div>
				</form>
			</div>
		</div>
	</div>
</div>
<script type="text/javascript">
  
checkMerchantGateway();

$('#input_merchant_gateway_code').on('change', function() {
	checkMerchantGateway();
});	

function checkMerchantGateway() {
	$('.merchant-gateway').addClass('hidden');
	$('.merchant-gateway-' + $('#input_merchant_gateway_code').val()).removeClass('hidden');
}

</script>
<?php echo $footer; ?>