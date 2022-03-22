<?php
//설정 파일입니다.
$Version = 0.01;

# 사이트 기본 정보
$siteName = 'Rose';
$siteContact = 'support@leftlibrary.kr';
$siteFooter = "<footer>2022 $siteName <br> 문의: $siteContact</footer>";
$siteSuffix = '동아리';

# 데이터베이스 연결 (host/user/password/db_name)
$siteDatabase = mysqli_connect();
if(!$siteDatabase){
    die('데이터베이스에 연결하지 못했습니다!');
}else{
    echo '<a href="./">'.$siteName.'</a>';
}

session_start();
?>