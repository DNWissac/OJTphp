<?php
include 'pdo.php';

// DB조회
try
{
    $sql = "SELECT sGenreID, sGenreName
        FROM tMovieGenre" ;    
        foreach($connect->query($sql) as $field) {
        echo "<option value='".$field['sGenreID']."'>".$field['sGenreName']."</option>";
    }
}
catch(PDOException $ex)
{
    echo "레코드 선택 실패!: ".$ex->getMessage()."<br>";
}


$connect = null;