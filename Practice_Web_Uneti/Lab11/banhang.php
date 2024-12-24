<?php
include 'database.php';
session_start();

// Truy vấn sản phẩm
$sql = "SELECT * FROM san_pham";
$result = $conn->query($sql);

if (!$result) {
    die("Lỗi truy vấn cơ sở dữ liệu: " . $conn->error);
}
?>

<!DOCTYPE html>
<html lang="vi">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bán hàng</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f9f9f9;
            margin: 0;
            padding: 0;
        }

        h1 {
            text-align: center;
            color: #333;
            margin-top: 20px;
        }

        h2 {
            color: #007bff;
            text-align: center;
            margin: 20px 0;
        }

        .container {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
            gap: 20px;
            max-width: 1200px;
            margin: 20px auto;
            padding: 0 15px;
        }

        .product {
            background-color: white;
            border: 1px solid #ddd;
            border-radius: 10px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            padding: 15px;
            text-align: center;
            transition: transform 0.2s ease, box-shadow 0.2s ease;
        }

        .product:hover {
            transform: translateY(-5px);
            box-shadow: 0 6px 10px rgba(0, 0, 0, 0.2);
        }

        .product h3 {
            font-size: 18px;
            color: #555;
            margin-bottom: 10px;
        }

        .product p {
            font-size: 16px;
            color: #666;
            margin-bottom: 15px;
        }

        .button {
            display: inline-block;
            padding: 10px 20px;
            color: white;
            background-color: #28a745;
            border: none;
            border-radius: 5px;
            text-decoration: none;
            font-size: 14px;
            transition: background-color 0.3s ease;
        }

        .button:hover {
            background-color: #218838;
        }

        a[href="cart.php"] {
            text-decoration: none;
            font-size: 20px;
        }

        a[href="cart.php"]:hover {
            text-decoration: underline;
        }
    </style>
</head>

<body>
    <h1>Danh sách sản phẩm</h1>
    <a href="cart.php">
        <h2>Giỏ hàng</h2>
    </a>
    <div class="container">
        <?php if ($result && $result->num_rows > 0): ?>
            <?php foreach ($result as $row): ?>
                <div class="product">
                    <h3><?php echo htmlspecialchars($row["ten_san_pham"]); ?></h3>
                    <p>Giá: <?php echo number_format($row["gia"]); ?> VNĐ</p>
                    <?php if (!empty($row['id']) && !empty($row['ma_san_pham']) && !empty($row['ten_san_pham']) && !empty($row['gia'])): ?>
                        <a class="button"
                            href="add_cart.php?id=<?= htmlspecialchars($row['id']) ?>&ma=<?= htmlspecialchars($row['ma_san_pham']) ?>&name=<?= urlencode($row['ten_san_pham']) ?>&gia=<?= htmlspecialchars($row['gia']) ?>">
                            Mua
                        </a>
                    <?php else: ?>
                        <p style="color: red;">Dữ liệu sản phẩm bị thiếu.</p>
                    <?php endif; ?>
                </div>
            <?php endforeach; ?>
        <?php else: ?>
            <p style="text-align: center; color: #888;">Không có sản phẩm nào để hiển thị.</p>
        <?php endif; ?>
    </div>
</body>

</html>
