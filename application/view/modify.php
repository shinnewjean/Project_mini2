<?php
include_once( URL_DB );
$result_user_info_all = user_info_all();
// $arr_result = $this->sessionIdSel();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>회원 정보 수정</title>
</head>
<body>
    <h1>정보 수정</h1>
        <!-- 회원정보 수정 -->
        <form action="/user/modify" method="post">
            <input type="hidden" name="u_no" id="u_no" value="<?php echo $arr_result["u_no"] ?>">
            <input type="hidden" name="id" id="id" value="<?php echo $arr_result["u_id"] ?>">
            <label for="id_input">아이디</label>
            <input type="text" name="id_input" id="id_input" value="<?php echo $arr_result["u_id"] ?>" disabled>
            <br>
            <br>
            <label for="pw">비밀번호</label>
            <input type="password" name="pw" id="pw" oninput="chkPassword()">
            <br>
            <span class="errMsg" id="pw_msg"><?php if(isset($this->arrError["pw"])) { echo $this->arrError["pw"]; } ?></span>
            <br>
            <label for="check_pw">비밀번호 확인</label>
            <input type="password" name="check_pw" id="check_pw" oninput="chkPassword()">
            <br>
            <span class="errMsg" id="chk_pw_msg"><?php if(isset($this->arrError["check_pw"])) { echo $this->arrError["check_pw"]; } ?></span>
            <br>
            <label for="name">이름</label>
            <input type="text" name="name" id="name" value="<?php if(isset($this->arrInputVal["name"])) { echo $this->arrInputVal["name"]; } else { echo $arr_result["u_name"]; } ?>" spellcheck="false" oninput="this.value = this.value.replace(/[^ㄱ-ㅎ||ㅏ-ㅣ||가-힣||a-z||A-Z.]/g, '').replace(/(\..*)\./g, '$1'); checkName();">
            <br>
            <span class="errMsg" id="errMsgName"><?php if(isset($this->arrError["name"])) { echo $this->arrError["name"]; } ?></span>
            <br>
            <label for="phone_num">전화번호</label>
            <input type="tel" name="phone_num" id="phone_num" value="<?php if(isset($this->arrInputVal["phonenum"])) { echo $this->arrInputVal["phonenum"]; } else { echo $arr_result["u_phone_num"]; } ?>" oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1'); checkPhoneNumber();">
            <br>
            <span class="errMsg" id="phone_num_error"><?php if(isset($this->arrError["phone_num"])) { echo $this->arrError["phone_num"]; } ?></span>
            <br>
            <button id="submit_btn">수정</button>
            <br>
            <button type="button" id="out_button">회원 탙퇴</button>
        </form>
    <script src="/application/view/js/modify.js"></script>
    <script src="/application/view/js/common.js"></script>
</body>
</html>