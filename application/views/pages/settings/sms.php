<h4>SMS Settings</h4>
<ul class="breadcrumbs">
	<li><a href="/">Home</a></li>
	<li><a href="/settings">Settings</a></li>
	<li class="current"><a href="#">SMS</a></li>
</ul>
<?php if (isset($errors)): ?>
<div data-alert class="alert-box alert">
	<?php foreach ($errors as $error): ?>
	<?php echo $error; ?><br />
	<?php endforeach; ?>
	<a href="#" class="close">&times;</a>
</div>
<?php endif; ?>

<?php if ($done): ?>
<div data-alert class="alert-box success">
	<?php echo __('Saved Successfully'); ?>
	<a href="#" class="close">&times;</a>
</div>
<?php endif; ?>

<?php echo Form::open(NULL, array('class' => 'custom')); ?>
	<?php echo Form::hidden('token', Security::token()); ?>
	<fieldset>
		<legend>SMS Provider</legend>
		<div class="row">
			<div class="large-6 columns">
				<div class="switch round">
					<input id="z" name="settings[sms]" value="off" type="radio" <?php echo (( isset($post['settings']['sms']) AND $post['settings']['sms'] == 'off') OR ! isset($post['settings']['sms']) ) ? 'checked' : '' ?>>
					<label for="z" onclick="">Off</label>

					<input id="z1" name="settings[sms]" value="on" type="radio" <?php echo ( isset($post['settings']['sms']) AND $post['settings']['sms'] == 'on') ? 'checked' : '' ?>>
					<label for="z1" onclick="">On</label>
					<span></span>
				</div>				
			</div>
			<div class="large-6 columns">
				<?php echo Form::select('settings[sms_provider]', PingApp_Form::sms_providers(), (isset($post['settings']['sms_provider'])) ? $post['settings']['sms_provider'] : '', array("class" => "medium")) ;?>
			</div>
		</div>
	</fieldset>

	<fieldset>
		<legend>Twilio</legend>
		<div class="row">
			<div class="large-4 columns">
				<label>Phone Number</label>
				<?php echo Form::input("settings[twilio_number]", (isset($post['settings']['twilio_number'])) ? $post['settings']['twilio_number'] : ''); ?>
			</div>
			<div class="large-4 columns">
				<label>Account SID</label>
				<?php echo Form::input("settings[twilio_account_sid]", (isset($post['settings']['twilio_account_sid'])) ? $post['settings']['twilio_account_sid'] : ''); ?>
			</div>
			<div class="large-4 columns">
				<label>Auth Token</label>
				<?php echo Form::input("settings[twilio_auth_token]", (isset($post['settings']['twilio_auth_token'])) ? $post['settings']['twilio_auth_token'] : ''); ?>
			</div>
		</div>
	</fieldset>

	<fieldset>
		<legend>Nexmo</legend>
		<div class="row">
			<div class="large-4 columns">
				<label>Phone Number</label>
				<?php echo Form::input("settings[nexmo_number]", (isset($post['settings']['nexmo_number'])) ? $post['settings']['nexmo_number'] : ''); ?>
			</div>
			<div class="large-4 columns">
				<label>API Key</label>
				<?php echo Form::input("settings[nexmo_api_key]", (isset($post['settings']['nexmo_api_key'])) ? $post['settings']['nexmo_api_key'] : ''); ?>
			</div>
			<div class="large-4 columns">
				<label>API Secret</label>
				<?php echo Form::input("settings[nexmo_api_secret]", (isset($post['settings']['nexmo_api_secret'])) ? $post['settings']['nexmo_api_secret'] : ''); ?>
			</div>
		</div>
	</fieldset>

	<div class="add-new-person-submit">
		<button class="button  expand">Submit</button>
	</div>
<?php echo Form::close(); ?>
