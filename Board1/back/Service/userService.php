<?php
require_once '../dao/userDAO.php';

class UserService {
    
    private $dao;
    
    // 생성자로 DAO 연결
    public function UserService(){
        $this->dao = new userDAO();
    }
    
    public function signIn($userEmail, $userPassword){
        $this->dao->signIn($userEmail, $userPassword);
    }
    
    public function signUp($userEmail, $userPassword, $userNickName){
        $vo = new UserVO();
        
        $vo->setUserEmail($userEmail);
        $vo->setUserPassword($userPassword);
        $vo->setUserNickName($userNickName);
        
        $this->dao->signUp($vo);
    }
    
    public function logOut(){
        session_start();
        session_destroy();
    }
    
    public function userUpdate()
    {
        
    }
    
    public function userDelete()
    {
        
    }
    
    public function userList()
    {
        return $this->dao->userList();
    }
    
}