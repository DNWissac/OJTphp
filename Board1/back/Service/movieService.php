<?php
require_once '../dao/movieDAO.php';

class MovieService {
    
    private $dao;
    
    public function MovieService(){
        $this->dao = new MovieDAO();
    }
    
    public function movieInsert()
    {
        
    }
    
    public function movieUpdate()
    {
        
    }
    
    public function movieDelete()
    {
        
    }
    
    public function movieList()
    {
        return $this->dao->movieList();
    }
    
}