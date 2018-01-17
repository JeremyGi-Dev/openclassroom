<?php

setcookie( 'pseudo', $_POST['pseudo'], time() + 36000, null, null, false, true );

try
{
    $bdd = new PDO('mysql:host=localhost;dbname=minichat;charset=utf8', 'root', 'lol');
}
catch(Exception $e)
{
    die('Erreur : '.$e->getMessage());
}

$req = $bdd->prepare('INSERT INTO chat (pseudo, message, date_creation) VALUES(?, ?, NOW())');
$req->execute(array($_POST['pseudo'], $_POST['message']));

header('Location: minichat.php');
?>