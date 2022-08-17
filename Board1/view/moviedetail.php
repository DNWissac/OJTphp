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
    
    <div class="content rounded">
        <div class="movieImage"></div>
        
        <div class="movieInfomation">
        	<div class="movieTitle"></div>
        	<p class="fs-5 movieStory"></p>
        	<div>
        		<button type='button' class='btn btn-warning' onclick='updateClick();'>수정</button>
    			<button type='button' class='btn btn-dark' onclick='deleteClick();' >삭제</button>
    		</div>
        </div>
    </div>
</div>


</body>
</html>
