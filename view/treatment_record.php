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
    </style>
    <title>治療記録システム</title>
</head>

<body>
<div class="ml-3 mt-3">
    <h1>治療記録画面</h1>
    <?php
    foreach ($errors as $v) {
        echo '<p class="error">' . $v . '</p>';
    }
    ?>
    <form method="POST" action="../controller/treatment_record.php">
        <p><select name="hospital_id">
            <?php
            foreach($hospitals as $h){
                echo '<option value="'.$h['hospital_id'].'" ';
                // echo ($h['hospital_id']===$hospital_id)? "selected":"";
                echo '>'.$h['name'].':'.$h['section'].'</option>';
            }
            ?>
        </select></p>
        <input type="hidden" name="sql_kind" value="insert">
        <p>
            <label for="visit_date">通院日</label>
            <input type="date" name="visit_date" id="visit_date">
        </p>
        <p>
            <label for="pain_area">痛みの箇所</label>
            <input type="text" name="pain_area" id="pain_area">
        </p>
        <p>
            <label for="x_ray">レントゲン結果</label>
            <input type="text" name="x_ray" id="x_ray">
        </p>
        <p>
            <label for="cardiogram">心電図</label>
            <input type="text" name="cardiogram" id="cardiogram">
        </p>
        <p>
            <label for="cause">原因</label>
            <input type="text" name="cause" id="cause">
        </p>
        <p>
            <label for="from_date">いつから</label>
            <input type="datetime-local" name="from_date" id="from_date">
        </p>
        <p>
            <label for="content">治療内容</label>
            <input type="text" name="content" id="content">
        </p>
        <p>
            <label for="symptom">症状</label>
            <input type="text" name="symptom" id="symptom">
        </p>
        <p><input type="submit" class="btn btn-outline-success value="登録"></p>
    </form>
<p><a href="../controller/top.php">トップに戻る</a></p>
</div>
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js" integrity="sha384-wHAiFfRlMFy6i5SRaxvfOCifBUQy1xHdJ/yoi7FRNXMRBu5WHdZYu1hA6ZOblgut" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js" integrity="sha384-B0UglyR+jN6CkvvICOB2joaf5I4l3gm9GU6Hc1og6Ls7i6U/mkkaduKaBhlAXv9k" crossorigin="anonymous"></script>
</body>

</html>