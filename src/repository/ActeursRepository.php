<?php
require_once(__DIR__ . '/../bdd/Bdd.php');
require_once(__DIR__ . '/../modele/Acteurs.php');

class ActeursRepository
{
    private $bdd;

    public function __construct()
    {
        $this->bdd = new Bdd();
    }

    public function getAllActeurs()
    {
        $sql = "SELECT * FROM acteurs";
        $req = $this->bdd->getBdd()->prepare($sql);
        $req->execute();
        return $req->fetchAll(PDO::FETCH_ASSOC);
    }

    public function ajoutActeur(Acteurs $acteur)
    {
        $sql = "INSERT INTO acteurs (nom_complet) VALUES (:nom_complet)";
        $req = $this->bdd->getBdd()->prepare($sql);
        return $req->execute([
            'nom_complet' => $acteur->getNomComplet()
        ]);
    }

    public function getActeurById($id_acteur)
    {
        $sql = "SELECT * FROM acteurs WHERE id_acteur = :id_acteur";
        $req = $this->bdd->getBdd()->prepare($sql);
        $req->execute(['id_acteur' => $id_acteur]);
        return $req->fetch(PDO::FETCH_ASSOC);
    }

    public function supprActeur(Acteurs $acteur)
    {
        $sql = "DELETE FROM acteurs WHERE id_acteur = :id_acteur";
        $req = $this->bdd->getBdd()->prepare($sql);
        return $req->execute(['id_acteur' => $acteur->getIdActeur()]);
    }
}
?>
