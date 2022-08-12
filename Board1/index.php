<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<script type="text/javascript" src="../js/jquery.min.js"></script>
<script>

	$().ready(function(){

		// 최신순으로 조회버튼 클릭 시
		$("#latestList").click(function(){

			$.ajax({
				url:"back/mapper/movieListMapper.php",
				type:"post",
				success : function(data){
					let obj = JSON.parse(data);
					
					let htmlOut = 
					"<thead><tr><th>"
					+"영화제목</th>"
					+"<th>감독</th><th>줄거리</th>"
					+"<th>사진</th><th>개봉일</th></tr>"
					+"</thead><tbody>"
					+"<tr><td><a href='view/moviedetail.php?seq="+obj.movieSeq+"'>"+obj.movieTitle+"</td>"
					+"<td>"+obj.movieDirector+"</td>"
					+"<td>"+obj.movieStory+"</td>"
					+"<td><img src='"+obj.movieImage+"' alt='사진 없음'></td>"
					+"<td>"+obj.openingDate+"</td></tr>"
					+"</tbody>";
					
					$("#input_data").html(htmlOut);
					}
			});
			
			
		});

		// 사용자 조회 클릭 시
		$("#userList").click(function(){
			
			$.ajax({
				url:"back/DAO/userListDAO.php",
				type:"post",
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
    img
    {
        width: 100px;
        height: 150px;
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
    <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link active" id="latestList" href="#;">
          영화 최신 순 조회
          </a>
        </li>
        <!-- 관리자만 가능한 사용자 조회 -->
        <?php if($_SESSION['userAdmin'] == 1){ ?>
		<li class="nav-item">
          <a class="nav-link active" id="userList" href="#;">
          사용자 조회
          </a>
        </li>
    	<?php }?>
        <li class="nav-item">
          <a class="nav-link" id="resetList" href="#;">
          초기화
          </a>
        </li>
    </ul>
    
	<!-- 관리자의 경우 영화 등록 가능 -->
	<?php if ($_SESSION['userAdmin'] == 1){?>
	<button type="button" class="btn btn-dark" id="movieInsertBtn">영화 등록</button>
	<?php }?>
	
    <table class="table-light" id="input_data" style="border: 1px solid;">
		
    </table>
</div>





</body>
</html>