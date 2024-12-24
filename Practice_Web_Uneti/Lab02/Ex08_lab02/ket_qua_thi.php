<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kết quả thi đại học</title>
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
            background-color: #ff69b4;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0,0,0,0.1);
        }
        h1 {
            color: white;
            text-align: center;
            margin-top: 0;
        }
        label {
            display: inline-block;
            width: 100px;
            margin-bottom: 10px;
            color: white;
        }
        input {
            width: 200px;
            padding: 5px;
            margin-bottom: 10px;
        }
        input[readonly] {
            background-color: #ffd700;
        }
        button {
            display: block;
            width: 100%;
            padding: 10px;
            background-color: #4CAF50;
            color: white;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }
        button:hover {
            background-color: #45a049;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>KẾT QUẢ THI ĐẠI HỌC</h1>
        <?php
        $toan = isset($_POST['toan']) ? floatval($_POST['toan']) : '';
        $ly = isset($_POST['ly']) ? floatval($_POST['ly']) : '';
        $hoa = isset($_POST['hoa']) ? floatval($_POST['hoa']) : '';
        $diemchuan = isset($_POST['diemchuan']) ? floatval($_POST['diemchuan']) : '';
        $tongdiem = $ketqua = '';

        if(isset($_POST['xemketqua'])) {
            // Tính tổng điểm
            $tongdiem = $toan + $ly + $hoa;
            
            // Xét kết quả thi
            if ($toan > 0 && $ly > 0 && $hoa > 0 && $tongdiem >= $diemchuan) {
                $ketqua = "Đậu";
            } else {
                $ketqua = "Rớt";
            }
        }
        ?>
        <form method="POST" action="">
            <label for="toan">Toán:</label>
            <input type="number" id="toan" name="toan" step="0.1" min="0" max="10" value="<?php echo $toan; ?>" required><br>
            
            <label for="ly">Lý:</label>
            <input type="number" id="ly" name="ly" step="0.1" min="0" max="10" value="<?php echo $ly; ?>" required><br>
            
            <label for="hoa">Hóa:</label>
            <input type="number" id="hoa" name="hoa" step="0.1" min="0" max="10" value="<?php echo $hoa; ?>" required><br>
            
            <label for="diemchuan">Điểm chuẩn:</label>
            <input type="number" id="diemchuan" name="diemchuan" step="0.1" min="0" value="<?php echo $diemchuan; ?>" required><br>
            
            <label for="tongdiem">Tổng điểm:</label>
            <input type="text" id="tongdiem" name="tongdiem" value="<?php echo $tongdiem; ?>" readonly><br>
            
            <label for="ketqua">Kết quả thi:</label>
            <input type="text" id="ketqua" name="ketqua" value="<?php echo $ketqua; ?>" readonly><br>
            
            <button type="submit" name="xemketqua">Xem kết quả</button>
        </form>
    </div>
</body>
</html>