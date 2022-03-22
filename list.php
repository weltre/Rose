<?php
include 'board.php';

// 게시글 목록

    # 받은 값을 바탕으로 게시글 목록 구하기
    $sql = "SELECT * FROM `RosePetal` WHERE `petalOf` LIKE '$b' and `isNotice` = 0 LIMIT 20";
    $result = mysqli_query($siteDatabase, $sql);

    # 게시판 정보 뿌리기
    while($row = mysqli_fetch_array($result)){
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
        echo "<br>$petalCategory $petalIcon <a href=\"?req=read&b=$b&n=$petalOrder\">$petalTitle</a> [$petalComment] ";
        if($isAnon){
            echo "$petalAuthorName($petalAuthorId)";
        }else{
            echo "<a href=\"/users/$petalAuthorId\">$petalAuthorName</a>";
        }
        $petalVote = $petalUp - $petalDown;
        echo ' '.listtime($petalAt)." $petalViews $petalVote";
    }
    # 결과 해제
    $result->free();
?>