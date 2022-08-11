<?php
include 'pdo.php';

// DB조회
try
{
    $sql = "SELECT nMovieSeq, sMovieTitle, sMovieStory, sMovieImage, dtOpeningDate, sMovieDirector
        FROM tMovieList
        ORDER BY dtOpeningDate DESC";
    
    echo "    	<thead>";
    echo "        	<tr>";
    echo "        		<th>영화제목</th>";
    echo "        		<th>감독</th>";
    echo "        		<th>영화내용</th>";
    echo "        		<th>영화사진</th>";
    echo "        		<th>개봉일</th>";

    echo "        	</tr>";
    echo "        </thead>";
    
    echo "        <tbody>";
    foreach($connect->query($sql) as $field) {
        echo '<tr>'.'<td><a href="view/moviedetail.php?seq='.$field['nMovieSeq'].'">'.$field['sMovieTitle'].'</a></td>';
        echo '<td>'.$field['sMovieDirector'].'</td>';
        echo '<td>'.$field['sMovieStory'].'</td>';
        echo '<td>'."<img src='".$field['sMovieImage']."'>".'</td>';
        echo '<td>'.$field['dtOpeningDate'].'</td>'.'</tr>';
    } 
    
    echo "       </tbody>";
}
catch(PDOException $ex)
{
    echo "레코드 선택 실패!: ".$ex->getMessage()."<br>";
}


$connect = null;