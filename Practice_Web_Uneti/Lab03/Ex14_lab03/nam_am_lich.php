<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <title>Tính năm âm lịch</title>
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
            background-color: #1e88e5;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0,0,0,0.1);
            width: 400px;
        }
        h2 {
            background-color: blue;
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
        input[type="number"], input[type="text"] {
            width: 150px;
            padding: 5px;
            border: none;
            border-radius: 3px;
        }
        input[type="submit"] {
            background-color: #ffc107;
            color: #000;
            border: none;
            padding: 5px 10px;
            cursor: pointer;
            border-radius: 3px;
        }
        input[type="submit"]:hover {
            background-color: #ffa000;
        }
        #result {
            background-color: #bbdefb;
            color: #1e88e5;
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
        <h2>TÍNH NĂM ÂM LỊCH</h2>
        <form method="post">
            <div class="form-group">
                <label>Năm dương lịch:</label>
                <input type="number" name="nam_duong" min=1 max=2500 required value="<?php echo isset($_POST['nam_duong']) ? $_POST['nam_duong'] : ''; ?>">
            </div>
            <div class="form-group">
                <input type="submit" value="=>" name="submit">
            </div>
            <div class="form-group">
                <label>Năm âm lịch:</label>
                <input type="text" name="nam_am" readonly id="result">
            </div>
        </form>
        
        <?php
        if (isset($_POST['submit'])) {
            $nam = $_POST['nam_duong'];
            
            $so_du_can = ($nam + 6) % 10;
            $so_du_chi = ($nam + 8) % 12;
            
            $can = '';
            switch($so_du_can) {
                case 0: $can = "Giáp"; break;
                case 1: $can = "Ất"; break;
                case 2: $can = "Bính"; break;
                case 3: $can = "Đinh"; break;
                case 4: $can = "Mậu"; break;
                case 5: $can = "Kỷ"; break;
                case 6: $can = "Canh"; break;
                case 7: $can = "Tân"; break;
                case 8: $can = "Nhâm"; break;
                case 9: $can = "Quý"; break;
            }
            
            $chi = '';
            switch($so_du_chi) {
                case 0: $chi = "Tý"; break;
                case 1: $chi = "Sửu"; break;
                case 2: $chi = "Dần"; break;
                case 3: $chi = "Mão"; break;
                case 4: $chi = "Thìn"; break;
                case 5: $chi = "Tỵ"; break;
                case 6: $chi = "Ngọ"; break;
                case 7: $chi = "Mùi"; break;
                case 8: $chi = "Thân"; break;
                case 9: $chi = "Dậu"; break;
                case 10: $chi = "Tuất"; break;
                case 11: $chi = "Hợi"; break;
            }
            
            $nam_al = $can . " " . $chi;
            
            echo "<script>document.getElementById('result').value = '$nam_al';</script>";
        }
        ?>
    </div>
</body>
</html>