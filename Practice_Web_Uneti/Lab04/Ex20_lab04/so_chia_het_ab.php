<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Số chia hết cho A và B</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
            background-color: #f0f0f0;
        }
        .container {
            background-color: #FFE4B5;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0,0,0,0.1);
            width: 300px;
        }
        h1 {
            color: #8B4513;
            text-align: center;
            margin-top: 0;
            font-size: 24px;
            margin-bottom: 15px;
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
        #result-container {
            margin-top: 10px;
            padding: 10px;
            background-color: #FFFF99;
            border: 1px solid #FFD700;
        }
        #result {
            background-color: #FFB6C1;
            padding: 5px;
            margin-top: 5px;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>SỐ CHIA HẾT CHO A VÀ B</h1>
        <form method="post">
            <div class="input-group">
                <label for="n">Nhập N:</label>
                <input type="number" id="n" name="n" required value="<?php echo isset($_POST['n']) ? $_POST['n'] : ''; ?>">
            </div>
            <div class="input-group">
                <label for="a">Nhập A:</label>
                <input type="number" id="a" name="a" required value="<?php echo isset($_POST['a']) ? $_POST['a'] : ''; ?>">
            </div>
            <div class="input-group">
                <label for="b">Nhập B:</label>
                <input type="number" id="b" name="b" required value="<?php echo isset($_POST['b']) ? $_POST['b'] : ''; ?>">
            </div>
            <button type="submit" name="submit">Các số <= N chia hết cho A và cho B</button>
        </form>
        <div id="result-container">
            <div id="result">
                <?php
                function kt_so($so, $a, $b) {
                    return ($so % $a == 0 && $so % $b == 0) ? 1 : 0;
                }

                if (isset($_POST['submit'])) {
                    $n = intval($_POST['n']);
                    $a = intval($_POST['a']);
                    $b = intval($_POST['b']);
                    $chuoi = "";
                    
                    for ($i = 1; $i <= $n; $i++) {
                        if (kt_so($i, $a, $b)) {
                            $chuoi .= $i . ", ";
                        }
                    }
                    
                    if ($chuoi) {
                        echo trim($chuoi);
                    } else {
                        echo "Không có số nào thỏa mãn điều kiện.";
                    }
                }
                ?>
            </div>
        </div>
    </div>
</body>
</html>