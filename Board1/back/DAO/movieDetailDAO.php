<?php
// PDO를 통해 DB 연결
include 'pdo.php';

$seqNum = $_GET['seqNum'];

try
{
    $sql = "SELECT sMovieTitle, sMovieStory, sMovieImage, dtOpeningDate, dtMovieDate
        FROM tMovieList
        WHERE nMovieSeq = $seqNum";
 
    foreach($connect->query($sql) as $field) {
        $movieImage=$field['sMovieImage'];
        $movieTitle=$field['sMovieTitle'];
        $movieStory=$field['sMovieStory'];
        /*      
        // 사진   
        echo "<div class='movieImage'>";
        echo "<img src='../".$field['sMovieImage']."' class='rounded' alt='...'></div>";
        
        // 영화정보
        echo "<div class='movieInfomation'>";
        echo "<div class='movieTitle'>";
        echo "<h1>".$field['sMovieTitle']."</h1>";
        echo "</div>";
        echo "<p class='fs-5'>".$field['sMovieStory']."</p></div>";
        
        echo "<div><button type='button' class='btn btn-warning' onclick='updateClick();'>수정</button>";
        echo "<button type='button' class='btn btn-dark' onclick='deleteClick();' >삭제</button></div>"; 
        */
    }
}
catch(PDOException $ex)
{
    echo "레코드 선택 실패!: ".$ex->getMessage()."<br>";
}


$connect = null;