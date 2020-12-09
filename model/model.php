<?php
require_once '../include/const.php'; //dbでコネクトできます

function get_db_connect()
{
    $link = mysqli_connect(DB_HOST, DB_USER, DB_PASSWD, DB_NAME);

    // 接続失敗した場合
    if (!$link) {
        die('error:' . mysqli_connect_error());
    }
    // 文字化け防止
    mysqli_set_charset($link, DB_CHARACTER_SET);
    return $link;
}

function hospitals_insert($name, $section)
{
    $link = get_db_connect();
    $query = "INSERT INTO hospitals(name,section) VALUES(?,?)";
    if ($stmt = mysqli_prepare($link, $query)) {
        mysqli_stmt_bind_param($stmt, "ss", $v1, $v2);

        // クエリを実行します
        $v1 = $name;
        $v2 = $section;
        if (mysqli_stmt_execute($stmt)) {
            // echo '１件挿入<br>';
        } else {
            echo '挿入失敗！';
        }
        mysqli_stmt_close($stmt);
    } else {
        echo 'stmt接続失敗！';
    }
    mysqli_close($link);
}

function treatment_records_insert($hospital_id, $visit_date, $pain_area, $x_ray, $cardiogram, $cause, $from_date, $content, $symptom)
{
    $link = get_db_connect();
    $query = "INSERT INTO treatment_records(hospital_id,visit_date,pain_area,x_ray,cardiogram,cause,from_date,content,symptom) VALUES(?,?,?,?,?,?,?,?,?)";
    if ($stmt = mysqli_prepare($link, $query)) {
        mysqli_stmt_bind_param($stmt, "issssssss", $v1, $v2, $v3, $v4, $v5, $v6, $v7, $v8, $v9);

        // クエリを実行します
        $v1 = $hospital_id;
        $v2 = $visit_date;
        $v3 = $pain_area;
        $v4 = $x_ray;
        $v5 = $cardiogram;
        $v6 = $cause;
        $v7 = $from_date;
        $v8 = $content;
        $v9 = $symptom;
        if (mysqli_stmt_execute($stmt)) {
            // echo '１件挿入<br>';
        } else {
            echo '挿入失敗！';
        }
        mysqli_stmt_close($stmt);
    } else {
        echo 'stmt接続失敗！';
    }
    mysqli_close($link);
}

function delete($id)
{
    $link = get_db_connect();
    $query = "DELETE FROM treatment_records WHERE id=?";
    if ($stmt = mysqli_prepare($link, $query)) {
        mysqli_stmt_bind_param($stmt, "i", $v1);
        // クエリを実行します
        $v1 = $_POST['id'];
        if (!mysqli_stmt_execute($stmt)) {
            echo '削除失敗！';
        }
        mysqli_stmt_close($stmt);
    } else {
        echo 'stmt接続失敗！';
    }
    mysqli_close($link);
}

function treatment_records_select($section)
{
    $link = get_db_connect();
    $datas = [];
    $query = 'SELECT id, hospitals.hospital_id,visit_date,pain_area,x_ray,cardiogram,cause,from_date,content,symptom FROM treatment_records JOIN hospitals ON treatment_records.hospital_id = hospitals.hospital_id WHERE section = ? ORDER BY visit_date DESC' ;

    $stmt = mysqli_stmt_init($link);
    if (mysqli_stmt_prepare($stmt, $query)) {
        mysqli_stmt_bind_param($stmt, "s", $section);
        mysqli_stmt_execute($stmt);
        mysqli_stmt_bind_result($stmt, $id, $hospital_id, $visit_date, $pain_area, $x_ray, $cardiogram, $cause, $from_date, $content, $symptom);
        while (mysqli_stmt_fetch($stmt)) {
            $datas[] = [
                'id' => $id,
                'hospital_id' => $hospital_id,
                'section' => $section,
                'visit_date' => $visit_date,
                'pain_area' => $pain_area,
                'x_ray' => $x_ray,
                'cardiogram' => $cardiogram,
                'cause' => $cause,
                'from_date' => $from_date,
                'content' => $content,
                'symptom' => $symptom
            ];
        }
        mysqli_stmt_close($stmt);
    } else {
        echo 'stmt接続失敗！';
    }

    // 接続を閉じます
    mysqli_close($link);
    return $datas;
}
function hospitals_select()
{
    $link = get_db_connect();
    $datas = [];
    $query = 'SELECT * FROM hospitals';

    if ($r = mysqli_query($link, $query)) {
        while ($row = mysqli_fetch_assoc($r)) {
            $datas[] = [
                'hospital_id' => $row['hospital_id'],
                'name' => htmlspecialchars($row['name'], ENT_QUOTES, 'UTF-8'),
                'section' => htmlspecialchars($row['section'], ENT_QUOTES, 'UTF-8'),
            ];
        }
    } else {
        echo 'sql失敗' . $query;
    }

    mysqli_free_result($r);

    // 接続を閉じます
    mysqli_close($link);
    return $datas;
}
