<?php
header ('Content-Type: image/jpeg');

$source = imagecreatefromjpeg("../shark.jpg"); //L'image source
$destination = imagecreatetruecolor(200, 150); //On crée une miniature vide

// Les fonction imagesx et imagesy renvoient la largeur et la hauteur d'une image
$largeur_source = imagesx($source);
$hauteur_source = imagesy($source);
$largeur_destination = imagesx($destination);
$hauteur_destination = imagesy($destination);

//on crée la miniature
imagecopyresampled($destination, $source, 0, 0, 0, 0, $largeur_destination, $hauteur_destination, $largeur_source, $hauteur_source);

//on enregistre la miniature sous le nom "mini_shark.jpg"
imagejpeg($destination, "mini_shark.jpg");