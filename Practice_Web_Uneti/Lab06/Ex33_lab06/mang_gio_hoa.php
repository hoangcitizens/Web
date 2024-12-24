<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mua Hoa</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #ffe6e6;
            margin: 0;
            padding: 20px;
        }
        .container {
            background-color: #ffb3b3;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0,0,0,0.1);
            max-width: 500px;
            margin: 0 auto;
        }
        h2 {
            background-color: yellow;
            color: #cc0000;
            text-align: center;
            margin-top: 0;
            margin: -20px -20px 20px -20px;
            padding: 10px;
        }
        .form-group {
            margin-bottom: 15px;
        }
        label {
            display: block;
            margin-bottom: 5px;
            color: #cc0000;
        }
        input[type="text"], textarea {
            width: 100%;
            padding: 8px;
            border: 1px solid #cc0000;
            border-radius: 4px;
        }
        textarea {
            height: 100px;
            resize: none;
        }
        input[type="submit"] {
            background-color: #cc0000;
            color: white;
            border: none;
            padding: 10px 15px;
            border-radius: 4px;
            cursor: pointer;
        }
        input[type="submit"]:hover {
            background-color: #990000;
        }
        .message {
            margin-top: 15px;
            padding: 10px;
            background-color: #fff;
            border-radius: 4px;
        }
    </style>
</head>
<body>
    <div class="container">
        <h2>MUA HOA</h2>
        <?php
        session_start();

        if (!isset($_SESSION['gio_hoa'])) {
            $_SESSION['gio_hoa'] = array();
        }

        function tim_hoa($ten_hoa, $mang_hoa) {
            foreach ($mang_hoa as $hoa) {
                if (strcasecmp($hoa, $ten_hoa) == 0) {
                    return true;
                }
            }
            return false;
        }

        $message = '';

        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $ten_hoa = isset($_POST['ten_hoa']) ? trim($_POST['ten_hoa']) : '';
            
            if (!empty($ten_hoa)) {
                if (tim_hoa($ten_hoa, $_SESSION['gio_hoa'])) {
                    $message = "Hoa '$ten_hoa' đã có trong giỏ";
                } else {
                    array_push($_SESSION['gio_hoa'], $ten_hoa);
                    $message = "Đã thêm hoa '$ten_hoa' vào giỏ";
                }
            }
        }
        ?>

        <form method="post">
            <div class="form-group">
                <label for="ten_hoa">Loại hoa bạn chọn:</label>
                <input type="text" id="ten_hoa" name="ten_hoa" required>
            </div>
            <div class="form-group">
                <input type="submit" value="Thêm vào giỏ hoa">
            </div>
        </form>

        <div class="form-group">
            <label for="gio_hoa">Giỏ hoa của bạn có:</label>
            <textarea id="gio_hoa" readonly><?php echo implode(" -- ", $_SESSION['gio_hoa']); ?></textarea>
        </div>

        <?php if (!empty($message)): ?>
            <div class="message">
                <?php echo $message; ?>
            </div>
        <?php endif; ?>
    </div>
</body>
</html>