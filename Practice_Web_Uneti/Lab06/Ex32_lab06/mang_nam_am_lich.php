<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tính Năm Âm Lịch</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f0f8ff;
            margin: 0;
            padding: 20px;
        }
        .container {
            background-color: white;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0,0,0,0.1);
            max-width: 500px;
            margin: 0 auto;
        }
        h2 {
            background-color: #4169e1;
            color: white;
            text-align: center;
            margin-top: 0;
            padding: 10px;
            margin: -20px -20px 20px -20px;
        }
        .form-row {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 15px;
        }
        .form-group {
            flex: 2;
        }
        label {
            display: block;
            color: #4169e1;
            margin-bottom: 5px;
        }
        input[type="number"], input[type="text"] {
            width: 100%;
            padding: 8px;
            border: 1px solid #ccc;
            border-radius: 4px;
        }
        input[type="text"] {
            background-color: #f0f0f0;
        }
        .button-container {
            flex: 1;
            display: flex;
            justify-content: center;
            align-items: center;
        }
        input[type="submit"] {
            background-color: #4169e1;
            color: white;
            border: none;
            padding: 10px 15px;
            border-radius: 4px;
            cursor: pointer;
        }
        input[type="submit"]:hover {
            background-color: #1e90ff;
        }
        .result {
            margin-top: 20px;
            text-align: center;
        }
        img {
            max-width: 100px;
            margin-top: 10px;
        }
    </style>
</head>
<body>
    <div class="container">
        <h2>TÍNH NĂM ÂM LỊCH</h2>
        <form method="post">
            <div class="form-row">
                <div class="form-group">
                    <label for="year">Năm dương lịch:</label>
                    <input type="number" id="year" name="year" required>
                </div>
                <div class="button-container">
                    <input type="submit" value="=>" name="submit">
                </div>
                <div class="form-group">
                    <label for="lunar_year">Năm âm lịch:</label>
                    <input type="text" id="lunar_year" name="lunar_year" readonly>
                </div>
            </div>
        </form>

        <div class="result">
            <?php
            if (isset($_POST['submit'])) {
                $nam = intval($_POST['year']);
                
                $mang_can = array("Quý", "Giáp", "Ất", "Bính", "Đinh", "Mậu", "Kỷ", "Canh", "Tân", "Nhâm");
                $mang_chi = array("Hợi", "Tý", "Sửu", "Dần", "Mão", "Thìn", "Tỵ", "Ngọ", "Mùi", "Thân", "Dậu", "Tuất");
                $mang_hinh = array("hoi.jpg", "ty.jpg", "suu.jpg", "dan.jpg", "mao.jpg", "thin.jpg", "ran.jpg", "ngo.jpg", "mui.jpg", "than.jpg", "dau.jpg", "tuat.jpg");

                $nam = $nam - 3;
                $can = $nam % 10;
                $chi = $nam % 12;
                
                $nam_al = $mang_can[$can] . " " . $mang_chi[$chi];
                $hinh = $mang_hinh[$chi];
                
                echo "<script>document.getElementById('lunar_year').value = '$nam_al';</script>";
                echo "<img src='$hinh' alt='$nam_al'>";
            }
            ?>
        </div>
    </div>
</body>
</html>