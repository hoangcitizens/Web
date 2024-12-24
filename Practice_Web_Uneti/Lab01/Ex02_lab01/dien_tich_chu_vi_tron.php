<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Diện tích và Chu vi Hình tròn</title>
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
            background-color: #ffefd5;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0,0,0,0.1);
            width: 300px;
        }
        h2 {
            color: #8b4513;
            text-align: center;
            margin-top: 0;
        }
        label {
            display: inline-block;
            width: 100px;
            margin-bottom: 10px;
        }
        input[type="number"], input[type="text"] {
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
        .result {
            background-color: #ffcccb;
            margin-top: 5px;
        }
    </style>
</head>
<body>
    <div class="container">
        <h2>DIỆN TÍCH và CHU VI HÌNH TRÒN</h2>
        <form method="post" action="">
            <label for="radius">Bán kính:</label>
            <input type="number" id="radius" name="radius" required step="any" value="<?php echo isset($_POST['radius']) ? $_POST['radius'] : ''; ?>"><br>
            
            <label for="area">Diện tích:</label>
            <input type="text" id="area" name="area" readonly class="result"><br>
            
            <label for="perimeter">Chu vi:</label>
            <input type="text" id="perimeter" name="perimeter" readonly class="result"><br>
            
            <input type="submit" name="calculate" value="Tính">
        </form>
        
        <?php
        define('PI', 3.14);
        
        if (isset($_POST['calculate'])) {
            $radius = floatval($_POST['radius']);
            $area = PI * pow($radius, 2);
            $perimeter = 2 * PI * $radius;
            
            echo "<script>
                document.getElementById('area').value = '" . number_format($area, 2) . "';
                document.getElementById('perimeter').value = '" . number_format($perimeter, 2) . "';
            </script>";
        }
        ?>
    </div>
</body>
</html>