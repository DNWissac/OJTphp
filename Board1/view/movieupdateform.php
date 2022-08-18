<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<style type="text/css">

    .errMsg
    {
        color: yellow;
        display: none;
        font-weight: bold;
    }
</style>

<script type="text/javascript" src="../js/jquery.min.js"></script>
<script src="../js/movieupdateform.js"></script>


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
    	<h3 style="text-align: center;">영화 수정</h3>
		<input type="hidden" value="<?php echo $_GET['seq']?>" id="movieSeq">
		    	
        <div>
            <form class="movieupdateform" method="post" onsubmit="return insertCheck();">
                <div class="form-group">
                    <label for="inputTitle" class="form-label mt-4">영화제목</label>
                    <input type="text" class="form-control" id="inputTitle" name="movieTitle">
                </div>
                <span class="errMsg titleMsg">제목을 입력해주세요.</span><br>
                
                <div class="form-group">
                	<label for="inputDirector" class="form-label mt-4">감독</label>
					<input type="text" class="form-control" id="inputDirector" name="movieDirector">
					<span class="errMsg directorMsg">감독을 입력 해주세요.</span><br>
									
					<label for="inputGenre" class="form-label mt-4">장르</label>
					<select id="searchGenre" name="movieGenre" class="form-select">
					</select>
					<span class="errMsg genreMsg">장르를 입력 해주세요.</span><br>
                </div>


				
                <br>
                <div class="form-group">
                	<label for="inputStory" class="form-label mt-4">줄거리</label>
                	<textarea class="form-control" placeholder="간략한 줄거리(500자 이내)" 
                	id="inputStory" name="movieStory"></textarea>
                </div>
                <span class="errMsg storyMsg">줄거리를 입력해주세요.</span><br>
                
<!--             <div class="form-group">
                	<label for="inputImage" class="form-label mt-4">사진</label>
					<input type="file" class="form-control" id="inputImage" name="movieImage">
                </div>
                <span class="errMsg imageMsg">사진을 넣어주세요.</span><br>
                 -->
                <div class="form-group">
                	<label for="inputDate" class="form-label mt-4">영화 개봉일</label>
					<input type="text" class="form-control" id="inputDate" 
					readonly="readonly" name="movieDate">
                </div>
				<span class="errMsg dateMsg">개봉일자를 선택해주세요.</span><br>
                <br>
                
                <div class="d-grid gap-2">
                    <button type="button" class="btn btn-warning" id="updateBtn">영화 수정</button>
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
