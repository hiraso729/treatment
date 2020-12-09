<?php
require_once('../include/model.php');
$link = get_db_connect();
// 接続成功した場合
if ($link) {
    $query = 'CREATE TABLE hospitals(hospital_id INT PRIMARY KEY AUTO_INCREMENT, name VARCHAR(50),section VARCHAR(50), address INT)';
    // クエリを実行します
    $result = mysqli_query($link, $query);
    if ($result) {
        echo 'hospitals作成成功！';
    } else {
        echo 'DB作成失敗！';
    }
    $query = 'CREATE TABLE treatment_records(id INT PRIMARY KEY AUTO_INCREMENT, hospital_id INT,visit_date DATE, pain_area VARCHAR(50), x_ray VARCHAR(200), cardiogram VARCHAR(200), cause VARCHAR(200), from_date DATETIME, content VARCHAR(200), symptom VARCHAR(200))';
    // クエリを実行します
    $result = mysqli_query($link, $query);
    if ($result) {
        echo 'treatment_records作成成功！';
    } else {
        echo 'DB作成失敗！';
    }
    // 接続を閉じます
    mysqli_close($link);
    // 接続失敗した場合
} else {
    print 'DB接続失敗';
}
