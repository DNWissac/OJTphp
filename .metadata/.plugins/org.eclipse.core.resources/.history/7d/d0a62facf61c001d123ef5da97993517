<?php
require_once '../service/movieService.php';

header('Content-Type: application/json');
header("Content-Type:text/html;charset=utf-8");

$sv = new MovieService();
$voArray = $sv->movieList();


/* 
foreach ($voArray as $arr)
{
    echo $arr->getmovieTitle();
    echo $arr->getmovieDirector();
    echo $arr->getmovieStory();
    echo $arr->getmovieImage();
    echo $arr->getOpeningDate();
}
*/

foreach ($voArray as $arr)
{
    $movie = array("movieTitle" => $arr->getMovieTitle(), 
        "movieDirector" => $arr->getMovieDirector(),
        "movieStory" => $arr->getMovieStory(),
        "movieImage" => $arr->getMovieImage(),
        "openingDate" => $arr->getOpeningDate(),
        "movieSeq" => $arr->getMovieSeq()
    );
}


$output = json_encode($movie);

//json 출력
echo $output;