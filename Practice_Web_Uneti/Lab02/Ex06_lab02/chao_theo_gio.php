<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Chào theo giờ</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
            background-color: #f0f8ff;
        }
        .container {
            background-color: white;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0,0,0,0.1);
        }
        h1 {
            color: #4a90e2;
            text-align: center;
        }
        input, button {
            display: block;
            width: 100%;
            margin: 10px 0;
            padding: 10px;
            border: 1px solid #ddd;
            border-radius: 4px;
        }
        button {
            background-color: #4a90e2;
            color: white;
            border: none;
            cursor: pointer;
        }
        button:hover {
            background-color: #357ae8;
        }
        #ketQua {
            margin-top: 20px;
            font-weight: bold;
            text-align: center;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>CHÀO THEO GIỜ</h1>
        <form method="POST" action="">
            <input type="number" name="gio" placeholder="Nhập giờ (0-23)" min="0" max="23" required>
            <button type="submit" name="chao">Chào</button>
        </form>
        <div id="ketQua">
            <?php
            if (isset($_POST['chao'])) {
                $gio = isset($_POST['gio']) ? intval($_POST['gio']) : -1;
                $cau_chao = '';

                if ($gio >= 0 && $gio < 13) {
                    $cau_chao = "Chào buổi sáng!";
                } elseif ($gio >= 13 && $gio < 19) {
                    $cau_chao = "Chào buổi chiều!";
                } elseif ($gio >= 19 && $gio <= 23) {
                    $cau_chao = "Chào buổi tối!";
                } else {
                    $cau_chao = "Vui lòng nhập giờ hợp lệ (0-23)";
                }

                echo htmlspecialchars($cau_chao);
            }
            ?>
        </div>
    </div>
</body>
</html>