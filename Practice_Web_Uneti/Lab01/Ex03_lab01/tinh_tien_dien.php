<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Thanh Toán Tiền Điện</title>
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
        form {
            background-color: #ffe699;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0,0,0,0.1);
        }
        h2 {
            text-align: center;
            color: #8b4513;
            margin-top: 0;
        }
        label {
            display: inline-block;
            width: 120px;
            margin-bottom: 10px;
        }
        input[type="text"], input[type="number"] {
            width: 150px;
            padding: 5px;
            margin-bottom: 10px;
        }
        input[type="submit"] {
            display: block;
            width: 100%;
            padding: 10px;
            background-color: #4CAF50;
            color: white;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }
        input[type="submit"]:hover {
            background-color: #45a049;
        }
        .result {
            font-weight: bold;
            color: #ff0000;
        }
    </style>
</head>
<body>
    <form action="" method="post">
        <h2>THANH TOÁN TIỀN ĐIỆN</h2>
        <label for="ten_chu_ho">Tên chủ hộ:</label>
        <input type="text" id="ten_chu_ho" name="ten_chu_ho" required><br>
        
        <label for="chi_so_cu">Chỉ số cũ:</label>
        <input type="number" id="chi_so_cu" name="chi_so_cu" required> (Kw)<br>
        
        <label for="chi_so_moi">Chỉ số mới:</label>
        <input type="number" id="chi_so_moi" name="chi_so_moi" required> (Kw)<br>
        
        <label for="don_gia">Đơn giá:</label>
        <input type="number" id="don_gia" name="don_gia" required> (VNĐ)<br>
        
        <input type="submit" value="Tính">
        
        <?php
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $ten_chu_ho = $_POST["ten_chu_ho"];
            $chi_so_cu = $_POST["chi_so_cu"];
            $chi_so_moi = $_POST["chi_so_moi"];
            $don_gia = $_POST["don_gia"];
            
            $so_tien_thanh_toan = ($chi_so_moi - $chi_so_cu) * $don_gia;
            
            echo "<p>Số tiền thanh toán: <span class='result'>" . number_format($so_tien_thanh_toan) . " VNĐ</span></p>";
        }
        ?>
    </form>
</body>
</html>