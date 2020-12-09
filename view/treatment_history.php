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
        .record_box {
            margin: 10px;
            padding: 10px;
            border: solid 2px black;
        }
    </style>
    <title>治療記録システム</title>
</head>

<body>
    <h1>治療経緯表示画面</h1>
    <?php
    foreach ($errors as $v) {
        echo '<p class="error">' . $v . '</p>';
    }
    ?>
    <p><a href="../controller/top.php">トップに戻る</a></p>

    <p><form method="POST" action="../controller/treatment_history.php">
        <select name="section">
            <!-- selectとoptionをphpで生成 -->
            <?php
            foreach($hospitals as $h){
                echo '<option value="'.$h['hospital_id'].';'.$h['section'].'" ';echo ($h['hospital_id']===$hospital_id)?'selected':''; echo '>'.$h['name'].':'.$h['section'].'</option>';
            }
            ?>
        </select>
        
        <input type="submit" value="選択">
    </form>
    </p>
    
    <?php foreach($datas as $d){ ?>
        <div class="record_box">
            <p>検査日：<?php echo $d['visit_date']; ?></p>
            <p>原因：<?php echo $d['cause']; ?></p>
            <p>治療内容：<?php echo $d['content']; ?></p>
            <p><form method="POST" action="../controller/treatment_record_display.php">
            <!-- 全部の値を取り出してhidden属性にいれる！ -->
                <?php foreach($d as $k => $v){ ?>
                    <input type="hidden" name="<?php echo $k ; ?>" value="<?php echo $v ?>">
                <?php } ?> 
                
                <input type="submit" value="詳細表示">
            </form></p>
        </div>
    <?php } ?>
<p><a href="../controller/top.php">トップに戻る</a></p>
</body>

</html>