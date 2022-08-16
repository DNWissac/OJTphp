<?php
/**
 * 영화 장르 VO
 */
class GenreVO{
    private $genreId;
    private $genreName;
    
    /**
     * @return mixed
     */
    public function getGenreId()
    {
        return $this->genreId;
    }

    /**
     * @return mixed
     */
    public function getGenreName()
    {
        return $this->genreName;
    }

    /**
     * @param mixed $genreId
     */
    public function setGenreId($genreId)
    {
        $this->genreId = $genreId;
    }

    /**
     * @param mixed $genreName
     */
    public function setGenreName($genreName)
    {
        $this->genreName = $genreName;
    }
    
}