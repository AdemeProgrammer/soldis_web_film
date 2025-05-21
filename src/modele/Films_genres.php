<?php

namespace modele;

class Films_genres
{
    private $ref_film;

    /**
     * @return mixed
     */
    public function getRefFilm()
    {
        return $this->ref_film;
    }

    /**
     * @param mixed $ref_film
     */
    public function setRefFilm($ref_film)
    {
        $this->ref_film = $ref_film;
    }

    /**
     * @return mixed
     */
    public function getRefGenre()
    {
        return $this->ref_genre;
    }

    /**
     * @param mixed $ref_genre
     */
    public function setRefGenre($ref_genre)
    {
        $this->ref_genre = $ref_genre;
    }
    private $ref_genre;
}