<?php
    require 'setting.php';
    require 'filter.php';

    switch (defaultFilter($_REQUEST['req'], 0)){
        case 'list':
            # 게시판
                include 'list.php';
            break;

        case 'read':
            # 게시글
                include 'read.php';
            break;

        case 'write':
            # 글쓰기
                include 'write.php';
            break;

        case 'login':
            # 로그인
                include 'login.php';
            break;
        
        default:
            # 메인 페이지
            echo 'main page.
            <br><a href="?req=list">list</a>
            <br><a href="?req=page">page</a>
            <br><a href="?req=write">write</a>
            <br><a href="?req=login">login</a>'; //디자인 만든 이후 채우기
            break;
    }

    echo $siteFooter;
?>