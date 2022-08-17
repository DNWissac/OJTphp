<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<script type="text/javascript" src="../js/jquery.min.js"></script>
<script>

	$().ready(function(){

		// 영화 최신순 조회 버튼 클릭 시
		$("#latestList").click(function(){
			
			let startNum = $("#startPageNum").val();
			let endNum = $("#endPageNum").val();

			// 버튼을 다시 눌렀을 때 중복으로 나오지 않게 하도록 테이블 초기화
			$("#input_data>thead").empty();
			$("#input_data>tbody").empty();
			$(".pagination").empty();

			// ajax로 리스트 출력
			$.ajax({
				url:"back/mapper/movieMapper.php",
				type:"post",
				data:{action:"movieList",
					startPageNum:startNum},
				success : function(data){

					// JSON으로 날아온 값 변환
					let obj = JSON.parse(data);
					// result 값(리스트)
					let listArr = obj['result'];
					// count 값(영화 총 개수)
					let count = obj['movieCount'];
					
					$("#input_data>thead").append("<tr>");
					$("#input_data>thead").append("<th>영화제목</th>");
					$("#input_data>thead").append("<th>감독</th>");
					$("#input_data>thead").append("<th>사진</th><th>개봉일</th></tr>");
					
					for (var i = 0; i < listArr.length; i++){
						
						$("#input_data>tbody").append("<tr>");
						$("#input_data>tbody").append("<td><a href='view/moviedetail.php?seq="+listArr[i]['movieSeq']+"'>"+listArr[i]['movieTitle']+"</td>");
						$("#input_data>tbody").append("<td>"+listArr[i]['movieDirector']+"</td>");
						$("#input_data>tbody").append("<td><img src='"+listArr[i]['movieImage']+"' alt='사진 없음'></td>");
						$("#input_data>tbody").append("<td>"+listArr[i]['openingDate']+"</td></tr>");
					}

					// 현재 페이지
					let page = startNum/10+1;
					
					// 마지막 페이지 수
					let pageNum = Math.ceil(count/10);

					// 페이지 블럭 5개씩 표기
					let block_size = 5;

					// 현재 블럭의 위치(디폴트 0) 
					let block_num = parseInt((page-1) / block_size);

					// 현재 블럭의 맨 처음 페이지 넘버
					let block_start = (block_size * block_num) + 1;

					// 현재 블럭의 맨 끝 페이지 넘버 (첫 번째 블럭이라면 5)
					let block_end = block_start + (block_size - 1);

					let nowPage = $("#nowPage").val();
					let nowBlock = $("#nowBlock").val();
					
					if (block_num != 0)
						$(".pagination").append("<li class='page-item'><a class='page-link' href='#' onclick='blockMove("+(nowBlock-1)+")'>◀</a></li>");
					
					if (pageNum < block_end){
						for (var i = block_start; i < pageNum+1; i++){
							$(".pagination").append("<li class='page-item'><a class='page-link' href='#' onclick='pageMove("+i+")'>"+i+"</a></li>");
						}
					}
					
					else{
						for (var i = block_start; i < block_end+1; i++){
							$(".pagination").append("<li class='page-item'><a class='page-link' href='#' onclick='pageMove("+i+")'>"+i+"</a></li>");
						}
					}

					$(".pagination").append("<li class='page-item'><a class='page-link' href='#' onclick='blockMove("+(nowBlock+1)+")'>▶</a></li>");
				}
			
			});
			
		});

		// 사용자 조회 클릭 시
		$("#userList").click(function(){


			// 버튼을 다시 눌렀을 때 중복으로 나오지 않게 하도록 테이블 초기화
			$("#input_data>thead").empty();
			$("#input_data>tbody").empty();
			$("#tbl>tbody").empty();
			
			$.ajax({
				url:"back/mapper/userMapper.php",
				type:"post",
				data:{action:"list"},
				success: function (data){

					// JSON으로 날아온 값 변환
					let obj = JSON.parse(data);

					$("#input_data>thead").append("<tr>");
					$("#input_data>thead").append("<th>이메일</th>");
					$("#input_data>thead").append("<th>닉네임</th>");
					$("#input_data>thead").append("<th>관리자여부</th>");

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
			$("#tbl>tbody").empty();
			$("#latestList").on("click");
		});

		$("#movieInsertBtn").click(function(){
			location.href="/view/movieinsertform.php";
		});
		
	});

	function pageMove(num){

		// 시작숫자와 끝 숫자 변경
		let startNum = (num-1)*10;
		let endNum = startNum+10;

		// 시작숫자와 끝 숫자 변경
		$("#startPageNum").val(startNum);
		$("#endPageNum").val(endNum);
		$("#nowPage").val(num);

		$("#latestList").trigger("click");
	}

	function blockMove(num){

		// 시작숫자와 끝 숫자, 블록 변경
		$("#nowBlock").val(num);

		alert($("#nowBlock").val());
		
	}

	
</script>

<style type="text/css">
    #input_data{
        width: 100%;
        margin-left: auto;
        margin-right: auto;
        text-align: center;
    }
    #input_data>th,td{
        width: 20%;
    }
    img{
        width: 100px;
        height: 150px;
    }
    .paginated{
        text-align: center;
        width: 200px;
        display:inline-block;
        border : none;
    }
    .pageTableDiv{
        text-align: center;
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
	
	<!-- 페이징용 hidden -->
	<input type="hidden" value="0" id="startPageNum">
	<input type="hidden" value="10" id="endPageNum">
	<input type="hidden" value="1" id="nowPage">
	<input type="hidden" value="1" id="nowBlock">
	
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
    <div class="pageTableDiv">
        <table class="paginated" id="tbl">
    		<thead></thead>
    		<tbody>
    		</tbody>
        </table>
		<nav aria-label="Page navigation">
          <ul class="pagination">
<!--             <li class="page-item"><a class="page-link" href="#">이전</a></li>
            <li class="page-item"><a class="page-link" href="#">1</a></li>
            <li class="page-item"><a class="page-link" href="#">2</a></li>
            <li class="page-item"><a class="page-link" href="#">3</a></li>
            <li class="page-item"><a class="page-link" href="#">4</a></li>
            <li class="page-item"><a class="page-link" href="#">5</a></li>
            <li class="page-item"><a class="page-link" href="#">다음</a></li> -->
          </ul>
    	</nav>
        
    </div>
    
    
    
</div>





</body>
</html>