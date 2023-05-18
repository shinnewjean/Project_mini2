<?
// CONFIG 가져오는 쿼리는?
include_once( URL_DB ); // DATABASE가져옴 _lib/config에 상수 설정 되어있음

$result_product_info_all = product_info_all(); //product_info를 가져오는 변수
// var_dump($result_product_info_all);
$no_img = "https://www.seoulauction.com/nas_img/no_image.jpg";
?>

<!DOCTYPE html>
<html lang="ko">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Main Page</title>
    <link rel="stylesheet" href="/application/view/css/common.css">
    <link rel="stylesheet" href="/application/view/css/main.css">
	<!-- Bootstrap CSS only -->
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
</head>
<body>
<div class="mainHeader">
    <? 
    include_once ( URL_HEADER ); // HEADER가져옴 _lib/config에 상수 설정 되어있음
    ?>
</div>

<div id="carouselExampleDark" class="carousel carousel-dark slide" data-bs-ride="carousel">
    <div class="carousel-indicators">
        <button type="button" data-bs-target="#carouselExampleDark" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
        <button type="button" data-bs-target="#carouselExampleDark" data-bs-slide-to="1" aria-label="Slide 2"></button>
        <button type="button" data-bs-target="#carouselExampleDark" data-bs-slide-to="2" aria-label="Slide 3"></button>
    </div>
    <div class="carousel-inner">
        <div class="carousel-item active" data-bs-interval="10000">
        <img src="<? echo $result_product_info_all[0]['Pdt_img'] ?>" class="d-block w-100" alt="...">
            <!-- <div class="carousel-caption d-none d-md-block">
                <h5>First slide label</h5>
                <p>Some representative placeholder content for the first slide.</p>
            </div> -->
        </div>
        <div class="carousel-item" data-bs-interval="2000">
            <img src="<? echo $result_product_info_all[1]['Pdt_img'] ?>" class="d-block w-100" alt="...">
        </div>
        <div class="carousel-item">
            <img src="<? echo $result_product_info_all[2]['Pdt_img'] ?>" class="d-block w-100" alt="...">
        </div>
    </div>
    <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleDark" data-bs-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Previous</span>
    </button>
    <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleDark" data-bs-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Next</span>
    </button>
</div>

<!-- 전체 사이즈 조절 -->
<div class="mainCon">
<div class="container">
    <div class="row g-4">
    <?php
        foreach ( $result_product_info_all as $val ) {        // $result_product_info_all = product_info_all() 의 배열값을 $val로 가져와서 배열값만큼 돌림
    ?>
        <div class="col">
            <div class="card" style="width: 18rem;"> <!-- //h-100 -->
                <img src="
                    <?
                        if ($val['Pdt_img'] === '0' ) {
                            echo $no_img;
                        } else {
                            echo $val['Pdt_img'];
                        }
                    ?>" class="card-img-top" alt="...">
                <div class="card-body">
                    <h5 class="card-title"> 
                        <?
                            if ($val['Pdt_name'] === '0' ) {
                                echo 'null';
                            } else {
                                echo $val['Pdt_name'];
                            }
                        ?>
                    </h5>
                    <p class="card-text">                        
                        <?
                            if ($val['Pdt_detail'] === '0' ) {
                                echo 'null';
                            } else {
                                echo $val['Pdt_detail'];
                            }
                        ?></p>
                    <a href="#" class="btn btn-primary">Go somewhere</a>
                </div>
            </div>
        </div>
    <? } ?>
</div>
</div> <!-- mainCon End -->

<p class="float-end mb-1">
    <a href="#">Back to top</a>
</p>

<div class="btns">
    <div class="moveTopBtn">맨 위로</div>
    <div class="moveBottomBtn">맨 아래로</div>
</div>

<footer class="text-muted py-5">
    <div class="container">
        <p class="mb-1">Album example is &copy; Bootstrap, but please download and customize it for yourself!</p>
        <p class="mb-0">New to Bootstrap? <a href="/">Visit the homepage</a> or read our <a href="/docs/5.2/getting-started/introduction/">getting started guide</a>.</p>
    </div>
</footer>

<script src = "/application/view/js/main.js"></script>
<!-- Bootstrap JavaScript Bundle with Popper -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
</body>
</html>