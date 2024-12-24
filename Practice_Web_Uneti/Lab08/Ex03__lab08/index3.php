<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bài 3: Sửa Thông Tin Sách</title>
</head>
<body>
    <h2>SỬA THÔNG TIN SÁCH</h2>
    <form action="connect3.php" method="post">
        <table>
            <tr>
                <td> Mã sách: </td>
                <td> <input type="text" name="masach" required> </td>
            </tr>
            <tr>
                <td> Tên sách: </td>
                <td> <input type="text" name="tensach" required></td>
            </tr>
            <tr>
                <td> Số lượng: </td>
                <td> <input type="text" name="soluong" required></td>
            </tr>
            <tr>
                <td> Đơn giá: </td>
                <td> <input type="text" name="dongia" required></td>
            </tr>
            <tr>
                <td> Tác giả: </td>
                <td> <input type="text" name="tacgia" required></td>
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
</body>
</html>