<?php

namespace modele;

class Acteurs
{
    private $id_acteur;

    /**
     * @return mixed
     */
    public function getIdActeur()
    {
        return $this->id_acteur;
    }

    /**
     * @param mixed $id_acteur
     */
    public function setIdActeur($id_acteur)
    {
        $this->id_acteur = $id_acteur;
    }

    /**
     * @return mixed
     */
    public function getNomComplet()
    {
        return $this->nom_complet;
    }

    /**
     * @param mixed $nom_complet
     */
    public function setNomComplet($nom_complet)
    {
        $this->nom_complet = $nom_complet;
    }

    private $nom_complet;
}