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

        <input type="submit" value="削除">
    </form>
    </p>
    <p>
    <form method="POST" action="../controller/treatment_history.php">
        <input type="hidden" name="from" value="display">

        
        <input type="hidden" name="section" value="<?php echo $data['hospital_id'].';'. $data['section'] ?>">

        <input type="submit" value="戻る">
    </form>
    </p>

</body>

</html>