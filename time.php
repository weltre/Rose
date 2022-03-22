<?php
function listTime($arg){
    $now_time = date('Y-m-d H:i:s');
    $time_check = strtotime($now_time) - strtotime($arg);
                        
    $total_time = $time_check;
    
    $days = floor($total_time/86400);
    $time = $total_time - ($days*86400);
    $hours = floor($time/3600);
    $time = $time - ($hours*3600);
    $min = floor($time/60);
    $sec = $time - ($min*60);
    
    if($days == 0 && $hours == 0 && $min == 0){
        $val = $sec.'초 전';
    }elseif($days == 0 && $hours == 0){
        $val = $min.'분 전';
    }elseif($days == 0){
        $val = $hours.'시간 전';
    }else{
        if($days >= 365){
            $years = floor($days / 365);
            $val = $years.'년 전';
        }elseif($days >= 21){
            $years = floor($days / 7);
            $val = $years.'주 전';
        }else{
            $val = $days.'일 전';
        }
    }
    return $val;
}
?>