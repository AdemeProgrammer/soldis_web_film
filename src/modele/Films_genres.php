<?php
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