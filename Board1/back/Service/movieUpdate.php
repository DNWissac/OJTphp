<?php
include '../dao/movieDAO.php';
include '../movieVO.php';

$vo = new MovieVO();
$dao = new MovieDAO();

$movie_seq = $_GET['movie_seq'];

// DB연결
$servername = "127.0.0.1";  // 호스트 주소
$dbname = "dbBoard";        // 데이터베이스 이름
$user = "root";             // DB 아이디
$password = "php123";       // DB 패스워드

$dao->get_connetion($servername, $dbname, $user, $password);
$vo = $dao->movieSearch($movie_seq);

