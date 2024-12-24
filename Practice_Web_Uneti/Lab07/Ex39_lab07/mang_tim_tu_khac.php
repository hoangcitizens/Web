<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Tìm phần tử khác nhau giữa hai mảng</title>
    <style>
        body {         
            font-family: Arial, sans-serif;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 20px;
        }
        .container {
            width: 600px;
            margin: 0 auto;
        }
        .header {
            background: #20B2AA;
            color: white;
            padding: 8px;
            margin-bottom: 15px;
        }
        .header h2 {
            text-align: center;
            margin: 0;
            font-weight: normal;
        }        
        .form-group {
            margin-bottom: 10px;
        }
        label {
            display: inline-block;
            width: 180px;
            font-size: 14px;
        }
        input[type="text"] {
            width: 400px;
            padding: 3px;
            border: 1px solid #ccc;
        }
        input[readonly] {
            background-color: #FFFFCC;
        }
        button {
            background-color: #20B2AA;
            color: white;
            border: none;
            padding: 5px 20px;
            cursor: pointer;
            margin: 10px 180px;
        }
        .note {
            color: #666;
            font-size: 12px;
            margin-top: 10px;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="header">
            <h2>TÌM PHẦN TỬ KHÁC NHAU GIỮA HAI MẢNG</h2>
        </div>
        
        <form method="POST">
            <div class="form-group">
                <label>Mảng chuỗi thứ nhất:</label>
                <input type="text" name="mang1" value="<?php echo isset($_POST['mang1']) ? $_POST['mang1'] : 'tùng,cúc,trúc,thiên tuệ,kim thủy tùng'; ?>">
            </div>
            
            <div class="form-group">
                <label>Mảng chuỗi thứ hai:</label>
                <input type="text" name="mang2" value="<?php echo isset($_POST['mang2']) ? $_POST['mang2'] : 'mai,lan,cúc,trúc,dạ lý hương'; ?>">
            </div>
            
            <div class="form-group">
                <button type="submit" name="phantich">Phân tích hai mảng</button>
            </div>
            
            <?php
            if(isset($_POST['phantich'])) {
                // Tách chuỗi thành mảng
                $mang1 = array_map('trim', explode(',', $_POST['mang1']));
                $mang2 = array_map('trim', explode(',', $_POST['mang2']));
                
                // Tìm phần tử chỉ có trong mảng 1
                $chi_co_mang1 = array_diff($mang1, $mang2);
                
                // Tìm phần tử chỉ có trong mảng 2
                $chi_co_mang2 = array_diff($mang2, $mang1);
                
                echo '<div class="form-group">';
                echo '<label>Phần tử chỉ có trong mảng thứ nhất:</label>';
                echo '<input type="text" readonly value="' . implode(', ', $chi_co_mang1) . '">';
                echo '</div>';
                
                echo '<div class="form-group">';
                echo '<label>Phần tử chỉ có trong mảng thứ hai:</label>';
                echo '<input type="text" readonly value="' . implode(', ', $chi_co_mang2) . '">';
                echo '</div>';
            }
            ?>
            
            <div class="note">
                (Ghi chú: Các phần tử trong mảng cách nhau bằng dấu ",")</div>
        </form>
    </div>
</body>
</html>