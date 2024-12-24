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
            display: grid;
            grid-template-columns: 300px 1fr;
            gap: 20px;
            max-width: 1200px;
            margin: 0 auto;
        }
        .list {
            background: #F5F5DC;
            padding: 15px;
            border: 1px solid #6B6F4D;
        }
        .content {
            background: #F5F5DC;
            padding: 15px;
        }
        .list a {
            color: #000080;
            text-decoration: underline;
            display: block;
            padding: 5px 0;
            font-size: 14px;
        }
        img {
            max-width: 100%;
            height: auto;
            display: block;
            margin: 10px auto;
            border: 1px solid #6B6F4D;
        }
        .back-to-top {
            color: #000080;
            text-align: center;
            margin: 10px 0;
            text-decoration: underline;
        }
        h2 {
            color: #000;
            margin: 20px 0;
        }
    </style>
</head>
<body>
    <div class="header">
        <h1>DANH LAM THẮNG CẢNH</h1>
    </div>
    
    <?php
    $mang_dia_danh = array(
        array("ma" => "dl", "ten" => "Thành phố Đà Lạt", "hinh" => "da_lat.jpg"),
        array("ma" => "hl", "ten" => "Vịnh Hạ Long", "hinh" => "ha_long.jpg"),
        array("ma" => "ht", "ten" => "Biển Hà Tiên", "hinh" => "ha_tien.jpg"),
        array("ma" => "nt", "ten" => "Biển Nha Trang", "hinh" => "nha_trang.jpg"),
        array("ma" => "pq", "ten" => "Đảo Phú Quốc", "hinh" => "phu_quoc.jpg"),
        array("ma" => "pt", "ten" => "Biển Phan Thiết", "hinh" => "phan_thiet.jpg"),
        array("ma" => "vt", "ten" => "Biển Vũng Tàu", "hinh" => "vung_tau.jpg")
    );

    function compare($x, $y) {
        return strcmp($x["ten"], $y["ten"]);
    }

    usort($mang_dia_danh, "compare");
    ?>

    <div class="container">
        <div class="list">
            <h2>Danh sách địa danh</h2>
            <a name="top"></a>
            <?php
            foreach($mang_dia_danh as $dia_danh) {
                echo "<a href='#" . $dia_danh['ma'] . "'>" . $dia_danh['ten'] . "</a>";
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
                echo "<div class='back-to-top'><a href='#top'>Quay về đầu trang</a></div>";
                echo "</div>";
            }
            ?>
        </div>
    </div>
</body>
</html>