<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <title>Tìm Kiếm</title>
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
            background-color: #20B2AA;
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
            background-color: #f8f8f8;
        }
        button {
            background-color: #87CEEB;
            border: none;
            padding: 10px 20px;
            cursor: pointer;
            border-radius: 4px;
            color: black;
        }
        button:hover {
            background-color: #5F9EA0;
        }
        .note {
            color: #666;
            font-size: 0.9em;
            margin-top: 10px;
        }
        .result {
            background-color: #E0FFFF;
            padding: 8px;
            border-radius: 4px;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>TÌM KIẾM</h1>
        <form method="post">
            <div class="form-group">
                <label>Nhập mảng:</label>
                <input type="text" name="input_array" value="<?php echo isset($_POST['input_array']) ? htmlspecialchars($_POST['input_array']) : '1, 3, 5, 7, 9, 10, 11, 12, 14, 5, 6'; ?>" required>
            </div>
            
            <div class="form-group">
                <label>Nhập số cần tìm:</label>
                <input type="text" name="search_value" value="<?php echo isset($_POST['search_value']) ? htmlspecialchars($_POST['search_value']) : ''; ?>" required>
            </div>
            
            <div class="form-group">
                <button type="submit" name="submit">Tìm kiếm</button>
            </div>

            <?php
            function tim_kiem($mang, $gia_tri) {
                for($i = 0; $i < count($mang); $i++) {
                    if($mang[$i] == $gia_tri) {
                        return $i;
                    }
                }
                return -1;
            }

            if(isset($_POST['submit'])) {
                // Get the input string and clean it
                $input_string = trim($_POST['input_array']);
                // Convert string to array
                $mang = array_map('trim', explode(',', $input_string));
                
                // Get search value
                $gia_tri = trim($_POST['search_value']);
                
                // Display the array
                echo '<div class="form-group">';
                echo '<label>Mảng:</label>';
                echo '<input type="text" value="' . implode(', ', $mang) . '" readonly>';
                echo '</div>';
                
                // Search and display result
                $ket_qua = tim_kiem($mang, $gia_tri);
                echo '<div class="form-group">';
                echo '<label>Kết quả tìm kiếm:</label>';
                echo '<div class="result">';
                if($ket_qua != -1) {
                    echo 'Tìm thấy ' . $gia_tri . ' tại vị trí thứ ' . ($ket_qua + 1) . ' của mảng';
                } else {
                    echo 'Không tìm thấy ' . $gia_tri . ' trong mảng';
                }
                echo '</div>';
                echo '</div>';
            }
            ?>
            
            <div class="note">
                (Các phần tử trong mảng sẽ cách nhau bằng dấu ",")
            </div>
        </form>
    </div>
</body>
</html>