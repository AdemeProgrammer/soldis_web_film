<?php

namespace modele;

class Genres
{
    private $id_genre;

    /**
     * @return mixed
     */
    public function getIdGenre()
    {
        return $this->id_genre;
    }

    /**
     * @param mixed $id_genre
     */
    public function setIdGenre($id_genre)
    {
        $this->id_genre = $id_genre;
    }

    /**
     * @return mixed
     */
    public function getNom()
    {
        return $this->nom;
    }

    /**
     * @param mixed $nom
     */
    public function setNom($nom)
    {
        $this->nom = $nom;
    }

    /**
     * @return mixed
     */
    public function getLibelle()
    {
        return $this->libelle;
    }

    /**
     * @param mixed $libelle
     */
    public function setLibelle($libelle)
    {
        $this->libelle = $libelle;
    }

    private $nom;

    private $libelle;
}