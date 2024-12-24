<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Thông Tin Các Sản Phẩm Sữa</title>
    <style>
        body {
            display: flex;
            justify-content: center;
            font-family: Arial, sans-serif;
            background-color: #f4f4f9;
        }
        .container {
            width: 90%;
            margin-top: 20px;
        }
        h1 {
            text-align: center;
            color: #FF1493;
            font-size: 24px;
        }
        .product-table {
            width: 100%;
            border-collapse: collapse;
        }
        .product-table td {
            width: 20%;
            padding: 10px;
            vertical-align: top;
        }
        .product {
            border: 1px solid #ddd;
            padding: 10px;
            text-align: center;
            background-color: #FFFAF0;
        }
        .product img {
            width: 100px;
            height: auto;
            margin-bottom: 10px;
        }
        .product h3 {
            font-size: 16px;
            color: #333;
            margin: 5px 0;
        }
        .product p {
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
        <h1>THÔNG TIN CÁC SẢN PHẨM</h1>
        <table class="product-table">
            <tr>
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

                // Truy vấn dữ liệu sản phẩm
                $sql = "SELECT Ten_sua, Trong_luong, Don_gia, Hinh FROM SUA";
                $result = $conn->query($sql);

                // Đếm số sản phẩm
                $count = 0;
                if ($result->num_rows > 0) {
                    while ($row = $result->fetch_assoc()) {
                        if ($count > 0 && $count % 5 == 0) {
                            echo "</tr><tr>"; // Bắt đầu hàng mới sau mỗi 5 sản phẩm
                        }
                        echo "<td>";
                        echo "<div class='product'>";
                        echo "<img src='" . $row["Hinh"] . "' alt='" . $row["Ten_sua"] . "'>";
                        echo "<h3>" . $row["Ten_sua"] . "</h3>";
                        echo "<p>" . $row["Trong_luong"] . " gr</p>";
                        echo "<p class='price'>" . number_format($row["Don_gia"], 0, ',', '.') . " VNĐ</p>";
                        echo "</div>";
                        echo "</td>";
                        $count++;
                    }
                } else {
                    echo "<td colspan='5'>Không có dữ liệu</td>";
                }

                // Đóng kết nối
                $conn->close();
            ?>
            </tr>
        </table>
    </div>
</body>
</html>
