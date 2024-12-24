<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bài 2</title>
</head>
<body>
    <form action="connect2.php" method="post">
        <table>
            <tr>SỬA LOẠI HÀNG</tr>
            <tr>
                <td>Mã loại:</td>
                <td> <input type="text" name="MaHang"> </td>
            </tr>
            <tr>
                <td>Tên loại:</td>
                <td> <input type="text" name="TenHang"> </td>
            </tr>
            <tr>
                <td></td>
                <td>
                    <input type="submit" name="sua" value="Sửa">
                    <input type="reset" value="Hủy">
                </td>
            </tr>
        </table>
    </form>
        <br>
    <form action="connect2.php" method="post">
        <table>
            <tr>XÓA LOẠI HÀNG</tr>
            <tr>
                <td>Mã loại:</td>
                <td> <input type="text" name="MaHang"> </td>
            </tr>
            <tr>
                <td></td>
                <td>
                    <input type="submit" name="xoa" value="Xóa">
                    <input type="reset" value="Hủy">
                </td>
            </tr>
        </table>
    </form>
</body>
</html>