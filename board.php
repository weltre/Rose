<?php
include 'time.php';

# 값 받기
$b = defaultFilter($_REQUEST['b'], 0);

// 게시판 정보

    # 받은 값을 바탕으로 게시판 정보 구하기
    $sql = "SELECT * FROM `RoseUnion` WHERE `unionNamePlate` LIKE '$b'";
    $result = mysqli_query($siteDatabase, $sql);

        # 게시판 예외 처리
        if(1 > mysqli_num_rows($result)){
            die('찾을 수 없습니다.');
        }

    # 게시판 정보 뿌리기
    $row = mysqli_fetch_array($result);
        # 게시판 이름
        echo $row['unionName'].' '.$siteSuffix;
        # 게시판 이미지
        if($row['unionImage']){
            echo '<br><img src="./'.$row['unionImage'].'" width="100">';
        }else{
            echo '<br><img src="./test.png" width="100">';
        }
        # 게시판 설명
        echo $row['unionDesc'];
        # 게시판 매니저
        echo '<br><b>매니저: </b> '.$row['unionChairman'].'<br>';
            # 부매니저
            echo '<b>부매니저: </b>'.$row['unionVice'].'<br>';
            # 개설일
            echo '<b>개설일: </b>'.$row['unionAt'].'<br>';
            # 게시판 관리 내역
            echo '<a href="#">'.$siteSuffix.' 관리 내역</a>';

    # 결과 해제
    $result->free();
?>