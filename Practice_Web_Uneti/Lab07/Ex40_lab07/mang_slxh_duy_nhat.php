<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Đếm số lần xuất hiện và tạo mảng duy nhất</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #FFE4B5;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
        }
        .container {
            background-color: #FFDAB9;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0,0,0,0.1);
            width: 500px;
        }
        h2 {
            color: #8B4513;
            text-align: center;
            margin-top: 0;
            background-color: #FFD700;
            padding: 10px;
            margin: -20px -20px 20px -20px;
            border-radius: 8px 8px 0 0;
        }
        .form-group {
            margin-bottom: 15px;
        }
        label {
            display: block;
            margin-bottom: 5px;
            color: #8B4513;
        }
        input[type="text"] {
            width: 100%;
            padding: 8px;
            border: 1px solid #DEB887;
            border-radius: 4px;
            box-sizing: border-box;
        }
        input[readonly] {
            background-color: #FFB6C1;
        }
        button {
            width: auto;
            padding: 8px 20px;
            background-color: #FFB6C1;
            color: black;
            border: 1px solid #DEB887;
            border-radius: 4px;
            cursor: pointer;
            margin: 10px auto;
            display: block;
        }
        .note {
            color: #8B4513;
            font-size: 12px;
            text-align: center;
            margin-top: 15px;
        }
    </style>
</head>
<body>
    <div class="container">
        <h2>ĐẾM SỐ LẦN XUẤT HIỆN VÀ TẠO MẢNG DUY NHẤT</h2>
        
        <form method="POST">
            <div class="form-group">
                <label>Mảng:</label>
                <input type="text" name="mang" value="<?php echo isset($_POST['mang']) ? $_POST['mang'] : '2, 3, 3, 3, 4, 4, 8, 9, 1, 0, 1, 1, 3'; ?>">
            </div>
            
            <?php
            if(isset($_POST['thuchien'])) {
                $mang = array_map('trim', explode(',', $_POST['mang']));
                
                // Đếm số lần xuất hiện
                $count_values = array_count_values($mang);
                $slxh = [];
                foreach($count_values as $value => $count) {
                    $slxh[] = $value . ":" . $count;
                }
                
                // Tạo mảng duy nhất
                $unique_array = array_unique($mang);
                
                echo '<div class="form-group">';
                echo '<label>Số lần xuất hiện:</label>';
                echo '<input type="text" readonly value="' . implode(' ', $slxh) . '">';
                echo '</div>';
                
                echo '<div class="form-group">';
                echo '<label>Mảng duy nhất:</label>';
                echo '<input type="text" readonly value="' . implode(', ', $unique_array) . '">';
                echo '</div>';
            }
            ?>
            
            <button type="submit" name="thuchien">Thực hiện</button>
            
            <div class="note">
                (Ghi chú: Các phần tử trong mảng cách nhau bằng dấu ",")</div>
        </form>
    </div>
</body>
</html>