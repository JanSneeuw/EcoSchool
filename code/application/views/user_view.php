<!DOCTYPE html>
<html lang="eng">
<head>
	<meta charset="UTF-8">
	<title>User view</title>
</head>
<body>
<h1>

	<?php

	foreach ($results as $object){
		echo $object->username . "<br>";
	}

	?>

</h1>
</body>
