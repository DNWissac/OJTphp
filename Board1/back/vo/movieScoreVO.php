<?php
/**
 * 영화 평가 VO
 */
class MovieScoreVO{
    
    private $scoreComment;
    private $score;
    private $scoreDate;
    private $movieSeq;
    private $userEmail;
    private $userNickName;
    /**
     * @return mixed
     */
    public function getScoreComment()
    {
        return $this->scoreComment;
    }

    /**
     * @return mixed
     */
    public function getScore()
    {
        return $this->score;
    }

    /**
     * @return mixed
     */
    public function getScoreDate()
    {
        return $this->scoreDate;
    }

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
    public function getUserEmail()
    {
        return $this->userEmail;
    }

    /**
     * @return mixed
     */
    public function getUserNickName()
    {
        return $this->userNickName;
    }

    /**
     * @param mixed $scoreComment
     */
    public function setScoreComment($scoreComment)
    {
        $this->scoreComment = $scoreComment;
    }

    /**
     * @param mixed $score
     */
    public function setScore($score)
    {
        $this->score = $score;
    }

    /**
     * @param mixed $scoreDate
     */
    public function setScoreDate($scoreDate)
    {
        $this->scoreDate = $scoreDate;
    }

    /**
     * @param mixed $movieSeq
     */
    public function setMovieSeq($movieSeq)
    {
        $this->movieSeq = $movieSeq;
    }

    /**
     * @param mixed $userEmail
     */
    public function setUserEmail($userEmail)
    {
        $this->userEmail = $userEmail;
    }

    /**
     * @param mixed $userNickName
     */
    public function setUserNickName($userNickName)
    {
        $this->userNickName = $userNickName;
    }

    
    
    
    
    
}