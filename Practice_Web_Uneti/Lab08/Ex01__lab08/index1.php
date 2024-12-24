<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form method="post" action="connect1.php">
        <h2>CẬP NHẬT SINH VIÊN</h2>
        <table>
            <tr>
                <td>MÃ SV:</td>
                <td> <input type="text" name="MaSV"> </td>
            </tr>
            <tr>
                <td>HỌ ĐỆM</td>
                <td> <input type="text" name="HoDem"> </td>
            </tr>
            <tr>
                <td>TÊN:</td>
                <td> <input type="text" name="Ten"> </td>
            </tr>
            <tr>
                <td>NGÀY SINH:</td>
                <td> <input type="text" name="NgaySinh"> </td>
            </tr>
            <tr>
                <td>GIỚI TÍNH:</td>
                <td> <input type="text" name="GioiTinh"> </td>
            </tr>
            <tr>
                <td>MÃ KHOA:</td>
                <td> <input type="text" name="MaKhoa"> </td>
            </tr>     
            <tr>
                <td></td>
                <td>
                    <input type="submit" name="capnhat" value="Cập nhật">
                    <input type="submit" name="xoa" value="Xóa">
                    <input type="reset" value="Làm mới">
                </td>
            </tr>    
        </table>
    </form>
</body>
</html>