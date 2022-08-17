<?php
require_once '../dao/movieDAO.php';
require_once '../vo/movieVO.php';

class MovieService {
    
    private $dao;
    
    // 생성자로 DAO 연결
    public function MovieService(){
        $this->dao = new MovieDAO();
    }
    
    public function movieSearch($movieSeq){
        return $this->dao->movieSearch($movieSeq);
    }
    
    public function movieInsert($movieTitle, $movieStory, $movieImage, $openingDate, $movieDirector, $movieGenre){
        $vo = new MovieVO();
        
        $vo->setMovieTitle($movieTitle);
        $vo->setMovieStory($movieStory);
        $vo->setMovieImage($movieImage);
        $vo->setOpeningDate($openingDate);
        $vo->setMovieDirector($movieDirector);
        $vo->setGenreId($movieGenre);
        
        $this->dao->movieAdd($vo);
    }
    
    public function movieUpdate($movieSeq, $movieTitle, $movieStory, $movieImage, $openingDate, $movieDirector, $movieGenre){
        $vo = new MovieVO();
        
        $vo->setMovieSeq($movieSeq);
        $vo->setMovieTitle($movieTitle);
        $vo->setMovieStory($movieStory);
        $vo->setMovieImage($movieImage);
        $vo->setOpeningDate($openingDate);
        $vo->setMovieDirector($movieDirector);
        $vo->setGenreId($movieGenre);
        
        $this->dao->movieModify($vo);
    }
    
    public function movieDelete($movieSeq){
        return $this->dao->movieRemove($movieSeq);
    }
    
    public function movieList($startNum){
        return $this->dao->movieList($startNum);
    }
    
    public function genreList(){
        return $this->dao->genreList();
    }
    
    public function movieCount(){
        return $this->dao->movieCount();
    }
    
}