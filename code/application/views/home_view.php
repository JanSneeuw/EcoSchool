<header class="masthead">
	<?php if ($this->session->flashdata('errors')):?>

		<div class="alert alert-danger alert-dismissible fade show" role="alert">
			<?php echo $this->session->flashdata('errors'); ?>
			<button type="button" class="close" data-dismiss="alert" aria-label="Close">
				<span aria-hidden="true">&times;</span>
			</button>
		</div>

	<?php elseif ($this->session->flashdata('success')): ?>
		<div class="alert alert-success alert-dismissible fade show" role="alert">
			<?php echo $this->session->flashdata('success'); ?>
			<button type="button" class="close" data-dismiss="alert" aria-label="Close">
				<span aria-hidden="true">&times;</span>
			</button>
		</div>
	<?php endif; ?>

	<div class="container h-100">
		<div class="row h-100 align-items-center">
			<div class="col-12 text-center">
				<h1 class="font-weight-light" style="color: white">Hoe groen leef jij?</h1>
				<a href="<?php echo base_url(); ?>index.php?/scorecalculator" role="button" class="btn btn-outline-light">Doe nu de test!</a>
			</div>
		</div>
	</div>
</header>
<div class="container">
	<div class="row">
		&nbsp;
	</div>
	<hr>
	<div class="row">
		&nbsp;&nbsp;
	</div>
	<div class="row">
		<h3>Feiten:</h3>
	</div>
	<div class="row">
		<div class="col-6">
			<ul>
				<li>Elke dag worden zo ongeveer 27.000 bomen omgehakt om ons te voorzien van toilet papier.</li>
				<li>75.000 bomen zouden kunnen worden bespaard als alleen al het papier dat wordt gebruikt voor de daagelijkse print van de New York Times zou worden gerecycled.</li>
				<li>Per minuut wordt ongeveer 40 hectares aan regenwoud gekapt.</li>
				<li>Jaarlijkst sterven grof weg 50.000 soorten die in het regenwoud leven uit, dit is gemiddeld 137 per dag.</li>
			</ul>
		</div>
		<div class="col-6">
			&nbsp;<img src="application/views/layouts/assets/plastic_soep_img.jpg" style="height: 95%; width: 95%" >
		</div>
	</div>
	<div class="row">
		&nbsp;
	</div>
	<div class="row">
		<div class="col-6">
			&nbsp;<img src="application/views/layouts/assets/opwarming_img.jpg" style="height: 90%; width: 90%">
		</div>
		<div class="col-6">
			<ul>
				<li>Aluminium kan blijvend worden gerecycled. Het recyclen van 1 aluminium blik bespaart genoeg stroom om een TV 3 uur van stroom te voorzien.</li>
				<li>Er sterven jaarlijks 1 miljoen zeedieren door plastic afval in de oceaan.</li>
				<li>De glazen flessen die vandaag de dag geproduceerd worden zijn pas na 4000 jaar afgebroeken door de natuur.</li>
				<li>Maar 1% van de watervoorraad op onze planeet is bruikbaar.</li>
			</ul>
		</div>
	</div>
	<hr>
</div>
