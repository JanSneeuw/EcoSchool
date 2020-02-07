
<?php $attributes = array('id' =>'register_form', 'class' => 'form_horizontal');?>

<?php echo validation_errors("<p class='bg-danger'>"); ?>


<div class="container">
	<?php if ($this->session->flashdata('errors')):?>

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
			&nbsp;&nbsp;&nbsp;
		</div>
		<div class="col-sm">
			<div class="card" style="width: 18rem;">
				<div class="card-body">
					<h2 class="text-center">Registreer</h2>
<?php echo form_open('users/register', $attributes); ?>


<div class="form-group">
	<?php echo form_label('First Name'); ?>

	<?php

	$data = array(
		'class' => 'form-control',
		'name' => 'First_name',
		'placeholder' => 'Schrijf hier je voornaam.'

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
		'placeholder' => 'Schrijf hier je achternaam.'

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
			'placeholder' => 'Schrijf hier je gebruikersnaam.'

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
		'placeholder' => 'Schrijf hier je email adres.'

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
		'placeholder' => 'Schrijf hier je wachtwoord.'

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
		'placeholder' => 'Schrijf hier nogmaals je wachtwoord.'

	);

	?>

	<?php echo form_password($data);?>
</div>

<div class="form-group">

	<?php

	$data = array(
		'class' => 'btn btn-success',
		'name' => 'Submit',
		'value' => 'Registreer'

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
