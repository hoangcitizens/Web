<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Thông Tin Sữa</title>
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
            color: #8B0000;
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
            color: #8B0000;
            text-align: center;
            font-weight: bold;
        }
        tr:nth-child(even) {
            background-color: #FFFAF0;
        }
        tr:nth-child(odd) {
            background-color: #FFF5EE;
        }
        .pager {
            text-align: center;
            margin-top: 20px;
        }
        .pager a {
            margin: 0 5px;
            padding: 5px 10px;
            color: #8B0000;
            text-decoration: none;
            border: 1px solid #8B0000;
            border-radius: 5px;
        }
        .pager a.active, .pager a:hover {
            background-color: #FFD700;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>THÔNG TIN SỮA</h1>
        <?php
            // Kết nối cơ sở dữ liệu
            $servername = "localhost";
            $username = "root";
            $password = "";
            $dbname = "QL_BAN_SUA";
            $conn = new mysqli($servername, $username, $password, $dbname);
            if ($conn->connect_error) {
                die("Kết nối thất bại: " . $conn->connect_error);
            }

            // Phân trang
            $limit = 5; // Số dòng dữ liệu mỗi trang
            $page = isset($_GET['page']) ? (int)$_GET['page'] : 1;
            $offset = ($page - 1) * $limit;

            // Truy vấn dữ liệu với JOIN
            $sql = "
                SELECT s.Ten_sua, hs.Ten_hang_sua, ls.Ten_loai, s.Trong_luong, s.Don_gia
                FROM SUA s
                JOIN HANG_SUA hs ON s.Ma_hang_sua = hs.Ma_hang_sua
                JOIN LOAI_SUA ls ON s.Ma_loai_sua = ls.Ma_loai_sua
                LIMIT $offset, $limit
            ";
            $result = $conn->query($sql);

            // Xuất dữ liệu dạng bảng
            if ($result->num_rows > 0) {
                echo "<table>";
                echo "<tr>
                        <th>Số TT</th>
                        <th>Tên sữa</th>
                        <th>Hãng sữa</th>
                        <th>Loại sữa</th>
                        <th>Trọng lượng</th>
                        <th>Đơn giá</th>
                    </tr>";

                $so_tt = $offset + 1;
                while ($row = $result->fetch_assoc()) {
                    echo "<tr>";
                    echo "<td style='text-align: center;'>$so_tt</td>";
                    echo "<td style='text-align: left;'>" . $row["Ten_sua"] . "</td>";
                    echo "<td style='text-align: left;'>" . $row["Ten_hang_sua"] . "</td>";
                    echo "<td style='text-align: left;'>" . $row["Ten_loai"] . "</td>";
                    echo "<td style='text-align: center;'>" . $row["Trong_luong"] . " gram</td>";
                    echo "<td style='text-align: right; color: #D2691E;'>" . number_format($row["Don_gia"], 0, ',', '.') . " VNĐ</td>";
                    echo "</tr>";
                    $so_tt++;
                }
                echo "</table>";
            } else {
                echo "Không có dữ liệu";
            }

            // Đếm tổng số dòng để tạo phân trang
            $sql_count = "SELECT COUNT(*) AS total FROM SUA";
            $result_count = $conn->query($sql_count);
            $total_rows = $result_count->fetch_assoc()['total'];
            $total_pages = ceil($total_rows / $limit);

            // Hiển thị các liên kết phân trang
            echo "<div class='pager'>";
            for ($i = 1; $i <= $total_pages; $i++) {
                if ($i == $page) {
                    echo "<a href='?page=$i' class='active'>$i</a>";
                } else {
                    echo "<a href='?page=$i'>$i</a>";
                }
            }
            echo "</div>";

            // Đóng kết nối
            $conn->close();
        ?>
    </div>
</body>
</html>
