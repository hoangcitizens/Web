<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <title>Thêm Mới Loại Hàng</title>
</head>
<body>

    <h2>Thêm Mới Loại Hàng</h2>

    <form action="BT1_themmoi.php" method="post">
            <table>
                <tr>
                    <td>Mã loại:</td>
                    <td><input type="text" name="MaLoai" required></td>
                </tr>
                <tr>
                    <td>Tên loại:</td>
                    <td><input type="text" name="TenLoai" required></td>
                </tr>
                <tr>
                    <td></td>
                    <td>
                        <input type="submit" value="Thêm mới">
                        <input type="reset" value="Hủy">
                    </td>             
                </tr>
            </table>   
        </form>

    <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        // Kết nối đến MySQL
        $conn = new mysqli("localhost", "root", "", "QuanLySanPham");

        // Kiểm tra kết nối
        if ($conn->connect_error) {
            die("Kết nối thất bại: " . $conn->connect_error);
        }

        // Lấy dữ liệu từ form
        $MaLoai = $_POST['MaLoai'];
        $TenLoai = $_POST['TenLoai'];

        // Chuẩn bị và thực hiện câu lệnh thêm mới
        $sql = "INSERT INTO LoaiSanPham (MaLoai, TenLoai) VALUES ('$MaLoai', '$TenLoai')";

        if ($conn->query($sql) === TRUE) {
            echo "Thêm loại hàng thành công.";
            header("Location: BT1_dslh.php"); // Chuyển hướng về trang danh sách
            exit();
        } else {
            echo "Lỗi: " . $sql . "<br>" . $conn->error;
        }

        $conn->close();
    }
    ?>

</body>
</html>

