<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <title>Sửa Loại Hàng</title>
</head>
<body>

<h2>Sửa Loại Hàng</h2>

<?php
// Kết nối đến MySQL
$conn = new mysqli("localhost", "root", "", "QuanLySanPham");

if ($conn->connect_error) {
    die("Kết nối thất bại: " . $conn->connect_error);
}

if (isset($_GET['id'])) {
    $STT = $_GET['id'];
    $result = $conn->query("SELECT * FROM LoaiSanPham WHERE STT = $STT");

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
    } else {
        echo "Loại hàng không tồn tại.";
        exit();
    }
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $STT = $_POST['STT'];
    $TenLoai = $_POST['TenLoai'];
    $sql = "UPDATE LoaiSanPham SET TenLoai = '$TenLoai' WHERE STT = $STT";

    if ($conn->query($sql) === TRUE) {
        header("Location: BT1_dslh.php");
        exit();
    } else {
        echo "Lỗi: " . $conn->error;
    }
}

$conn->close();
?>

<form action="BT1_suadl.php?id=<?php echo $STT; ?>" method="post">
    <input type="hidden" name="STT" value="<?php echo $STT; ?>">
    <table>
        <tr>
            <td>Mã loại:</td>
            <td><input type="text" name="MaLoai" value="<?php echo $row['MaLoai']; ?>" readonly></td>
        </tr>
        <tr>
            <td>Tên loại:</td>
            <td><input type="text" name="TenLoai" value="<?php echo $row['TenLoai']; ?>" required></td>
        </tr>
        <tr>
            <td></td>
            <td>
                <input type="submit" value="Sửa">
                <input type="reset" value="Hủy">
            </td>             
        </tr>
    </table>   
</form>

</body>
</html>
