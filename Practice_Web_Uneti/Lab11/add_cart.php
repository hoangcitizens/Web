<?php
include 'database.php';
session_start();

if (isset($_SESSION['cart'])) {
    $id = $_GET['id'];
    $session_arr_id = array_column($_SESSION['cart'], 'id');

    // Kiểm tra nếu sản phẩm chưa có trong giỏ hàng
    if (!in_array($id, $session_arr_id)) {
        $session_array = array(
            'id' => $_GET['id'],
            'ma' => $_GET['ma'],
            'name' => $_GET['name'],
            'gia' => $_GET['gia'],
            'sl' => 1
        );
        $_SESSION['cart'][] = $session_array;
    } else {
        // Tăng số lượng sản phẩm đã tồn tại
        foreach ($_SESSION['cart'] as $key => $item) {
            if ($item['id'] == $id) {
                $_SESSION['cart'][$key]['sl'] += 1;
            }
        }
    }
} else {
    // Khởi tạo giỏ hàng lần đầu
    $session_array = array(
        'id' => $_GET['id'],
        'ma' => $_GET['ma'],
        'name' => $_GET['name'],
        'gia' => $_GET['gia'],
        'sl' => 1
    );
    $_SESSION['cart'][] = $session_array;
}

// Chuyển hướng về trang cart.php
header("Location:cart.php");
exit();
?>
