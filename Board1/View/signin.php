<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<script type="text/javascript" src="//code.jquery.com/jquery.min.js"></script>
<script>

</script>

<style type="text/css">

    .btndiv
    {
        text-align: center;
    }
    .container
    {
        padding-top: 20%;
        text-align: center;
    }
    .mb-4
    {
        text-align: left;
    }
    
</style>
<title>로그인</title>


<!-- 부트스트랩 css, js-->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" 
rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js" 
integrity="sha384-A3rJD856KowSb7dwlZdYEkO39Gagi7vIsF0jrRAoQmDKKtQBHUuLZ9AsSv4jD4Xa" crossorigin="anonymous"></script>

</head>
<body>

<div class="container">
	<h3 style="text-align: center;">로그인</h3>
	
    <div class="signupDiv" style="width:50%; display: inline-block;">
        <form>
            <div class="mb-4">
                <label for="exampleInputEmail1" class="form-label">이메일</label>
                <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
            </div>
            <div class="mb-4">
                <label for="exampleInputPassword1" class="form-label">비밀번호</label>
                <input type="password" class="form-control" id="exampleInputPassword1">
            </div>
            <div class="btndiv">
                <button type="submit" class="btn btn-primary">로그인</button>
                <button type="button" class="btn btn-primary" onclick="location.href='signup.php'">
                	회원가입
                </button>
            </div>
            <a href="../index.php">메인페이지로 이동</a>
        </form>
    </div>

	
    
</div>





</body>
</html>
