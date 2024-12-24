<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ngày Sinh</title>
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
            background-color: #ffc0cb;
            padding: 20px;
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0,0,0,0.1);
            width: 500px;
        }
        h1 {                      
            margin-top: 0;
            background-color: #ff1493;
            text-align: center;
            color: white;
            margin-top: 0;
            padding: 10px;
            margin: -20px -20px 20px -20px;
        }
        label {
            display: inline-block;
            width: 180px;
            margin-bottom: 10px;
        }       
        input[type="number"] {
            width: 50px;
            padding: 5px;
            margin-right: 5px;
        }
        input[type="submit"] {
            background-color: #ff1493;
            color: white;
            border: none;
            padding: 10px 20px;
            cursor: pointer;
            display: block;
            margin: 20px auto 0;
        }
        #result {
            margin-top: 20px;
            text-align: center;
            font-weight: bold;
            background-color: bisque;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>NGÀY SINH</h1>
        <form method="post">
            <label for="ngay">Ngày/tháng/năm sinh:</label>
            <input type="number" id="ngay" name="ngay" min="1" max="31" required>/
            <input type="number" id="thang" name="thang" min="1" max="12" required>/
            <input type="number" id="nam" name="nam" min="1900" max="<?php echo date('Y'); ?>" required><br>
            
            <input type="submit" name="submit" value="Thông báo">
        </form>

        <div id="result">
            <?php
            if (isset($_POST['submit'])) {
                $ngay = intval($_POST['ngay']);
                $thang = intval($_POST['thang']);
                $nam = intval($_POST['nam']);

                $ngay_ht = date('d');
                $thang_ht = date('m');
                $nam_ht = date('Y');

                $sinh_nhat = mktime(0, 0, 0, $thang, $ngay, $nam_ht);
                $hien_tai = mktime(0, 0, 0, $thang_ht, $ngay_ht, $nam_ht);

                $diff_days = round(($sinh_nhat - $hien_tai) / 86400);

                $tuoi = $nam_ht - $nam;
                $chuoi = "Năm nay bạn $tuoi tuổi<br>";

                if ($diff_days > 0) {
                    $chuoi .= "Còn $diff_days ngày nữa là đến ngày sinh nhật của bạn.";
                } elseif ($diff_days < 0) {
                    $chuoi .= "Ngày sinh nhật của bạn đã qua " . abs($diff_days) . " ngày.";
                } else {
                    $chuoi .= "Chúc mừng sinh nhật!";
                }

                echo $chuoi;
            }
            ?>
        </div>
    </div>
</body>
</html>