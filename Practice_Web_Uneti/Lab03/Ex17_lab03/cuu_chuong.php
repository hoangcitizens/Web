<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bảng Cửu Chương</title>
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
            background-color: #008080;
            padding: 20px;
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0,0,0,0.1);
        }
        h1 {
            color: #ddd;
            text-align: center;
        }
        label {
            display: block;
            margin-bottom: 5px;
        }
        input[type="number"], input[type="submit"] {
            width: 100%;
            padding: 8px;
            margin-bottom: 10px;
            border: 1px solid #ddd;
            border-radius: 4px;
        }
        input[type="submit"] {
            background-color: #008080;
            color: white;
            cursor: pointer;
        }
        input[type="submit"]:hover {
            background-color: #006666;
        }
        #result {
            margin-top: 20px;
            padding: 10px;
            background-color: #e6f3f3;
            border-radius: 4px;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Bảng Cửu Chương</h1>
        <form method="post">
            <label for="cuu_chuong">Cửu chương:</label>
            <input type="number" id="cuu_chuong" name="cuu_chuong" required>
            <input type="submit" value="Thực hiện">
        </form>

        <div id="result">
            <?php
            if ($_SERVER["REQUEST_METHOD"] == "POST") {
                if (isset($_POST['cuu_chuong']) && $_POST['cuu_chuong'] != "") {
                    $cuu_chuong = intval($_POST['cuu_chuong']);
                    echo "<h2>Kết Quả:</h2>";
                    switch (true) {
                        case ($cuu_chuong >= 1 && $cuu_chuong <= 10):
                            for ($i = 1; $i <= 10; $i++) {
                                echo "$cuu_chuong x $i = " . ($cuu_chuong * $i) . "<br>";
                            }
                            break;
                        default:
                            echo "Vui lòng nhập số từ 1 đến 10.";
                    }
                } else {
                    echo "Vui lòng nhập đủ thông tin.";
                }
            }
            ?>
        </div>
    </div>
</body>
</html>