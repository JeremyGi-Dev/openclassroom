<?php
class MaClasse implements SeekableIterator
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
     * Déplace le curseur interne.
     */
    public function seek($position)
    {
        $anciennePosition = $this->position;
        $this->position = $position;

        if (!$this->valid())
        {
            trigger_error('La position spécifiée n\'est pas valide', E_USER_WARNING);
            $this->position = $anciennePosition;
        }
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

$objet->seek(2);
echo '<br />', $objet->current();