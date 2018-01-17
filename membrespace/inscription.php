<?php

//hachage du mot de pass

$pass_hache = password_hash($_POST['pass'], PASSWORD_DEFAULT);

// insertion

$req = $bbd->prepare('INSERT INTO membres(pseudo, pass, email, date_inscription) VALUES (:pseudo, :pass, :email, CURDATE())');
$req->execute(array(
    'pseudo' => $pseudo,
    'pass'   => $pass_hache,
    'email'  => $email
));