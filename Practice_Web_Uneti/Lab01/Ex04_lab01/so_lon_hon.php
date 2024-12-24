<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cạnh Huyền Tam Giác Vuông</title>
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
            background-color: #ffeeba;
            border: 2px solid #e0d0a0;
            padding: 20px;
            border-radius: 10px;
            width: 300px;
        }
        h1 {
            text-align: center;
            color: #8b4513;
            margin-top: 0;
            font-size: 18px;
        }
        label {
            display: inline-block;
            width: 100px;
            margin-bottom: 10px;
        }
        input[type="number"] {
            width: 150px;
            padding: 5px;
            margin-bottom: 10px;
        }
        #tinh {
            background-color: #4CAF50;
            color: white;
            border: none;
            padding: 5px 20px;
            cursor: pointer;
            display: block;
            margin: 10px auto;
        }
        .result {
            background-color: #ffcccb;
            padding: 5px;
            margin-top: 10px;
        }
    </style>
</head>
<body>
    <?php
    $canhA = $canhB = $canhHuyen = '';
    
    if (isset($_POST['tinh'])) { // kiểm tra biến có khác null không
        $canhA = $_POST['canh_a'];
        $canhB = $_POST['canh_b'];

        if (empty($canhA) || empty($canhB)) {
            echo "<script>alert('Vui lòng điền đầy đủ thông tin!');</script>";
        } else {
            $canhHuyen = sqrt(pow($canhA, 2) + pow($canhB, 2));
            $canhHuyen = number_format($canhHuyen, 2, '.', '');
        }
    }
    ?>
    <div class="container">
        <h1>CẠNH HUYỀN TAM GIÁC VUÔNG</h1>
        <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
            <label for="canh_a">Cạnh A:</label>
            <input type="number" id="canh_a" name="canh_a" value="<?php echo $canhA; ?>" step="0.01"><br>
            
            <label for="canh_b">Cạnh B:</label>
            <input type="number" id="canh_b" name="canh_b" value="<?php echo $canhB; ?>" step="0.01"><br>
            
            <label for="canh_huyen">Cạnh huyền:</label>
            <input type="text" id="canh_huyen" name="canh_huyen" value="<?php echo $canhHuyen; ?>" readonly class="result"><br>
            
            <input type="submit" id="tinh" name="tinh" value="Tính">
        </form>
    </div>
</body>
</html>