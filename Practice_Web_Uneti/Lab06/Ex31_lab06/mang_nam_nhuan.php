<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tìm Năm Nhuận</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #e6f3ff;
            margin: 0;
            padding: 20px;
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
            background-color: #0066cc;
            color: white;
            text-align: center;
            margin-top: 0;
            padding: 10px;
            margin: -20px -20px 20px -20px;

        }
        label {
            display: block;
            margin-bottom: 5px;
            color: #0066cc;
        }
        input[type="number"] {
            width: 100%;
            padding: 8px;
            margin-bottom: 10px;
            border: 1px solid #ccc;
            border-radius: 4px;
        }
        input[type="submit"] {
            background-color: #0066cc;
            color: red;
            border: none;
            padding: 10px 15px;
            border-radius: 4px;
            cursor: pointer;
            width: 100%;
        }
        input[type="submit"]:hover {
            background-color: #004c99;
        }
        .result {
            margin-top: 20px;
            padding: 10px;
            background-color: yellow;
            border-radius: 4px;
        }
    </style>
</head>
<body>
    <div class="container">
        <h2>TÌM NĂM NHUẬN</h2>
        <form method="post">
            <label for="year">Năm:</label>
            <input type="number" id="year" name="year" required>
            <input type="submit" value="Tìm năm nhuận">
        </form>

        <?php
        function nam_nhuan($nam) {
            return ($nam % 400 == 0) || ($nam % 4 == 0 && $nam % 100 != 0);
        }

        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $nam = intval($_POST["year"]);
            $kq = "";

            if ($nam < 2000) {
                foreach (range(2000, $nam, -4) as $year) {
                    if (nam_nhuan($year)) {
                        $kq .= $year . " ";
                    }
                }
            } else {
                foreach (range(2000, $nam) as $year) {
                    if (nam_nhuan($year)) {
                        $kq .= $year . " ";
                    }
                }
            }

            echo "<div class='result'>";
            if ($kq != "") {
                echo trim($kq) . " là năm nhuận";
            } else {
                echo "Không có năm nhuận";
            }
            echo "</div>";
        }
        ?>
    </div>
</body>
</html>