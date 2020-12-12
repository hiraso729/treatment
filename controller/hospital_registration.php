<?php
include_once './session_check.php';
include_once '../model/model.php';
$errors=[];
$name='';
$section='';
if($_SERVER['REQUEST_METHOD']==='POST'){
    if(isset($_POST['name'])===false){
        $errors[]='病院名を入れてください。';
    }else{
        if (preg_replace("/( |　)/", '', $_POST['name']) !== '') {
            $name = $_POST['name'];
        } else {
            $errors[] = '病院名を入力してください';
        }
        if (mb_strlen($name) > 20) {
            $errors[] = '病院名は２０文字以下にしてください';
        }
    }
    if(isset($_POST['section'])===false){
        $errors[]='診療科を入れてください。';
    }else{
        if (preg_replace("/( |　)/", '', $_POST['section']) !== '') {
            $section = $_POST['section'];
        } else {
            $errors[] = '診療科を入力してください';
        }
        if (mb_strlen($section) > 20) {
            $errors[] = '診療科は２０文字以下にしてください';
        }
    }

    if(count($errors)===0){
        hospitals_insert($name,$section);
        $errors[]='登録が成功しました。';
    }
    
}
include_once '../view/hospital_registration.php';
