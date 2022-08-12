<?php
// DAO include
include '../dao/movieDAO.php';

$servername = "127.0.0.1";  // 호스트 주소
$dbname = "dbBoard";        // 데이터베이스 이름
$user = "root";             // DB 아이디
$password = "php123";       // DB 패스워드

// 영화 등록폼에서 받은 정보
$movie_title = $_POST['movieTitle'];
$movie_story = $_POST['movieStory'];
$movie_date = $_POST['movieDate'];
$movie_genre = $_POST['movieGenre'];
$movie_director = $_POST['movieDirector'];

// 사진 변수
$uploaded_file_name_tmp = $_FILES['movieImage']['tmp_name'];
$uploaded_file_name = $_FILES['movieImage']['name'];
$upload_folder = "image/";

// 에러
$error = $_FILES['movieImage']['error'];

// 업로드 가능한 확장자
$allowed_ext = array('jpg', 'jpeg', 'png');
$ext = array_pop(explode('.', $uploaded_file_name));

// 오류 확인
if ( $error != UPLOAD_ERR_OK ) {
    switch ( $error ){
        case UPLOAD_ERR_INI_SIZE:
        case UPLOAD_ERR_FORM_SIZE:
            echo "<script>alert('파일이 너무 큽니다.($error)');
                 history.back();</script>";
            break;
        case UPLOAD_ERR_NO_FILE:
            echo "<script>alert('파일이 첨부되지 않았습니다.($error)');
                 history.back();</script>";
        default:
            echo "<script>alert('파일이 제대로 업로드되지 않았습니다.($error)');
                 history.back();</script>";
    }
    exit;
}

if ( !in_array($ext, $allowed_ext)) {
    echo "<script>alert('허용되지 않는 확장자입니다.');
                 history.back();</script>";
    exit;
}

$movie_image = $upload_folder.$uploaded_file_name;
// 파일 이동
move_uploaded_file($uploaded_file_name_tmp, $upload_folder.$uploaded_file_name);


$dao = new MovieDAO();

$dao->get_connetion($servername, $dbname, $user, $password);
$dao->movieInsert($movie_title, $movie_story, $movie_image, $movie_date, $movie_director, $movie_genre);

