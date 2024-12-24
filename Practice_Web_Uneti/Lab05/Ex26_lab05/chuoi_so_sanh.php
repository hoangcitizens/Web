<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <title>So Sánh Chuỗi</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #e0f2f1;
        }
        .container {
            width: 400px;
            margin: 50px auto;
            padding: 20px;
            background-color: #ffffff;
            border: 1px solid #26a69a;
            border-radius: 5px;
        }
        h2 {
            text-align: center;
            color: #ffffff;
            background-color: #26a69a;
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
            background-color: #26a69a;
            color: white;
            border: none;
            cursor: pointer;
        }
        #result {
            margin-top: 20px;
            padding: 10px;
            background-color: #e0f2f1;
            border: 1px solid #26a69a;
            text-align: center;
            font-weight: bold;
        }
    </style>
</head>
<body>
    <div class="container">
        <h2>SO SÁNH CHUỖI</h2>
        <form method="post">
            <label for="string1">Chuỗi thứ nhất:</label>
            <input type="text" id="string1" name="string1" required>
            
            <label for="string2">Chuỗi thứ hai:</label>
            <input type="text" id="string2" name="string2" required>
            
            <input type="submit" value="So sánh">
        </form>

        <div id="result">
            <?php
            if ($_SERVER["REQUEST_METHOD"] == "POST") {
                $string1 = $_POST['string1'];
                $string2 = $_POST['string2'];
                
                $result = strcasecmp($string1, $string2);
                
                if ($result == 0) {
                    echo "Hai chuỗi giống nhau";
                } elseif ($result > 0) {
                    echo "Chuỗi thứ nhất dài hơn chuỗi thứ hai";
                } else {
                    echo "Chuỗi thứ nhất ngắn hơn chuỗi thứ hai";
                }
            }
            ?>
        </div>
    </div>
</body>
</html>