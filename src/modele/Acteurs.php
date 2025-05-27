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
            $parts = explode('_', $key);
            $parts = array_map('ucfirst', $parts);
            $methode = 'set' . implode('', $parts); // "setNomComplet"

            if (method_exists($this, $methode)) {
                $this->$methode($valeur);
            } else {
                echo "Méthode $methode non trouvée<br>"; // pour debug
            }
        }
    }

}