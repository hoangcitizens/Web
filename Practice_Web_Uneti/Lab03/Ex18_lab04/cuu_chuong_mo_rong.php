<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>In Bảng Cửu Chương</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f0f0f0;
            margin: 0;
            padding: 20px;
        }
        .container {
            background-color:paleturquoise;
            border: 1px solid #ccc;
            border-radius: 5px;
            padding: 20px;
            max-width: 400px;
            margin: 0 auto;
        }
        h2 {
            background-color: #0066cc;
            color: white;
            text-align: center;
            padding: 10px;
            margin: -20px -20px 20px -20px;
            border-radius: 5px 5px 0 0;
        }
        .input-group {
            margin-bottom: 10px;
        }
        label {
            display: inline-block;
            width: 100px;
        }
        input[type="text"] {
            width: 50px;
            padding: 5px;
        }
        button {
            background-color: #ccc;
            border: none;
            padding: 5px 10px;
            cursor: pointer;
        }
        .result {
            margin-top: 20px;
        }
        table {
            border-collapse: collapse;
            width: 100%;
        }
        td {
            border: 1px solid #ddd;
            padding: 8px;
            text-align: left;
            vertical-align: top;
        }
    </style>
</head>
<body>
    <div class="container">
        <h2>In Bảng Cửu Chương</h2>
        <form method="POST">
            <div class="input-group">
                <label for="start">Bắt đầu từ:</label>
                <input type="text" id="start" name="start" value="<?php echo isset($_POST['start']) ? $_POST['start'] : 7; ?>" required>
            </div>
            <div class="input-group">
                <label for="end">Kết thúc tại:</label>
                <input type="text" id="end" name="end" value="<?php echo isset($_POST['end']) ? $_POST['end'] : 10; ?>" required>
            </div>
            <button type="submit">In bảng cửu chương</button>
        </form>

        <?php
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $start = isset($_POST['start']) ? intval($_POST['start']) : 7;
            $end = isset($_POST['end']) ? intval($_POST['end']) : 10;

            if ($start <= $end) {
                echo "<div class='result'>";
                echo "<table>";
                echo "<tr>";
                for ($i = $start; $i <= $end; $i++) {
                    echo "<td>";
                    for ($j = 1; $j <= 10; $j++) {
                        echo "$i x $j = " . ($i * $j) . "<br>";
                    }
                    echo "</td>";
                }
                echo "</tr>";
                echo "</table>";
                echo "</div>";
            } else {
                echo "<p>Số bắt đầu phải nhỏ hơn hoặc bằng số kết thúc.</p>";
            }
        }
        ?>
    </div>
</body>
</html>