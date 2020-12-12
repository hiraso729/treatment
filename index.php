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
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css" integrity="sha384-GJzZqFGwb1QTTN6wy59ffF1BuGJpLSa9DkKMp0DgiMDm4iYMj70gZWKYbI706tWS" crossorigin="anonymous">
    <title>Document</title>
</head>
<body>
    <div class="ml-3 mt-3">
    <?php
    echo $error;
    ?>
    <form method="POST">
        <p>ユーザー名<input type="text" name="user_id"></p>
        <p>パスワード<input type="password" name="passwd"></p>
        <p>
            <input type="submit" class="btn btn-outline-success" value="ログイン">
        </p>
        <p>以下の情報でテスト稼働できます</p>
        <p>ユーザー名はtestuser</p>
        <p>パスワードは1234@</p>
    </form>
    </div>
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js" integrity="sha384-wHAiFfRlMFy6i5SRaxvfOCifBUQy1xHdJ/yoi7FRNXMRBu5WHdZYu1hA6ZOblgut" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js" integrity="sha384-B0UglyR+jN6CkvvICOB2joaf5I4l3gm9GU6Hc1og6Ls7i6U/mkkaduKaBhlAXv9k" crossorigin="anonymous"></script>
</body>
</html>