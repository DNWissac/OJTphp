<?php
include 'pdo.php';

// DB조회
try
{
    $sql = "SELECT nMovieSeq, sMovieTitle, sMovieStory, sMovieImage, dtOpeningDate, dtMovieDate
        FROM tMovieList
        ORDER BY dtMovieDate DESC";
    foreach($connect->query($sql) as $field) {
        echo '<tr>'.'<td><a href="moviedetail?seq='.$field['nMovieSeq'].'">'.$field['sMovieTitle'].'</a></td>';
        echo '<td>'.$field['sMovieStory'].'</td>';
        echo '<td>'.$field['sMovieImage'].'</td>';
        echo '<td>'.$field['dtOpeningDate'].'</td>';
        echo '<td>'.$field['dtMovieDate'].'</td>'.'</tr>';
    } 
}
catch(PDOException $ex)
{
    echo "레코드 선택 실패!: ".$ex->getMessage()."<br>";
}


$connect = null;