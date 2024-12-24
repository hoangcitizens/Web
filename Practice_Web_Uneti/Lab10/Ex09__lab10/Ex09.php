<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Danh Sách Sản Phẩm Sữa</title>
    <style>
        h2 {
            text-align: center;
            color: violet;
        }
        .container {
            width: 70%;
            margin: auto;
            background-color: #f9f9f9;
        }
        .product {
            display: flex;
            align-items: center;
            padding: 20px;
            border: 1px solid #ddd;
            margin: 10px 0;
        }
        .product img {
            width: 120px;
            height: 120px;
            margin-right: 20px;
        }
        .product-info {
            font-size: 18px;
        }
        .product-info h3 {
            margin: 0;
        }
        .pagination {
            text-align: center;
            margin-top: 20px;
        }
        .pagination a {
            margin: 0 5px;
            text-decoration: none;
            padding: 5px 10px;
            color: #333;
            border: 1px solid #ddd;
        }
        .pagination strong {
            padding: 5px 10px;
            color: #fff;
            background-color: #333;
        }
    </style>
</head>
<body>
    <div class="container">
        <h2>THÔNG TIN CÁC SẢN PHẨM SỮA</h2>

        <?php
            include 'Pager.php';

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

            // Thiết lập số sản phẩm trên mỗi trang
            $itemsPerPage = 2;
            $currentPage = isset($_GET['page']) ? $_GET['page'] : 1;

            // Lấy tổng số sản phẩm
            $countSql = "SELECT COUNT(*) as total FROM SUA";
            $countResult = $conn->query($countSql);
            $totalItems = ($countResult->num_rows > 0) ? $countResult->fetch_assoc()['total'] : 0;

            // Khởi tạo đối tượng phân trang
            $pager = new Pager($totalItems, $itemsPerPage, $currentPage);

            // Lấy danh sách sản phẩm cho trang hiện tại
            $startIndex = $pager->getStartIndex();
            $sql = "SELECT Ma_sua, Ten_sua, Trong_luong, Don_gia, TP_dinh_duong, Loi_ich, Hinh FROM SUA LIMIT $startIndex, $itemsPerPage";
            $result = $conn->query($sql);

            // Hiển thị sản phẩm
            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    echo "<div class='product'>";
                    echo "<div class='product-image'><img src='" . $row['Hinh'] . "' alt='" . $row['Ten_sua'] . "'></div>";
                    echo "<div class='product-info'>";
                    echo "<h3>" . $row['Ten_sua'] . "</h3>";
                    echo "<p><strong>Trọng lượng:</strong> " . $row['Trong_luong'] . " gram</p>";
                    echo "<p><strong>Đơn giá:</strong> " . number_format($row['Don_gia'], 0, ',', '.') . " VNĐ</p>";
                    echo "<p><strong>Thành phần dinh dưỡng:</strong> " . $row['TP_dinh_duong'] . "</p>";
                    echo "<p><strong>Lợi ích:</strong> " . $row['Loi_ich'] . "</p>";
                    echo "</div></div>";
                }
            } else {
                echo "<p>Không tìm thấy sản phẩm.</p>";
            }

            // Hiển thị phân trang
            echo $pager->renderPaginationLinks();

            // Đóng kết nối
            $conn->close();
        ?>
    </div>
</body>
</html>
