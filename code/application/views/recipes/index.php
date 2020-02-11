
<div class="container">
	<?php if ($this->session->flashdata('errors')):?>

		<div class="alert alert-danger alert-dismissible fade show" role="alert">
			<?php echo $this->session->flashdata('errors'); ?>
			<button type="button" class="close" data-dismiss="alert" aria-label="Close">
				<span aria-hidden="true">&times;</span>
			</button>
		</div>

	<?php endif; ?>

	<h1>Recepten</h1>
	<?php if($this->session->userdata('logged_in')): ?>
		<button type="button" class="btn btn-success" data-toggle="modal" data-target="#recipeAdder">
			Recept Toevoegen
		</button>
	<?php endif; ?>
	<?php if (count($recipes) > 0): ?>
	<?php $num = 0; ?>
	<?php for ($i = 0; $i < (count($recipes) - (count($recipes) % 3)) / 3; $i++): ?>
	<div class="row" style="padding-top: 3%">
		<div class="col-sm">
			<div class="card h-100" style="width: 18rem;" data-toggle="modal" data-target=<?php echo $recipes[$num]->id ?>>
				<img class="card-img-top" style="height: 12rem" src="recipeImages/<?php echo $recipes[$num]->image;?>" alt="Card image cap">
				<div class="card-body">
					<h5 class="card-title"><?php echo $recipes[$num]->name; ?></h5>
					<p class="card-text"><?php echo $recipes[$num]->description; ?></p>
					<button type="button" class="btn btn-success" data-toggle="modal" data-target="#id<?php echo $recipes[$num]->id; ?>">
						Details
					</button>
				</div>

			</div>
			<?php $num += 1; ?>
		</div>
		<div class="col-sm">
			<div class="card h-100" style="width: 18rem;">
				<img class="card-img-top" style="height: 12rem" src="recipeImages/<?php echo $recipes[$num]->image;?>" alt="Card image cap">
				<div class="card-body">
					<h5 class="card-title"><?php echo $recipes[$num]->name; ?></h5>
					<p class="card-text"><?php echo $recipes[$num]->description; ?></p>
					<button type="button" class="btn btn-success" data-toggle="modal" data-target="#id<?php echo $recipes[$num]->id; ?>">
						Details
					</button>
				</div>
			</div>
			<?php $num += 1; ?>
		</div>
		<div class="col-sm ">
			<div class="card h-100" style="width: 18rem;">
				<img class="card-img-top" style="height: 12rem" src="recipeImages/<?php echo $recipes[$num]->image; ?>" alt="Card image cap">
				<div class="card-body">
					<h5 class="card-title"><?php echo $recipes[$num]->name; ?></h5>
					<p class="card-text"><?php echo $recipes[$num]->description; ?></p>
					<button type="button" class="btn btn-success" data-toggle="modal" data-target="#id<?php echo $recipes[$num]->id; ?>">
						Details
					</button>
				</div>
			</div>
			<?php $num += 1; ?>
		</div>
	</div>
	<?php endfor; ?>
		<?php if ((count($recipes) % 3) != 0): ?>
			<div class="row" style="padding-top: 3%">
				<?php $midnum = $num;?>
				<?php for ($i = $num; $i < count($recipes); $i++): ?>
					<div class="col-sm">
						<div class="card h-100" style="width: 18rem;">
							<img class="card-img-top" style="height: 12rem" src="recipeImages/<?php echo $recipes[$num]->image; ?>" alt="Card image cap">
							<div class="card-body">
								<h5 class="card-title"><?php echo $recipes[$num]->name; ?></h5>
								<p class="card-text"><?php echo $recipes[$num]->description; ?></p>
								<button type="button" class="btn btn-success" data-toggle="modal" data-target="#id<?php echo $recipes[$num]->id; ?>">
									Details
								</button>
							</div>
						</div>
						<?php $num += 1; ?>
					</div>
				<?php endfor; ?>
				<?php if ((count($recipes) - $midnum) % 2 == 0): ?>
					<div class="col-sm">
						&nbsp;
					</div>
				<?php endif;?>
			</div>
		<?php endif; ?>

</div>

<!-- Modal -->
<?php foreach ($recipes as $recipe): ?>
<div class="modal fade" id="<?php echo 'id' . $recipe->id; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="exampleModalLabel"><?php echo $recipe->name; ?></h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body">
				<div class="row">
					<div class="col-lg-12">
						<img class="card-img-top" src="recipeImages/<?php echo $recipe->image;?>" alt="Card image cap">
					</div>

				</div>
				<div class="row" style="padding-top: 3%">
					<div class="col-lg-12">
						<h3>Benodigdheden:</h3>
						<p><?php echo nl2br($recipe->requirements); ?></p>
					</div>
				</div>
				<div class="row" style="padding-top: 3%">
					<div class="col-lg-12">
						<h3>Recept:</h3>
						<p><?php echo nl2br($recipe->recipe); ?></p>
					</div>
				</div>
			</div>
			<div class="modal-footer">
				<?php if ($this->session->userdata('admin') == true || $recipe->adder_id == $this->session->userdata('user_id')): ?>
					<?php $attributes = array('id' =>'remove_recipe', 'class' => 'form_horizontal');?>

					<?php echo form_open('recipes/delete/' . $recipe->id, $attributes); ?>
					<div class="row">
						<div class="col">
						<?php

						$data = array(
							'class' => 'btn btn-danger',
							'name' => 'Verwijder',
							'value' => 'Verwijder Recept'

						);

						?>

						<?php echo form_submit($data);?>
						</div>

						<div class="col">
							<button type="button" class="btn btn-success" data-dismiss="modal">Sluit</button>
						</div>
					</div>
					<?php echo form_close(); ?>
				<? else: ?>
					<div class="row">
						<div class="col">
							<button type="button" class="btn btn-success" data-dismiss="modal">Sluit</button>
						</div>
					</div>
				<? endif; ?>
			</div>
		</div>
		</div>
	</div>
</div>
<?php endforeach; ?>


<?php endif; ?>
<div class="modal fade" id="recipeAdder" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="exampleModalLabel">Recept toevoegen</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body">
				<?php $attributes = array('id' =>'addition_form', 'class' => 'form_horizontahomel', 'enctype' => 'multipart/form-data');?>

				<?php echo form_open_multipart('recipes/add', $attributes); ?>

				<div class="form-group">
					<?php echo form_label('Naam:'); ?>

					<?php

					$data = array(
						'class' => 'form-control',
						'name' => 'Naam',
						'placeholder' => 'Schrijf hier de naam van je recept.'

					);

					?>

					<?php echo form_input($data);?>
				</div>

				<div class="form-group">
					<?php echo form_label('Beschrijving'); ?>

					<?php

					$data = array(
						'class' => 'form-control',
						'rows' => '4',
						'name' => 'Beschrijving',
						'placeholder' => 'Schrijf hier de beschrijving van je recept in maximaal 125 characters.'

					);

					?>

					<?php echo form_textarea($data);?>
				</div>

				<div class="form-group">
					<?php echo form_label('Benodigdheden'); ?>

					<?php

					$data = array(
						'class' => 'form-control',
						'rows' => '4',
						'name' => 'Benodigdheden',
						'placeholder' => 'Schrijf hier de benodigdheden van het recept'

					);

					?>

					<?php echo form_textarea($data);?>
				</div>
				<div class="form-group">
					<?php echo form_label('Recept'); ?>

					<?php

					$data = array(
						'class' => 'form-control',
						'rows' => '6',
						'name' => 'Recept',
						'placeholder' => 'Schrijf hier het recept'

					);

					?>

					<?php echo form_textarea($data);?>
				</div>
				<div class="form-group">
					<?php echo form_label('Foto'); ?>

					<?php

					$data = array(
						'class' => 'form-control-file',
						'type' => 'file',
						'name' => 'Foto',
						'id' => 'receptFoto'
					);

					?>

					<?php echo form_input($data);?>
				</div>

			</div>
			<div class="modal-footer">
				<div class="form-group">

					<?php

					$data = array(
						'class' => 'btn btn-success',
						'name' => 'Submit',
						'value' => 'Voeg toe'

					);

					?>

					<?php echo form_submit($data);?>
				</div>
				<?php echo form_close(); ?>
			</div>
		</div>
	</div>
</div>



