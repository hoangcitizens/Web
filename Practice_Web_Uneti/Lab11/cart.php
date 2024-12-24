<?php $total = 0;session_start() ?>
<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Giỏ hàng</title>
    <style>
        table { width: 50%; border-collapse: collapse; margin-top: 30px; }
        th, td { border: 1px solid #ccc; padding: 10px; text-align: left; }
    </style>
</head>
<body>
    <h1>Giỏ hàng</h1>
    <a href="xoa.php">Xoá giỏ hàng</a>
    <table>
        <tr>
            <th>Mã sản phẩm</th>
            <th>Tên sản phẩm</th>
            <th>Giá</th>
            <th>Số lượng</th>
            <th>Tổng</th>
        </tr>
        <?php 
        if (isset($_SESSION['cart'])){
        foreach ($_SESSION['cart'] as $item): 
            
        ?>
        <tr>
            <td><?php echo $item["ma"]; ?></td>
            <td><?php echo $item["name"]; ?></td>
            <td><?php echo number_format($item["gia"]); ?> VNĐ</td>
            <td><?php echo $item['sl']; ?></td>
            <td><?php echo number_format($item["gia"]*$item['sl']); ?> VNĐ</td>
        </tr>
        <?php $total += $item["gia"]*$item['sl']; endforeach; }?>
    </table>
    <h3>Tổng cộng: <?php echo number_format($total); ?> VNĐ</h3>
    <a href="banhang.php">Quay lại cửa hàng</a>
</body>
</html>