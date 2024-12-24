<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Chi Tiết Sản Phẩm Sữa</title>
    <style>
        .container {
            width: 70%;
            margin: auto;
            border: 1px solid #ddd;
            padding: 20px;
            background-color: #f9f9f9;
        }
        .product-header {
            background-color: #FFCC99;
            text-align: center;
            padding: 10px;
            font-size: 24px;
            font-weight: bold;
            color: #b34700;
        }
        .product-detail {
            display: flex;
            align-items: center;
            margin-top: 20px;
        }
        .product-image img {
            width: 150px;
            height: 150px;
            margin-right: 20px;
        }
        .product-info {
            font-size: 18px;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="product-header">THÔNG TIN CHI TIẾT SẢN PHẨM</div>

        <?php
            // Kết nối MySQL
            $servername = "localhost";
            $username = "root";
            $password = "";
            $dbname = "QL_BAN_SUA";
            $conn = new mysqli($servername, $username, $password, $dbname);

            // Kiểm tra kết nối
            if ($conn->connect_error) {
                die("Kết nối thất bại: " . $conn->connect_error);
            }

            // Lấy mã sữa từ URL
            $Ma_sua = isset($_GET['Ma_sua']) ? $_GET['Ma_sua'] : '';

            // Câu truy vấn chi tiết sản phẩm sữa
            $sql = "SELECT Ten_sua, Trong_luong, Don_gia, TP_dinh_duong, Loi_ich, Hinh, hs.Ten_hang_sua, ls.Ten_loai
                    FROM SUA s
                    JOIN HANG_SUA hs ON s.Ma_hang_sua = hs.Ma_hang_sua
                    JOIN LOAI_SUA ls ON s.Ma_loai_sua = ls.Ma_loai_sua
                    WHERE s.Ma_sua = '$Ma_sua'";

            $result = $conn->query($sql);

            if ($result->num_rows > 0) {
                $row = $result->fetch_assoc();
                echo "<div class='product-detail'>";
                echo "<div class='product-image'><img src='" . $row['Hinh'] . "' alt='" . $row['Ten_sua'] . "'></div>";
                echo "<div class='product-info'>";
                echo "<h3>" . $row['Ten_sua'] . "</h3>";
                echo "<p><strong>Hãng sản xuất:</strong> " . $row['Ten_hang_sua'] . "</p>";
                echo "<p><strong>Loại sữa:</strong> " . $row['Ten_loai'] . "</p>";
                echo "<p><strong>Trọng lượng:</strong> " . $row['Trong_luong'] . " gram</p>";
                echo "<p><strong>Đơn giá:</strong> " . number_format($row['Don_gia'], 0, ',', '.') . " VNĐ</p>";
                echo "<p><strong>Thành phần dinh dưỡng:</strong> " . $row['TP_dinh_duong'] . "</p>";
                echo "<p><strong>Lợi ích:</strong> " . $row['Loi_ich'] . "</p>";
                echo "</div></div>";
            } else {
                echo "<p>Không tìm thấy sản phẩm.</p>";
            }

            // Đóng kết nối
            $conn->close();
        ?>
    </div>
</body>
</html>
