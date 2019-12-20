<?php if($this->session->userdata('logged_in')): ?>

<h2>Log out</h2>
<p>
<?php
	if ($this->session->userdata('username')){
		echo "You are logged in as " . $this->session->userdata('username');
	}

	?>
</p>
<?php echo form_open('users/logout');?>

<?php

	$data = array(

		'class' => 'btn btn-primary',
		'name' => 'Logout',
		'value' => 'Logout'

	);

	echo form_submit($data);

	?>

<?php echo form_close();?>

<?php else: ?>

<div class="container">
	<div class="row">
		<div class="col-sm">
			&nbsp;
		</div>
		<div class="col-sm">
			<div class="card" style="width: 18rem;">
				<div class="card-body">
					<h2 class="text-center">Login</h2>

<?php $attributes = array('id' =>'login_form', 'class' => 'form_horizontal');?>

<?php if($this->session->flashdata('errors')){

echo $this->session->flashdata('errors');

} ?>

<?php echo form_open('users/login', $attributes); ?>

<div class="form-group">
	<?php echo form_label('Username:'); ?>

	<?php

		$data = array(
			'class' => 'form-control',
			'name' => 'Username',
			'placeholder' => 'Enter your username'

		);

	?>

	<?php echo form_input($data);?>
</div>

<div class="form-group">
	<?php echo form_label('Password:'); ?>

	<?php

	$data = array(
		'class' => 'form-control',
		'name' => 'Password',
		'placeholder' => 'Enter your password'

	);

	?>

	<?php echo form_password($data);?>
</div>

<div class="form-group">
	<?php echo form_label('Confirm Password:'); ?>

	<?php

	$data = array(
		'class' => 'form-control',
		'name' => 'Confirm_password',
		'placeholder' => 'Confirm your password'

	);

	?>

	<?php echo form_password($data);?>
</div>

<div class="form-group">

	<?php

	$data = array(
		'class' => 'btn btn-primary',
		'name' => 'Submit',
		'value' => 'Login'

	);

	?>

	<?php echo form_submit($data);?>
</div>
<?php echo form_close(); ?>
					&nbsp;
					<p>Not registered yet? <a href="<?php echo base_url();?>index.php?/users/register">Register</a></p>
				</div>
			</div>
		</div>
		<div class="col-sm">
			&nbsp;
		</div>
	</div>
</div>
<?php endif; ?>
