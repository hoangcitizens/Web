<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Giải phương trình bậc hai</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #FFE4B5;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
        }
        .container {
            background-color: #FFDAB9;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0,0,0,0.1);
            width: 400px;
        }
        h2 {
            color: #8B4513;
            text-align: center;
            margin-top: 0;
            background-color: #FFD700;
            padding: 10px;
            margin: -20px -20px 20px -20px;
            border-radius: 8px 8px 0 0;
        }
        .equation {
            display: flex;
            align-items: center;
            margin-bottom: 10px;
        }
        .equation input {
            width: 40px;
            margin: 0 5px;
        }
        .result {
            background-color: #98FB98;
            padding: 10px;
            margin-top: 10px;
            border-radius: 4px;
        }
        button {
            width: 100%;
            padding: 10px;
            background-color: #4CAF50;
            color: white;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            margin-top: 10px;
        }
    </style>
</head>
<body>
    <div class="container">
        <h2>GIẢI PHƯƠNG TRÌNH BẬC HAI</h2>
        <form method="post">
            <div class="equation">
                Phương trình: 
                <input type="number" name="a" required value="<?php echo isset($_POST['a']) ? $_POST['a'] : ''; ?>"> x² +
                <input type="number" name="b" required value="<?php echo isset($_POST['b']) ? $_POST['b'] : ''; ?>"> x +
                <input type="number" name="c" required value="<?php echo isset($_POST['c']) ? $_POST['c'] : ''; ?>"> = 0
            </div>
            <button type="submit" name="solve">Giải phương trình</button>
        </form>
        <div class="result">
            Nghiệm: 
            <?php
            function giai_ptb1($a, $b) {
                if ($a == 0) {
                    if ($b == 0) {
                        return "Phương trình có vô số nghiệm";
                    } else {
                        return "Phương trình vô nghiệm";
                    }
                } else {
                    $x = -$b / $a;
                    return "x = " . number_format($x, 2);
                }
            }

            function giai_ptb2($a, $b, $c) {
                if ($a == 0) {
                    return giai_ptb1($b, $c);
                } else {
                    $delta = $b * $b - 4 * $a * $c;
                    if ($delta < 0) {
                        return "Phương trình vô nghiệm";
                    } elseif ($delta == 0) {
                        $x = -$b / (2 * $a);
                        return "Phương trình có nghiệm kép x1 = x2 = " . number_format($x, 2);
                    } else {
                        $x1 = (-$b + sqrt($delta)) / (2 * $a);
                        $x2 = (-$b - sqrt($delta)) / (2 * $a);
                        return "x1 = " . number_format($x1, 2) . ", x2 = " . number_format($x2, 2);
                    }
                }
            }

            if (isset($_POST['solve'])) {
                $a = floatval($_POST['a']);
                $b = floatval($_POST['b']);
                $c = floatval($_POST['c']);
                $nghiem = giai_ptb2($a, $b, $c);
                echo $nghiem;
            }
            ?>
        </div>
    </div>
</body>
</html>