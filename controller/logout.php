<?php
session_start();
$_SESSION=array();//セッションを切る
header('Location: ../index.php');//ログイン画面に遷移する
session_destroy();//強制的にセッションを破棄
exit;
?>