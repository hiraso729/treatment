<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css" integrity="sha384-GJzZqFGwb1QTTN6wy59ffF1BuGJpLSa9DkKMp0DgiMDm4iYMj70gZWKYbI706tWS" crossorigin="anonymous">
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

        .record_box {
            padding: 8px 19px;
            margin: 2em 30px;
            color: #2c2c2f;
            background: #cde4ff;
            border-top: solid 5px #5989cf;
            border-bottom: solid 5px #5989cf;
            width: 80%;
        }

        .record_box p {
            margin: 0;
            padding: 0;
        }

        h1 {
            border-bottom: solid 3px #cce4ff;
            position: relative;
            width: 90%;
        }

        h1:after {
            position: absolute;
            content: " ";
            display: block;
            border-bottom: solid 3px #5472cd;
            bottom: -3px;
            width: 20%;
        }
    </style>
    <title>治療記録システム</title>
</head>

<body>
    <div class="ml-3 mt-3">
        <h1>治療経緯表示画面</h1>
        <?php
        foreach ($errors as $v) {
            echo '<p class="error">' . $v . '</p>';
        }
        ?>
        <p><a href="../controller/top.php">トップに戻る</a></p>

        <p>
            <form method="POST" action="../controller/treatment_history.php">
                <select name="section">
                    <!-- selectとoptionをphpで生成 -->
                    <?php
                    foreach ($hospitals as $h) {
                        echo '<option value="' . $h['hospital_id'] . ';' . $h['section'] . '" ';
                        echo ($h['hospital_id'] === $hospital_id) ? 'selected' : '';
                        echo '>' . $h['name'] . ':' . $h['section'] . '</option>';
                    }
                    ?>
                </select>

                <input type="submit" class="btn btn-outline-primary btn-sm" value="選択">
            </form>
        </p>

        <?php foreach ($datas as $d) { ?>
            <div class="record_box">
                <p>検査日：<?php echo $d['visit_date']; ?></p>
                <p>原因：<?php echo $d['cause']; ?></p>
                <p>治療内容：<?php echo $d['content']; ?></p>
                <p>
                    <form method="POST" action="../controller/treatment_record_display.php">
                        <!-- 全部の値を取り出してhidden属性にいれる！ -->
                        <?php foreach ($d as $k => $v) { ?>
                            <input type="hidden" name="<?php echo $k; ?>" value="<?php echo $v ?>">
                        <?php } ?>

                        <input type="submit" class="btn btn-primary btn-sm"  value="詳細表示">
                    </form>
                </p>
            </div>
        <?php } ?>
        <p><a href="../controller/top.php">トップに戻る</a></p>
    </div>
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js" integrity="sha384-wHAiFfRlMFy6i5SRaxvfOCifBUQy1xHdJ/yoi7FRNXMRBu5WHdZYu1hA6ZOblgut" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js" integrity="sha384-B0UglyR+jN6CkvvICOB2joaf5I4l3gm9GU6Hc1og6Ls7i6U/mkkaduKaBhlAXv9k" crossorigin="anonymous"></script>
</body>

</html>