<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ước số chung lớn nhất và Bội số chung nhỏ nhất</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
            background-color: white;
        }
        .container {
            background-color: #FFDAB9;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0,0,0,0.1);
            width: 300px;
        }
        .title {
            background-color: #FFD700;
            color: #8B4513;
            text-align: center;
            padding: 10px;
            margin: -20px -20px 15px -20px;
            border-radius: 8px 8px 0 0;
        }
        h1 {
            font-size: 20px;
            margin: 0;
        }
        .input-group {
            margin-bottom: 10px;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }
        .input-group label {
            flex: 1;
        }
        .input-group input {
            flex: 2;
            padding: 5px;
        }
        button {
            width: 100%;
            padding: 10px;
            background-color: #FFD700;
            border: none;
            color: black;
            cursor: pointer;
            margin-top: 10px;
        }
        .result-area {
            background-color: #FFCCCB;
            padding: 10px;
            margin-top: 10px;
            border-radius: 4px;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="title">
            <h1>ƯỚC SỐ CHUNG LỚN NHẤT<br>và BỘI SỐ CHUNG NHỎ NHẤT</h1>
        </div>
        <form method="post">
            <div class="input-group">
                <label for="a">Số A:</label>
                <input type="number" id="a" name="a" required value="<?php echo isset($_POST['a']) ? $_POST['a'] : ''; ?>">
            </div>
            <div class="input-group">
                <label for="b">Số B:</label>
                <input type="number" id="b" name="b" required value="<?php echo isset($_POST['b']) ? $_POST['b'] : ''; ?>">
            </div>
            <button type="submit" name="submit">Tìm USCLN và BSCNN</button>
        </form>
        <div class="result-area">
            <div class="input-group">
                <label for="uscln">USCLN:</label>
                <input type="text" id="uscln" readonly value="<?php echo isset($uscln) ? $uscln : ''; ?>">
            </div>
            <div class="input-group">
                <label for="bscnn">BSCNN:</label>
                <input type="text" id="bscnn" readonly value="<?php echo isset($bscnn) ? $bscnn : ''; ?>">
            </div>
        </div>
        <?php
        if (isset($_POST['submit'])) {
            $a = intval($_POST['a']);
            $b = intval($_POST['b']);

            // Tìm USCLN bằng vòng lặp do...while
            $x = abs($a);
            $y = abs($b);
            do {
                $temp = $x % $y;
                $x = $y;
                $y = $temp;
            } while ($y != 0);

            $uscln = $x;
            $bscnn = ($a * $b) / $uscln;

            echo "<script>
                document.getElementById('uscln').value = '$uscln';
                document.getElementById('bscnn').value = '$bscnn';
            </script>";
        }
        ?>
    </div>
</body>
</html>