<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Giải phương trình bậc nhất</title>
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
            background-color: #ffd700;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0,0,0,0.1);
        }
        h1 {
            color: #8b4513;
            text-align: center;
            margin-top: 0;
        }
        label {
            display: inline-block;
            width: 120px;
            margin-bottom: 10px;
            color: #8b4513;
        }
        input {
            width: 200px;
            padding: 5px;
            margin-bottom: 10px;
        }
        input[readonly] {
            background-color: #f0e68c;
        }
        button {
            display: block;
            width: 100%;
            padding: 10px;
            background-color: #8b4513;
            color: white;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }
        button:hover {
            background-color: #a0522d;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>GIẢI PHƯƠNG TRÌNH BẬC NHẤT</h1>
        <?php
        $a = isset($_POST['a']) ? floatval($_POST['a']) : '';
        $b = isset($_POST['b']) ? floatval($_POST['b']) : '';
        $nghiem = '';

        if(isset($_POST['giaiphuongtrinh'])) {
            if ($a == 0) {
                if ($b == 0) {
                    $nghiem = "Phương trình có vô số nghiệm";
                } else {
                    $nghiem = "Phương trình vô nghiệm";
                }
            } else {
                $x = -$b / $a;
                $nghiem = "x = " . number_format($x, 2);
            }
        }
        ?>
        <form method="POST" action="">
            <label for="phuongtrinh">Phương trình:</label>
            <input type="number" id="a" name="a" step="any" value="<?php echo $a; ?>" required>
            <label for="x">x +</label>
            <input type="number" id="b" name="b" step="any" value="<?php echo $b; ?>" required>
            <label for="equal">=0</label><br>
            
            <label for="nghiem">Nghiệm:</label>
            <input type="text" id="nghiem" name="nghiem" value="<?php echo $nghiem; ?>" readonly><br>
            
            <button type="submit" name="giaiphuongtrinh">Giải phương trình</button>
        </form>
    </div>
</body>
</html>