<!DOCTYPE html>
<html lang="vi">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Thêm Sản Phẩm Sữa Mới</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            display: flex;
            justify-content: center;
            align-items: center;
            margin: 0;
        }

        .container {
            background-color: pink;
            width: 50%;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        h1 {
            color: white;
            background-color: palevioletred;
            text-align: center;
            margin-top: 0;
            padding: 10px;
            margin: -20px -20px 20px -20px;
            border-radius: 8px 8px 0 0;
        }

        .form-group {
            margin-bottom: 15px;
        }

        label {
            display: block;
            font-weight: bold;
        }

        input[type="text"],
        input[type="number"],
        textarea,
        select {
            width: 100%;
            padding: 8px;
        }

        .error {
            color: red;
            font-weight: bold;
        }

        .product-info {
            margin-top: 20px;
            border: 1px solid #ccc;
            padding: 15px;
        }

        .product-info img {
            width: 100px;
            height: 100px;
        }

        .button {
            padding: 10px 20px;
            background-color: #007bff;
            color: white;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }
    </style>
</head>

<body>

    <div class="container">
        <h1>THÊM SỮA MỚI</h1>
        <?php
        $error = '';
        $new_product = null;

        // Kiểm tra xem form đã được submit chưa
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            // Lấy dữ liệu từ form
            $ma_sua = $_POST['ma_sua'];
            $ten_sua = $_POST['ten_sua'];
            $hang_sua = $_POST['hang_sua'];
            $loai_sua = $_POST['loai_sua'];
            $trong_luong = $_POST['trong_luong'];
            $don_gia = $_POST['don_gia'];
            $tp_dinh_duong = $_POST['tp_dinh_duong'];
            $loi_ich = $_POST['loi_ich'];

            // Kiểm tra tính hợp lệ của dữ liệu
            if (empty($ma_sua) || empty($ten_sua) || empty($hang_sua) || empty($loai_sua) || empty($trong_luong) || empty($don_gia)) {
                $error = "Kiểm tra lại thông tin nhập vào";
            } else {
                // Xử lý upload hình ảnh
                $hinh = "default.png"; // Ảnh mặc định
                if (isset($_FILES['hinh']) && $_FILES['hinh']['error'] == UPLOAD_ERR_OK) {
                    $hinh = $_FILES['hinh']['name'];
                    move_uploaded_file($_FILES['hinh']['tmp_name'], "" . $hinh);
                }

                // Kết nối cơ sở dữ liệu
                $conn = new mysqli("localhost", "root", "", "QL_BAN_SUA");
                if ($conn->connect_error) {
                    die("Kết nối thất bại: " . $conn->connect_error);
                }

                // Thêm sản phẩm mới vào bảng SUA
                $sql = "INSERT INTO SUA (Ma_sua, Ten_sua, Ma_hang_sua, Ma_loai_sua, Trong_luong, Don_gia, TP_dinh_duong, Loi_ich, Hinh) 
                    VALUES ('$ma_sua', '$ten_sua', '$hang_sua', '$loai_sua', '$trong_luong', '$don_gia', '$tp_dinh_duong', '$loi_ich', '$hinh')";

                if ($conn->query($sql) === TRUE) {
                    // Lấy lại thông tin sản phẩm vừa thêm
                    $last_id = $conn->insert_id;
                    $result = $conn->query("SELECT SUA.*, HANG_SUA.Ten_hang_sua, LOAI_SUA.Ten_loai FROM SUA
                                        JOIN HANG_SUA ON SUA.Ma_hang_sua = HANG_SUA.Ma_hang_sua
                                        JOIN LOAI_SUA ON SUA.Ma_loai_sua = LOAI_SUA.Ma_loai_sua
                                        WHERE Ma_sua = '$ma_sua'");
                    $new_product = $result->fetch_assoc();
                } else {
                    $error = "Lỗi: " . $sql . "<br>" . $conn->error;
                }

                $conn->close();
            }
        }
        ?>

        <!-- Hiển thị thông báo lỗi -->
        <?php if ($error) {
            echo "<p class='error'>$error</p>";
        } ?>

        <!-- Form thêm sản phẩm sữa -->
        <form action="" method="POST" enctype="multipart/form-data">
            <div class="form-group">
                <label for="ma_sua">Mã sữa:</label>
                <input type="text" id="ma_sua" name="ma_sua">
            </div>

            <div class="form-group">
                <label for="ten_sua">Tên sữa:</label>
                <input type="text" id="ten_sua" name="ten_sua">
            </div>

            <div class="form-group">
                <label for="hang_sua">Hãng sữa:</label>
                <select id="hang_sua" name="hang_sua">
                    <option value="">Chọn hãng sữa</option>
                    <?php
                    // Lấy danh sách hãng sữa
                    $conn = new mysqli("localhost", "root", "", "QL_BAN_SUA");
                    $result = $conn->query("SELECT * FROM HANG_SUA");
                    while ($row = $result->fetch_assoc()) {
                        echo "<option value='" . $row['Ma_hang_sua'] . "'>" . $row['Ten_hang_sua'] . "</option>";
                    }
                    $conn->close();
                    ?>
                </select>
            </div>

            <div class="form-group">
                <label for="loai_sua">Loại sữa:</label>
                <select id="loai_sua" name="loai_sua">
                    <option value="">Chọn loại sữa</option>
                    <?php
                    // Lấy danh sách loại sữa
                    $conn = new mysqli("localhost", "root", "", "QL_BAN_SUA");
                    $result = $conn->query("SELECT * FROM LOAI_SUA");
                    while ($row = $result->fetch_assoc()) {
                        echo "<option value='" . $row['Ma_loai_sua'] . "'>" . $row['Ten_loai'] . "</option>";
                    }
                    $conn->close();
                    ?>
                </select>
            </div>

            <div class="form-group">
                <label for="trong_luong">Trọng lượng (gr):</label>
                <input type="number" id="trong_luong" name="trong_luong">
            </div>

            <div class="form-group">
                <label for="don_gia">Đơn giá (VNĐ):</label>
                <input type="number" id="don_gia" name="don_gia">
            </div>

            <div class="form-group">
                <label for="tp_dinh_duong">Thành phần dinh dưỡng:</label>
                <textarea id="tp_dinh_duong" name="tp_dinh_duong"></textarea>
            </div>

            <div class="form-group">
                <label for="loi_ich">Lợi ích:</label>
                <textarea id="loi_ich" name="loi_ich"></textarea>
            </div>

            <div class="form-group">
                <label for="hinh">Hình ảnh:</label>
                <input type="file" id="hinh" name="hinh">
            </div>

            <button class="button" type="submit">Thêm sản phẩm</button>
        </form>

        <!-- Hiển thị thông tin sản phẩm mới thêm -->
        <?php
        if ($new_product) {
            echo "<div class='product-info'>";
            echo "<img src='" . $new_product['Hinh'] . "' alt='" . $new_product['Ten_sua'] . "'>";
            echo "<h3>" . $new_product['Ten_sua'] . "</h3>";
            echo "<p>Mã sữa: " . $new_product['Ma_sua'] . "</p>";
            echo "<p>Nhà sản xuất: " . $new_product['Ten_hang_sua'] . "</p>";
            echo "<p>Loại sữa: " . $new_product['Ten_loai'] . "</p>";
            echo "<p>Trọng lượng: " . $new_product['Trong_luong'] . " gr</p>";
            echo "<p>Đơn giá: " . number_format($new_product['Don_gia']) . " VNĐ</p>";
            echo "<p>Thành phần dinh dưỡng: " . $new_product['TP_dinh_duong'] . "</p>";
            echo "<p>Lợi ích: " . $new_product['Loi_ich'] . "</p>";
            echo "</div>";
        }
        ?>
    </div>

</body>

</html>