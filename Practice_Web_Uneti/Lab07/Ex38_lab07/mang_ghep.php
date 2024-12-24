<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Đếm phần tử, ghép mảng và sắp xếp</title>
    <style>
        body {           
            font-family: Arial, sans-serif;
            margin: 20px;
            align-items: center;
            justify-content: center;
            background-color: #fff;
        }
        .container {
            background-color: #FFB6C1;
            width: 550px;
            margin: 0 auto;
        }
        .header {
            background: #D8458B;
            color: white;
            padding: 8px;
            margin-bottom: 15px;
            font-size: 14px;
        }
        .header h2 {
            text-align: center;
            margin: 0;
            font-weight: normal;
        }
        .form-group {
            margin-bottom: 8px;
        }
        label {
            display: inline-block;
            width: 150px;
            font-size: 14px;
        }
        input[type="text"] {
            width: 250px;
            padding: 3px;
            border: 1px solid #ccc;
        }
        input[readonly] {
            background-color: #FFB6C1;
            border: 1px solid #ccc;
        }
        button {
            background-color: #FFE4E1;
            border: 1px solid #888;
            padding: 3px 20px;
            cursor: pointer;
            margin: 8px 150px;
            font-size: 13px;
        }
        .note {
            color: #D8458B;
            font-size: 12px;
            margin-top: 10px;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="header">
            <h2>ĐẾM PHẦN TỬ, GHÉP MẢNG VÀ SẮP XẾP</h2>
        </div>
        
        <form method="POST">
            <div class="form-group">
                <label>Mảng A:</label>
                <input type="text" name="mangA" value="<?php echo isset($_POST['mangA']) ? $_POST['mangA'] : '6, 3, 7, 9, 1, 2'; ?>">
            </div>
            
            <div class="form-group">
                <label>Mảng B:</label>
                <input type="text" name="mangB" value="<?php echo isset($_POST['mangB']) ? $_POST['mangB'] : '7, 9, 1, 4, 7, 8, 10'; ?>">
            </div>
            
            <div class="form-group">
                <button type="submit" name="thuchien">Thực hiện</button>
            </div>
            
            <?php
            if(isset($_POST['thuchien'])) {
                // Xử lý mảng A
                $mangA = array_map('trim', explode(',', $_POST['mangA']));
                $countA = count($mangA);
                
                // Xử lý mảng B
                $mangB = array_map('trim', explode(',', $_POST['mangB']));
                $countB = count($mangB);
                
                // Tạo mảng C
                $mangC = array_merge($mangA, $mangB);
                
                // Sắp xếp
                $mangC_tang = $mangC;
                $mangC_giam = $mangC;
                sort($mangC_tang, SORT_NUMERIC);
                rsort($mangC_giam, SORT_NUMERIC);
                
                echo '<div class="form-group">';
                echo '<label>Số phần tử mảng A:</label>';
                echo '<input type="text" readonly value="' . $countA . '">';
                echo '</div>';
                
                echo '<div class="form-group">';
                echo '<label>Số phần tử mảng B:</label>';
                echo '<input type="text" readonly value="' . $countB . '">';
                echo '</div>';
                
                echo '<div class="form-group">';
                echo '<label>Mảng C:</label>';
                echo '<input type="text" readonly value="' . implode(', ', $mangC) . '">';
                echo '</div>';
                
                echo '<div class="form-group">';
                echo '<label>Mảng C tăng dần:</label>';
                echo '<input type="text" readonly value="' . implode(', ', $mangC_tang) . '">';
                echo '</div>';
                
                echo '<div class="form-group">';
                echo '<label>Mảng C giảm dần:</label>';
                echo '<input type="text" readonly value="' . implode(', ', $mangC_giam) . '">';
                echo '</div>';
            }
            ?>
            
            <div class="note">
                (Ghi chú: Các phần tử trong mảng sẽ có cách nhau bằng dấu ",")
            </div>
        </form>
    </div>
</body>
</html>