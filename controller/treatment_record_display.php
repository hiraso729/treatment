<?php
include_once './session_check.php';
include_once '../model/model.php';
$errors=[];
$data=[];
if($_SERVER['REQUEST_METHOD']==='POST'){
    if(isset($_POST['sql_kind'])){
        if($_POST['sql_kind']==='delete'){
            $id=intval($_POST['id']);
            delete($id);
            $hospitals=hospitals_select();
            $sections=explode(';',$_POST['section']);
            $hospital_id=$sections[0];
            $section=$sections[1];
            $datas=treatment_records_select($section);
            include_once '../view/treatment_history.php';
            exit;
        }
    }

    $data=$_POST;//POSTの値をDATAに全コピ
    include_once '../view/treatment_record_display.php';
}else{
    echo 'アクセスエラー';
}
    
