<?php
require_once '../service/movieService.php';

// JSON 한글 깨짐 방지
header('Content-Type: application/json');
header('Content-Type:text/html;charset=utf-8');

$sv = new MovieService();
$action = $_POST['action'];

// $action 인수에 따라 매핑 해주는 switch문
switch ($action) {
    
    // 영화 등록
    case 'insert' :
        $movieTitle = $_POST['movieTitle'];
        $movieStory = $_POST['movieStory'];
        $openingDate = $_POST['openingDate'];
        $movieGenre = $_POST['movieGenre'];
        $movieDirector = $_POST['movieDirector'];
        
        // 사진 변수
        $uploaded_file_name_tmp = $_FILES['movieImage']['tmp_name'];
        $uploaded_file_name = $_FILES['movieImage']['name'];
        $upload_folder = "image/";
        
        /*
        // 에러
        $error = $_FILES['movieImage']['error'];
        
        // 업로드 가능한 확장자
        $allowed_ext = array('jpg', 'jpeg', 'png');
        $ext = array_pop(explode('.', $uploaded_file_name));
        
        // 오류 확인
        if ($error != UPLOAD_ERR_OK){
            switch ($error){
                case UPLOAD_ERR_INI_SIZE:
                case UPLOAD_ERR_FORM_SIZE:
                    echo '파일이 너무 큽니다.($error)';
                    break;
                case UPLOAD_ERR_NO_FILE:
                    echo '파일이 첨부되지 않았습니다.($error)';
                    break;
                default:
                    echo '파일이 제대로 업로드되지 않았습니다.($error)';
            }
            exit;
        }
        
        if (!in_array($ext, $allowed_ext)) {
            echo '허용되지 않는 확장자입니다.';
            exit;
        }
        */
        
        $movieImage = $upload_folder.$uploaded_file_name;
        // 파일 이동
        move_uploaded_file($uploaded_file_name_tmp, $upload_folder.$uploaded_file_name);
        
        $sv->movieInsert($movieTitle, $movieStory, $movieImage, $openingDate, $movieDirector, $movieGenre);
        break;
        
    // 영화 상세정보
    case 'search' : 
        $movie_seq = $_POST['movie_seq'];
        $vo = $sv->movieSearch($movie_seq);
        
        // VO클래스로 날아온 데이터 꺼내서 배열에 넣기
        $arr = array('movieTitle' => $vo->getMovieTitle(),
            'movieDirector' => $vo->getMovieDirector(),
            'movieStory' => $vo->getMovieStory(),
            'movieImage' => $vo->getMovieImage(),
            'openingDate' => $vo->getOpeningDate(),
            'movieSeq' => $vo->getMovieSeq());
        
        // JSON 방식으로 인코딩해서 출력
        $json = json_encode($arr);
        echo $json;
        
        //case 'search' 종료
        break;
    
    // 영화 리스트
    case 'movieList' :
        $voArray = $sv->movieList();
        $movie= array();
        
        foreach ($voArray as $arr){
            array_push($movie, array(
                'movieTitle' => $arr->getMovieTitle(),
                'movieDirector' => $arr->getMovieDirector(),
                'movieStory' => $arr->getMovieStory(),
                'movieImage' => $arr->getMovieImage(),
                'openingDate' => $arr->getOpeningDate(),
                'movieSeq' => $arr->getMovieSeq()
                )
            );
        }
        
        // JSON 방식으로 인코딩해서 출력
        $json = json_encode($movie);
        echo $json;
        
        //case 'movieList' 종료
        break;
    
    // 영화 삭제
    case 'delete' :
        $movie_seq = $_POST['movie_seq'];
        $sv->movieDelete($movie_seq);
        
        // case 'delete' 종료
        break;
        
        
    // 장르 리스트
    case 'genreList' :
        $voArray = $sv->genreList();
        $genre = array();
        
        foreach ($voArray as $arr){
            array_push($genre, array(
                'genreId' => $arr->getGenreId(),
                'genreName' => $arr->getGenreName(),
                )
            );
        }
        
        // JSON 방식으로 인코딩해서 출력
        $json = json_encode($genre);
        echo $json;
        
        //case 'genreList' 종료
        break;
        
    default :
        echo '액션값 오류 : '.$action ;
}


// {"status":"200","desc":"success","result":{"0":861,"1":1841,"2":1304,"3":860}"}
/* 
'status' 
400 // 사용자 잘못된 요청
500, // 서버 내부 오류
200,
''

'result' : {list : 
*/