<div class="container">
	<div class="row">
		&nbsp;
	</div>

	<?php if ($advice != null): ?>
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
	<?php else: ?>
	<div class="row">
		<h2>Je hebt de score calculator nog niet gedaan!</h2>
	</div>
	<div class="row">
		<h4>Doe deze <a href="index.php?/scorecalculator">hier</a></h4>
	</div>
	<?php endif; ?>
	<?php if ($score != null): ?>
	<div class="row">
		<br>
		<p><?php echo $score; ?></p>
	</div>
	<?php endif; ?>
</div>

