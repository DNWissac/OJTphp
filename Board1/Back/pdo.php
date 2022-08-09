<?php
// DB연결
$servername = "127.0.0.1";  // 호스트 주소
$dbname = "dbBoard";        // 데이터베이스 이름
$user = "root";             // DB 아이디
$password = "php123";       // DB 패스워드

// DB조회
try
{
    $connect = new PDO("mysql:host=$servername;dbname=$dbname", $user, $password);
    $connect->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
}
catch(PDOException $ex)
{
    echo "서버와의 연결 실패! : ".$ex->getMessage()."<br>";
}
