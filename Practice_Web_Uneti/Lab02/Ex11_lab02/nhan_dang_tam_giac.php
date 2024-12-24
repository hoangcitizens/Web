<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Nhận Dạng Tam Giác</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f9f9f9;
            margin: 0;
            padding: 20px;
        }

        h1 {
            text-align: center;
            color: #d68a00;
        }

        form {
            background-color: #fff3e0;
            border: 1px solid #d68a00;
            border-radius: 10px;
            padding: 20px;
            max-width: 400px;
            margin: 0 auto;
        }

        label {
            display: block;
            margin: 10px 0 5px;
        }

        input[type="number"], input[type="text"] {
            width: 100%;
            padding: 10px;
            margin: 5px 0 15px;
            border: 1px solid #ccc;
            border-radius: 5px;
        }

        input[type="text"][readonly] {
            background-color: #f0f0f0;
        }

        button {
            background-color: #d68a00;
            color: white;
            border: none;
            padding: 10px;
            border-radius: 5px;
            cursor: pointer;
            width: 100%;
        }

        button:hover {
            background-color: #b67b00;
        }
    </style>
</head>
<body>

    <h1>NHẬN DẠNG TAM GIÁC</h1>

    <?php
    $triangleType = "";

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $a = $_POST['side1'];
        $b = $_POST['side2'];
        $c = $_POST['side3'];

        // Kiểm tra xem các cạnh có tạo thành một tam giác không
        if ($a + $b > $c && $a + $c > $b && $b + $c > $a) {
            // Nhận dạng loại tam giác
            if ($a == $b && $b == $c) {
                $triangleType = "Tam giác đều";
            } elseif ($a == $b || $a == $c || $b == $c) {
                $triangleType = "Tam giác cân";
            } elseif ($a * $a + $b * $b == $c * $c || 
                      $a * $a + $c * $c == $b * $b || 
                      $b * $b + $c * $c == $a * $a) {
                $triangleType = "Tam giác vuông";
            } else {
                $triangleType = "Tam giác thường";
            }
        } else {
            $triangleType = "Không là tam giác";
        }
    }
    ?>

    <form action="" method="POST">
        <label for="side1">Cạnh 1:</label>
        <input type="number" min=1 name="side1" required><br>
        <label for="side2">Cạnh 2:</label>
        <input type="number" min=1 name="side2" required><br>
        <label for="side3">Cạnh 3:</label>
        <input type="number" min=1 name="side3" required><br>
        <label for="triangleType">Loại tam giác:</label>
        <input type="text" name="triangleType" value="<?php echo $triangleType; ?>" readonly><br>
        <button type="submit">Nhận dạng</button>
    </form>
</body>
</html>