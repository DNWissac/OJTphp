<?php
// PDO를 통해 DB 연결
include 'pdo.php';

// 영화 등록폼에서 받은 정보
$movie_title = $_POST['movieTitle'];
$movie_story = $_POST['movieStory'];
$movie_date = $_POST['movieDate'];
$movie_genre = $_POST['movieGenre'];
$movie_director = $_POST['movieDirector'];

$uploaded_file_name_tmp = $_FILES['movieImage']['tmp_name'];
$uploaded_file_name = $_FILES['movieImage']['name'];
$upload_folder = "image/";


move_uploaded_file($uploaded_file_name_tmp, $upload_folder.$uploaded_file_name);


try
{
    $sql = "INSERT INTO tMovieList(sMovieTitle, sMovieStory, sMovieImage, dtOpeningDate, sMovieDirector, sGenreID) 
            VALUES('$movie_title', '$movie_story', '{$upload_folder}{$uploaded_file_name}'
                 , '$movie_date', '$movie_director', '$movie_genre')";
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

