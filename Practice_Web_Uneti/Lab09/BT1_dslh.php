<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <title>DANH SÁCH LOẠI HÀNG</title>
    <style>
        table, th, td {
            border: 1px solid black;
            border-collapse: collapse;
            padding: 5px;
            text-align: center;
        }
        a {
            text-decoration: none;
            color: blue;
        }
    </style>
</head>
<body>
    <h2>DANH SÁCH LOẠI HÀNG</h2>
    <table>
        <tr>
            <th>STT</th>
            <th>Mã loại</th>
            <th>Tên loại</th>
            <th>Sửa</th>
            <th>Xóa</th>
        </tr>

        <?php
        // Kết nối đến MySQL
        $conn = new mysqli("localhost", "root", "", "QuanLySanPham");

        // Kiểm tra kết nối
        if ($conn->connect_error) {
            die("Kết nối thất bại: " . $conn->connect_error);
        }

        // Truy vấn dữ liệu từ bảng LoaiSanPham
        $sql = "SELECT * FROM LoaiSanPham";
        $result = $conn->query($sql);

        // Hiển thị dữ liệu
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                echo "<tr>
                        <td>{$row['STT']}</td>
                        <td>{$row['MaLoai']}</td>
                        <td>{$row['TenLoai']}</td>
                        <td><a href='BT1_suadl.php?id={$row['STT']}'>Sửa</a></td>
                        <td><a href='BT1_xoadl.php?id={$row['STT']}'>Xóa</a></td>
                    </tr>";
            }
        } else {
            echo "<tr><td colspan='5'>Không có dữ liệu</td></tr>";
        }

        $conn->close();
        ?>

    </table>
    <br>
<button onclick="window.location.href='BT1_themmoi.php'">Thêm mới</button>
</body>
</html>
