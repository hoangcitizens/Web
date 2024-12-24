<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        body {
            display: flex;
            align-items: center;
            justify-content: center;
        }
        h1 {
            color: blue;
            text-align: center; 
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>THÔNG TIN HÃNG SỮA</h1>
        <?php
            // Thiết lập kết nối
            $servername = "localhost";  // Địa chỉ máy chủ MySQL
            $username = "root"; // Tên người dùng MySQL
            $password = ""; // Mật khẩu MySQL
            $dbname = "QL_BAN_SUA";      // Tên CSDL

            // Tạo kết nối
            $conn = new mysqli($servername, $username, $password, $dbname);

            // Kiểm tra kết nối
            if ($conn->connect_error) {
                die("Kết nối thất bại: " . $conn->connect_error);
            }

            // Câu truy vấn SQL để lấy dữ liệu từ bảng HANG_SUA
            $sql = "SELECT * FROM HANG_SUA";
            $result = $conn->query($sql);

            // Kiểm tra và xuất dữ liệu dưới dạng bảng
            if ($result->num_rows > 0) {
                echo "<table border='1' cellpadding='10'>";
                echo "<tr><th>Mã Hãng</th><th>Tên Hãng</th><th>Địa Chỉ</th><th>Điện Thoại</th><th>Email</th></tr>";
                
                // Lặp qua các dòng dữ liệu
                while($row = $result->fetch_assoc()) {
                    echo "<tr>";
                    echo "<td>" . $row["Ma_hang_sua"] . "</td>";
                    echo "<td>" . $row["Ten_hang_sua"] . "</td>";
                    echo "<td>" . $row["Dia_chi"] . "</td>";
                    echo "<td>" . $row["Dien_thoai"] . "</td>";
                    echo "<td>" . $row["Email"] . "</td>";
                    echo "</tr>";
                }
                echo "</table>";
            } else {
                echo "Không có dữ liệu";
            }

            // Đóng kết nối
            $conn->close();
        ?>
    </div>
</body>
</html>

