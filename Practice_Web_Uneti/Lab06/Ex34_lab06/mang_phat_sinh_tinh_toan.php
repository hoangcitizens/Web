<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <title>Phát Sinh Mảng và Tính Toán</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 20px;
            background-color: #f0f0f0;
        }
        .container {
            max-width: 600px;
            margin: 0 auto;
            background-color: white;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0,0,0,0.1);
        }
        h1 {
            background-color: #800080;
            color: white;
            padding: 10px;
            margin-top: 0;
            text-align: center;
            border-radius: 4px;
        }
        .form-group {
            margin-bottom: 15px;
        }
        label {
            display: inline-block;
            width: 150px;
            margin-bottom: 5px;
        }
        input[type="text"], input[type="number"] {
            width: 100%;
            padding: 8px;
            border: 1px solid #ddd;
            border-radius: 4px;
            background-color: #fff;
        }
        input[readonly] {
            background-color: #ffebef;
        }
        button {
            background-color: #ffd700;
            border: none;
            padding: 10px 20px;
            cursor: pointer;
            border-radius: 4px;
            margin-top: 10px;
        }
        button:hover {
            background-color: #ffed4a;
        }
        .note {
            color: red;
            font-size: 0.9em;
            margin-top: 10px;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>PHÁT SINH MẢNG VÀ TÍNH TOÁN</h1>
        <form method="post">
            <div class="form-group">
                <label>Nhập số phần tử:</label>
                <input type="number" name="n" value="<?php echo isset($_POST['n']) ? $_POST['n'] : '10'; ?>" required>
            </div>
            <div class="form-group">
                <button type="submit" name="submit">Phát sinh và tính toán</button>
            </div>
            
            <?php
            function tao_mang($n) {
                $mang = array();
                for($i = 0; $i < $n; $i++) {
                    $mang[] = rand(0, 20);
                }
                return $mang;
            }

            function xuat_mang($mang) {
                return implode(" ", $mang);
            }

            function tinh_tong($mang) {
                return array_sum($mang);
            }

            function tim_max($mang) {
                return max($mang);
            }

            function tim_min($mang) {
                return min($mang);
            }

            if(isset($_POST['submit'])) {
                $n = isset($_POST['n']) ? (int)$_POST['n'] : 10;
                $mang = tao_mang($n);
                $mang_kq = xuat_mang($mang);
                $tong = tinh_tong($mang);
                $max = tim_max($mang);
                $min = tim_min($mang);
            ?>
                <div class="form-group">
                    <label>Mảng:</label>
                    <input type="text" value="<?php echo $mang_kq; ?>" readonly>
                </div>
                <div class="form-group">
                    <label>GTLN (MAX) trong mảng:</label>
                    <input type="text" value="<?php echo $max; ?>" readonly>
                </div>
                <div class="form-group">
                    <label>TTNN (MIN) trong mảng:</label>
                    <input type="text" value="<?php echo $min; ?>" readonly>
                </div>
                <div class="form-group">
                    <label>Tổng mảng:</label>
                    <input type="text" value="<?php echo $tong; ?>" readonly>
                </div>
            <?php } ?>
            
            <div class="note">
                Ghi chú: Các phần tử trong mảng sẽ có giá trị từ 0 đến 20
            </div>
        </form>
    </div>
</body>
</html>