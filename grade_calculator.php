<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>成績判定プログラム</title>
</head>
<body>
    <h1>成績判定システム</h1>

    <h2>【個別成績】</h2>
    <?php
    //定義:学生データ
    $students = [ 
        ["name" => "田中太郎", "score" => 85],
        ["name" => "佐藤花子", "score" => 92],
        ["name" => "鈴木一郎", "score" => 78],
        ["name" => "高橋美咲", "score" => 65],
        ["name" => "伊藤健太", "score" => 58],
    ];

    //評価判定関数(点数から評定を返す)
    function returnGrade($score) {
        if ($score >= 90) return "A";
        if ($score >= 80) return "B";
        if ($score >= 70) return "C";
        if ($score >= 60) return "D";
        return "F";
    }

    //判定データ
    $grades = [ 
        "A" => "優秀",
        "B" => "良好",
        "C" => "普通",
        "D" => "要努力",
        "F" => "不合格",
    ];

    foreach ($students as $student) {
        //生徒の評価を取得
        $studentGrade = returnGrade($student["score"]);
        //生徒の評価から判定を取得
        $studentStatus = $grades[$studentGrade];
        //個別の成績表示
        echo $student["name"] . ": " . $student["score"] . "点 - 評価" . $studentGrade . "（" .$studentStatus . "）<br>";
    }


    echo "<h2>【統計情報】</h2>";
    //カウンター変数
    $pass_count = 0;
    $fail_count = 0;

    foreach ($students as $student) {
        if ($student["score"] >= 60) {
            $pass_count++;
        } else {
            $fail_count++;
        }
    }
        echo "合格者数（60点以上）:" . $pass_count . "人<br>";
        echo "不合格者数（60点未満）:" . $fail_count . "人<br>";

    //平均点の計算
    $total_score = 0;
    foreach ($students as $student) {
        $total_score += $student["score"];
    }
    $average = $total_score / count($students);

        echo "平均点:" . $average . "点<br>";

    ?>
</body>
</html>