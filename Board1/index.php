<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<script type="text/javascript" src="//code.jquery.com/jquery.min.js"></script>
<?php 
    // 로그인 프로세스를 위한 세션처리
    session_start();
    
    $s_id = isset($_SESSION["s_id"])? $_SESSION["s_id"]:"";
    $s_name = isset($_SESSION["s_name"])? $_SESSION["s_name"]:"";
?>

<script>

	$().ready(function(){

		// 최신순으로 조회버튼 클릭 시
		$("#listBtn").click(function(){
			//alert("테스트");
			
			$.ajax({
				url:"Back/source_list.php",
				type:"post",
				data: $("form").serialize()
			}).done(function(data){
				$("#input_data").html(data);
			});
			
		});

		// 초기화 버튼 클릭 시
		$("#resetBtn").click(function(){
			$("#input_data").empty();
		});
		
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
    table>th,td
    {
        width: 20%;
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
    <div class="signBtnDiv" style="text-align: right;">
    	<!-- 비 로그인 시 -->
    	<?php if(!$s_id){?>
        <button type="button" class="btn btn-primary" onclick="location.href='view/signin.php'">
    		로그인
    	</button>
    	<button type="button" class="btn btn-primary" onclick="location.href='view/signup.php'">
    		회원가입
    	</button>
    	<!-- 로그인 시 -->
    	<?php } else{?>
    	<p>『<?php echo $s_name;?>』님, 안녕하세요.</p>

    		<?php if($s_id == "admin"){ ?>
    		<p>관리자 계정입니다.</p>
    		<?php };?>
    	<button type="button" class="btn btn-primary" onclick="location.href='back/logout.php'">
    		로그아웃
    	</button>
		<?php };?>
    </div>
    
    <hr class="border border-primary border-2 opacity-50">
    <div style="text-align: center;">
    	<button type="button" class="btn btn-outline-primary" id="listBtn">
    		최신 순 조회
    	</button>
        <button type="button" class="btn btn-outline-secondary" id="resetBtn">
    		초기화
    	</button>
    </div>
    
    <table class="table-light" style="border: 1px solid;">
    	<thead>
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
        </thead>
        
        <tbody id="input_data">
        </tbody>
    	
    </table>
</div>





</body>
</html>