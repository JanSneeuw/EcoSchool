
<?php $attributes = array('id' =>'register_form', 'class' => 'form_horizontal');?>

<?php echo validation_errors("<p class='bg-danger'>"); ?>


<div class="container">
	<div class="row">
		<div class="col-sm">
			&nbsp;&nbsp;
		</div>
		<div class="col-sm">
			<div class="card" style="width: 18rem;">
				<div class="card-body">
					<h2 class="text-center">Register</h2>
<?php echo form_open('users/register', $attributes); ?>


<div class="form-group">
	<?php echo form_label('First Name'); ?>

	<?php

	$data = array(
		'class' => 'form-control',
		'name' => 'First_name',
		'placeholder' => 'Enter your first name'

	);

	?>

	<?php echo form_input($data);?>
</div>


<div class="form-group">
	<?php echo form_label('Last Name'); ?>

	<?php

	$data = array(
		'class' => 'form-control',
		'name' => 'Last_name',
		'placeholder' => 'Enter your last name'

	);

	?>

	<?php echo form_input($data);?>
</div>

<div class="form-group">
	<?php echo form_label('Username'); ?>

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
	<?php echo form_label('Email'); ?>

	<?php

	$data = array(
		'class' => 'form-control',
		'name' => 'Email',
		'placeholder' => 'Enter your e-mail address'

	);

	?>

	<?php echo form_input($data);?>
</div>

<div class="form-group">
	<?php echo form_label('Password'); ?>

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
	<?php echo form_label('Confirm Password'); ?>

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
		'value' => 'Register'

	);

	?>

	<?php echo form_submit($data);?>
</div>

				</div>
			</div>
		</div>
		<div class="col-sm">
			&nbsp;
		</div>
	</div>
</div>
<?php echo form_close(); ?>
