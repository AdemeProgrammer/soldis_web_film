<?php


require_once(__DIR__ . '/../bdd/Bdd.php');
require_once(__DIR__ . '/../modele/Commentaires.php');

class CommentairesRepository
{
    private $bdd;

    public function __construct()
    {
        $this->bdd = new Bdd();
    }

    public function ajouterCommentaire(Commentaires $commentaire)
    {
        $sql = "INSERT INTO commentaires (note, libelle, ref_film, ref_utilisateur)
            VALUES (:note, :commentaire, :ref_film, :ref_utilisateur)";
        $req = $this->bdd->getBdd()->prepare($sql);

        return $req->execute([
            'note'            => $commentaire->getNote(),
            'commentaire'     => $commentaire->getLibelle(),
            'ref_film'        => $commentaire->getRefFilm(),
            'ref_utilisateur' => $commentaire->getRefUtilisateur()
        ]);
    }


    public function getCommentairesByFilm($id_film)
    {
        $sql = "SELECT c.*, u.nom AS nom_utilisateur
                FROM commentaires c
                JOIN utilisateurs u ON c.ref_utilisateur = u.id_utilisateur
                WHERE ref_film = :id_film
                ORDER BY date DESC";
        $req = $this->bdd->getBdd()->prepare($sql);
        $req->execute(['id_film' => $id_film]);
        return $req->fetchAll(PDO::FETCH_ASSOC);
    }
}
