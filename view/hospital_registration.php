<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style>
        .row {
            display: flex;
        }

        .ly_width {
            width: 150px;
            border: solid 1px black;
        }

        .error {
            color: red;
        }
    </style>
    <title>治療記録システム</title>
</head>

<body>
    <h1>病院登録画面</h1>
    <?php
    foreach ($errors as $v) {
        echo '<p class="error">' . $v . '</p>';
    }
    ?>
    <form method="POST" action="../controller/hospital_registration.php">
        <input type="hidden" name="sql_kind" value="insert">
        <p>
            <label for="name">病院名</label>
            <input type="text" name="name" id="name">
        </p>
        <p>
            <label for="section">診療科</label>
            <input type="text" name="section" id="section">
        </p>
        <p><input type="submit" value="登録"></p>
    </form>
<p><a href="../controller/top.php">トップに戻る</a></p>
</body>

</html>