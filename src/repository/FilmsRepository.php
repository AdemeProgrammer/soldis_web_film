<?php

require_once(__DIR__ . '/../bdd/Bdd.php');
require_once(__DIR__ . '/../modele/Films.php');

class FilmsRepository
{
    private $bdd;

    public function __construct()
    {
        $this->bdd = new Bdd();
    }
    public function getFilmsByGenre($genre, $limit = 4)
    {
        $sql = "SELECT * FROM films WHERE genre = :genre ORDER BY RAND() LIMIT :limit";
        $stmt = $this->bdd->getBdd()->prepare($sql);
        $stmt->bindValue(':genre', $genre, PDO::PARAM_STR);
        $stmt->bindValue(':limit', (int) $limit, PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }



    public function ajoutFilms(Films $films)
    {
        $sql = "INSERT INTO films(titre, description, genre, duree, affiche_url, trailer_url)
                VALUES (:titre, :description, :genre, :duree, :affiche_url, :trailer_url)";
        $req = $this->bdd->getBdd()->prepare($sql);
        return $req->execute([
            'titre'        => $films->getTitre(),
            'description'  => $films->getDescription(),
            'genre'        => $films->getGenre(),
            'duree'        => $films->getDuree(),
            'affiche_url'  => $films->getAfficheUrl(),
            'trailer_url'  => $films->getTrailerUrl()
        ]);
    }

    public function modifFilms(Films $films)
    {
        $sql = "UPDATE films 
                SET titre = :titre, description = :description, genre = :genre, duree = :duree, 
                    affiche_url = :affiche_url, trailer_url = :trailer_url 
                WHERE id_film = :id_film";
        $req = $this->bdd->getBdd()->prepare($sql);
        return $req->execute([
            'id_film'      => $films->getIdFilm(),
            'titre'        => $films->getTitre(),
            'description'  => $films->getDescription(),
            'genre'        => $films->getGenre(),
            'duree'        => $films->getDuree(),
            'affiche_url'  => $films->getAfficheUrl(),
            'trailer_url'  => $films->getTrailerUrl()
        ]);
    }

    public function suppFilms(Films $films)
    {
        $sql = "DELETE FROM films WHERE id_film = :id_film";
        $req = $this->bdd->getBdd()->prepare($sql);
        return $req->execute(['id_film' => $films->getIdFilm()]);
    }

    public function catalogueFilms()
    {
        $sql = "SELECT * FROM films";
        $req = $this->bdd->getBdd()->prepare($sql);
        $req->execute();
        return $req->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getFilmById($id_film)
    {
        $sql = "SELECT * FROM films WHERE id_film = :id_film";
        $req = $this->bdd->getBdd()->prepare($sql);
        $req->execute(['id_film' => $id_film]);
        return $req->fetch(PDO::FETCH_ASSOC);
    }

    public function getRandomFilms($limit = 6)
    {
        $sql = "SELECT * FROM films ORDER BY RAND() LIMIT :limit";
        $stmt = $this->bdd->getBdd()->prepare($sql);
        $stmt->bindValue(':limit', (int) $limit, PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}

