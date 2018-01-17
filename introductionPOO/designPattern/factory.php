<?php

//Ce motif est très simple à construire. En fait, si vous implémentez ce pattern,
// vous n'aurez plus denewà placer dans la partie globale du script afin d'instancier une classe.
// En effet, ce ne sera pas à vous de le faire mais à une classe usine. Cette classe aura pour rôle de charger les classes que vous lui passez en argument.
// Ainsi, quand vous modifierez votre code, vous n'aurez qu'à modifier le masque d'usine pour que la plupart des modifications prennent effet.
// En gros, vous ne vous soucierez plus de l'instanciation de vos classes, ce sera à l'usine de le faire !

class PDOFactory
{
    public static function getMysqlConnexion()
    {
        $db = new PDO('mysql:host=localhost;dbname=tests', 'root', '');
        $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        return $db;
    }
}

// si appeler cela donne

try
{
    $mysql = PDOFactory::getMysqlConnexion();
}
catch (RuntimeException $e)
{
    echo $e->getMessage();
}