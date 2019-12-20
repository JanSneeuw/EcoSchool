<?php
header("Content-Type: image/jpeg");
$im = imagecreatefromjpeg("index_background.jpg");
imagejpeg($im);
imagedestroy($im);
