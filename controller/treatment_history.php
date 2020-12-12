<?php
include_once './session_check.php';
//全部動く
include_once '../model/model.php';
$errors=[];
$datas=[];
$hospital_id='';
$hospitals=hospitals_select();//病院情報をDBから読み込む

//POSTのときだけ動く プルダウンを押したとき
if($_SERVER['REQUEST_METHOD']==='POST'){
    $sections=explode(';',$_POST['section']);
    $hospital_id=$sections[0];
    $section=$sections[1];
    $datas=treatment_records_select($section);
}

include_once '../view/treatment_history.php';
