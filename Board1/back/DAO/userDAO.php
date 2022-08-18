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
     public function userList($startNum) {
         try {
            $query = 'SELECT 
                            sUserEmail, 
                            sNickName, 
                            nUserAdmin
                       FROM
                            tUserList
                       LIMIT
                            :startNum, 10';
             
            $sql = $this->connect->prepare($query);
            
            $sql->bindValue(':startNum', $startNum, PDO::PARAM_INT);
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
        $result = 0;
         
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
            
            $result = var_dump($sql->execute());
        }
        catch(PDOException $ex) {
            $result = 'PDOException: '.$ex->getMessage();
        }
        
        return $result;
     }
     
     /**
      * 이메일 중복검사
      * @param string $userEmail
      * @return number
      */
     public function emailCheck($userEmail){
         $result = 0;
         
         if ($userEmail != null || $userEmail != '') {
             try{
                 $query = 'SELECT
                             count(*) as count
                           FROM
                             tUserList
                           WHERE 
                             sUserEmail = :userEmail';
                 
                 $sql = $this->connect->prepare($query);
                 $sql->bindValue(':userEmail', $userEmail);
                 $sql->execute();
                 
                 // count 값 출력
                 while ($row = $sql->fetch()){
                     $result = $row['count'];
                 }
             } catch (PDOException $ex) {
                 $result = 'PDOException: '.$ex->getMessage();
             }
         }
         return $result;
     }
     
     /**
      * 닉네임 중복검사
      * @param string $userNickName
      * @return integer
      */
     public function nickNameCheck($userNickName){
         $result = 0;
         
         if ($userNickName != null || $userNickName != ""){
             try {
                 // nickName 변수에 담기
                 $query = 'SELECT 
                            count(*) as count
                           FROM 
                            tUserList
                           WHERE 
                            sNickName = :userNickName';
                 
                 $sql = $this->connect->prepare($query);
                 $sql->bindValue(':userNickName', $userNickName);
                 $sql->execute();
                 
                 // count 값 출력
                 while ($row = $sql->fetch()){
                     $result = $row['count'];
                 }
                 
             } catch (PDOException $ex){
                 $result = "레코드 선택 실패!: ".$ex->getMessage();
             }
         }
         return $result;
     }
     
     
     /**
      * 유저 명수
      * @return integer|Exception
      */
     public function userCount(){
         try{
             $query = 'SELECT
                            count(*) as count
                       FROM
                            tUserList';
             
             $sql = $this->connect->prepare($query);
             $sql->execute();
             
             while($row = $sql->fetch()){
                 $count = $row['count'];
             }
             
             return $count;
             
         } catch(Exception $e) {
             return $e;
         }
         
     }
    
}