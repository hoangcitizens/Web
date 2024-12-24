<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tính Tiền Karaoke</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color:aquamarine;
            color: white;
            padding: 20px;
        }
        h1 {
            color: white;
            background-color: #4a90e2;
            padding: 20px;
            margin: -30px -30px 20px -30px;
            border-radius: 10px;
            text-align: center;
            background-color: yellowgreen;
            font-size: 24px;
            max-width: 700px;
            margin: 0 auto;
        }
        form {
            background-color: #00796b;
            padding: 20px;
            border-radius: 10px;
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
            border: none;
            border-radius: 5px;
        }
        input[type="text"][readonly] {
            background-color: #e0f2f1;
            color: #000;
        }
        button {
            background-color: #ff9800;
            color: white;
            border: none;
            padding: 10px;
            border-radius: 5px;
            cursor: pointer;
            width: 100%;
        }
        button:hover {
            background-color: #fb8c00;
        }
        .message {
            color: yellow;
            text-align: center;
            margin-top: 10px;
        }
    </style>
</head>
<body>
    <?php
    $startHour = $endHour = $totalPrice = "";
    $message = "";

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $startHour = $_POST['startHour'];
        $endHour = $_POST['endHour'];

        if ($startHour >= 0 && $startHour < 24 && $endHour > 0 && $endHour <= 24) {
            $duration = ($endHour > $startHour) ? ($endHour - $startHour) : (24 - $startHour + $endHour);

            $dayPrice = 0;
            $nightPrice = 0;

            for ($hour = $startHour; $hour != $endHour; $hour = ($hour + 1) % 24) {
                if ($hour >= 17 || $hour < 8) {
                    $nightPrice += 50000;
                } else {
                    $dayPrice += 30000;
                }
            }

            $totalPrice = $dayPrice + $nightPrice;
        } else {
            $message = "Vui lòng nhập giờ hợp lệ (0-24).";
        }
    }
    ?>

    <form action="" method="POST">
        <h1>TÍNH TIỀN KARAOKE</h1>
        <label for="startHour">Giờ bắt đầu (0-24):</label>
        <input type="number" name="startHour" min="0" max="24" value="<?php echo $startHour; ?>" required><br>

        <label for="endHour">Giờ kết thúc (0-24):</label>
        <input type="number" name="endHour" min="0" max="24" value="<?php echo $endHour; ?>" required><br>

        <label for="totalPrice">Tiền thanh toán:</label>
        <input type="text" name="totalPrice" value="<?php echo number_format($totalPrice, 0, ',', '.'); ?> VND" readonly><br>

        <button type="submit">Tính tiền</button>
        <div class="message"><?php echo $message; ?></div>
    </form>
</body>
</html>