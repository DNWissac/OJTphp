<?php
/**
 * 영화 VO 클래스
 */
class MovieVO{
    
    private $movieSeq;
    private $movieTitle;
    private $movieStory;
    private $movieImage;
    private $openingDate;
    private $movieDate;
    private $movieDirector;
    private $genreId;
    
    /**
     * @return mixed
     */
    public function getMovieSeq()
    {
        return $this->movieSeq;
    }

    /**
     * @return mixed
     */
    public function getMovieTitle()
    {
        return $this->movieTitle;
    }

    /**
     * @return mixed
     */
    public function getMovieStory()
    {
        return $this->movieStory;
    }

    /**
     * @return mixed
     */
    public function getMovieImage()
    {
        return $this->movieImage;
    }

    /**
     * @return mixed
     */
    public function getOpeningDate()
    {
        return $this->openingDate;
    }

    /**
     * @return mixed
     */
    public function getMovieDate()
    {
        return $this->movieDate;
    }

    /**
     * @return mixed
     */
    public function getMovieDirector()
    {
        return $this->movieDirector;
    }

    /**
     * @return mixed
     */
    public function getGenreId()
    {
        return $this->genreId;
    }

    /**
     * @param mixed $movieSeq
     */
    public function setMovieSeq($movieSeq)
    {
        $this->movieSeq = $movieSeq;
    }

    /**
     * @param mixed $movieTitle
     */
    public function setMovieTitle($movieTitle)
    {
        $this->movieTitle = $movieTitle;
    }

    /**
     * @param mixed $movieStory
     */
    public function setMovieStory($movieStory)
    {
        $this->movieStory = $movieStory;
    }

    /**
     * @param mixed $movieImage
     */
    public function setMovieImage($movieImage)
    {
        $this->movieImage = $movieImage;
    }

    /**
     * @param mixed $openingDate
     */
    public function setOpeningDate($openingDate)
    {
        $this->openingDate = $openingDate;
    }

    /**
     * @param mixed $movieDate
     */
    public function setMovieDate($movieDate)
    {
        $this->movieDate = $movieDate;
    }

    /**
     * @param mixed $movieDirector
     */
    public function setMovieDirector($movieDirector)
    {
        $this->movieDirector = $movieDirector;
    }

    /**
     * @param mixed $genreId
     */
    public function setGenreId($genreId)
    {
        $this->genreId = $genreId;
    }

    
    
    
    
}