<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kết quả học tập</title>
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
            width: 150px;
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
        <h1>KẾT QUẢ HỌC TẬP</h1>
        <?php
        $hk1 = isset($_POST['hk1']) ? floatval($_POST['hk1']) : '';
        $hk2 = isset($_POST['hk2']) ? floatval($_POST['hk2']) : '';
        $tb = $kq = $xl = '';

        if(isset($_POST['xemketqua'])) {
            // Tính điểm trung bình
            $tb = round(($hk1 + $hk2 * 2) / 3, 2);
            
            // Xét kết quả
            $kq = ($tb >= 5) ? "Được lên lớp" : "Ở lại lớp";
            
            // Xếp loại học lực
            if ($tb >= 8) {
                $xl = "Giỏi";
            } elseif ($tb > 6.5) {
                $xl = "Khá";
            } elseif ($tb >= 5) {
                $xl = "Trung bình";
            } else {
                $xl = "Yếu";
            }
        }
        ?>
        <form method="POST" action="">
            <label for="hk1">Điểm HK1:</label>
            <input type="number" id="hk1" name="hk1" step="0.1" min="0" max="10" value="<?php echo $hk1; ?>" required><br>
            
            <label for="hk2">Điểm HK2:</label>
            <input type="number" id="hk2" name="hk2" step="0.1" min="0" max="10" value="<?php echo $hk2; ?>" required><br>
            
            <label for="dtb">Điểm trung bình:</label>
            <input type="text" id="dtb" name="dtb" value="<?php echo $tb; ?>" readonly><br>
            
            <label for="kq">Kết quả:</label>
            <input type="text" id="kq" name="kq" value="<?php echo $kq; ?>" readonly><br>
            
            <label for="xl">Xếp loại học lực:</label>
            <input type="text" id="xl" name="xl" value="<?php echo $xl; ?>" readonly><br>
            
            <button type="submit" name="xemketqua">Xem kết quả</button>
        </form>
    </div>
</body>
</html>