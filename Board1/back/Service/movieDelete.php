<?php
// DAO include
include '../dao/movieDAO.php';

$servername = "127.0.0.1";  // 호스트 주소
$dbname = "dbBoard";        // 데이터베이스 이름
$user = "root";             // DB 아이디
$password = "php123";       // DB 패스워드

// 영화 등록폼에서 받은 정보
$movie_seq = $_GET['seq'];

$dao = new movieDAO();
$dao->get_connetion($servername, $dbname, $user, $password);
$dao->movieDelete($movie_seq);

echo "<script>location.href='../../index.php'</script>";
