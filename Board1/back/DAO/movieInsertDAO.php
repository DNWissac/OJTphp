<?php
// PDO를 통해 DB 연결
include 'pdo.php';

// 영화 등록폼에서 받은 정보
$movie_title = $_POST['movieTitle'];
$movie_story = $_POST['movieStory'];
$movie_image = $_POST['movieImage'];
$movie_date = $_POST['movieDate'];

try
{
    $sql = "INSERT INTO tMovieList(sMovieTitle, sMovieStory, sMovieImage, dtOpeningDate) 
            VALUES('$movie_title', '$movie_story', '$movie_image', '$movie_date')";
    $connect->exec($sql);
    echo "<script>alert('영화가 성공적으로 등록되었습니다.');";
    echo "location.href='../../index.php';</script>";
}
catch(PDOException $ex)
{
    echo "<script>alert('영화 등록에 실패했습니다.<br> 에러: ".$ex->getMessage()."')</script>";
}

$connect = null;

echo "<script>location.href='../../index.php'</script>";

