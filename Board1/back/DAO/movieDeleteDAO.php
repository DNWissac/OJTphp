<?php
// PDO를 통해 DB 연결
include 'pdo.php';

// 영화 등록폼에서 받은 정보
$movie_seq = $_GET['seq'];

try
{
    $sql = "DELETE FROM tMovieList WHERE nMovieSeq = ".$movie_seq;
    $connect->exec($sql);
    echo "<script>alert('영화가 성공적으로 삭제되었습니다.');";
    echo "location.href='../../index.php';</script>";
}
catch(PDOException $ex)
{
    echo "<script>alert('영화 삭제에 실패했습니다.<br> 에러: ".$ex->getMessage()."')</script>";
}

$connect = null;

echo "<script>location.href='../../index.php'</script>";
