<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Thông Tin Các Sản Phẩm Sữa</title>
    <style>
        body {
            display: flex;
            align-items: center;
            justify-content: center;
            font-family: Arial, sans-serif;
            background-color: #f4f4f9;
        }
        .container {
            width: 80%;
        }
        h2 {
            text-align: center;
            color: #FF1493;
            font-size: 24px;
        }
        .product {
            display: flex;
            padding: 20px;
            border-bottom: 1px solid #ddd;
            align-items: center;
        }
        .product:nth-child(odd) {
            background-color: #FFF5EE;
        }
        .product:nth-child(even) {
            background-color: #FFFAF0;
        }
        .product img {
            width: 100px;
            height: auto;
            margin-right: 20px;
        }
        .product-info {
            flex: 1;
        }
        .product-info h3 {
            font-size: 18px;
            color: #333;
            margin: 0;
        }
        .product-info p {
            margin: 5px 0;
            color: #666;
        }
        .price {
            font-weight: bold;
            color: #D2691E;
        }
    </style>
</head>
<body>
    <div class="container">
        <h2>THÔNG TIN CÁC SẢN PHẨM</h2>
        <?php
            // Kết nối cơ sở dữ liệu
            $servername = "localhost";
            $username = "root";
            $password = "";
            $dbname = "QL_BAN_SUA";
            $conn = new mysqli($servername, $username, $password, $dbname);
            if ($conn->connect_error) {
                die("Kết nối thất bại: " . $conn->connect_error);
            }

            // Truy vấn dữ liệu với JOIN
            $sql = "
                SELECT s.Ten_sua, s.Trong_luong, s.Don_gia, hs.Ten_hang_sua, ls.Ten_loai, s.Hinh
                FROM SUA s
                JOIN HANG_SUA hs ON s.Ma_hang_sua = hs.Ma_hang_sua
                JOIN LOAI_SUA ls ON s.Ma_loai_sua = ls.Ma_loai_sua
            ";
            $result = $conn->query($sql);

            // Xuất dữ liệu dạng danh sách sản phẩm
            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    echo "<div class='product'>";
                    echo "<div class='product-img'><img src='" . $row["Hinh"] . "' alt='" . $row["Ten_sua"] . "'></div>";
                    echo "<div class='product-info'>";
                    echo "<h3>" . $row["Ten_sua"] . "</h3>";
                    echo "<p>Nhà sản xuất: " . $row["Ten_hang_sua"] . "</p>";
                    echo "<p>Loại sữa: " . $row["Ten_loai"] . "</p>";
                    echo "<p>Trọng lượng: " . $row["Trong_luong"] . " gr</p>";
                    echo "<p class='price'>Đơn giá: " . number_format($row["Don_gia"], 0, ',', '.') . " VNĐ</p>";
                    echo "</div>";
                    echo "</div>";
                }
            } else {
                echo "Không có dữ liệu";
            }

            // Đóng kết nối
            $conn->close();
        ?>
    </div>
</body>
</html>
