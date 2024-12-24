<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tách Họ và Tên</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f0f0f0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
        }
        .container {
            background-color: #fff;
            padding: 20px;
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0,0,0,0.1);
        }
        h1 {
            text-align: center;
            color: white;
            background-color: #800080;
            padding: 10px;
            margin-top: 0;
        }
        label {
            display: inline-block;
            width: 100px;
            margin-bottom: 10px;
        }
        input[type="text"] {
            width: 200px;
            padding: 5px;
            margin-bottom: 10px;
        }
        input[type="submit"] {
            background-color: #800080;
            color: white;
            border: none;
            padding: 10px 20px;
            cursor: pointer;
            display: block;
            margin: 20px auto 0;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>TÁCH HỌ VÀ TÊN</h1>
        <form method="post">
            <label for="ho_ten">Họ và tên:</label>
            <input type="text" id="ho_ten" name="ho_ten" value="<?php echo isset($_POST['ho_ten']) ? htmlspecialchars($_POST['ho_ten']) : ''; ?>"><br>
            
            <label for="ho">Họ:</label>
            <input type="text" id="ho" name="ho" readonly><br>
            
            <label for="ten_dem">Tên đệm:</label>
            <input type="text" id="ten_dem" name="ten_dem" readonly><br>
            
            <label for="ten">Tên:</label>
            <input type="text" id="ten" name="ten" readonly><br>
            
            <input type="submit" name="submit" value="Tách Họ Tên">
        </form>

        <?php
        if (isset($_POST['submit'])) {
            $ho_ten = trim($_POST["ho_ten"]);
            $mang = explode(" ", $ho_ten);
            
            if (count($mang) >= 2) {
                $ho = $mang[0];
                $ten = $mang[count($mang) - 1];
                $ten_dem = '';
                
                for ($i = 1; $i < count($mang) - 1; $i++) {
                    $ten_dem .= $mang[$i] . ' ';
                }
                $ten_dem = trim($ten_dem);

                echo "<script>
                    document.getElementById('ho').value = '" . htmlspecialchars($ho) . "';
                    document.getElementById('ten_dem').value = '" . htmlspecialchars($ten_dem) . "';
                    document.getElementById('ten').value = '" . htmlspecialchars($ten) . "';
                </script>";
            } else {
                echo "<p>Vui lòng nhập đầy đủ họ và tên.</p>";
            }
        }
        ?>
    </div>
</body>
</html>