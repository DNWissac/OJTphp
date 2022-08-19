<?php
require_once '../dao/userDAO.php';

class UserService {
    
    private $dao;
    
    /**
     * 생성자로 DB 연결
     */
    public function UserService(){
        $this->dao = new userDAO();
    }
    
    /**
     * 로그인
     * @param string $userEmail
     * @param string $userPassword
     */
    public function signIn($userEmail, $userPassword){
        $this->dao->signIn($userEmail, $userPassword);
    }
    
    /**
     * 회원가입
     * @param string $userEmail
     * @param string $userPassword
     * @param string $userNickName
     * @return string|number|string
     */
    public function signUp($userEmail, $userPassword, $userNickName){
        $vo = new UserVO();
        
        // 이메일 중복검사
        $emailCheck = $this->dao->emailCheck($userEmail);
        
        if ($emailCheck >= 1){
            $result = '이메일이 중복되었습니다.';
            return $result;
        }
        // 닉네임 중복검사
        $nickNameCheck = $this->dao->nickNameCheck($userNickName);
        
        if ($nickNameCheck >= 1){
            $result = '닉네임이 중복되었습니다.';
            return $result;
        }
        
        $vo->setUserEmail($userEmail);
        $vo->setUserPassword($userPassword);
        $vo->setUserNickName($userNickName);
        
        $result = $this->dao->signUp($vo);
        
        return $result;
    }
    
    /**
     * 로그아웃
     */
    public function logOut(){
        session_start();
        session_destroy();
    }
    /**
     * 회원 수 세기
     * @return number|Exception
     */
    public function userCount(){
        return $this->dao->userCount();
    }
    
    /**
     * 유저 목록
     * @param integer $startNum
     * @return array
     */
    public function userList($startNum){
        return $this->dao->userList($startNum);
    }
    
}