Nous allons terminer par un pattern qui est en général le premier qu'on vous présente.
Si je ne vous l'ai pas présenté au début c'est parce que je veux que vous fassiez attention en l'employant
car il peut être très mal utilisé et se transformer en mauvaise pratique.
On considérera alors le pattern comme un « anti-pattern ».
Cependant, il est très connu et par conséquent il est essentiel de le connaître et de savoir pourquoi il ne faut pas l'utiliser dans certains contextes.

Le problème

Nous avons une classe qui ne doit être instanciée qu'une seule fois.
À première vue, ça vous semble impossible et c'est normal.
Jusqu'à présent, nous pouvions faire de multiples $obj=new Classe;
jusqu'à l'infini, et nous nous retrouvions avec une infinité d'instances deClasse. Il va donc falloir empêcher ceci.

Pour empêcher la création d'une instance de cette façon, c'est très simple : il suffit de mettre le constructeur de la classe en privé ou en protégé !

Nous allons donc créer une instance de notre classe à l'intérieur d'elle-même ! De cette façon nous aurons accès au constructeur.

Oui mais voilà, il ne va falloir créer qu'une seule instance...

Nous allons donc créer un attribut statique dans notre classe qui contiendra... l'instance de cette classe !
Nous aurons aussi une méthode statique qui aura pour rôle de renvoyer cette instance.
Si on l'appelle pour la première fois, alors il faut instancier la classe puis retourner l'objet, sinon on se contente de le retourner.

Il reste un petit détail à régler.
Nous voulons vraiment une seule instance, et là, il est encore possible d'en avoir plusieurs.
En effet, rien n'empêche l'utilisateur de cloner l'instance ! Il faut donc bien penser à interdire l'accès à la méthode__clone().

exemple:

<?php

class MonSingleton
{
    protected static $instance; // Contiendra l'instance de notre classe.

    protected function __construct() { } // Constructeur en privé.
    protected function __clone() { } // Méthode de clonage en privé aussi.

    public static function getInstance()
    {
        if (!isset(self::$instance)) // Si on n'a pas encore instancié notre classe.
        {
            self::$instance = new self; // On s'instancie nous-mêmes. :)
        }

        return self::$instance;
    }
}

// et l'appel au singleton

$obj = MonSingleton::getInstance(); // Premier appel : instance créée.
$obj->methode1();