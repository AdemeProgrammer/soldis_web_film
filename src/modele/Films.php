<?php

namespace modele;

class Films
{
    private $id_film;

    /**
     * @return mixed
     */
    public function getIdFilm()
    {
        return $this->id_film;
    }

    /**
     * @param mixed $id_film
     */
    public function setIdFilm($id_film)
    {
        $this->id_film = $id_film;
    }

    /**
     * @return mixed
     */
    public function getTitre()
    {
        return $this->titre;
    }

    /**
     * @param mixed $titre
     */
    public function setTitre($titre)
    {
        $this->titre = $titre;
    }

    /**
     * @return mixed
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * @param mixed $description
     */
    public function setDescription($description)
    {
        $this->description = $description;
    }

    /**
     * @return mixed
     */
    public function getDuree()
    {
        return $this->duree;
    }

    /**
     * @param mixed $duree
     */
    public function setDuree($duree)
    {
        $this->duree = $duree;
    }

    /**
     * @return mixed
     */
    public function getAfficheUrl()
    {
        return $this->affiche_url;
    }

    /**
     * @param mixed $affiche_url
     */
    public function setAfficheUrl($affiche_url)
    {
        $this->affiche_url = $affiche_url;
    }

    /**
     * @return mixed
     */
    public function getTrailerUrl()
    {
        return $this->trailer_url;
    }

    /**
     * @param mixed $trailer_url
     */
    public function setTrailerUrl($trailer_url)
    {
        $this->trailer_url = $trailer_url;
    }

    private $titre;

    private $description;

    private $duree;

    private $affiche_url;

    private $trailer_url;
}