<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <title>Tìm Từ Trong Chuỗi</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #ffe4e1;
        }
        .container {
            width: 400px;
            margin: 50px auto;
            padding: 20px;
            background-color: #ffffff;
            border: 1px solid #ff69b4;
            border-radius: 5px;
        }
        h2 {
            text-align: center;
            color: #ff1493;
            margin-top: 0;
        }
        label {
            display: block;
            margin-top: 10px;
        }
        input[type="text"] {
            width: 100%;
            padding: 5px;
            margin-bottom: 10px;
        }
        input[type="submit"] {
            width: 100%;
            padding: 10px;
            background-color: #20b2aa;
            color: white;
            border: none;
            cursor: pointer;
        }
        #result {
            margin-top: 20px;
            padding: 10px;
            background-color: #f0f8ff;
            border: 1px solid #add8e6;
        }
    </style>
</head>
<body>
    <div class="container">
        <h2>TÌM TỪ TRONG CHUỖI</h2>
        <form method="post">
            <label for="string">Chuỗi:</label>
            <input type="text" id="string" name="string" required>
            
            <label for="word">Từ cần tìm:</label>
            <input type="text" id="word" name="word" required>
            
            <input type="submit" value="Tìm kiếm">
        </form>

        <div id="result">
            <?php
            if ($_SERVER["REQUEST_METHOD"] == "POST") {
                $string = $_POST['string'];
                $word = $_POST['word'];
                
                $position = strpos($string, $word);
                
                if ($position !== false) {
                    echo "Tìm thấy từ '$word' trong chuỗi tại vị trí số " . ($position + 1);
                } else {
                    echo "Không tìm thấy từ '$word' trong chuỗi";
                }
            }
            ?>
        </div>
    </div>
</body>
</html>