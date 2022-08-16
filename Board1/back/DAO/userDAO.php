<?php
require_once '../util/pdoconn.php';
require_once '../vo/userVO.php';

// 5.3.7 버전 이하 password_hash
require_once '../util/password.php';

/**
 * 유저 DAO
 */
class userDAO {
    
     private $connect;
     
     /**
      * DB연결 생성자
      */
     public function userDAO(){
         $pdo = new PDOconn();
         $this->connect = $pdo->get_connetion();
     }
     
     /**
      * 회원 목록
      * @return array
      */
     public function userList() {
         try {
            $query = 'SELECT 
                            sUserEmail, 
                            sNickName, 
                            nUserAdmin
                       FROM
                            tUserList';
             
            $sql = $this->connect->prepare($query);
            
            $sql->execute();
            $voArray = array();           
            
            while($row = $sql->fetch()){
                // VO클래스에 담아서 보내기 위해 생성
                $vo = new userVO();
                
                $vo->setUserEmail($row['sUserEmail']);
                $vo->setUserNickName($row['sNickName']);
                $vo->setUserAdmin($row['nUserAdmin']);
                
                array_push($voArray, $vo);
            }
            return $voArray;
         } catch(PDOException $ex){
            return $ex->getMessage();
         }
     }
     
     /**
      * 로그인
      * @param string $userEmail
      * @param string $userPassword
      */
     public function signIn($userEmail, $userPassword){
         try {
             $query = 'SELECT 
                            sUserEmail, 
                            sPassword, 
                            sNickName, 
                            nUserAdmin 
                     FROM 
                            tUserList
                     WHERE 
                            sUserEmail = :userEmail';
             
             $sql = $this->connect->prepare($query);
             $sql->bindValue(':userEmail', $userEmail);
             $sql->execute();
             
             while($row = $sql->fetch()){
                 $hash = $row['sPassword'];
                 $user_nickName = $row['sNickName'];
                 $user_admin = $row['nUserAdmin'];
             }
             
             // 비밀번호 일치여부 확인
             if (password_verify($userPassword, $hash)) {
                 session_start();
                 $_SESSION['userEmail'] = $userEmail;
                 $_SESSION['userNickName'] = $user_nickName;
                 $_SESSION['userAdmin'] = $user_admin;
                 echo 'OK';
                 
             } else {
                 echo '아이디 혹은 비밀번호가 틀립니다.';
             }
             
         } catch(PDOException $ex){
             echo '로그인 실패, 에러: '.$ex->getMessage();
         }
     }
     
     
     /**
      * 회원 가입
      * @param string $userEmail
      * @param string $userPassword
      * @param string $userNickName
      */
     public function signUp(UserVO $vo) {
        try {
            $encrypted_passwd = password_hash($vo->getUserPassword(), PASSWORD_DEFAULT);
            $query = 'INSERT INTO 
                        tUserList
                        (sUserEmail, sPassword, sNickName) 
                      VALUES
                        (:userEmail, :userPassword, :userNickName)';
            
            $sql = $this->connect->prepare($query);
            $sql->bindValue(':userEmail', $vo->getUserEmail());
            $sql->bindValue(':userPassword', $encrypted_passwd);
            $sql->bindValue(':userNickName', $vo->getUserNickName());
            $sql->execute();
            
            echo 'OK';
        }
        catch(PDOException $ex) {
            echo '회원가입 실패, 에러: '.$ex->getMessage();
        }
     }
     
     // 회원 삭제
     public function userDelete(){
         
     }
     
     
     // 회원 정보
     public function userSearch() {

         
        
     }
     
     // 회원정보 수정
     public function userUpdate() {
         
         
         
     }
    
}