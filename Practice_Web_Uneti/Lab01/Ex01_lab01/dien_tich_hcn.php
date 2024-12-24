<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tính Diện Tích Hình Chữ Nhật</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f0f0f0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
        }
        .container {
            background-color: red;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0,0,0,0.1);
        }
        h2 {
            color: yellow;
            text-align: center;
            margin-top: 0;
        }
        label {
            display: inline-block;
            width: 100px;
            margin-bottom: 10px;
        }
        input[type="number"] {
            width: 150px;
            padding: 5px;
            margin-bottom: 10px;
        }
        input[type="submit"] {
            background-color: #8b4513;
            color: white;
            border: none;
            padding: 10px 20px;
            cursor: pointer;
            border-radius: 4px;
            display: block;
            margin: 10px auto;
        }
        input[type="submit"]:hover {
            background-color: #a0522d;
        }
    </style>
</head>
<body>
    <div class="container">
        <h2>DIỆN TÍCH HÌNH CHỮ NHẬT</h2>
        <form method="post" action="">
            <label for="length">Chiều dài:</label>
            <input type="number" id="length" name="length" required value="<?php echo isset($_POST['length']) ? $_POST['length'] : ''; ?>"><br>
            
            <label for="width">Chiều rộng:</label>
            <input type="number" id="width" name="width" required value="<?php echo isset($_POST['width']) ? $_POST['width'] : ''; ?>"><br>
            
            <label for="area">Diện tích:</label>
            <input type="number" id="area" name="area" readonly><br> <!-- readonly : chỉ để xem không được sửa -->
            
            <input type="submit" value="Tính">
        </form>
        <?php
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $length = $_POST["length"];
            $width = $_POST["width"];
            $area = $length * $width;
            echo "<script>document.getElementById('area').value = $area;</script>";
        }
        ?>
    </div>
</body>
</html>