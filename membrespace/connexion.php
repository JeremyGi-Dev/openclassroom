<?php

$pass_hache = password_hash($_POST['pass'], PASSWORD_DEFAULT);

$req = $bdd->prepare('SELECT id FROM membres WHERE pseudo = :pseudo AND pass = :pass');
$req->execute(array(
    'pseudo' => $pseudo,
    'pass'   => $pass_hache
));

$resulat = $req->fetch();

if (!$resulat)
{
    echo 'Mauvais identifiants ou mot de passe';
}
else
{
    session_start();
    $_SESSION['id'] = $resulat['id'];
    $_SESSION['pseudo'] = $resulat['pseudo'];
    echo 'Vous êtes connecté';
}

if (isset($_SESSION['pseudo']) AND isset($_SESSION['id']))
{
    echo 'Bonjour ' . $_SESSION['pseudo'];
}