<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <title>Tìm Số Lớn Hơn</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f0f0f0;
        }
        .container {
            width: 300px;
            margin: 50px auto;
            background-color: #fff;
            padding: 20px;
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0,0,0,0.1);
        }
        h2 {
            text-align: center;
            color: #333;
            background-color: #ffd700;
            padding: 10px;
            margin-top: 0;
        }
        input[type="number"] {
            width: 100%;
            padding: 5px;
            margin-bottom: 10px;
        }
        input[type="submit"] {
            width: 100%;
            padding: 10px;
            background-color: #ffd700;
            border: none;
            color: #333;
            font-weight: bold;
            cursor: pointer;
        }
        .result {
            margin-top: 20px;
            text-align: center;
            font-weight: bold;
        }
    </style>
</head>
<body>
    <div class="container">
        <h2>TÌM SỐ LỚN HƠN</h2>
        <form method="post">
            <label for="soA">Số A:</label>
            <input type="number" id="soA" name="soA" required>
            
            <label for="soB">Số B:</label>
            <input type="number" id="soB" name="soB" required>
            
            <input type="submit" value="Tìm">
        </form>
        
        <?php
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $soA = $_POST["soA"];
            $soB = $_POST["soB"];
            
            $soLonHon = max($soA, $soB);
            
            echo "<div class='result'>Số lớn hơn: $soLonHon</div>";
        }
        ?>
    </div>
</body>
</html>