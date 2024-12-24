<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tìm Kiếm Nâng Cao Sản Phẩm Sữa</title>
    <style>
        body { font-family: Arial, sans-serif; }
        h2 {
            text-align: center; 
            color: violet; 
        }
        .container { width: 80%; margin: 0 auto; }
        .search-form { margin-bottom: 20px; }
        .product { border: 1px solid #ccc; padding: 15px; margin-bottom: 10px; }
        .product img { width: 100px; height: 100px; }
        .product-info { display: inline-block; vertical-align: top; margin-left: 20px; }
        .result-count { font-weight: bold; }
    </style>
</head>
<body>

<div class="container">
    <h2>Tìm kiếm thông tin sữa</h2>
    <!-- Form Tìm Kiếm Nâng Cao -->
    <form action="" method="GET" class="search-form">
        <label for="ten_sua">Tên sữa:</label>
        <input type="text" id="ten_sua" name="ten_sua" placeholder="Nhập tên sữa">

        <label for="loai_sua">Loại sữa:</label>
        <select id="loai_sua" name="loai_sua">
            <option value="">Chọn loại sữa</option>
            <?php
            // Kết nối cơ sở dữ liệu và lấy danh sách loại sữa
            $conn = new mysqli("localhost", "root", "", "QL_BAN_SUA");
            $sql = "SELECT * FROM LOAI_SUA";
            $result = $conn->query($sql);
            while ($row = $result->fetch_assoc()) {
                echo "<option value='" . $row['Ma_loai_sua'] . "'>" . $row['Ten_loai'] . "</option>";
            }
            ?>
        </select>

        <label for="hang_sua">Hãng sữa:</label>
        <select id="hang_sua" name="hang_sua">
            <option value="">Chọn hãng sữa</option>
            <?php
            // Lấy danh sách hãng sữa
            $sql = "SELECT * FROM HANG_SUA";
            $result = $conn->query($sql);
            while ($row = $result->fetch_assoc()) {
                echo "<option value='" . $row['Ma_hang_sua'] . "'>" . $row['Ten_hang_sua'] . "</option>";
            }
            ?>
        </select>

        <button type="submit">Tìm kiếm</button>
    </form>

    <?php
    // Xử lý tìm kiếm
    if ($_SERVER["REQUEST_METHOD"] == "GET") {
        $ten_sua = isset($_GET['ten_sua']) ? $_GET['ten_sua'] : '';
        $loai_sua = isset($_GET['loai_sua']) ? $_GET['loai_sua'] : '';
        $hang_sua = isset($_GET['hang_sua']) ? $_GET['hang_sua'] : '';

        // Tạo câu lệnh SQL với điều kiện lọc
        $sql = "SELECT SUA.*, HANG_SUA.Ten_hang_sua, LOAI_SUA.Ten_loai 
                FROM SUA 
                JOIN HANG_SUA ON SUA.Ma_hang_sua = HANG_SUA.Ma_hang_sua 
                JOIN LOAI_SUA ON SUA.Ma_loai_sua = LOAI_SUA.Ma_loai_sua 
                WHERE 1=1";
        if ($ten_sua) {
            $sql .= " AND SUA.Ten_sua LIKE '%$ten_sua%'";
        }
        if ($loai_sua) {
            $sql .= " AND SUA.Ma_loai_sua = '$loai_sua'";
        }
        if ($hang_sua) {
            $sql .= " AND SUA.Ma_hang_sua = '$hang_sua'";
        }

        $result = $conn->query($sql);
        $num_results = $result->num_rows;

        // Kiểm tra và hiển thị kết quả
        if ($num_results > 0) {
            echo "<p class='result-count'>Tìm thấy $num_results sản phẩm</p>";
            while ($row = $result->fetch_assoc()) {
                echo "<div class='product'>";
                $imagePath = "" . $row['Hinh'];
                echo "<img src='" . (file_exists($imagePath) ? $imagePath : '/default.png') . "' alt='" . $row['Ten_sua'] . "'>";
                echo "<div class='product-info'>";
                echo "<h3>" . $row['Ten_sua'] . "</h3>";
                echo "<p>Nhà sản xuất: " . $row['Ten_hang_sua'] . "</p>";
                echo "<p>Loại sữa: " . $row['Ten_loai'] . "</p>";
                echo "<p>Trọng lượng: " . $row['Trong_luong'] . " gr</p>";
                echo "<p>Đơn giá: " . number_format($row['Don_gia']) . " VNĐ</p>";
                echo "<p>Thành phần dinh dưỡng: " . $row['TP_dinh_duong'] . "</p>";
                echo "<p>Lợi ích: " . $row['Loi_ich'] . "</p>";
                echo "</div></div>";
            }
        } else {
            echo "<p>Không tìm thấy sản phẩm này</p>";
        }
        $conn->close();
    }
    ?>
</div>

</body>
</html>
