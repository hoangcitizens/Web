<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Thông Tin Khách Hàng</title>
    <style>
        body {
            display: flex;
            align-items: center;
            justify-content: center;
            font-family: Arial, sans-serif;
            background-color: #f4f4f9;
        }
        h1 {
            text-align: center; 
            color: #333;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }
        th, td {
            padding: 10px;
            border: 1px solid #ddd;
        }
        th {
            background-color: #FFD700;
            color: #000;
            text-align: center;
            font-weight: bold;
        }
        tr:nth-child(even) {
            background-color: #FFFAF0;
        }
        tr:nth-child(odd) {
            background-color: #FFF5EE;
        }
        td img {
            width: 20px;
            height: 20px;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>THÔNG TIN KHÁCH HÀNG</h1>
        <?php
            // Thiết lập kết nối
            $servername = "localhost";   // Địa chỉ máy chủ MySQL
            $username = "root";          // Tên người dùng MySQL
            $password = "";              // Mật khẩu MySQL
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
                echo "<table>";
                echo "<tr>
                        <th>Mã KH</th>
                        <th>Tên khách hàng</th>
                        <th>Giới tính</th>
                        <th>Địa chỉ</th>
                        <th>Số điện thoại</th>
                    </tr>";
                
                // Đếm số dòng để áp dụng màu nền xen kẽ
                while($row = $result->fetch_assoc()) {
                    echo "<tr>";
                    echo "<td style='text-align: center;'>" . $row["Ma_khach_hang"] . "</td>";
                    echo "<td style='text-align: left;'>" . $row["Ten_khach_hang"] . "</td>";
                    
                    // Hiển thị biểu tượng giới tính
                    $gender_icon = ($row["Phai"] == 1) ? "nam.png" : "nu.png";
                    echo "<td style='text-align: center;'><img src='$gender_icon' alt='Giới tính'></td>";
                    
                    echo "<td style='text-align: left;'>" . $row["Dia_chi"] . "</td>";
                    echo "<td style='text-align: center;'>" . $row["Dien_thoai"] . "</td>";
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
