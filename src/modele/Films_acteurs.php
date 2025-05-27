<?php
class FilmsActeurs
{
    private $ref_film;
    private $ref_acteur;
    private $role;
    private $img_acteur;

    public function getRefFilm()
    {
        return $this->ref_film;
    }

    public function setRefFilm($ref_film)
    {
        $this->ref_film = $ref_film;
    }

    public function getRefActeur()
    {
        return $this->ref_acteur;
    }

    public function setRefActeur($ref_acteur)
    {
        $this->ref_acteur = $ref_acteur;
    }

    public function getRole()
    {
        return $this->role;
    }

    public function setRole($role)
    {
        $this->role = $role;
    }

    public function getImgActeur()
    {
        return $this->img_acteur;
    }

    public function setImgActeur($img_acteur)
    {
        $this->img_acteur = $img_acteur;
    }

    public function __construct(array $donnee)
    {
        $this->hydrate($donnee);
    }

    public function hydrate(array $donnees)
    {
        foreach ($donnees as $key => $valeur)
        {
            $methode = 'set'.ucfirst($key);

            if (method_exists($this, $methode))
            {
                $this->$methode($valeur);
            }
        }
    }
}
