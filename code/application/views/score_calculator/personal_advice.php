<div class="container">
	<div class="row">
		&nbsp;&nbsp;
	</div>
	<div class="row">
		<h2>Jouw persoonlijke advies:</h2>
	</div>
	<div class="row">
		<table class="table table-striped table-responsive">
			<thead style="background-color: #009900">
				<tr>
					<th style="color: white">Categorie</th>
					<th style="color: white">Advies</th>
				</tr>
			</thead>
			<tbody>
				<?php foreach ($advice as $ad):?>
					<?php $adPart = explode(":", $ad)?>
					<tr>
						<td><?php echo $adPart[0]; ?></td>
						<td><?php echo $adPart[1]; ?></td>
					</tr>
				<?php endforeach; ?>
			</tbody>
		</table>
		<h3>Jouw ecologische score:</h3>
	</div>
	<div class="row">
		<br><p><?php echo $this->session->flashdata('score'); ?></p>
	</div>
	<div class="row">
		<?php if($this->session->userdata('logged_in')): ?>
			<?php if ($this->session->flashdata('saved')): ?>
				<a href="index.php?/scorecalculator/update" class="btn btn-success" role="button">Antwoorden updaten</a>
			<?php else: ?>
				<a href="index.php?/scorecalculator/save" class="btn btn-success" role="button">Antwoorden opslaan</a>
			<?php endif; ?>
		<?php endif; ?>
	</div>
</div>
