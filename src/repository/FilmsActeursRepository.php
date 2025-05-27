<?php
class FilmsActeursRepository
{
    private $bdd;

    public function __construct()
    {
        $this->bdd = new Bdd();
    }

    // Récupère les films associés à un acteur
    public function getFilmsByActeur($id_acteur)
    {
        $sql = "SELECT f.id_film, f.titre, f.affiche_url, fa.role, fa.img_acteur
                FROM films f
                JOIN films_acteurs fa ON f.id_film = fa.ref_film
                WHERE fa.ref_acteur = :id_acteur";

        $stmt = $this->bdd->getBdd()->prepare($sql);
        $stmt->execute(['id_acteur' => $id_acteur]);

        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    // Récupère les acteurs associés à un film, avec leurs rôles et images
    public function getActeursByFilm($id_film)
    {
        $sql = "SELECT a.id_acteur, a.nom_complet, fa.role, fa.img_acteur
                FROM acteurs a
                JOIN films_acteurs fa ON a.id_acteur = fa.ref_acteur
                WHERE fa.ref_film = :id_film";

        $stmt = $this->bdd->getBdd()->prepare($sql);
        $stmt->execute(['id_film' => $id_film]);

        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
    public function getAllFilms()
    {
        $sql = "SELECT id_film, titre FROM films";
        $stmt = $this->bdd->getBdd()->query($sql);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
    public function ajouterOuModifier(FilmsActeurs $fa)
    {
        // Vérifie si la ligne existe
        $sql = "SELECT COUNT(*) FROM films_acteurs WHERE ref_film = :ref_film AND ref_acteur = :ref_acteur";
        $stmt = $this->bdd->getBdd()->prepare($sql);
        $stmt->execute([
            'ref_film' => $fa->getRefFilm(),
            'ref_acteur' => $fa->getRefActeur()
        ]);
        $exists = $stmt->fetchColumn() > 0;

        if ($exists) {
            $sql = "UPDATE films_acteurs SET role = :role, img_acteur = :img_acteur 
                WHERE ref_film = :ref_film AND ref_acteur = :ref_acteur";
        } else {
            $sql = "INSERT INTO films_acteurs (ref_film, ref_acteur, role, img_acteur) 
                VALUES (:ref_film, :ref_acteur, :role, :img_acteur)";
        }

        $stmt = $this->bdd->getBdd()->prepare($sql);
        return $stmt->execute([
            'ref_film' => $fa->getRefFilm(),
            'ref_acteur' => $fa->getRefActeur(),
            'role' => $fa->getRole(),
            'img_acteur' => $fa->getImgActeur()
        ]);
    }

    public function supprimerAssociation($ref_film, $ref_acteur)
    {
        $sql = "DELETE FROM films_acteurs WHERE ref_film = :ref_film AND ref_acteur = :ref_acteur";
        $stmt = $this->bdd->getBdd()->prepare($sql);
        return $stmt->execute([
            'ref_film' => $ref_film,
            'ref_acteur' => $ref_acteur
        ]);
    }


}
