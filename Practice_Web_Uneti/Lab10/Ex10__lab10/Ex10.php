<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tìm kiếm Sản Phẩm Sữa</title>
    <style>
        h2 {
            background-color: violet;
            color: white;
            text-align: center;
        }
        .container {
            width: 70%;
            margin: auto;
            background-color: #f9f9f9;
            padding: 20px;
        }
        .search-bar {
            text-align: center;
            margin-bottom: 20px;
        }
        .search-bar input[type="text"] {
            padding: 10px;
            width: 60%;
            font-size: 16px;
        }
        .search-bar input[type="submit"] {
            padding: 10px 20px;
            font-size: 16px;
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
        .result-info {
            font-weight: bold;
            color: #333;
            margin-top: 20px;
        }
    </style>
</head>
<body>
    <div class="container">
        <h2>Tìm Kiếm Sản Phẩm Sữa</h2>
        
        <!-- Form tìm kiếm -->
        <div class="search-bar">
            <form action="Ex10.php" method="get">
                <input type="text" name="search" placeholder="Nhập tên sữa cần tìm...">
                <input type="submit" value="Tìm kiếm">
            </form>
        </div>

        <?php
            // Kiểm tra xem người dùng đã nhập từ khóa tìm kiếm chưa
            if (isset($_GET['search']) && !empty($_GET['search'])) {
                $searchQuery = $_GET['search'];

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

                // Truy vấn tìm kiếm sản phẩm dựa trên tên sữa
                $sql = "SELECT Ma_sua, Ten_sua, Trong_luong, Don_gia, TP_dinh_duong, Loi_ich, Hinh FROM SUA 
                        WHERE Ten_sua LIKE '%$searchQuery%'";
                $result = $conn->query($sql);

                // Hiển thị kết quả tìm kiếm
                if ($result->num_rows > 0) {
                    echo "<div class='result-info'>Tìm thấy " . $result->num_rows . " sản phẩm phù hợp:</div>";
                    
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
                    echo "<div class='result-info'>Không tìm thấy sản phẩm này.</div>";
                }

                // Đóng kết nối
                $conn->close();
            } else {
                echo "<div class='result-info'>Vui lòng nhập tên sản phẩm để tìm kiếm.</div>";
            }
        ?>
    </div>
</body>
</html>
