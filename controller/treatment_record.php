<?php
include_once '../model/model.php';
$errors = [];
$visit_date = '';
$pain_area = '';
$x_ray = '';
$cardiogram = '';
$cause = '';
$from_date = '';
$content = '';
$symptom = '';
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['visit_date']) === false) {
        $errors[] = '通院日を入力してください。';
    } else {
        if (preg_replace("/( |　)/", '', $_POST['visit_date']) !== '') {
            $visit_date = $_POST['visit_date'];
        } else {
            $errors[] = '通院日を入力してください';
        }
    }
    if (isset($_POST['pain_area']) === false) {
        $errors[] = '痛みの箇所を入力してください。';
    } else {
        if (preg_replace("/( |　)/", '', $_POST['pain_area']) !== '') {
            $pain_area = $_POST['pain_area'];
        } else {
            $errors[] = '痛みの箇所を入力してください';
        }
        if (mb_strlen($pain_area) > 50) {
            $errors[] = '痛みの箇所は５０文字以下にしてください';
        }
    }
    $x_ray = $_POST['x_ray'];

    $cardiogram = $_POST['cardiogram'];

    if (isset($_POST['cause']) === false) {
        $errors[] = '原因を入力してください。';
    } else {
        if (preg_replace("/( |　)/", '', $_POST['cause']) !== '') {
            $cause = $_POST['cause'];
        } else {
            $errors[] = '原因を入力してください';
        }
        if (mb_strlen($cause) > 200) {
            $errors[] = '原因は２００文字以下にしてください';
        }
    }

    $from_date=$_POST['from_date'];

    if (isset($_POST['content']) === false) {
        $errors[] = '治療内容を入力してください。';
    } else {
        if (preg_replace("/( |　)/", '', $_POST['content']) !== '') {
            $content = $_POST['content'];
        } else {
            $errors[] = '治療内容を入力してください';
        }
        if (mb_strlen($content) > 200) {
            $errors[] = '治療内容は２００文字以下にしてください';
        }
    }
    if (isset($_POST['symptom']) === false) {
        $errors[] = '症状を入力してください。';
    } else {
        if (preg_replace("/( |　)/", '', $_POST['symptom']) !== '') {
            $symptom = $_POST['symptom'];
        } else {
            $errors[] = '症状を入力してください';
        }
        if (mb_strlen($symptom) > 200) {
            $errors[] = '症状は２００$文字以下にしてください';
        }
    }

    if (count($errors) === 0) {
        treatment_records_insert(
            $_POST['hospital_id'],
            $visit_date,
            $pain_area,
            $x_ray,
            $cardiogram,
            $cause,
            $from_date,
            $content,
            $symptom
        );
        $errors[] = '登録が成功しました。';
    }
}
$hospitals = hospitals_select();//プルダウンのため
include_once '../view/treatment_record.php';
