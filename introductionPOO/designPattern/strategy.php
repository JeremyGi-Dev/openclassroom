Vous avez une classe dédiée à une tâche spécifique.
Dans un premier temps, celle-ci effectue une opération suivant un algorithme bien précis.
Cependant, avec le temps, cette classe sera amenée à évoluer, et elle suivra plusieurs algorithmes, tout en effectuant la même tâche de base.
Par exemple, vous avez une classe FileWriter qui a pour rôle d'écrire dans un fichier ainsi qu'une classe DBWriter.
Dans un premier temps, ces classes ne contiennent qu'une méthode write() qui n'écrira que le texte passé en paramètre dans le fichier ou dans la BDD.
Au fil du temps, vous vous rendez compte que c'est dommage qu'elles ne fassent que ça
et vous aimeriez bien qu'elles puissent écrire en différents formats (HTML, XML, etc.) : les classes doivent donc formater puis écrire.
C'est à ce moment qu'il est intéressant de se tourner vers le pattern Strategy.
En effet, sans ce design pattern, vous seriez obligés de créer deux classes différentes pour écrire au format HTML
par exemple :HTMLFileWriter et HTMLDBWriter. Pourtant, ces deux classes devront formater le texte de la même façon,
nous assisterons à une duplication du code, la pire chose à faire dans un script !
Imaginez que vous voulez modifier l'algorithme dupliqué une dizaine de fois... Pas très pratique n'est-ce pas ?

exemple:

<?php

class DBWriter extends Writer
{
    protected $db;

    public function __construct(Formater $formater, PDO $db)
    {
        parent::__construct($formater);
        $this->db = $db;
    }

    public function write ($text)
    {
        $q = $this->db->prepare('INSERT INTO lorem_ipsum SET text = :text');
        $q->bindValue(':text', $this->formater->format($text));
        $q->execute();
    }
}

class FileWriter extends Writer
{
    // Attribut stockant le chemin du fichier.
    protected $file;

    public function __construct(Formater $formater, $file)
    {
        parent::__construct($formater);
        $this->file = $file;
    }

    public function write($text)
    {
        $f = fopen($this->file, 'w');
        fwrite($f, $this->formater->format($text));
        fclose($f);
    }
}