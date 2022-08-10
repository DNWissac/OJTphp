<!DOCTYPE html>
<?php 
    // 로그인 프로세스를 위한 세션처리
    session_start();
   
?>
<html>
<head>
<meta charset="UTF-8">
<script type="text/javascript" src="../js/jquery.min.js"></script>

<script>

	$().ready(function(){

		// 최신순으로 조회버튼 클릭 시
		$("#latestList").click(function(){
			//alert("테스트");
			
			$.ajax({
				url:"back/DAO/movieListDAO.php",
				type:"post",
				data: $("form").serialize()
			}).done(function(data){
				$("#input_data").html(data);
			});
			
		});

		// 초기화 버튼 클릭 시
		$("#resetList").click(function(){
			$("#input_data").empty();
		});

		$("#movieInsertBtn").click(function(){
			location.href="/view/movieinsertform.php";
		});
		
	});
	
	
</script>

<style type="text/css">

    table
    {
        width: 100%;
        margin-left: auto;
        margin-right: auto;
        text-align: center;
    }
    table>th,td
    {
        width: 20%;
    }
    
</style>
<title>메인페이지</title>


<!-- 부트스트랩 css, js-->
<link rel="stylesheet" href="../css/bootstrap.min.css">
<script type="text/javascript" src="../js/bootstrap.min.js"></script>

</head>
<body>

<div class="container">
    <!-- 헤더 사용 -->
	<?php include 'header.php'; ?>

	<hr>

	<!-- 관리자의 경우 영화 등록 가능 -->
	<?php if ($_SESSION['userAdmin'] == 1){?>
	<button type="button" class="btn btn-dark" id="movieInsertBtn">영화 등록</button>
	<?php }?>
	
    <table class="table-light" style="border: 1px solid;">
    	<thead>
        	<tr>
        		<th>영화제목</th>
        		<th>영화내용</th>
        		<th>영화사진</th>
        		<th>개봉일</th>
        		<th>게시일</th>
        	</tr>
        </thead>
        
        <tbody id="input_data">
        </tbody>
    	
    </table>
</div>





</body>
</html>