<?php
include_once '../model/model.php';
$errors=[];
$data=[];
if($_SERVER['REQUEST_METHOD']==='POST'){
    $data=$_POST;//POSTの値をDATAに全コピ
    include_once '../view/treatment_record_display.php';
}else{
    echo 'アクセスエラー';
}
    
