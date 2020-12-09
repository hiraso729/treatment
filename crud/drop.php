<?php
require_once('../model/model.php');
$link = get_db_connect();
// 接続成功した場合
if ($link) {
    $query = 'DROP TABLE hospitals';
    // クエリを実行します
    if ($result = mysqli_query($link, $query)) {
        echo 'hospitals削除成功！';
    } else {
        echo 'hospitals削除失敗！';
    }
    $query = 'DROP TABLE treatment_records';
    // クエリを実行します
    if ($result = mysqli_query($link, $query)) {
        echo 'treatment_records削除成功！';
    } else {
        echo 'treatment_records削除失敗！';
    }

    // 接続を閉じます
    mysqli_close($link);
    // 接続失敗した場合
} else {
    print 'DB接続失敗';
}
