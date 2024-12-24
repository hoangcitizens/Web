<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <title>Đọc Số</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f0f8ff;
        }
        .container {
            width: 300px;
            margin: 50px auto;
            padding: 20px;
            background-color: #ffffff;
            border: 1px solid #4682b4;
            border-radius: 5px;
        }
        h2 {
            text-align: center;
            color: #ffffff;
            background-color: #4682b4;
            padding: 10px;
            margin-top: 0;
        }
        input[type="text"], input[type="number"] {
            width: 100%;
            padding: 5px;
            margin-bottom: 10px;
        }
        input[type="submit"] {
            width: 100%;
            padding: 10px;
            background-color: #4682b4;
            color: white;
            border: none;
            cursor: pointer;
        }
    </style>
</head>
<body>
    <div class="container">
        <h2>ĐỌC SỐ</h2>
        <form method="post">
            <label for="number">Nhập số (0-999):</label>
            <input type="number" id="number" name="number" min="0" max="999" required>
            <input type="submit" value="Đọc số">
        </form>

        <?php
        function doc_1_so($so) {
            switch ($so) {
                case 0: return "Không";
                case 1: return "Một";
                case 2: return "Hai";
                case 3: return "Ba";
                case 4: return "Bốn";
                case 5: return "Năm";
                case 6: return "Sáu";
                case 7: return "Bảy";
                case 8: return "Tám";
                case 9: return "Chín";
            }
        }

        function doc_so($so) {
            if ($so == 0) return "Không";

            $tram = floor($so / 100);
            $chuc = floor(($so % 100) / 10);
            $dv = $so % 10;

            $doc_tram = $doc_chuc = $doc_dv = "";

            if ($tram > 0) {
                $doc_tram = doc_1_so($tram) . " Trăm";
            }

            if ($chuc > 0) {
                $doc_chuc = $chuc == 1 ? "Mười" : doc_1_so($chuc) . " Mươi";
            } elseif ($tram > 0 && $dv > 0) {
                $doc_chuc = "Lẻ";
            }

            if ($dv > 0) {
                if ($dv == 1 && $chuc > 1) {
                    $doc_dv = "Mốt";
                } elseif ($dv == 5 && $chuc > 0) {
                    $doc_dv = "Lăm";
                } else {
                    $doc_dv = doc_1_so($dv);
                }
            }

            return trim("$doc_tram $doc_chuc $doc_dv");
        }

        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $number = isset($_POST['number']) ? intval($_POST['number']) : 0;
            if ($number >= 0 && $number <= 999) {
                $result = doc_so($number);
                echo "<p>Bằng chữ: <input type='text' value='$result' readonly></p>";
            } else {
                echo "<p>Vui lòng nhập số từ 0 đến 999.</p>";
            }
        }
        ?>
    </div>
</body>
</html>