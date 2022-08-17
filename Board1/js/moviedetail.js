/**
 * moviedetail.php (javascript)
 */

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
	            alert("에러");
	        },
	        success : function(data){
		        // JSON형식으로 수신한 데이터 처리
	        	let obj = JSON.parse(data);
				// result 값(리스트)
				let detailArr = obj["result"][0];
				$(".movieImage").append("<img src='../"+detailArr["movieImage"]+"' class='rounded' alt='사진 없음'>");
				$(".movieTitle").append("<h1>"+detailArr["movieTitle"]+"</h1>");
				$(".movieStory").append(detailArr["movieStory"]);
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