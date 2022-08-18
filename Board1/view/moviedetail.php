<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<script type="text/javascript" src="../js/jquery.min.js"></script>

<!-- moviedetail css/js -->
<script type="text/javascript" src="../js/moviedetail.js"></script>
<link rel="stylesheet" href="../css/movieDetail.css">

<!-- 부트스트랩 css, js-->
<link rel="stylesheet" href="../css/bootstrap.min.css">
<script type="text/javascript" src="../js/bootstrap.min.js"></script>

</head>
<body>

<div class="container py-4">
	<!-- 헤더 -->
	<?php include '../header.php'; ?>
	
	<!-- 넘어온 영화 번호 저장 -->
	<input type="hidden" value="<?php echo $_GET['seq']?>" id="movieSeq">
	
    <div class="content shadow-lg p-3 mb-5 bg-body rounded">
        <div class="movieImage"></div>
        
        <div class="movieInfomation">
        	<div class="movieTitle"></div>
        	<p class="fs-5 movieStory"></p>
        	<p class="fs-3 movieScoreAvg">평점 : </p>
        	<div>
        		<button type='button' class='btn btn-warning' onclick='updateClick();'>수정</button>
    			<button type='button' class='btn btn-dark' onclick='deleteClick();' >삭제</button>
    		</div>
        </div>
    </div>
    
    <div class="movieScore">
            <?php if(isset($_SESSION['userEmail'])){?>
            <div>
            	<p>평점
            	<label><input type="radio" id="scoreRadio" name="scoreRadio" checked="checked" value="1">1</label>
				<input type="radio" id="scoreRadio" name="scoreRadio" value="2">2
				<input type="radio" id="scoreRadio" name="scoreRadio" value="3">3
				<input type="radio" id="scoreRadio" name="scoreRadio" value="4">4
				<input type="radio" id="scoreRadio" name="scoreRadio" value="5">5
				</p>
				
        		  <textarea class="form-control" placeholder="간략한 평가 내용(최대 450자)" id="inputComment" style="height: 100px"></textarea>
        		<button type="button" class="btn btn-primary" id="inputScore">등록</button>
        	</div>
        	<?php }?>
        	
        	<div class="scoreList">
        		<p>평가는 최근 5개만 출력됩니다.</p>
        		<table class="scoreTable table">
        			<thead>
        			</thead>
        			<tbody>
        			</tbody>
        		</table>
        	</div>
        </div>
</div>


</body>
</html>
