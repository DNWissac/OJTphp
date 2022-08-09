<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<script type="text/javascript" src="../js/jquery.min.js"></script>
<script>

	$().ready(function()
	{

		
		// 유효성 검사
		$("#signupBtn").click(function()
		{
			var errCount = 0;
			
			$(".errMsg").css("display", "none");
			$(".pwdMsg").css("display", "none");
			$(".rePwdMsg").css("display", "none");

			var email = $("#inputEmail").val();
			var password = $("#inputPassword").val();
			var rePwd = $("#inputRePassword").val();
			var nickName = $("#inputNickName").val();

			// 비밀번호 유효성검사용
			var num = password.search(/[0-9]/g);
			var eng = password.search(/[a-z]/ig);
			var spe = password.search(/[`~!@@#$%^&*|₩₩₩'₩";:₩/?]/gi);

			// 이메일 유효성검사용
			var exptext = /^[A-Za-z0-9_\.\-]+@[A-Za-z0-9\-]+\.[A-Za-z0-9\-]+/;

			// 이메일이 입력되지 않은 경우
			if (email == "" || email == null || exptext.test(email)==false){
				
				$("#inputEmail").focus();
				$(".emailMsg").text("이메일을 입력해 주세요.");
				$(".emailMsg").css("display", "inline");
				//alert("이메일을 입력해 주세요.");
				errCount++;
			}

			// 이메일이 유효하지 않은 경우
			if(exptext.test(email)==false){
				$("#inputEmail").focus();
				$(".emailMsg").text("이메일 형식이 올바르지 않습니다.");
				$(".emailMsg").css("display", "inline");
				errCount++;
			}

			// 이메일의 길이가 너무 긴 경우
			if(email.length > 100){
				$("#inputEmail").focus();
				$(".emailMsg").text("이메일이 너무 깁니다.");
				$(".emailMsg").css("display", "inline");
				errCount++;
			}

			// 이메일 중복확인
			$.post(
					"../Back/checkemail.php",
					{ email : email },
					function (data){alert(data);
						if (data >= 1){
							$("#inputEmail").focus();
							$(".emailMsg").text("이미 존재하는 이메일입니다.");
							$(".emailMsg").css("display", "inline");
							return;
						}
					}
					
			);
			

			// 비밀번호가 입력되지 않은 경우
			if (password == "" || password == null){
				$("#inputPassword").focus();
				$(".pwdMsg").text("비밀번호를 입력해 주세요.");
				$(".pwdMsg").css("display", "inline");
				errCount++;
			}
			
			// 비밀번호의 길이가 8~20 이내가 아닐 경우
			if (password.length < 8 || password.length > 20){
				$("#inputPassword").focus();
				$(".pwdMsg").text("8자리~ 20자리 이내로 입력해주세요.");
				$(".pwdMsg").css("display", "inline");
				errCount++;
			}

			
			// 비밀번호에 공백이 있을 경우
			if (password.search(/\s/) != -1){
				$("#inputPassword").focus();
				$(".pwdMsg").text("비밀번호는 공백 없이 입력해주세요.");
				$(".pwdMsg").css("display", "inline");
				errCount++;
			}
			
			
			// 비밀번호가 영문/숫자/특수문자가 혼합되어 있지 않은 경우
			if(num < 0 || eng < 0 || spe < 0){
				$("#inputPassword").focus();
				$(".pwdMsg").text("영문, 숫자, 특수문자를 혼합하여 입력해주세요.");
				$(".pwdMsg").css("display", "inline");
				errCount++;
			}
			
			// 비밀번호가 일치하지 않는 경우
			if (rePwd != password){
				$("#inputRePassword").focus();
				$(".rePwdMsg").text("비밀번호가 일치하지 않습니다.");
				$(".rePwdMsg").css("display", "inline");
				errCount++;
			}

			// 닉네임이 입력되지 않은 경우
			if (nickName == "" || nickName == null){
				$("#inputNickName").focus();
				$(".nickMsg").text("닉네임을 입력해 주세요.");
				$(".nickMsg").css("display", "inline");
				errCount++;
			}

			// 닉네임의 길이 제한
			if (nickName.length<2 || nickName.length>20){
				$("#inputNickName").focus();
				$(".nickMsg").text("닉네임은 한글은 1~10자, 영어는 2~20자 입니다.");
				$(".nickMsg").css("display", "inline");
				errCount++;
			}
			
			// 닉네임에 빈칸이 포함된 경우
			if (nickName.search(/\s/) != -1) {
				$("#inputNickName").focus();
				$(".nickMsg").text("닉네임은 공백 없이 입력해주세요.");
				$(".nickMsg").css("display", "inline");
				errCount++;
			}

			$.post(
					"../Back/checknickname.php",
					{ nickName : nickName },
					function (data){
						if (data >= 1){
							$("#inputNickName").focus();
							$(".nickNameMsg").text("이미 존재하는 닉네임입니다.");
							$(".nickNameMsg").css("display", "inline");
							errCount++;
						}
					}
					
			);

			if (errCount == 0)
			{
				$(".signform").submit();
			}

			
		});
	});


</script>

<style type="text/css">
    
    /* 섹션 크기 */
    .bg-light{
            height: 1053px;
            padding-top:55px;
            padding-bottom:75px;
    }
    .flex-fill.mx-xl-5.mb-2{
            margin: 0 auto;
            width : 700px;
            padding-right: 7rem;
            padding-left: 7rem;
    }
    
    /* 입력창 */
    .container.py-4{
            margin: 0 auto;
            width : 503px;
    }
    /* 가입버튼 */
    .d-grid.gap-2{
            padding-top: 30px;
    }
    /* 에러메시지 */
    .errMsg{
            color: red;
            display: none;
    }


    
</style>
<title>회원가입</title>


<!-- 부트스트랩 css, js-->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" 
rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js" 
integrity="sha384-A3rJD856KowSb7dwlZdYEkO39Gagi7vIsF0jrRAoQmDKKtQBHUuLZ9AsSv4jD4Xa" crossorigin="anonymous"></script>

</head>
<body>
<section class="bg-light">
    <div class="container py-4">
    	<h3 style="text-align: center;">회원가입</h3>
    	
        <div>
            <form class="signform" action="../Back/signup.php">
                <div class="form-group">
                    <label for="inputEmail" class="form-label mt-4">이메일</label>
                    <input type="email" class="form-control" id="inputEmail" aria-describedby="emailHelp"
                    placeholder="ex)example@gmail.com">
                    <div>
                    	<span class="errMsg emailMsg"></span>
                    </div>
                </div>
                
                <div class="form-group has-success">
                    <label for="inputPassword" class="form-label mt-4">비밀번호</label>
                    <input type="password" class="form-control" id="inputPassword" placeholder="영문, 숫자, 특수문자를 혼합한 8~20자리">
                    <div>
                    	<span class="errMsg pwdMsg"></span>
                    </div>
                </div>
                
                <div class="form-group has-danger">
                    <label for="inputRePassword" class="form-label mt-4">비밀번호 재확인</label>
                    <input type="password" class="form-control" id="inputRePassword">
                    <div>
                    	<span class="errMsg rePwdMsg"></span>
                    </div>
                </div>
                
                <div class="form-group">
                    <label for="inputNickName" class="form-label mt-4">닉네임</label>
                    <input type="text" class="form-control" id="inputNickName" placeholder="한글 1~10자, 영문 및 숫자 2~20자 이내">
                    <div>
                    	<span class="errMsg nickMsg">닉네임을 입력해 주세요.</span>
                    </div>
                </div>
                
                <div class="d-grid gap-2">
                    <button type="button" class="btn btn-primary btn-lg" id="signupBtn">가입하기</button>
                    <button type="button" class="btn btn-secondary" onclick="location.href='signinform.php'">
                    	취소
                    </button>
                </div>
                <a href="../index.php">메인페이지로 이동</a>
            </form>
        </div>
        
    </div>
</section>




</body>
</html>
