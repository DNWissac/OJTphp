<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<script type="text/javascript" src="../js/jquery.min.js"></script>
<script>
    $( function() {
        $( "#inputDate" ).datepicker({
          changeYear: true,
          changeMonth: true,
          dateFormat: "yy-mm-dd",
          dayNamesMin: ['일', '월', '화', '수', '목', '금', '토'],
          monthNamesShort: ['1월','2월','3월','4월','5월','6월','7월','8월','9월','10월','11월','12월']
        });
      });

</script>


<!-- 달력출력용 jquery Datepicker css/js -->
<script type="text/javascript" src="../js/jquery-ui.js"></script>
<link rel="stylesheet" href="../css/jquery-ui.css">

<!-- 영화 삽입/수정/삭제 용 css -->
<link rel="stylesheet" href="../css/movie.css">
<title>영화 등록</title>


<!-- 부트스트랩 css, js-->
<link rel="stylesheet" href="../css/bootstrap.min.css">
<script type="text/javascript" src="../js/bootstrap.min.js"></script>

</head>
<body>

<section class="bg-dark">
    <div class="container py-4">
    	<h3 style="text-align: center;">영화 게시</h3>
    	
        <div>
            <form class="movieinsertform" action="../back/DAO/movieInsertDAO.php" method="post">
                <div class="form-group">
                    <label for="inputTitle" class="form-label mt-4">영화제목</label>
                    <input type="text" class="form-control" id="inputTitle" name="movieTitle">
                </div>
                <br>
                
                <div class="form-group">
                	<label for="inputStory" class="form-label mt-4">줄거리</label>
                	<textarea class="form-control" placeholder="간략한 줄거리(500자 이내)" 
                	id="inputStory" name="movieStory"></textarea>
                </div>
                <br>
                
                <div class="form-group">
                	<label for="inputImage" class="form-label mt-4">사진</label>
					<input type="text" class="form-control" id="inputImage" name="movieImage">
                </div>
                <br>
                
                <div class="form-group">
                	<label for="inputDate" class="form-label mt-4">영화 개봉일</label>
					<input type="text" class="form-control" id="inputDate" 
					readonly="readonly" name="movieDate">
                </div>
                <br>
                
                <div class="d-grid gap-2">
                    <button type="submit" class="btn btn-warning" id="insertBtn">영화 게시</button>
                    <button type="button" class="btn btn-secondary" onclick="location.href='../index.php'">
                    	취소
                    </button>
                </div>
            </form>
        </div>
        
    </div>
</section>


</body>
</html>
