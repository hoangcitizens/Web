<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <title>Danh Lam Thắng Cảnh</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 20px;
            background-color: #E8E6D1;
        }
        .header {
            background-color: #6B6F4D;
            color: white;
            padding: 10px;
            text-align: center;
            margin-bottom: 20px;
        }
        .container {
            display: flex;
            gap: 20px;
            max-width: 1200px;
            margin: 0 auto;
        }
        .list {
            flex: 1;
            background: #fff;
            padding: 15px;
            border-radius: 5px;
        }
        .content {
            flex: 3;
            background: #fff;
            padding: 15px;
            border-radius: 5px;
        }
        .list a {
            color: #6B6F4D;
            text-decoration: none;
            display: block;
            padding: 5px 0;
        }
        .list a:hover {
            text-decoration: underline;
        }
        img {
            max-width: 100%;
            height: auto;
            display: block;
            margin: 10px auto;
        }
        .back-to-top {
            color: #6B6F4D;
            text-decoration: none;
            display: block;
            text-align: center;
            margin: 10px 0;
        }
    </style>
</head>
<body>
    <div class="header">
        <h1>DANH LAM THẮNG CẢNH</h1>
    </div>
    
    <?php
    $mang_dia_danh = array(
        array("ma" => "nt", "ten" => "Biển Nha Trang", "hinh" => "nha_trang.jpg"),
        array("ma" => "dl", "ten" => "Thành phố Đà Lạt", "hinh" => "da_lat.jpg"),
        array("ma" => "vt", "ten" => "Biển Vũng Tàu", "hinh" => "vung_tau.jpg"),
        array("ma" => "hl", "ten" => "Vịnh Hạ Long", "hinh" => "ha_long.jpg"),
        array("ma" => "pt", "ten" => "Biển Phan Thiết", "hinh" => "phan_thiet.jpg"),
        array("ma" => "ht", "ten" => "Biển Hà Tiên", "hinh" => "ha_tien.jpg"),
        array("ma" => "pq", "ten" => "Đảo Phú Quốc", "hinh" => "phu_quoc.jpg")
    );
    ?>

    <div class="container">
        <div class="list">
            <h2>Danh sách địa danh</h2>
            <a name="top"></a>
            <?php
            foreach($mang_dia_danh as $dia_danh) {
                echo "<a href='#" . $dia_danh['ma'] . "'><b>" . $dia_danh['ten'] . "</b></a>";
            }
            ?>
        </div>

        <div class="content">
            <?php
            foreach($mang_dia_danh as $dia_danh) {
                echo "<div>";
                echo "<a name='" . $dia_danh['ma'] . "'></a>";
                echo "<h2>" . $dia_danh['ten'] . "</h2>";
                echo "<img src='" . $dia_danh['hinh'] . "' alt='" . $dia_danh['ten'] . "'>";
                echo "<a href='#top' class='back-to-top'>Quay về đầu trang</a>";
                echo "</div>";
            }
            ?>
        </div>
    </div>
</body>
</html>