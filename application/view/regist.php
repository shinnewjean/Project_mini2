<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>regist</title>
	<link rel="stylesheet" href="/application/view/css/common.css">
	<link rel="stylesheet" href="/application/view/css/login.css">
</head>
<body>
<div class="login-page">
	<div class="form">
	<a class="navbar-brand" href="/user/main"><img src="/application/view/img/maintitle.png" style="width:100px; height:auto;" /></a>
	<!-- 회원가입 form -->
        <!-- errMsg나타내는 -->
		<? if(isset($this->errMsg)) { // 230516_add ?>
        <div><span><? echo $this->errMsg ?></span></div>
		<? } ?>

		<form class="register-form" action="/user/regist" method="POST">
			<div class="ID_button">
			<input type="text" name="id" id="id" placeholder="ID"/>
			<button type="button" onclick="chkDuplicationID();">중복체크</button>
			</div>
			<span id="errMsgId">
			<? if (isset($this -> arrError["id"])){echo $this -> arrError["id"];} ?> 
			</span>

			<input type="password" name="pw" id="pw" placeholder="password"/>
			<span>
			<? if (isset($this -> arrError["pw"])) { echo $this -> arrError["pw"];  } ?>
			</span>

			<input type="password" name="pwChk" id="pwChk" placeholder="password check"/>
			<span>
			<? if (isset($this -> arrError["pwChk"])) {echo $this -> arrError["pwChk"];} ?>
			</span>

			<input type="text" name="name" id="name" placeholder="name"/>
			<span>
			<? if (isset($this -> arrError["name"])) { echo $this -> arrError["name"]; } ?>
			</span>

			<!-- <input type="text" name="email" id="email" placeholder="email address"/> -->
			<button type="submit">회원가입</button>
			<p class="message">계정이 있으신가요? <a href="/user/login">login페이지로 돌아가기</a></p>
		</form>
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