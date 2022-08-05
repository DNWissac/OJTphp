<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<script type="text/javascript" src="//code.jquery.com/jquery.min.js"></script>
<script>

	$().ready(function()
	{
		$("#listBtn").click(function()
		{
			//alert("리스트를 뿌리자");
			$.ajax({
				url:"name.php",
				type:"get"
			}).done(function(data){
				$("#stuinfo").text(data);
			});
			
		})
	});
	
	
</script>

<style type="text/css">

    table
    {
        width: 80%;
        margin-left: auto;
        margin-right: auto;
        text-align: center;
    }
    
</style>
<title>메인페이지</title>


<!-- 부트스트랩 css, js-->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" 
rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js" 
integrity="sha384-A3rJD856KowSb7dwlZdYEkO39Gagi7vIsF0jrRAoQmDKKtQBHUuLZ9AsSv4jD4Xa" crossorigin="anonymous"></script>

</head>
<body>

<div class="container">

    <h3 class="display-4">연습 홈페이지</h3>
    <hr class="border border-primary border-2 opacity-50">
	<button type="button" class="btn btn-outline-primary" id="listBtn">
		리스트 뿌리기
	</button>
    
    <table class="table-light" style="border: 1px solid;">
    	<tr>
    		<th>
    			번호
    		</th>
    		<th>
    			제목
    		</th>
    		<th>
    			내용
    		</th>
    		<th>
    			날짜
    		</th>
    	</tr>
    </table>
</div>





</body>
</html>