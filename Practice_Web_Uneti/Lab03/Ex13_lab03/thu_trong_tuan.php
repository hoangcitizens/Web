<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <title>Tìm thứ trong tuần</title>
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
            background-color: violet;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0,0,0,0.1);
            width: 400px;
        }
        h2 {
            background-color: #e91e63;
            color: white;
            text-align: center;
            margin-top: 0;
            margin: -20px -20px 20px -20px;
            padding: 10px;
            border-radius: 8px 8px 0 0;
        }
        .form-group {
            margin-bottom: 15px;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }
        label {
            color: white;
        }
        input[type="text"], input[type="number"] {
            width: 50px;
            padding: 5px;
            border: none;
            border-radius: 3px;
        }
        input[type="submit"] {
            background-color: #ff4081;
            color: white;
            border: none;
            padding: 10px 15px;
            cursor: pointer;
            border-radius: 3px;
            width: 100%;
        }
        input[type="submit"]:hover {
            background-color: #f50057;
        }
        #result {
            background-color: #fce4ec;
            color: #e91e63;
            padding: 10px;
            margin-top: 15px;
            border-radius: 3px;
            text-align: center;
            font-weight: bold;
        }
        .error {
            background-color: #ffcdd2;
            color: #c62828;
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
        <h2>TÌM THỨ TRONG TUẦN</h2>
        <form method="post">
            <div class="form-group">
                <label>Ngày/tháng/năm:</label>
                <input type="number" name="day" min="1" max="31" required value="<?php echo isset($_POST['day']) ? $_POST['day'] : ''; ?>">
                <input type="number" name="month" min="1" max="12" required value="<?php echo isset($_POST['month']) ? $_POST['month'] : ''; ?>">
                <input type="number" name="year" min="1" max="9999" required value="<?php echo isset($_POST['year']) ? $_POST['year'] : ''; ?>">
            </div>
            <div class="form-group">
                <input type="submit" value="Tìm thứ trong tuần" name="submit">
            </div>
        </form>
        
        <?php
        if (isset($_POST['submit'])) {
            $ngay = $_POST['day'];
            $thang = $_POST['month'];
            $nam = $_POST['year'];
            
            function isLeapYear($year) {
                return ($year % 4 == 0 && $year % 100 != 0) || ($year % 400 == 0);
            }
            
            $isValid = true;
            $errorMsg = "";

            // Kiểm tra tính hợp lệ của ngày tháng
            switch($thang) {
                case 1: case 3: case 5: case 7: case 8: case 10: case 12:
                    if ($ngay < 1 || $ngay > 31) $isValid = false;
                    break;
                case 4: case 6: case 9: case 11:
                    if ($ngay < 1 || $ngay > 30) $isValid = false;
                    break;
                case 2:
                    if (isLeapYear($nam)) {
                        if ($ngay < 1 || $ngay > 29) $isValid = false;
                    } else {
                        if ($ngay < 1 || $ngay > 28) $isValid = false;
                    }
                    break;
                default:
                    $isValid = false;
            }

            if ($isValid) {
                $jd = cal_to_jd(CAL_GREGORIAN, $thang, $ngay, $nam);
                $day = jddayofweek($jd, 0);
                
                $thu = '';
                switch($day) {
                    case 0: $thu = "Chủ Nhật"; break;
                    case 1: $thu = "Thứ Hai"; break;
                    case 2: $thu = "Thứ Ba"; break;
                    case 3: $thu = "Thứ Tư"; break;
                    case 4: $thu = "Thứ Năm"; break;
                    case 5: $thu = "Thứ Sáu"; break;
                    case 6: $thu = "Thứ Bảy"; break;
                }
                
                echo "<div id='result'>Ngày $ngay tháng $thang năm $nam là ngày $thu</div>";
            } else {
                $errorMsg = "Ngày tháng không hợp lệ";
                if ($thang == 2) {
                    $errorMsg .= isLeapYear($nam) ? " (Tháng 2 năm nhuận chỉ có tối đa 29 ngày)" : " (Tháng 2 năm không nhuận chỉ có tối đa 28 ngày)";
                }
                echo "<div class='error'>$errorMsg</div>";
            }
        }
        ?>
    </div>
</body>
</html>