<!DOCTYPE html>
<html lang="ko">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Login</title>
	<link rel="stylesheet" href="/application/view/css/common.css">
	<link rel="stylesheet" href="/application/view/css/login.css">
</head>
<body>
<div class="login-page">
	<div class="form">
	<a class="navbar-brand" href="/user/main"><img src="/application/view/img/maintitle.png" style="width:100px; height:auto;" /></a>
	<!-- login form -->
		<h3 style="color: red;"><?PHP echo isset($this->errMsg) ? $this->errMsg : ""; ?></h3>
		<form action="/user/login" method="post" class="login-form">
			<input type="text" name="id" id="id" placeholder="ID"/>
			<input type="password" name="pw" id="pw" placeholder="password"/>
			<button>login</button>
			<p class="message">계정이 없으신가요? <a href="/user/regist">회원가입</a></p>
			<p class="message">로그인이 안될때는? <a href="">ID 찾기</a> <a href="">PW 변경</a></p>
		</form>
	</div>
</div>

<!-- Bootstrap JavaScript Bundle with Popper -->
<!-- <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script> -->
<script src="/application/view/js/jquery.min.js"></script>
<script src = "/application/view/js/common.js"></script>
<script src = "/application/view/js/login.js"></script>
</body>
</html>
