<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <title>Thay Thế Từ Trong Chuỗi</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #fff0f5;
        }
        .container {
            width: 400px;
            margin: 50px auto;
            padding: 20px;
            background-color: #ffffff;
            border: 1px solid #ff4500;
            border-radius: 5px;
        }
        h2 {
            text-align: center;
            color: #ffffff;
            background-color: #ff4500;
            padding: 10px;
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
            background-color: #ff4500;
            color: white;
            border: none;
            cursor: pointer;
        }
        #result {
            margin-top: 20px;
            padding: 10px;
            background-color: #ffffe0;
            border: 1px solid #ffa500;
        }
    </style>
</head>
<body>
    <div class="container">
        <h2>THAY THẾ TỪ TRONG CHUỖI</h2>
        <form method="post">
            <label for="string">Chuỗi:</label>
            <input type="text" id="string" name="string" required>
            
            <label for="original">Từ gốc:</label>
            <input type="text" id="original" name="original" required>
            
            <label for="replacement">Từ thay thế:</label>
            <input type="text" id="replacement" name="replacement" required>
            
            <input type="submit" value="Thay thế">
        </form>

        <div id="result">
            <?php
            if ($_SERVER["REQUEST_METHOD"] == "POST") {
                $string = $_POST['string'];
                $original = $_POST['original'];
                $replacement = $_POST['replacement'];
                
                $result = str_replace($original, $replacement, $string);
                
                echo $result;
            }
            ?>
        </div>
    </div>
</body>
</html>