<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Document</title>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
	<link rel="stylesheet" href="application/views/layouts/assets/slider.css"/>

</head>
<body>
<?php if ($this->session->flashdata('errors')):?>

	<div class="alert alert-danger alert-dismissible fade show" role="alert">
		<?php echo $this->session->flashdata('errors'); ?>
		<button type="button" class="close" data-dismiss="alert" aria-label="Close">
			<span aria-hidden="true">&times;</span>
		</button>
	</div>

<?php endif; ?>


<?php $attributes = array('id' =>'calcForm');?>

<?php echo form_open('scorecalculator/calculate', $attributes);?>

<h1>De Ecologische Test:</h1>
<div class="tab">Uit hoeveel personen bestaat uw huishouden, inclusief u zelf:
	<p id="demo"></p>
	<?php

	$data = array(
		'class' => 'slider',
		'name' => '0',
		'type' => 'range',
		'min' => '1',
		'max' => '20',
		'value' => '1',
		'id' =>'myRange'
	);

	?>

	<?php echo form_input($data);?>
</div>
<div class="tab">Wat is ongeveer uw gemiddelde stroom verbruik per jaar?
	<?php

	$options = array(

		'<1000' => 'Minder dan 1000kWh',
		'>1000' => 'Tussen de 1000 en de 1500kWh',
		'>1500' => 'Tussen de 1500 en de 2000kWh',
		'>2000' => 'Tussen de 2000 en de 2500kWh',
		'>2500' => 'Tussen de 2500 en de 3000kWh',
		'>3000' => 'Tussen de 3000 en de 3500kWh',
		'>3500' => 'Tussen de 3500 en de 4000kWh',
		'>4000' => 'Tussen de 4000 en de 4500kWh',
		'>4500' => 'Tussen de 4500 en de 5000kWh',
		'>5000' => 'Tussen de 5000 en de 5500kWh',
		'>5500' => 'Meer dan 5500kWh'

	);

	$extra = array(
		'class' => 'form-control'
	);
	?>

	<?php echo form_dropdown('1', $options,'<1000', $extra)?>
</div>
<div class="tab">Wekt u zelf groene energie op, bijvoorbeeld zonnepanelen op het dak?
	<?php

		$options = array(

			'true' => 'Ja',
			'false' => 'Nee'

		);

		$extra = array(
			'class' => 'form-control'
		);
	?>

	<?php echo form_dropdown('2', $options, 'false', $extra) ?>
</div>
<div class="tab">Zo ja, hoeveel wekt u ongeveer per maand op?
 	<?php

		$data = array(

			'class' => 'form-control',
			'placeholder' => 'Hoeveelheid',
			'value' => '0',
			'type' => 'number',


		);

 	?>

	<?php echo form_input($data); ?>
</div>
<div class="tab">Indien u (nog) niet zelf groene energie opwekt. Bent u van plan dit te veranderen?
	<?php

		$options = array(

			'0' => 'Niet van toepassing, aangezien ik al groen energie opwek.',
			'1' => 'Ja het is een grote investering die ik wil gaan maken.',
			'2' => 'Als het mogelijk zou zijn voor mij, dan zou ik het graag doen, maar die mogelijkheid is er helaas niet.',
			'3' => 'Ja, maar het is mij nog te duur, financiële tegemoetkoming zou het laatste zetje voor mij zijn.',
			'4' => 'Nee, ik zie er de meerwaarde niet van, het verpest overigens het uiterlijk van mijn dak.'

		);

		$extra = array(

			'class' => 'form-control'
		);

	?>
	<?php echo form_dropdown('3', $options, '0', $extra)?>
</div>
<div class="tab">Tot in welke mate voorkomt u dat bijvoorbeeld verlichting onnodig brandt of de verwarming onnodig aanstaat?
	<?php

		$options = array(

			'0' => 'In mijn huis staat de verwarming en verlichting alleen aan als het nodig is.',
			'1' => 'Ik let niet actief op of verlichting of verwarming onnodig aanstaat, ik zet het zo af en toe uit als ik zie dat het niet nodig is.',
			'2' => 'Als het echt overbodig is dan gaat de verlichting en verwarming uit, verder staat de verlichting en verwarming meestal gewoon aan.',
			'3' => 'Verlichting en verwarming staat in mijn huis vrijwel altijd aan.'

		);

		$extra = array(

			'class' => 'form-control'

		);

	?>

	<?php echo form_dropdown('4', $options, '0', $extra) ?>
</div>
<div class="tab">Kijkt u bij aanschaf van apparaten die relatief veel energie gebruiken bewust naar het energieverbruik?
	<?php

		$options = array(

			'0' => 'Ik koop een apparaat vooral aan de hand van het energieverbruik, de rest is voor mij bijzaak. ',
			'1' => 'Ik kijk vooral naar de prijs-kwaliteitverhouding, als het apparaat ook meteen energiezuiniger is, dan is dat mooi meegenomen.',
			'2' => 'Als het apparaat doet wat het moet doen, ik zou geen extra geld willen inleggen voor een energiezuiniger apparaat.'

		);

		$extra = array(

			'class' => 'form-control'

		);


	?>

	<?php echo form_dropdown('5', $options, '0', $extra) ?>
</div>
<div class="tab">hoe vaak eet u vlees of vis in een week?
	<?php

		$options = array(

			'0' => 'Ik eet geen vlees of vis.',
			'1' => 'Één keer per week of minder.',
			'2' => '2 á 3 keer per week.',
			'3' => '4 á 5 keer per week.',
			'4' => 'Elke dag gemiddelde portie (200 gram).',
			'5' => 'Meerdere keren op een dag of elke dag grote portie (meer dan 200 gram).'

		);

		$extra = array(

			'class' => 'form-control'

		);

	?>

	<?php echo form_dropdown('6', $options, '0', $extra); ?>

</div>
<div class="tab">hoe vaak eet u vegetarisch in een week?
	<?php

		$options = array(

			'0' => 'Nooit',
			'1' => 'Één keer per week of minder.',
			'2' => '2 á 3 keer per week.',
			'3' => '4 á 5 keer per week.',
			'4' => 'Bijna elke dag.',
			'5' => 'Ik eet alleen maar vegetarisch.'

		);

		$extra = array(

			'class' => 'form-control'

		);

	?>

	<?php echo form_dropdown('7', $options, '0', $extra); ?>
</div>
<div class="tab">In hoeverre doet u oude/ongebruikte voorwerpen naar de kringloop brengen of doorverkopen via bijv marktplaats?
	<?php

		$options = array(

			'0' => 'Ik gooi zelden oude/ongebruikte voorwerpen weg, en breng ze altijd naar de kringloopwinkel, geef ze aan kennissen of familie, of ik zet het op bijvoorbeeld marktplaats.',
			'1' => 'Ik gooi een vrij groot deel gewoon weg, zo af en toe gaat het een en het ander naar de kringloop, kennissen of familie, of wordt doorverkocht via bijvoorbeeld marktplaats.',
			'2' => 'Ik gooi alles gewoon bij het afval, opgeruimd staat netjes.'

		);

		$extra = array(

			'class' => 'form-control'

		);

	?>

	<?php echo form_dropdown('8', $options, '0', $extra); ?>
</div>
<div class="tab">In hoeverre doet u aan afvalscheiding?
	<?php

		$options = array(

			'0' => 'Ik scheidt al mijn afval.',
			'1' => 'Ik doe voor een groot deel aan afvalscheiding, maar scheidt niet alles. ',
			'2' => 'Moet dat dan?'

		);

		$extra = array(

			'class' => 'form-control'

		);

	?>

	<?php echo form_dropdown('9', $options, '0', $extra); ?>
</div>
<div class="tab">Hoeveel jaren doet u ongeveer met een mobiele telefoon? als de telefoon niet binnen een jaar wordt vervangen, en als u een mobiele telefoon heeft.
	<p id="d1"></p>
	<?php

	$data = array(
		'class' => 'slider',
		'name' => '10',
		'type' => 'range',
		'min' => '0',
		'max' => '10',
		'value' => '0',
		'id' =>'nextRange'
	);

	?>

	<?php echo form_input($data);?>
</div>
<div class="tab">Wat is uw gemiddelde afstand die u met de auto per dag aflegt voor werkgerelateerde zaken?
	<?php

		$options = array(

			'0' => 'Ik ga met de fiets naar werk.',
			'1' => 'Ik ga met het openbaar vervoer naar werk.',
			'2' => 'Gemiddeld minder dan 20 km per dag.',
			'3' => 'Gemiddeld tussen de 20 en 50 km per dag.',
			'4' => 'Gemiddeld tussen de 50 en 100 km per dag.',
			'5' => 'Gemiddeld meer dan 100 km per dag.'

		);

		$extra = array(

			'class' => 'form-control'

		);

	?>

	<?php echo form_dropdown('11', $options, '0', $extra); ?>
</div>
<div class="tab">Indien u hybride rijd, hoeveel van deze afstand rijd u elektrisch.
	<?php

		$options = array(

			'0' => 'Ik rijdt de volledige afstand op de elektro motor.',
			'1' => 'De elektromotor geeft net niet genoeg bereik om de gehele afstand te overbruggen.',
			'2' => 'Ik rijdt deels elektrisch, maar rijdt nog grotendeels op fossiele brandstof.',
			'3' => 'Mijn auto is geen hybride of elektrische auto, of ik gebruik het hybride aspect van de auto niet.',
			'4' => 'Ik ga niet met de auto naar het werk.'

		);

		$extra = array(

			'class' => 'form-control'

		);

	?>

	<?php echo form_dropdown('12', $options, '0', $extra); ?>
</div>
<div class="tab">Hoeveel rijd u gemiddeld prive met de auto?
	<?php

		$options = array(

			'0' => 'Ik heb geen auto',
			'1' => 'Gemiddeld minder dan 10 km per dag',
			'2' => 'Gemiddeld tussen de 10 en 30 km per dag',
			'3' => 'Gemiddeld tussen de 30 en 60 km per dag',
			'4' => 'Gemiddeld tussen de 60 en 100 km per dag',
			'5' => 'Gemiddeld meer dan 100 km per dag'

		);

		$extra = array(

			'class' => 'form-control'

		);

	?>
	<?php echo form_dropdown('13', $options, '0', $extra); ?>
</div>
<div style="overflow:auto;">
	<div style="float:right;">
		<button type="button" id="prevBtn" onclick="nextPrev(-1)">Previous</button>
		<button type="button" id="nextBtn" onclick="nextPrev(1)">Next</button>
	</div>
</div>

<div style="text-align:center;margin-top:40px;">
	<span class="step"></span>
	<span class="step"></span>
	<span class="step"></span>
	<span class="step"></span>
	<span class="step"></span>
	<span class="step"></span>
	<span class="step"></span>
	<span class="step"></span>
	<span class="step"></span>
	<span class="step"></span>
	<span class="step"></span>
	<span class="step"></span>
	<span class="step"></span>
	<span class="step"></span>
	<span class="step"></span>
</div>
</div>
<?php echo form_close(); ?>
<script src="/application/views/layouts/assets/slider.js"></script>
</form>
</body>
