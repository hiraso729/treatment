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
    <h1>治療記録画面</h1>
    <?php
    foreach ($errors as $v) {
        echo '<p class="error">' . $v . '</p>';
    }
    print_r($hospitals);
    ?>
    <form method="POST" action="../controller/treatment_record.php">
        <select name="hospital_id">
            <?php
            foreach($hospitals as $h){
                echo '<option value="'.$h['hospital_id'].'" ';
                // echo ($h['hospital_id']===$hospital_id)? "selected":"";
                echo '>'.$h['name'].':'.$h['section'].'</option>';
            }
            ?>
        </select>
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
        <p><input type="submit" value="登録"></p>
    </form>
<p><a href="../controller/top.php">トップに戻る</a></p>
</body>

</html>