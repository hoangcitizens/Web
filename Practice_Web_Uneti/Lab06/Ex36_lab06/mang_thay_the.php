<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <title>Thay Thế</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 20px;
            background-color: #f0f0f0;
        }
        .container {
            max-width: 600px;
            margin: 0 auto;
            background-color: white;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0,0,0,0.1);
        }
        h1 {
            background-color: #800080;
            color: white;
            padding: 10px;
            margin-top: 0;
            text-align: center;
            border-radius: 4px;
        }
        .form-group {
            margin-bottom: 15px;
        }
        label {
            display: block;
            margin-bottom: 5px;
        }
        input[type="text"] {
            width: 100%;
            padding: 8px;
            border: 1px solid #ddd;
            border-radius: 4px;
            box-sizing: border-box;
        }
        input[readonly] {
            background-color: #ffebef;
        }
        button {
            background-color: #ffd700;
            border: none;
            padding: 10px 20px;
            cursor: pointer;
            border-radius: 4px;
            margin-top: 10px;
        }
        button:hover {
            background-color: #ffed4a;
        }
        .note {
            color: red;
            font-size: 0.9em;
            margin-top: 10px;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>THAY THẾ</h1>
        <form method="post">
            <div class="form-group">
                <label>Nhập các phần tử:</label>
                <input type="text" name="input_array" value="<?php echo isset($_POST['input_array']) ? htmlspecialchars($_POST['input_array']) : '2, 4, 6, 8, 10, 2, 3, 4, 12, 17, 5'; ?>" required>
            </div>
            
            <div class="form-group">
                <label>Giá trị cần thay thế:</label>
                <input type="text" name="old_value" value="<?php echo isset($_POST['old_value']) ? htmlspecialchars($_POST['old_value']) : ''; ?>" required>
            </div>
            
            <div class="form-group">
                <label>Giá trị thay thế:</label>
                <input type="text" name="new_value" value="<?php echo isset($_POST['new_value']) ? htmlspecialchars($_POST['new_value']) : ''; ?>" required>
            </div>
            
            <div class="form-group">
                <button type="submit" name="submit">Thay thế</button>
            </div>

            <?php
            function thay_the($mang, $cu, $moi) {
                $mang_moi = $mang;
                for($i = 0; $i < count($mang_moi); $i++) {
                    if($mang_moi[$i] == $cu) {
                        $mang_moi[$i] = $moi;
                    }
                }
                return $mang_moi;
            }

            if(isset($_POST['submit'])) {
                // Get the input string and clean it
                $input_string = trim($_POST['input_array']);
                // Convert string to array
                $mang = array_map('trim', explode(',', $input_string));
                
                // Get old and new values
                $cu = trim($_POST['old_value']);
                $moi = trim($_POST['new_value']);
                
                // Display the original array
                echo '<div class="form-group">';
                echo '<label>Mảng cũ:</label>';
                echo '<input type="text" value="' . implode(', ', $mang) . '" readonly>';
                echo '</div>';
                
                // Replace and display new array
                $mang_moi = thay_the($mang, $cu, $moi);
                echo '<div class="form-group">';
                echo '<label>Mảng sau khi thay thế:</label>';
                echo '<input type="text" value="' . implode(', ', $mang_moi) . '" readonly>';
                echo '</div>';
            }
            ?>
            
            <div class="note">
                (Ghi chú: Các phần tử trong mảng sẽ cách nhau bằng dấu ",")
            </div>
        </form>
    </div>
</body>
</html>