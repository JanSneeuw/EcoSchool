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
	<?php if ($this->session->flashdata('errors')): ?>
	<div class="alert alert-danger alert-dismissible fade show" role="alert">
		<?php echo $this->session->flashdata('errors'); ?>
		<button type="button" class="close" data-dismiss="alert" aria-label="Close">
			<span aria-hidden="true">&times;</span>
		</button>
	</div>
	<?php endif; ?>

	<div class="row">
		&nbsp;
	</div>
	<div class="row">
		<div class="col-sm">
			&nbsp;&nbsp;
		</div>
		<div class="col-sm">
			<div class="card" style="width: 18rem;">
				<div class="card-body">
					<h2 class="text-center">Login</h2>

<?php $attributes = array('id' =>'login_form', 'class' => 'form_horizontal');?>


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
		'class' => 'btn btn-success',
		'name' => 'Submit',
		'value' => 'Login'

	);

	?>

	<?php echo form_submit($data);?>
</div>
<?php echo form_close(); ?>
					&nbsp;
					<p>Nog niet geregistreerd? <a href="<?php echo base_url();?>index.php?/users/register">Registreer</a></p>
				</div>
			</div>
		</div>
		<div class="col-sm">
			&nbsp;
		</div>
	</div>
</div>
<?php endif; ?>
