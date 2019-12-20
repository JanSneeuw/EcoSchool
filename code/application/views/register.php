<!DOCTYPE html>
<html>
<head>
	<title>Ecoware | Register</title>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>

<body>
	<div class="container">
		<br />
		<h3 align="center">Register your account</h3>
		<br />
		<div class="panel panel-default">
			<div class="panel-heading">Register</div>
			<div class="panel-body">
				<form method="post" action="<?php echo base_url();
					?>register/validation">
					<div class="form-group">
						<?php
						if ($this->session->flashdata('message')){
							echo '
							<div class="alert alert-success">'.$this->session-flashdata("message").'</div>
							';
						}
						?>
						<label>Enter your name:</label>
						<input type="text" name="user_name" class="form-control" value="<?php echo set_value('user_name'); ?>"/>
						<span class="text-danger"><?php echo form_error('user_name'); ?></span>
					</div>
					<div class="form-group">
						<label>Enter your Email Address:</label>
						<input type="text" name="user_email" class="form_control" value="<?php echo set_value('user_email'); ?>"/>
						<span class="text-danger"><?php echo form_error('user_email'); ?></span>
					</div>
					<div class="form-group">
						<label>Enter your password:</label>
						<input type="password" name="user_password" class="form_control" value="<?php echo set_value('userpassword'); ?>"/>
						<span class="text_danger"><?php echo form_error('user_password'); ?></span>
					</div>
					<div class="form-group">
						<input type="submit" name="register" value="Register" class="btn btn-info"/>
					</div>
				</form>
			</div>
		</div>
	</div>
</body>
</html>
