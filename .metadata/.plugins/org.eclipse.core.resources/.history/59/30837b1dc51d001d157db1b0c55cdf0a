<?php
require_once '../dao/movieDAO.php';
require_once '../vo/movieVO.php';

class MovieService {
    
    private $dao;
    
    // 생성자로 DAO 연결
    public function MovieService(){
        $this->dao = new MovieDAO();
    }
    
    public function movieSearch($movie_seq){
        return $this->dao->movieSearch($movie_seq);
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
    
    public function movieUpdate(){
        
    }
    
    public function movieDelete($movie_seq){
        return $this->dao->movieRemove($movie_seq);
    }
    
    public function movieList(){
        return $this->dao->movieList();
    }
    
    public function genreList(){
        return $this->dao->genreList();
    }
    
    
}