<?php
include '../DAO/pdo.php';

include '../DAO/movieDetailDAO.php';


echo "<div class='movieImage'>";
echo "<img src='../".$movieImage."' class='rounded' alt='...'></div>";

// 영화정보
echo "<div class='movieInfomation'>";
echo "<div class='movieTitle'>";
echo "<h1>".$movieTitle."</h1>";
echo "</div>";
echo "<p class='fs-5'>".$movieStory."</p></div>";

session_start();
if (($_SESSION['userAdmin'] == 1)) 
{
    echo "<div><button type='button' class='btn btn-warning' onclick='updateClick();'>수정</button>";
    echo "<button type='button' class='btn btn-dark' onclick='deleteClick();' >삭제</button></div>";
}