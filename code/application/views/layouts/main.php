<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Document</title>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
	<link rel="stylesheet" href="application/views/layouts/assets/custom.css"/>
	<style type="text/css">
		.masthead {
			height: 100vh;
			min-height: 500px;
			background-image: url('https://image.freepik.com/photos-gratuite/flou-feuilles-arbres-pour-fond-nature-enregistrer-concept-vert_29487-95.jpg');
			background-size: cover;
			background-position: center;
			background-repeat: no-repeat;
		}



	</style>
</head>
<body>

<nav class="navbar navbar-expand-lg navbar-dark " style="background-color: #009900">
	<a href="<?php echo base_url()?> "><img src="https://via.placeholder.com/150x50.png"></a>
	<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
		<span class="navbar-toggler-icon"></span>
	</button>
	<div class="collapse navbar-collapse" id="navbarSupportedContent">
		<ul class="navbar-nav">
			<li class="nav-item">
				<a class="nav-link" href="<?php echo base_url(); ?>index.php?/scorecalculator" style="color: white; font-weight: bold">Score calculator</a>
			</li>
			<li class="nav-item">
				<a class="nav-link" href="<?php echo base_url();?>index.php?/recipes" style="color: white; font-weight: bold">Vega recepten</a>
			</li>
			<li class="nav-item">
				<a class="nav-link" href="<?php echo base_url(); ?>index.php?/thrift_store" style="color: white; font-weight: bold">Kringloop</a>
			</li>
			<li class="nav-item">
				<a class="nav-link" href="<?php echo base_url(); ?>index.php?/about_us" style="color: white; font-weight: bold">Over ons</a>
			</li>
		</ul>
		<ul class="nav navbar-nav ml-auto">
			<?php if($this->session->userdata('logged_in')): ?>
			<li class="nav-item dropdown">
				<a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" style="color:white; font-weight: bold" "><?php
					if ($this->session->userdata('username')){
						echo $this->session->userdata('username');
					}

					?>
				</a>
				<div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
					<a class="dropdown-item" href="<?php echo base_url(); ?>index.php?/users/my_account">Wachtwoord veranderen</a>
					<a class="dropdown-item" href="<?php echo base_url(); ?>index.php?/users/personal_advice">Persoonlijk advies</a>
					<a class="dropdown-item" href="<?php echo base_url(); ?>index.php?/users/my_recipes">Mijn recepten</a>
					<a class="dropdown-item" href="<?php echo base_url(); ?>index.php?/users/logout">Log uit</a>
				</div>

				<?php else: ?>
					<a class="nav-link" href="<?php echo base_url();?>index.php?/users/loginp" style="color: white; font-weight: bold">Login</a>
				<?php endif; ?>

			</li>
		</ul>
	</div>
</nav>

<?php $this->load->view($main_view); ?>









<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
<script src="application/views/layouts/assets/custom.js"></script>
</body>
</html>
