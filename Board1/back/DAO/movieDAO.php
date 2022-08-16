<?php
require_once '../util/pdoconn.php';
require_once '../vo/movieVO.php';
require_once '../vo/genreVO.php';

class MovieDAO {
    
     private $connect;
     
     /**
      * DB연결 생성자
      */
     public function MovieDAO(){
         $pdo = new PDOconn();
         $this->connect = $pdo->get_connetion();
     }
     
     /**
      * 영화 목록
      * @return array
      */
     public function movieList() {
         try {
             $query = 'SELECT 
                            nMovieSeq,
                            sMovieTitle,
                            sMovieStory,
                            sMovieImage,
                            dtOpeningDate,
                            sMovieDirector
                        FROM
                            tMovieList
                        ORDER BY
                            dtOpeningDate DESC';
             
            $sql = $this->connect->prepare($query);
            $sql->execute();
            
            //var_dump($sql->execute());
            
            $voArray = array();
            while ($row = $sql->fetch()) {
                // VO클래스에 담아서 보내기 위해 생성
                $vo = new MovieVO();
                
                $vo->setMovieSeq($row['nMovieSeq']);
                $vo->setMovieTitle($row['sMovieTitle']);
                $vo->setMovieDirector($row['sMovieDirector']);
                $vo->setMovieStory($row['sMovieStory']);
                $vo->setMovieImage($row['sMovieImage']);
                $vo->setOpeningDate($row['dtOpeningDate']);
                
                array_push($voArray, $vo);
            }
            
            return $voArray;
         } catch(PDOException $ex){
             
             throw $ex->getMessage();
         }
     }
     
     // 영화 입력
     public function movieAdd(MovieVO $vo) {
     
         try {
             $query = "INSERT INTO 
                        tMovieList(
                             sMovieTitle,
                             sMovieStory,
                             sMovieImage,
                             dtOpeningDate,
                             sMovieDirector,
                             sGenreID
                            )
                       VALUES(
                             :movieTitle,
                             :movieStory,
                             :movieImage,
                             :openingDate,
                             :movieDirector,
                             :genreID)";
             
             $sql = $this->connect->prepare($query);
             
             $sql->bindValue(':movieTitle', $vo->getMovieTitle());
             $sql->bindValue(':movieStory', $vo->getMovieStory());
             $sql->bindValue(':movieImage', $vo->getMovieImage());
             $sql->bindValue(':openingDate', $vo->getOpeningDate());
             $sql->bindValue(':movieDirector', $vo->getMovieDirector());
             $sql->bindValue(':genreID', $vo->getGenreId());
             
             $sql->execute();
             
             echo 'OK';
         }
         catch(PDOException $ex) {
             echo '영화 등록에 실패했습니다. 에러:'.$ex->getMessage();
         }
     }
     
     /**
      * 영화 삭제
      * @param integer $movie_seq
      */
     public function movieRemove($movie_seq){
         
         try {
             $query = 'DELETE FROM 
                        tMovieList
                     WHERE 
                        nMovieSeq = :movieSeq';
             
             $sql = $this->connect->prepare($query);
             $sql->bindValue(':movieSeq', $movie_seq);
             
             $sql->execute();
             
             echo '영화 삭제 성공!';
         }
         catch(PDOException $ex) {
             echo '영화 삭제에 실패했습니다. 에러:'.$ex->getMessage();
         }
     }
     
     
     // 영화 정보
     public function movieSearch($movie_seq) {
         $vo = new MovieVO();
         
         try {
             $sql = $this->connect->prepare('SELECT nMovieSeq, sMovieTitle
                    , sMovieStory, sMovieImage, dtOpeningDate, dtMovieDate, sMovieDirector
                    FROM tMovieList
                    WHERE nMovieSeq = :movieSeq');
             
             $sql->bindValue(':movieSeq', $movie_seq);
             $sql->execute();
             
             while($row = $sql->fetch()){
                 $vo->setMovieSeq($row['nMovieSeq']);
                 $vo->setMovieImage($row['sMovieImage']);
                 $vo->setMovieTitle($row['sMovieTitle']);
                 $vo->setMovieStory($row['sMovieStory']);
                 $vo->setMovieDirector($row['sMovieDirector']);
                 $vo->setOpeningDate($row['dtOpeningDate']);
             }
         }
         catch(PDOException $ex) {
             echo "레코드 선택 실패!: ".$ex->getMessage()."<br>";
         }
         
         return $vo;
         
     }
     
     // 영화 수정
     public function movieModify(MovieVO $vo) {
         
         try {
            $movieSeq = $vo->getMovieSeq();
            $movieTitle = $vo->getMovieTitle();
            $movieStory = $vo->getMovieStory();
            $movieImage = $vo->getMovieImage();
            $movieDate = $vo->getOpeningDate();
            $movieDirector = $vo->getMovieDirector();
             
            $sql = "update tMovieList set sMovieTitle = '$movieTitle', sMovieStory = '$movieStory'
                    , sMovieImage = '$movieImage', dtOpeningDate = '$movieDate', sMovieDirector = '$movieDirector'
                     where nMovieSeq = $movieSeq";
            
            $this->connect->exec($sql);
            echo "<script>alert('영화가 성공적으로 수정되었습니다.');";
            echo "location.href='../../index.php';</script>";

            
         } catch(PDOException $ex) {
             echo "<script>alert('영화 수정에 실패했습니다.<br> 에러: ".$ex->getMessage()."')</script>";
         }
         
     }
     
     public function genreList(){
         try
         {
             $query = 'SELECT 
                            sGenreID,
                            sGenreName
                       FROM
                            tMovieGenre';
             
             $sql = $this->connect->prepare($query);
             $sql->execute();
             
             $voArray = array();
             while($row = $sql->fetch()) {
                 $vo = new GenreVO();
                 $vo->setGenreId($row['sGenreID']);
                 $vo->setGenreName($row['sGenreName']);
                 
                 array_push($voArray, $vo);
             }
             return $voArray;
         } catch(PDOException $ex) {
             echo "레코드 선택 실패!: ".$ex->getMessage()."<br>";
         }
     }
    
}