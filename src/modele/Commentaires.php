<?php

class Commentaires
{
    private $id_commentaire;
    private $note;
    private $libelle;
    private $date;
    private $ref_film;
    private $ref_utilisateur;

    // Getters et setters

    public function getIdCommentaire()
    {
        return $this->id_commentaire;
    }

    public function setIdCommentaire($id_commentaire)
    {
        $this->id_commentaire = $id_commentaire;
    }

    public function getNote()
    {
        return $this->note;
    }

    public function setNote($note)
    {
        $this->note = $note;
    }

    public function getLibelle()
    {
        return $this->libelle;
    }

    public function setLibelle($libelle)
    {
        $this->libelle = $libelle;
    }

    public function getDate()
    {
        return $this->date;
    }

    public function setDate($date)
    {
        $this->date = $date;
    }

    public function getRefFilm()
    {
        return $this->ref_film;
    }

    public function setRefFilm($ref_film)
    {
        $this->ref_film = $ref_film;
    }

    public function getRefUtilisateur()
    {
        return $this->ref_utilisateur;
    }

    public function setRefUtilisateur($ref_utilisateur)
    {
        $this->ref_utilisateur = $ref_utilisateur;
    }

    // Constructeur avec hydrate
    public function __construct(array $donnees = [])
    {
        $this->hydrate($donnees);
    }

    /**
     * Hydrate en convertissant les clés snake_case en camelCase pour appeler les setters
     */
    public function hydrate(array $donnees)
    {
        foreach ($donnees as $key => $valeur) {
            $keyCamelCase = str_replace(' ', '', ucwords(str_replace('_', ' ', $key)));
            $methode = 'set' . $keyCamelCase;

            if (method_exists($this, $methode)) {
                $this->$methode($valeur);
            }
        }
    }
}
