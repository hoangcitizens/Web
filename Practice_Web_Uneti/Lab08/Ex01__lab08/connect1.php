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
        $dbname = "QuanLySinhVien"; // Tên cơ sở dữ liệu

        // Tạo kết nối
        $conn = new mysqli($servername, $username, $password, $dbname);

        // Kiểm tra kết nối
        if ($conn->connect_error) {
            die("Kết nối thất bại: " . $conn->connect_error);
        }

        if (isset($_POST['capnhat'])) {
            // Lấy dữ liệu từ biểu mẫu
            $masv = $_POST['MaSV'];
            $hodem = $_POST['HoDem'];
        
            // Câu lệnh SQL để cập nhật họ đệm
            $sql = "UPDATE SinhVien SET Dem='$hodem' WHERE MaSinhVien='$masv'";
        
            // Thực hiện truy vấn
            if ($conn->query($sql) === TRUE) {
                echo "Cập nhật họ đệm thành công!";
            } else {
                echo "Lỗi khi cập nhật: " . $conn->error;
            }
        }
        // Kiểm tra nếu người dùng đã nhấn nút "Xóa"
        if (isset($_POST['xoa'])) {
            // Lấy mã sinh viên từ form
            $masv = $_POST['MaSV'];

            // Câu lệnh SQL để xóa sinh viên
            $sql = "DELETE FROM SinhVien WHERE MaSinhVien='$masv'";

            // Thực hiện truy vấn
            if ($conn->query($sql) === TRUE) {
                echo "Xóa thành công sinh viên có mã $masv";
            } else {
                echo "Lỗi khi xóa: " . $conn->error;
            }
        }

        // Đóng kết nối
        $conn->close();
    ?>
</body>
</html>