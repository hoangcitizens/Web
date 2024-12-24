<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Nhập và Tính Trên Dãy Số</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #e0f2f1;
            margin: 0;
            padding: 20px;
            justify-content: center;
            align-items: center;
        }
        .container {
            background-color: white;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0,0,0,0.1);
            max-width: 400px;
            margin: 0 auto;
        }
        h2 {
            background-color: #00796b;
            color: white;
            text-align: center;
            margin-top: 0;
            padding: 10px;
            margin: -20px -20px 20px -20px;
           
        }
        label {
            display: block;
            margin-bottom: 5px;
            color: #00796b;
        }
        input[type="text"] {
            width: 100%;
            padding: 8px;
            margin-bottom: 10px;
            border: 1px solid #ccc;
            border-radius: 4px;
        }
        input[type="submit"] {
            background-color: #00796b;
            color: white;
            border: none;
            padding: 10px 15px;
            border-radius: 4px;
            cursor: pointer;
        }
        input[type="submit"]:hover {
            background-color: #005a4b;
        }
        .result {
            margin-top: 20px;
            padding: 10px;
            background-color: #e0f2f1;
            border-radius: 4px;
        }
        .note {
            font-size: 0.9em;
            color: #666;
            margin-top: 5px;
        }
    </style>
</head>
<body>
    <div class="container">
        <h2>NHẬP VÀ TÍNH TRÊN DÃY SỐ</h2>
        <form method="post">
            <label for="numbers">Nhập dãy số: (*)</label>
            <input type="text" id="numbers" name="numbers" required>
            <p class="note">(*) Các số được nhập cách nhau bằng dấu ","</p>
            <input type="submit" value="Tổng dãy số">
        </form>

        <?php
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $input = $_POST["numbers"];
            $numbers = explode(",", $input);
            $sum = 0;

            foreach ($numbers as $number) {
                $sum += floatval(trim($number));
            }

            echo "<div class='result'>";
            echo "<strong>Tổng dãy số:</strong> " . $sum;
            echo "</div>";
        }
        ?>
    </div>
</body>
</html>