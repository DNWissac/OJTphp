<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<script type="text/javascript" src="../js/jquery.min.js"></script>
<script>

	$().ready(function()
	{
		// 인덱스 페이지에서 넘어온 영화번호 받기
		let movie_seq = $("#movieSeq").val();

		// ajax로 해당 seq 영화정보 받아오기
		$.ajax({
			url:"../back/mapper/movieMapper.php",
			type:"post",
			data:{
				movie_seq:movie_seq,
				action:"search"
				},
			error : function(){
	            alert('에러');
	        },
	        success : function(data){
		        // JSON형식으로 수신한 데이터 처리
	        	let obj = JSON.parse(data);
				$(".movieImage").append("<img src='../"+obj.movieImage+"' class='rounded' alt='사진 없음'>");
				$(".movieTitle").append("<h1>"+obj.movieTitle+"</h1>");
				$(".movieStory").append(obj.movieStory);
	        }

	    }); // ajax 종료
	}); // $().ready(funtion()) 종료

	function deleteClick(){
		if (confirm("정말로 삭제하시겠습니까?")){
			$.ajax({
				url:"../back/mapper/movieMapper.php",
				type:"post",
				data:{
					movie_seq:$("#movieSeq").val(),
					action:"delete"
					},
				error : function(data){
		            alert('에러 : '+data);
		        },
		        success : function(data){
			        alert(data);
		        	location.href="../index.php";
		        }
		    }); // ajax 종료
		} // if문 종료
	}// function deleteClick() 종료
	
	function updateClick() {
		location.href="../view/movieupdateform.php?seq="+$("#movieSeq").val();
	}// function updataClick() 종료

	
</script>

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
