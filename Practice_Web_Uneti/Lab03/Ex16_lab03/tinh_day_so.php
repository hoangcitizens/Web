<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tính toán trên dãy số</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f0f0f0;
        }
        .container {
            width: 400px;
            margin: 20px auto;
            background-color: #fff;
            padding: 20px;
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0,0,0,0.1);
        }
        h1 {
            text-align: center;
            color: #8B4513;
            background-color: #FFD700;
            padding: 10px;
            margin-top: 0;
        }
        label {
            display: inline-block;
            width: 120px;
            margin-bottom: 10px;
        }
        input[type="text"] {
            width: 100px;
            padding: 5px;
            margin-bottom: 10px;
        }
        input[type="submit"] {
            display: block;
            width: 100%;
            padding: 10px;
            background-color: #FFD700;
            border: none;
            color: #8B4513;
            font-weight: bold;
            cursor: pointer;
        }
        input[readonly] {
            background-color: #FFB6C1;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>TÍNH TOÁN TRÊN DÃY SỐ</h1>
        <form method="post" action="">
            <label>Số bắt đầu:</label>
            <input type="text" name="so_bat_dau" value="<?php echo isset($_POST['so_bat_dau']) ? $_POST['so_bat_dau'] : ''; ?>"><br>
            <label>Số kết thúc:</label>
            <input type="text" name="so_ket_thuc" value="<?php echo isset($_POST['so_ket_thuc']) ? $_POST['so_ket_thuc'] : ''; ?>"><br>
            <label>Tổng các số:</label>
            <input type="text" name="tong" readonly value="<?php echo isset($tong) ? $tong : ''; ?>"><br>
            <label>Tích các số:</label>
            <input type="text" name="tich" readonly value="<?php echo isset($tich) ? $tich : ''; ?>"><br>
            <label>Tổng các số chẵn:</label>
            <input type="text" name="tong_chan" readonly value="<?php echo isset($tong_chan) ? $tong_chan : ''; ?>"><br>
            <label>Tổng các số lẻ:</label>
            <input type="text" name="tong_le" readonly value="<?php echo isset($tong_le) ? $tong_le : ''; ?>"><br>
            <input type="submit" name="tinh_toan" value="Tính toán">
        </form>
    </div>

    <?php
    if(isset($_POST['tinh_toan'])) {
        $so_bat_dau = intval($_POST['so_bat_dau']);
        $so_ket_thuc = intval($_POST['so_ket_thuc']);

        $tong = 0;
        $tich = 1;
        $tong_chan = 0;
        $tong_le = 0;

        for($i = $so_bat_dau; $i <= $so_ket_thuc; $i++) {
            $tong += $i;
            $tich *= $i;
        
        if($i % 2 == 0) {
            $tong_chan += $i;
        } else {
            $tong_le += $i;
        }
    }

    // Hiển thị kết quả
    echo "<script>
        document.getElementsByName('tong')[0].value = '$tong';
        document.getElementsByName('tich')[0].value = '$tich';
        document.getElementsByName('tong_chan')[0].value = '$tong_chan';
        document.getElementsByName('tong_le')[0].value = '$tong_le';
    </script>";
}
?>
</body>
</html>