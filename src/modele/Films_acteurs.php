<?php

namespace modele;

class Films_acteurs
{
    private $ref_film;

    /**
     * @return mixed
     */
    public function getRefFilm()
    {
        return $this->ref_film;
    }

    /**
     * @param mixed $ref_film
     */
    public function setRefFilm($ref_film)
    {
        $this->ref_film = $ref_film;
    }

    /**
     * @return mixed
     */
    public function getRefActeur()
    {
        return $this->ref_acteur;
    }

    /**
     * @param mixed $ref_acteur
     */
    public function setRefActeur($ref_acteur)
    {
        $this->ref_acteur = $ref_acteur;
    }
    private $ref_acteur;
}