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

echo "<div class='movieImage'>";
echo "<img src='../".$vo->getMovieImage()."' class='rounded' alt='...'></div>";

// 영화정보
echo "<div class='movieInfomation'>";
echo "<div class='movieTitle'>";
echo "<h1>".$vo->getMovieTitle()."</h1>";
echo "</div>";
echo "<p class='fs-5'>".$vo->getMovieStory()."</p></div>";

session_start();
if (($_SESSION['userAdmin'] == 1)) 
{
    echo "<div><button type='button' class='btn btn-warning' onclick='updateClick();'>수정</button>";
    echo "<button type='button' class='btn btn-dark' onclick='deleteClick();' >삭제</button></div>";
}
