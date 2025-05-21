<?php

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

    public function __construct(array $donnee){
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