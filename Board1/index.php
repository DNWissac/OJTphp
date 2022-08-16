<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<script type="text/javascript" src="../js/jquery.min.js"></script>
<script>

	$().ready(function(){

		// 영화 최신순 조회 버튼 클릭 시
		$("#latestList").click(function(){

			// 버튼을 다시 눌렀을 때 중복으로 나오지 않게 하도록 테이블 초기화
			$("#input_data>thead").empty();
			$("#input_data>tbody").empty();

			// ajax로 리스트 출력
			$.ajax({
				url:"back/mapper/movieMapper.php",
				type:"post",
				data:{action:"movieList"} ,
				success : function(data){

					// JSON으로 날아온 값 변환
					let obj = JSON.parse(data);

					$("#input_data>thead").append("<tr>");
					$("#input_data>thead").append("<th>영화제목</th>");
					$("#input_data>thead").append("<th>감독</th><th>줄거리</th>");
					$("#input_data>thead").append("<th>사진</th><th>개봉일</th></tr>");
					
					for (var i = 0; i < obj.length; i++){
						
						$("#input_data>tbody").append("<tr>");
						$("#input_data>tbody").append("<td><a href='view/moviedetail.php?seq="+obj[i].movieSeq+"'>"+obj[i].movieTitle+"</td>");
						$("#input_data>tbody").append("<td>"+obj[i].movieDirector+"</td>");
						$("#input_data>tbody").append("<td>"+obj[i].movieStory+"</td>");
						$("#input_data>tbody").append("<td><img src='"+obj[i].movieImage+"' alt='사진 없음'></td>");
						$("#input_data>tbody").append("<td>"+obj[i].openingDate+"</td></tr>");
					}
				}
			
			});
			
		});

		// 사용자 조회 클릭 시
		$("#userList").click(function(){

			// 버튼을 다시 눌렀을 때 중복으로 나오지 않게 하도록 테이블 초기화
			$("#input_data>thead").empty();
			$("#input_data>tbody").empty();
			
			$.ajax({
				url:"back/mapper/userMapper.php",
				type:"post",
				data:{action:"list"},
				success: function (data){
					
					// JSON으로 날아온 값 변환
					let obj = JSON.parse(data);

					$("#input_data>thead").append("<tr>");
					$("#input_data>thead").append("<th>이메일</th>");
					$("#input_data>thead").append("<th>닉네임</th><th>관리자여부</th>");

					for (var i = 0; i < obj.length; i++){
						$("#input_data>tbody").append("<tr>");
						$("#input_data>tbody").append("<td>"+obj[i].userEmail+"</td>");
						$("#input_data>tbody").append("<td>"+obj[i].userNickName+"</td>");

						if (obj[i].userAdmin == 1)
							$("#input_data>tbody").append("<td>관리자</td></tr>");
						else
							$("#input_data>tbody").append("<td>일반사용자</td></tr>");
					}
				}

				
			});
			
		});

		// 초기화 버튼 클릭 시
		$("#resetList").click(function(){
			$("#input_data>thead").empty();
			$("#input_data>tbody").empty();
			$("#latestList").on("click");
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
    <table>
    	<tr>
    		<th>
          		<button type="button" class="btn btn-info" id="latestList">영화 최신순 조회</button>
          	</th>
          	<?php if($_SESSION['userAdmin'] == 1){ ?>
          	<th>
          		<button type="button" class="btn btn-info" id="userList">사용자 조회</button>
          	</th>
          	<?php }?>
          	<?php if ($_SESSION['userAdmin'] == 1){?>
          	<th>
        		<button type="button" class="btn btn-success" id="movieInsertBtn">영화 등록</button>
        	</th>
        	<?php }?>
        	<th>
        		<button type="button" class="btn btn-danger" id="resetList">초기화</button>
          	</th>
    	</tr>
    </table>
    
	<!-- 관리자의 경우 영화 등록 가능 -->
	
	
    <table class="table-light" id="input_data" style="border: 1px solid;">
		<thead></thead>
		<tbody></tbody>
    </table>
</div>





</body>
</html>