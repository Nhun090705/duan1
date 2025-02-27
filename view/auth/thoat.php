<?php
session_start();
session_unset(); // Xóa tất cả dữ liệu session
session_destroy(); // Hủy session

// Định nghĩa BASE_URL nếu chưa có
if (!defined('BASE_URL')) {
    define('BASE_URL', 'http://localhost/duan1/'); // Thay URL của bạn ở đây
}

// Chuyển hướng về `?act=register`
header("Location: " . BASE_URL . "?act=/");
exit();

?>
