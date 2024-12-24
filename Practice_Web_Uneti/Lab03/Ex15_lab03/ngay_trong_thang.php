<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <title>Tính ngày trong tháng</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
            background-color: #ffcccb;
        }
        .container {
            background-color: #ff6b6b;
            padding: 20px;
            border-radius: 8px;
            width: 300px;
        }
        h2 {
            color: white;
            text-align: center;
            margin-top: 0;
            font-size: 20px;
        }
        .form-group {
            margin-bottom: 15px;
        }
        label {
            color: white;
        }
        input[type="text"] {
            width: 50px;
            padding: 5px;
            border: 1px solid #ddd;
            border-radius: 3px;
        }
        input[type="submit"] {
            background-color: #fff;
            color: #000;
            border: 1px solid #ddd;
            padding: 5px 10px;
            cursor: pointer;
            border-radius: 3px;
            display: block;
            margin: 10px auto;
        }
        #result {
            background-color: #fffacd;
            color: #ff0000;
            padding: 10px;
            margin-top: 15px;
            border-radius: 3px;
            text-align: center;
            font-weight: bold;
        }
    </style>
</head>
<body>
    <div class="container">
        <h2>TÍNH NGÀY TRONG THÁNG</h2>
        <form method="post">
            <div class="form-group">
                <label>Tháng/năm:</label>
                <input type="text" name="thang" required value="<?php echo isset($_POST['thang']) ? $_POST['thang'] : '6'; ?>">
                /
                <input type="text" name="nam" required value="<?php echo isset($_POST['nam']) ? $_POST['nam'] : '2007'; ?>">
            </div>
            <input type="submit" value="Tính số ngày" name="submit">
        </form>
        
        <?php
        if (isset($_POST['submit'])) {
            $thang = intval($_POST['thang']);
            $nam = intval($_POST['nam']);
            
            $ngay = 0;
            
            switch($thang) {
                case 1: case 3: case 5: case 7: case 8: case 10: case 12:
                    $ngay = 31;
                    break;
                case 4: case 6: case 9: case 11:
                    $ngay = 30;
                    break;
                case 2:
                    if ($nam % 400 == 0 || ($nam % 4 == 0 && $nam % 100 != 0)) {
                        $ngay = 29;
                    } else {
                        $ngay = 28;
                    }
                    break;
                default:
                    $ngay = "Tháng không hợp lệ";
            }
            
            echo "<div id='result'>Tháng $thang năm $nam có $ngay ngày</div>";
        }
        ?>
    </div>
</body>
</html>