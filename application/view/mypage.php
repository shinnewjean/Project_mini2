<?
include_once( URL_DB );
$result_user_info_all = user_info_all();
?>

<!DOCTYPE html>
<html lang="ko">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>My Page</title>
    <link rel="stylesheet" href="/application/view/css/common.css">
    <link rel="stylesheet" href="/application/view/css/mypage.css">
	<!-- Bootstrap CSS only -->
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
</head>
<body>
<div class="mainHeader">
    <? 
    include_once ( URL_HEADER ); // HEADER가져옴 _lib/config에 상수 설정 되어있음
    ?>
</div>

<!-- 전체 사이즈 조절 -->
<div class="mainCon">
    <h1><? echo isset($_SESSION[_STR_LOGIN_ID]) ? $_SESSION[_STR_LOGIN_ID]."회원님의" : "(방문자)님의" ?>my page</h1>
    <div class="profile_con">
        <p>ID : <? echo isset($_SESSION[_STR_LOGIN_ID]) ? $_SESSION[_STR_LOGIN_ID]: "(방문자)" ?> </p>
        <p>이름 : <? echo isset($_SESSION[_STR_LOGIN_NAME]) ? $_SESSION[_STR_LOGIN_NAME] : "(방문자)" ?> </p>
        <p>닉네임 : <? echo isset($_SESSION[_STR_LOGIN_NICKNAME]) ? $_SESSION[_STR_LOGIN_NICKNAME] : "(방문자)" ?> </p>
    </div>

    <!-- <div class="btns"> -->
        <a href="/user/modify">정보수정</a>
        <div class="deleteAccount">탈퇴하기</div>
    <!-- </div> -->

</div> <!-- mainCon End -->

<!-- Bootstrap JavaScript Bundle with Popper -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
<script src = "/application/view/js/mypage.js"></script>
</body>
</html>