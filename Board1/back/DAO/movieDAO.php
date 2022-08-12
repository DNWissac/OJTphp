<?php
require_once '../util/pdoconn.php';
require_once '../vo/movieVO.php';

class MovieDAO {
    
     private $connect;
     
     // DB연결
     public function MovieDAO(){
         
         $pdo = new PDOconn();
         $this->connect = $pdo->get_connetion();
     }
     
     
     // 영화 목록
     public function movieList() {
         
         try
         {
             
            $sql = "SELECT nMovieSeq, sMovieTitle, sMovieStory, sMovieImage, dtOpeningDate, sMovieDirector
            FROM tMovieList
            ORDER BY dtOpeningDate DESC";
            
            $voArray = array();           
            
            foreach($this->connect->query($sql) as $field) {
                    $vo = new MovieVO();
                    $vo->setMovieSeq($field['nMovieSeq']); 
                    $vo->setMovieTitle($field['sMovieTitle']); 
                    $vo->setMovieDirector($field['sMovieDirector']);
                    $vo->setMovieStory($field['sMovieStory']);
                    $vo->setMovieImage($field['sMovieImage']); 
                    $vo->setOpeningDate($field['dtOpeningDate']);
                    
                    array_push($voArray, $vo);
            }
            
            return $voArray;
            
         }
         catch(PDOException $ex){
             throw $ex->getMessage();
         }
     }
     
     // 영화 입력
     public function movieInsert($movie_title, $movie_story, $movie_image, $movie_date, $movie_director, $movie_genre) {
     
         try
         {
             $sql = "INSERT INTO tMovieList(sMovieTitle, sMovieStory, sMovieImage, dtOpeningDate, sMovieDirector, sGenreID)
             VALUES('$movie_title', '$movie_story', '$movie_image'
             , '$movie_date', '$movie_director', '$movie_genre')";
             
             $this->connect->exec($sql);
             echo "<script>alert('영화가 성공적으로 등록되었습니다.');";
             echo "location.href='../../index.php';</script>";
         }
         catch(PDOException $ex)
         {
             echo "<script>alert('영화 등록에 실패했습니다.<br> 에러: ".$ex->getMessage()."')</script>";
         }
         
         echo "<script>location.href='../../index.php'</script>";
     
     }
     
     // 영화 삭제
     public function movieDelete($movie_seq){
         
         try
         {
             $sql = "DELETE FROM tMovieList WHERE nMovieSeq = ".$movie_seq;
             
             $this->connect->exec($sql);
             echo "<script>alert('영화가 성공적으로 삭제되었습니다.');";
             echo "location.href='../../index.php';</script>";
         }
         catch(PDOException $ex)
         {
             echo "<script>alert('영화 삭제에 실패했습니다.<br> 에러: ".$ex->getMessage()."')</script>";
         }
         
         echo "<script>location.href='../../index.php'</script>";
         
     }
     
     
     // 영화 정보
     public function movieSearch($movie_seq) {

         
         $Vo = new MovieVO();
         
         try
         {
             $sql = "SELECT nMovieSeq, sMovieTitle, sMovieStory, sMovieImage, dtOpeningDate, dtMovieDate, sMovieDirector
                    FROM tMovieList
                    WHERE nMovieSeq = $movie_seq";
             
             foreach($this->connect->query($sql) as $field) {
                
                 $Vo->setMovieSeq($field['nMovieSeq']);
                 $Vo->setMovieImage($field['sMovieImage']);
                 $Vo->setMovieTitle($field['sMovieTitle']);
                 $Vo->setMovieStory($field['sMovieStory']);
                 $Vo->setMovieDirector($field['sMovieDirector']);
                 $Vo->setOpeningDate($field['dtOpeningDate']);
             }
         }
         catch(PDOException $ex)
         {
             echo "레코드 선택 실패!: ".$ex->getMessage()."<br>";
         }
         
         return $Vo;
         
     }
     
     // 영화 수정
     public function movieUpdate(MovieVO $Vo) {
         
         try 
         {
            $movieSeq = $Vo->getMovieSeq();
            $movieTitle = $Vo->getMovieTitle();
            $movieStory = $Vo->getMovieStory();
            $movieImage = $Vo->getMovieImage();
            $movieDate = $Vo->getOpeningDate();
            $movieDirector = $Vo->getMovieDirector();
             
            $sql = "update tMovieList set sMovieTitle = '$movieTitle', sMovieStory = '$movieStory'
                    , sMovieImage = '$movieImage', dtOpeningDate = '$movieDate', sMovieDirector = '$movieDirector'
                     where nMovieSeq = $movieSeq";
            
            $this->connect->exec($sql);
            echo "<script>alert('영화가 성공적으로 수정되었습니다.');";
            echo "location.href='../../index.php';</script>";

            
         }
         catch(PDOException $ex)
         {
             echo "<script>alert('영화 수정에 실패했습니다.<br> 에러: ".$ex->getMessage()."')</script>";
         }
         
     }
    
}