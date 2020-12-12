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

        h1 {
            border-bottom: solid 3px #98FB98;
            position: relative;
            width: 90%;
        }

        h1:after {
            position: absolute;
            content: " ";
            display: block;
            border-bottom: solid 3px #008000;
            bottom: -3px;
            width: 20%;
        }
    </style>
    <title>治療記録システム</title>
</head>

<body>
    <div class="ml-3 mt-3">
        <h1>治療記録表示画面</h1>
        <?php
        foreach ($errors as $v) {
            echo '<p class="error">' . $v . '</p>';
        }
        ?>
        <p>
            【通院日】</br>
            <?php echo $data['visit_date']; ?>
        </p>
        <p>
            【痛みの箇所】</br>
            <?php echo $data['pain_area']; ?>
        </p>
        <p>
            【レントゲン結果】</br>
            <?php echo $data['x_ray']; ?>
        </p>
        <p>
            【心電図】</br>
            <?php echo $data['cardiogram']; ?>
        </p>
        <p>
            【原因】</br>
            <?php echo $data['cause']; ?>
        </p>
        <p>
            【いつから】</br>
            <?php echo $data['from_date']; ?>
        </p>
        <p>
            【治療内容】</br>
            <?php echo $data['content']; ?>
        </p>
        <p>
            【 症状】</br>
            <?php echo $data['symptom']; ?>
        </p>


        <p>
            <form method="POST" action="../controller/treatment_record_display.php">
                <input type="hidden" name="sql_kind" value="delete">

                <input type="hidden" name="id" value="<?php echo $data['id'] ?>">
                <input type="hidden" name="section" value="<?php echo $data['hospital_id'] . ';' . $data['section'] ?>">

                <input type="submit" class="btn btn-outline-danger" value="削除">
            </form>
        </p>
        <p>
            <form method="POST" action="../controller/treatment_history.php">
                <input type="hidden" name="from" value="display">


                <input type="hidden" name="section" value="<?php echo $data['hospital_id'] . ';' . $data['section'] ?>">

                <input type="submit" class="btn btn-outline-primary" value="戻る">
            </form>
        </p>
    </div>
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js" integrity="sha384-wHAiFfRlMFy6i5SRaxvfOCifBUQy1xHdJ/yoi7FRNXMRBu5WHdZYu1hA6ZOblgut" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js" integrity="sha384-B0UglyR+jN6CkvvICOB2joaf5I4l3gm9GU6Hc1og6Ls7i6U/mkkaduKaBhlAXv9k" crossorigin="anonymous"></script>

</body>

</html>