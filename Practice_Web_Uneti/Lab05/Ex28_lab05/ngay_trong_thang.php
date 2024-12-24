<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tính Ngày Trong Tháng</title>
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
            background-color: #ffb3ba;
            padding: 20px;
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0,0,0,0.1);
        }
        h1 {
            background-color: #ff6b6b;
            text-align: center;
            color: black;
            margin-top: 0;
            padding: 10px;
            margin: -20px -20px 20px -20px;
            
        }
        label {
            display: inline-block;
            width: 100px;
            margin-bottom: 10px;
        }
        input[type="text"], input[type="number"] {
            width: 100px;
            padding: 5px;
            margin-bottom: 10px;
        }
        input[type="submit"] {
            background-color: #ff6b6b;
            color: white;
            border: none;
            padding: 10px 20px;
            cursor: pointer;
            display: block;
            margin: 20px auto 0;
        }
        #result {
            margin-top: 20px;
            font-weight: bold;
            text-align: center;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>TÍNH NGÀY TRONG THÁNG</h1>
        <form method="post">
            <label for="thang">Tháng/năm:</label>
            <input type="number" id="thang" name="thang" min="1" max="12" required>
            /
            <input type="number" id="nam" name="nam" min="1" max="9999" required><br>
            
            <input type="submit" name="submit" value="Tính số ngày">
        </form>

        <div id="result">
            <?php
            function nam_nhuan($nam) {
                return (($nam % 4 == 0 && $nam % 100 != 0) || ($nam % 400 == 0)) ? 1 : 0;
            }

            if (isset($_POST['submit'])) {
                $thang = intval($_POST['thang']);
                $nam = intval($_POST['nam']);

                if ($thang >= 1 && $thang <= 12 && $nam >= 1) {
                    $d = cal_days_in_month(CAL_GREGORIAN, $thang, $nam);
                    $nam_nhuan = nam_nhuan($nam);

                    if ($nam_nhuan) {
                        echo "Năm $nam là năm Nhuận và Tháng $thang năm $nam có $d ngày";
                    } else {
                        echo "Tháng $thang năm $nam có $d ngày";
                    }
                } else {
                    echo "Vui lòng nhập tháng từ 1-12 và năm hợp lệ.";
                }
            }
            ?>
        </div>
    </div>
</body>
</html>