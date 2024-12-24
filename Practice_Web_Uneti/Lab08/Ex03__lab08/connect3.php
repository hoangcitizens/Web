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
        $dbname = "qlsach"; // Tên cơ sở dữ liệu

        // Tạo kết nối
        $conn = new mysqli($servername, $username, $password, $dbname);

        // Kiểm tra kết nối
        if ($conn->connect_error) {
            die("Kết nối thất bại: " . $conn->connect_error);
        }
        if (isset($_POST['sua'])) {
            // Lấy dữ liệu từ form
            $masach = $_POST['masach'];
            $tensach = $_POST['tensach'];
            $soluong = $_POST['soluong'];
            $dongia = $_POST['dongia'];
            $tacgia = $_POST['tacgia'];

            // Câu lệnh SQL để cập nhật thông tin sách theo mã sách
            $sql = "UPDATE Sach 
                    SET Tensach='$tensach', Soluong=$soluong, Dongia=$dongia, Tacgia='$tacgia' 
                    WHERE Masach='$masach'";

            // Thực hiện truy vấn và kiểm tra kết quả
            if ($conn->query($sql) === TRUE) {
                // Nếu sửa thành công, quay về trang index3.php
                echo "Sửa thành công mã sách " . $masach;
                exit();
            } else {
                // Nếu sửa thất bại, thông báo lỗi
                echo "Sửa thất bại: " . $conn->error;
            }
        }
        // Đóng kết nối
        $conn->close();   
    ?>
</body>
</html>