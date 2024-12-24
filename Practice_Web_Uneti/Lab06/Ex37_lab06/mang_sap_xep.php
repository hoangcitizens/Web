<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <title>Sắp Xếp Mảng</title>
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
            color: black;
        }
        label.result-label {
            color: #D2042D;
        }
        input[type="text"] {
            width: 100%;
            padding: 8px;
            border: 1px solid #ddd;
            border-radius: 4px;
            box-sizing: border-box;
        }
        input[readonly] {
            background-color: #E0FFFF;
        }
        button {
            background-color: white;
            border: 1px solid #ddd;
            padding: 10px 20px;
            cursor: pointer;
            border-radius: 4px;
            margin-top: 10px;
            width: 100%;
        }
        button:hover {
            background-color: #f0f0f0;
        }
        .note {
            color: #D2042D;
            font-size: 0.9em;
            margin-top: 10px;
            float: right;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>SẮP XẾP MẢNG</h1>
        <form method="post">
            <div class="form-group">
                <label>Nhập mảng:</label>
                <input type="text" name="input_array" value="<?php echo isset($_POST['input_array']) ? htmlspecialchars($_POST['input_array']) : '3, 1, 7, 4, 8, 5, 9, 1, 2, 6'; ?>" required>
                <span class="note">(*)</span>
            </div>
            
            <div class="form-group">
                <button type="submit" name="submit">Sắp xếp tăng/giảm</button>
            </div>

            <?php
            function hoan_vi(&$a, &$b) {
                $temp = $a;
                $a = $b;
                $b = $temp;
            }

            function sap_tang($mang) {
                $n = count($mang);
                for($i = 0; $i < $n - 1; $i++) {
                    for($j = $i + 1; $j < $n; $j++) {
                        if($mang[$i] > $mang[$j]) {
                            hoan_vi($mang[$i], $mang[$j]);
                        }
                    }
                }
                return $mang;
            }

            function sap_giam($mang) {
                $n = count($mang);
                for($i = 0; $i < $n - 1; $i++) {
                    for($j = $i + 1; $j < $n; $j++) {
                        if($mang[$i] < $mang[$j]) {
                            hoan_vi($mang[$i], $mang[$j]);
                        }
                    }
                }
                return $mang;
            }

            if(isset($_POST['submit'])) {
                // Get the input string and clean it
                $input_string = trim($_POST['input_array']);
                // Convert string to array
                $mang = array_map('trim', explode(',', $input_string));
                
                echo '<div class="form-group">';
                echo '<label class="result-label">Sau khi sắp xếp:</label>';
                echo '</div>';
                
                // Sort and display ascending array
                $mang_tang = sap_tang($mang);
                echo '<div class="form-group">';
                echo '<label>Tăng dần:</label>';
                echo '<input type="text" value="' . implode(', ', $mang_tang) . '" readonly>';
                echo '</div>';
                
                // Sort and display descending array
                $mang_giam = sap_giam($mang);
                echo '<div class="form-group">';
                echo '<label>Giảm dần:</label>';
                echo '<input type="text" value="' . implode(', ', $mang_giam) . '" readonly>';
                echo '</div>';
            }
            ?>
            
            <div class="note">
                (*) Các số được nhập cách nhau bằng dấu ","
            </div>
        </form>
    </div>
</body>
</html>