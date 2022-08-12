<?php
class PDOconn{
    
    private $servername = "127.0.0.1";  // 호스트 주소
    private $dbname = "dbBoard";        // 데이터베이스 이름
    private $user = "root";             // DB 아이디
    private $password = "php123";       // DB 패스워드
    
    
    public function get_connetion() {
        try
        {
            $connect = new PDO("mysql:host=$this->servername;dbname=$this->dbname", $this->user, $this->password);
            $connect->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            
            return $connect;
        }
        catch(PDOException $ex)
        {
            throw $ex->getMessage();
        }
    }
}