<?php
    function defaultFilter($value, $type = NULL){
        # 기본적인 입력 값 필터 함수입니다.
        switch ($type) {
            case 0:
                # 영문만 남깁니다.
                $value = preg_replace('/[^a-zA-Z_]/m', '', $value);
                return $value;
                break;

            case 1:
                # 숫자만 남깁니다.
                $value = preg_replace('/[^0-9]/m', '', $value);
                return $value;
                break;
            
            default:
                $value = htmlspecialchars($value);
                return $value;
                break;
        }
    }
?>