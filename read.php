<?php
include 'board.php';

# 값 받기
$n = defaultFilter($_REQUEST['n'], 1);

// 게시판 정보

    # 받은 값을 바탕으로 게시글 정보 구하기
    $sql = "SELECT * FROM `RosePetal` WHERE `petalOf` LIKE '$b' and `petalOrder` = '$n'";
    $result = mysqli_query($siteDatabase, $sql);

        # 게시글 예외 처리
        if(1 > mysqli_num_rows($result)){
            die('찾을 수 없습니다.');
        }

    # 게시글 정보 뿌리기
    $row = mysqli_fetch_array($result);
        # 분류 없을 경우 대비
        if(!$row['petalCategory']){
            $row['petalCategory'] = '일반';
        }
        # 게시글 타입 조사
        if($row['isImage']){
            $petalIcon = 'I';
        }elseif($row['isNyeom']){
            $petalIcon = 'N';
        }elseif($row['isAnon']){
            $petalIcon = 'A';
            $isAnon = TRUE;
        }else{
            $petalIcon = 'O';
        }
        # 한 열 출력
        extract($row);
        echo "<br>$petalCategory $petalIcon $petalTitle [$petalComment] ";
        if($isAnon){
            echo "$petalAuthorName($petalAuthorId)";
        }else{
            echo "<a href=\"/users/$petalAuthorId\">$petalAuthorName</a>";
        }
        $petalVote = $petalUp - $petalDown;
        echo ' '.listtime($petalAt)." $petalViews $petalVote";

    # 결과 해제
    $result->free();
?>