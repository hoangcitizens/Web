<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <title>Đọc số</title>
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
            background-color: #ffffff;
            padding: 30px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0,0,0,0.1);
            width: 400px;
        }
        h2 {
            color: white;
            background-color: #4a90e2;
            padding: 15px;
            margin: -30px -30px 20px -30px;
            border-radius: 8px 8px 0 0;
            text-align: center;
        }
        label {
            display: inline-block;
            width: 140px;
            margin-bottom: 15px;
            font-weight: bold;
        }
        input[type="text"], input[type="number"] {
            width: 200px;
            padding: 8px;
            margin-bottom: 15px;
            border: 1px solid #ddd;
            border-radius: 4px;
        }
        input[type="submit"] {
            background-color: #4a90e2;
            color: white;
            border: none;
            padding: 12px 24px;
            cursor: pointer;
            border-radius: 4px;
            font-size: 16px;
            transition: background-color 0.3s;
        }
        input[type="submit"]:hover {
            background-color: #357ae8;
        }
        .form-group {
            margin-bottom: 15px;
        }
    </style>
</head>
<body>
    <div class="container">
        <h2>ĐỌC SỐ</h2>
        <form method="post">
            <div class="form-group">
                <label for="number">Nhập số (0->9):</label>
                <input type="number" id="number" name="number" min="0" max="9" required value="<?php echo isset($_POST['number']) ? htmlspecialchars($_POST['number']) : ''; ?>">
            </div>
            <div class="form-group">
                <input type="submit" value="=>" name="submit">
            </div>
            <div class="form-group">
                <label for="text">Bằng chữ:</label>
                <input type="text" id="text" name="text" readonly>
            </div>
        </form>

        <?php
        if (isset($_POST['submit'])) {
            $number = $_POST["number"];
            $chu = "";

            switch ($number) {
                case 0:
                    $chu = "Không";
                    break;
                case 1:
                    $chu = "Một";
                    break;
                case 2:
                    $chu = "Hai";
                    break;
                case 3:
                    $chu = "Ba";
                    break;
                case 4:
                    $chu = "Bốn";
                    break;
                case 5:
                    $chu = "Năm";
                    break;
                case 6:
                    $chu = "Sáu";
                    break;
                case 7:
                    $chu = "Bảy";
                    break;
                case 8:
                    $chu = "Tám";
                    break;
                case 9:
                    $chu = "Chín";
                    break;
                default:
                    $chu = "Số không hợp lệ";
            }

            echo "<script>document.getElementById('text').value = '$chu';</script>";
        }
        ?>
    </div>
</body>
</html>