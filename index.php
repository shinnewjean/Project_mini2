<?php

// test //무엇을 입력하든 뜨게하는것
// echo "index";

// config 파일
// 설정파일 include후 application\libs\Application 호출
// include_once or require_once
require_once("application/lib/config.php"); //에러를 판별하기 쉽습니다.

// autoload 불러오기
require_once("application/lib/autoload.php"); // autoload 호출

// Application 연결
// require_once("application/lib/Application.php");
new application\lib\Application(); // Application 호출