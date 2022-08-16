<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<script type="text/javascript" src="../js/jquery.min.js"></script>
<script>

	$().ready(function()
	{

		
		
		// 로그인 버튼 클릭 시
		$("#signinBtn").click(function()
		{
			let userEmail = $("#inputEmail").val();
			let userPassword = $("#inputPassword").val();
			
			$.ajax({
				url:"../back/mapper/userMapper.php",
				type:"post",
				data:{action:"signin", userEmail:userEmail,
					  userPassword:userPassword},
				error : function(){
		            alert("로그인 에러");
		        },
		        success : function(data){

					if ($.trim(data)== "OK")
					{
						alert("로그인에 성공하셨습니다.");
						location.replace("../index.php");
					}
					else
						alert(data);
					
		        }

		        });

			
		});
		
	});

</script>

<!-- 회원가입/로그인 용 css -->
<link rel="stylesheet" href="../css/sign.css">
<title>로그인</title>


<!-- 부트스트랩 css, js-->
<link rel="stylesheet" href="../css/bootstrap.min.css">
<script type="text/javascript" src="../js/bootstrap.min.js"></script>

</head>
<body>

<section class="bg-light">
    <div class="container py-4">
    	<h3 style="text-align: center;">로그인</h3>
    	
        <div>
            <form class="signform" action="../back/DAO/userMapper.php" method="post">
                <div class="form-group">
                    <label for="inputEmail" class="form-label mt-4">이메일</label>
                    <input type="email" class="form-control" id="inputEmail" aria-describedby="emailHelp" name="userEmail">
                    <div>
                    	<span class="errMsg emailMsg"></span>
                    </div>
                </div>
                
                <div class="form-group has-success">
                    <label for="inputPassword" class="form-label mt-4">비밀번호</label>
                    <input type="password" class="form-control" id="inputPassword" name="userPassword">
                    <div>
                    	<span class="errMsg pwdMsg"></span>
                    </div>
                </div>
                
                <div class="d-grid gap-2">
                    <button type="button" class="btn btn-primary btn-lg" id="signinBtn">로그인</button>
                    <button type="button" class="btn btn-secondary" onclick="location.href='../index.php'">
                    	취소
                    </button>
                </div>
            </form>
        </div>
        
    </div>
</section>


</body>
</html>
