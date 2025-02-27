<?php
ob_start();
session_start();
require_once './commons/env.php'; // Khai bao bien moi truong
    require_once './commons/function.php';//Ham ho tro

//Require toan bo file Controllers
require_once './controller/HomeController.php';



// Require toan bo file models
require_once './model/sanPham.php';
require_once './model/TaiKhoan.php';
require_once './model/GioHang.php';
require_once './model/DonHang.php';
require_once './model/DanhMuc.php';



//Route
$act = $_GET['act'] ?? '/';


require_once "view/asset/header.php";
require_once 'view/asset/slider.php';


// $act = "";
// if (isset($_GET["act"])) {
//     $act = $_GET["act"];
// }
// $id = "";
// if (isset($_GET["id"])) {
//     $id = $_GET["id"];
// }

// include "view/home.php";
match ($act) {
    '/' => (new HomeController())->home(),
    'chi-tiet-san-pham' => (new HomeController())->chiTietSanPham(),

    //đăng nhập
    'login' => (new HomeController())->formLogin(),
    'check-login' => (new HomeController())->postLogin(),
    // default => header("HTTP/1.0 404 Not Found") && require_once 'view/errors/404.php',

    //route giỏ hàng
    'them-gio-hang' =>  (new HomeController())->addGioHang(),
    'gio-hang'  =>  (new HomeController())->gioHang(),
    'thanh-toan'  =>  (new HomeController())->thanhToan(),
    'xu-ly-thanh-toan'  =>  (new HomeController())->postThanhToan(),

    // route lịch sử mua hàng
    'lich-su-mua-hang'      =>  (new HomeController())->lichSuMuaHang(),
    'chi-tiet-mua-hang'     =>  (new HomeController())->chiTietMuaHang(),
    'huy-don-hang'          =>  (new HomeController())->huyDonHang(),





    'remove-item-from-cart'  =>  (new HomeController())->removeItemFromCart(),


    //Đăng ký
    'register' => (new HomeController())->formRegister(),
    'postRegister' => (new HomeController())->postRegister(),
    //route phụ
    'update-quantity' => (new HomeController())->updateQuantity(),

    //router lấy sanPhamTheoId
    'danh-muc-san-pham'=>(new HomeController())->sanPhamTheoDanhMuc(),

    //route thêm bình luận
    'them-binh-luan'=>(new HomeController())->postAddBinhLuan(),

   
};



require_once "view/asset/footer.php";
ob_end_flush();