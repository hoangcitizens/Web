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
        h2 {
            text-align: center; 
        }
    </style>
</head>
<body>
    <div class="container">
        <h2>THÔNG TIN KHÁCH HÀNG</h2>
        <?php
            // Thiết lập kết nối
            $servername = "localhost";   // Địa chỉ máy chủ MySQL
            $username = "root"; // Tên người dùng MySQL
            $password = ""; // Mật khẩu MySQL
            $dbname = "QL_BAN_SUA";      // Tên CSDL
            // Tạo kết nối
            $conn = new mysqli($servername, $username, $password, $dbname);

            // Kiểm tra kết nối
            if ($conn->connect_error) {
                die("Kết nối thất bại: " . $conn->connect_error);
            }

            // Câu truy vấn SQL để lấy dữ liệu từ bảng KHACH_HANG
            $sql = "SELECT * FROM KHACH_HANG";
            $result = $conn->query($sql);

            // Kiểm tra và xuất dữ liệu dưới dạng bảng
            if ($result->num_rows > 0) {
                echo "<table border='1' cellpadding='10' cellspacing='0' style='width:100%; border-collapse: collapse'>";
                echo "<tr style='background-color: #FFD700; color: #000; text-align: center; font-weight: bold;'>
                        <th>Mã KH</th>
                        <th>Tên khách hàng</th>
                        <th>Giới tính</th>
                        <th>Địa chỉ</th>
                        <th>Số điện thoại</th>
                    </tr>";
                
                // Đếm số dòng để áp dụng màu nền xen kẽ
                $row_count = 0;
                while($row = $result->fetch_assoc()) {
                    $bg_color = ($row_count % 2 == 0) ? "#FFFAF0" : "#FFF5EE"; // Dòng chẵn, lẻ khác màu nền
                    echo "<tr style='background-color: $bg_color; text-align: center;'>";
                    echo "<td>" . $row["Ma_khach_hang"] . "</td>";
                    echo "<td style='text-align: left;'>" . $row["Ten_khach_hang"] . "</td>";
                    echo "<td>" . ($row["Phai"] == 1 ? "Nam" : "Nữ") . "</td>"; // Canh giữa cột Giới tính
                    echo "<td style='text-align: left;'>" . $row["Dia_chi"] . "</td>";
                    echo "<td>" . $row["Dien_thoai"] . "</td>";
                    echo "</tr>";
                    $row_count++;
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