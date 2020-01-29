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
		<h3>Wachtwoord veranderen:</h3>
	</div>
	<div class="card">
		<div class="card-body">
			<?php $attributes = array('id' => 'password_change', 'class' => 'form-horizontal'); ?>
			<?php echo form_open('users/changePassword', $attributes); ?>

			<div class="form-group">
				<?php echo form_label('Huidige wachtwoord'); ?>

				<?php

				$data = array(
					'class' => 'form-control',
					'name' => 'currentPassword',
					'placeholder' => 'Vul hier je huidige wachtwoord in'

				);

				?>

				<?php echo form_password($data);?>
			</div>
			<div class="form-group">
				<?php echo form_label('Nieuwe wachtwoord'); ?>


				<?php

				$data = array(
					'class' => 'form-control',
					'name' => 'newPassword',
					'placeholder' => 'Vul hier het nieuwe wachtwoord in'

				);

				?>

				<?php echo form_password($data);?>
			</div>
			<div class="form-group">
				<?php echo form_label('Confirmatie nieuw wachtwoord'); ?>


				<?php

				$data = array(
					'class' => 'form-control',
					'name' => 'newPasswordConf',
					'placeholder' => 'Vul hier nogmaals het nieuwe wachtwoord in'

				);

				?>

				<?php echo form_password($data);?>
			</div>
			<div class="form-group">
				<?php

				$data = array(
					'class' => 'btn btn-success',
					'name' => 'Submit',
					'value' => 'Verander Wachtwoord'

				);

				?>

				<?php echo form_submit($data);?>
			</div>
			<?php echo form_close(); ?>
		</div>
	</div>
</div>
