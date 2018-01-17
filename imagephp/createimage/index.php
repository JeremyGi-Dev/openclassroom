<?php
header("Content-type: image/jpeg"); // l'image créer est un jpeg

// on charge une image ($destination) et en créer une autre ($source)
$source = imagecreate(200, 50);
$destination = imagecreatefromjpeg("../shark.jpg");

//création de $source
$orange = imagecolorallocate($source, 255, 128, 0);
$blanc = imagecolorallocate($source, 255, 255, 255);
imagestring($source, 4, 35, 15, "Salut mon gars", $blanc);

// Les fonctions imagesx et imagesy renvoient la largeur et la hauteur d'une image
$largeur_source = imagesx($source);
$hauteur_source = imagesy($source);
$largeur_destination = imagesx($destination);
$hauteur_destination = imagesy($destination);

//On veut placer $source en bas à droite, on calcule les coordonées ou on doit placer l'image sur la photo
$destination_x = $largeur_destination - $largeur_source;
$destination_y = $hauteur_destination - $hauteur_source;

//on met $source dans l'image de destination ($destination)
imagecopymerge($destination, $source, $destination_x, $destination_y, 0, 0, $largeur_source, $hauteur_source, 60);

//on affiche la destination qui à été fusionné avec $source
imagejpeg($destination);