<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<script type="text/javascript" src="../js/jquery.min.js"></script>
<script>

	$().ready(function()
	{
		var seqNum = <?php echo $_GET['seq']?>

		$.ajax({
			url:"../back/Service/movies.php",
			type:"get",
			data:{seqNum:seqNum},
			error : function(){
	            alert('에러');
	        },
	        success : function(result){
	        	$(".content").html(result);
	        }

	        });

	});

	function deleteClick()
	{
		if (confirm("정말로 삭제하시겠습니까?"))
		{
			location.href="../back/DAO/movieDeleteDAO.php?seq="+<?php echo $_GET['seq']?>;
		}
	}
	
	function updateClick()
	{
		location.href="../back/DAO/movieUpdateDAO.php?seq="+<?php echo $_GET['seq']?>;
	}

	
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
	

    
    <div class="content rounded">
        <!--     	
        <div>
    		평점 : 4.5
    	</div> 
    	-->
    </div>
</div>


</body>
</html>