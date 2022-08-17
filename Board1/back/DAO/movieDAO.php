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
     public function movieList($startNum, $endNum) {
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
                            dtOpeningDate DESC
                        LIMIT
                            :startNum, 10';
             
            $sql = $this->connect->prepare($query);
            
            $sql->bindValue(':startNum', $startNum, PDO::PARAM_INT);
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
     
     /**
      * 영화 등록
      * @param MovieVO $vo
      */
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
     
     
     /**
      * 영화 정보
      * @param integer $movie_seq
      * @return MovieVO
      */
     public function movieSearch($movie_seq) {
         $vo = new MovieVO();
         
         try {
             
             
             $query = 'SELECT 
                            nMovieSeq,
                            sMovieTitle,
                            sMovieStory,
                            sMovieImage, 
                            dtOpeningDate, 
                            dtMovieDate, 
                            sMovieDirector, 
                            sGenreId
                       FROM 
                            tMovieList
                       WHERE 
                            nMovieSeq = :movieSeq';
             
             $sql = $this->connect->prepare($query);
             
             $sql->bindValue(':movieSeq', $movie_seq);
             $sql->execute();
             
             while($row = $sql->fetch()){
                 $vo->setMovieSeq($row['nMovieSeq']);
                 $vo->setMovieImage($row['sMovieImage']);
                 $vo->setMovieTitle($row['sMovieTitle']);
                 $vo->setMovieStory($row['sMovieStory']);
                 $vo->setMovieDirector($row['sMovieDirector']);
                 $vo->setOpeningDate($row['dtOpeningDate']);
                 $vo->setGenreId($row['sGenreId']);
             }
         }
         catch(PDOException $ex) {
             echo "레코드 선택 실패!: ".$ex->getMessage()."<br>";
         }
         
         return $vo;
         
     }
     
     /**
      * 영화 수정
      * @param MovieVO $vo
      */
     public function movieModify(MovieVO $vo) {
         
         try {
            $query = 'UPDATE 
                        tMovieList
                    SET 
                        sMovieTitle = :movieTitle,
                        sMovieStory = :movieStory,
                        sMovieImage = :movieImage,
                        dtOpeningDate = :openingDate,
                        sMovieDirector = :movieDirector,
                        sGenreId = :genreId
                    WHERE 
                        nMovieSeq = :movieSeq';
            
            $sql = $this->connect->prepare($query);
            
            $sql->bindValue(':movieTitle', $vo->getMovieTitle());
            $sql->bindValue(':movieStory', $vo->getMovieStory());
            $sql->bindValue(':movieImage', $vo->getMovieImage());
            $sql->bindValue(':openingDate', $vo->getOpeningDate());
            $sql->bindValue(':movieDirector', $vo->getMovieDirector());
            $sql->bindValue(':genreId', $vo->getGenreId());
            $sql->bindValue(':movieSeq', $vo->getMovieSeq(), PDO::PARAM_INT);
            
            $sql->execute();
            
            echo 'OK';
            
         } catch(PDOException $ex) {
             echo '영화 수정에 실패했습니다. 에러:'.$ex->getMessage();
         }
         
     }
     
     /**
      * 장르 목록
      * @return array
      */
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
     
     /**
      * 영화 개수
      * @return integer $count
      */
     public function movieCount(){
         try
         {
             $query = 'SELECT
                            count(*) as count
                       FROM
                            tMovieList';
             
             $sql = $this->connect->prepare($query);
             $sql->execute();
             
             while($row = $sql->fetch()){
                $count = $row['count'];
             }
             
             return $count;
             
         } catch(PDOException $ex) {
             echo "레코드 선택 실패!: ".$ex->getMessage()."<br>";
         }
         
     }
    
}