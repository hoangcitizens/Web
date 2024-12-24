<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<?php
        if (isset($_GET['id'])) {
            // Kết nối đến MySQL
            $conn = new mysqli("localhost", "root", "", "QuanLySanPham");

            if ($conn->connect_error) {
                die("Kết nối thất bại: " . $conn->connect_error);
            }

            $STT = $_GET['id'];
            $sql = "DELETE FROM LoaiSanPham WHERE STT = $STT";

            if ($conn->query($sql) === TRUE) {
                header("Location: BT1_dslh.php");
                exit();
            } else {
                echo "Lỗi: " . $conn->error;
            }

            $conn->close();
        } else {
            echo "Không tìm thấy loại hàng cần xóa.";
        }
    ?>
</body>
</html>

