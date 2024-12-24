<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
        // Thông tin kết nối
        $servername = "localhost"; // Địa chỉ máy chủ MySQL
        $username = "root"; // Tên đăng nhập MySQL
        $password = ""; // Mật khẩu của MySQL (nếu có)
        $dbname = "qlhh"; // Tên cơ sở dữ liệu

        // Tạo kết nối
        $conn = new mysqli($servername, $username, $password, $dbname);

        // Kiểm tra kết nối
        if ($conn->connect_error) {
            die("Kết nối thất bại: " . $conn->connect_error);
        }
        // Xử lý cập nhật tên hàng hóa
        if (isset($_POST['sua'])) {
            // Lấy dữ liệu từ form
            $mahang = $_POST['MaHang'];
            $tenhangmoi = $_POST['TenHang'];

            // Câu lệnh SQL để cập nhật tên hàng hóa
            $sql_update = "UPDATE HangHoa SET TenHang='$tenhangmoi' WHERE MaHang='$mahang'";

            // Thực hiện truy vấn
            if ($conn->query($sql_update) === TRUE) {
                echo "Cập nhật tên hàng hóa thành công!";
            } else {
                echo "Lỗi khi cập nhật: " . $conn->error;
            }
        }

        // Xử lý xóa hàng hóa
        if (isset($_POST['xoa'])) {
            // Lấy dữ liệu từ form
            $mahangxoa = $_POST['MaHang'];

            // Câu lệnh SQL để xóa hàng hóa
            $sql_delete = "DELETE FROM HangHoa WHERE MaHang='$mahangxoa'";

            // Thực hiện truy vấn
            if ($conn->query($sql_delete) === TRUE) {
                echo "Xóa hàng hóa thành công!";
            } else {
                echo "Lỗi khi xóa: " . $conn->error;
            }
        }

        // Đóng kết nối
        $conn->close();
    ?>
</body>
</html>