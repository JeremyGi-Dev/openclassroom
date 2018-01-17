<?php
class MaClasse implements Iterator
{
    private $position = 0;
    private $tableau = ['Premier élément', 'Deuxième élément', 'Troisième élément', 'Quatrième élément', 'Cinquième élément'];

    /**
     * Retourne l'élément courant du tableau.
     */
    public function current()
    {
        return $this->tableau[$this->position];
    }

    /**
     * Retourne la clé actuelle (c'est la même que la position dans notre cas).
     */
    public function key()
    {
        return $this->position;
    }

    /**
     * Déplace le curseur vers l'élément suivant.
     */
    public function next()
    {
        $this->position++;
    }

    /**
     * Remet la position du curseur à 0.
     */
    public function rewind()
    {
        $this->position = 0;
    }

    /**
     * Permet de tester si la position actuelle est valide.
     */
    public function valid()
    {
        return isset($this->tableau[$this->position]);
    }
}

$objet = new MaClasse;

foreach ($objet as $key => $value)
{
    echo $key, ' => ', $value, '<br />';
}