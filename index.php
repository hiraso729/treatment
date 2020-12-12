<?php
session_start();
if(isset($_SESSION['user_id'])){
    header('Location: ./controller/top.php');
    exit;
}
$error='';
if($_SERVER['REQUEST_METHOD']==='POST'){
    if($_POST['user_id']==='testuser'&&$_POST['passwd']==='1234@'){
        $_SESSION['user_id']='testuser';
        header('Location: ./controller/top.php');
        exit;
    }else{
        $error='<p class="error"> ユーザー名またはパスワードに誤りがあります</p>';
    }

}
?>

<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
    echo $error;
    ?>
    <form method="POST">
        <p>ユーザー名<input type="text" name="user_id"></p>
        <p>パスワード<input type="password" name="passwd"></p>
        <p>
            <input type="submit" value="ログイン">
        </p>
        <p>以下の情報でテスト稼働できます</p>
        <p>ユーザー名はtestuser</p>
        <p>パスワードは1234@</p>
    </form>
</body>
</html>