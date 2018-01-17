// regex numero de telephone sans espace ni tiret : #^0[1-68][0-9]{8}$#

// regex numero de telephone avec espace ou tiret ou rien : #^0[1-68]([-. ]?[0-9]{2}){4}$#

// on peut également utiliser la classe abrégées : #^0[1-68]([-. ]?\d{2}){4}$#

<?php

if(isset($_POST['telephone']))
{
    $_POST['telephone'] = htmlspecialchars($_POST['telephone']);

    if(preg_match("#^0[1-68]([-. ]?[0-9]{2}){4}$#", $_POST['telephone']))
    {
        echo 'Le' . $_POST['telephone'] . 'est valide';
    }
    else
    {
        echo 'Le' . $_POST['telephone'] . 'n\'est pas valide';
    }
}
?>
// regex adresse mail : #^[a-z0-9._-]+@[a-z0-9._-]{2,}\.[a-z]{2,4}$#

<?php

if(isset($_POST['mail']))
{
    $_POST['mail'] = htmlspecialchars($_POST['mail']);

    if(preg_match("#^[a-z0-9._-]+@[a-z0-9._-]{2,}\.[a-z]{2,4}$#", $_POST['mail']))
    {
        echo 'L\'adresse' . $_POST['mail'] . 'est valide';
    }
    else
    {
        echo 'L\'adresse' . $_POST['mail'] . 'n\'est pas valide';
    }
}
?>
// mysql comprend également les regex mais avec deux différences
// il n'y pas de délimiteurs donc pas de "#" et il ne comprend pas les classe abrégées comme "\d" mais le "." fonctionne toujours

//ex : SELECT nom FROM visiteurs WHERE ip REGEXP '^84\.254(\.[0-9]{1,3}){2}$'
// cela signifie selectionne tout les noms de la table visiteurs ou l'adresse ip commece par 84.254 et se termine par deux series de 1 à 3 chiffre ex: 84.254.6.177

// capture de chaine avec preg_replace

<?php

// on lui donne en 1er parametre la REGEX, en 2eme on lui indique par quoi on veut remplacer, et le dernier parametre c'est le texte dans lequel on fait le remplacement

$texte = preg_replace('#\[b\](.+)\[/b\]#i', '<strong>$1</strong>', $texte);