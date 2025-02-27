<?php

session_start();


require_once '../commons/env.php'; // Khai bao bien moi truong
require_once '../commons/function.php'; //Ham ho tro



//Require toan bo file Controllers
require_once './controller/adminDanhmucController.php';
require_once './controller/adminSanPhamController.php';
require_once './controller/adminBaoCaoThongKeController.php';
require_once './controller/AdminTaiKhoanController.php';
require_once './controller/adminDonHangController.php';
// echo('Thanh cong');



// Require toan bo file models
require_once './model/adminSanPham.php';
require_once './model/adminDanhmuc.php';
require_once './model/adminSanPham.php';
require_once './model/AdminTaiKhoan.php';
require_once './model/adminDonHang.php';
require_once './model/adminThongKe.php';



//Route
$act = $_GET['act'] ?? '/';


require_once "./view/asset/header.php";
// require_once './view/asset/slider.php';
if($act !== 'login-admin' && $act !== 'check-login-admin' && $act !== 'logout-admin'){
    checkLoginAdmin();
}

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
    '/'  => (new adminBaoCaoThongKeController())->thongKeTheoKhachHang(), //trường hợp đặc biệt

    //Route báo cáo thống kê
    'thong-ke'  => (new adminBaoCaoThongKeController())->thongKeTheoKhachHang(), //trường hợp đặc biệt




    //Route danh mục
    'danh-muc' => (new adminDanhmucController())->danhsachdanhmuc(),
    'form-them-danh-muc' => (new adminDanhmucController())->formAddDanhmuc(),
    'them-danh-muc' => (new adminDanhmucController())->postAddDanhmuc(),
    'form-sua-danh-muc' => (new adminDanhmucController())->formEditDanhmuc(),
    'sua-danh-muc' => (new adminDanhmucController())->postEditDanhmuc(),
    'xoa-danh-muc' => (new adminDanhmucController())->deleteDanhmuc(),

    //Route SanPham
    'san-pham' => (new adminSanPhamController())->danhsachSanPham(),
    'form-them-san-pham' => (new adminSanPhamController())->formAddSanPham(),
    'them-san-pham' => (new adminSanPhamController())->postAddSanPham(),
    'form-sua-san-pham' => (new adminSanPhamController())->formEditSanPham(),
    'sua-san-pham' => (new adminSanPhamController())->postEditSanPham(),
    'xoa-san-pham' => (new adminSanPhamController())->deleteSanPham(),
    'chi-tiet-san-pham' => (new adminSanPhamController())->DetailSanPham(),

    // Đây là route bình luận
    'update-trang-thai-binh-luan' => (new adminSanPhamController())->updateTrangThaiBinhLuan(),

    //Route quản lí đơn hàng
    'don-hang' => (new adminDonHangController())->danhSachDonHang(),
    'form-sua-don-hang' => (new adminDonHangController())->formEditDonHang(),
    'sua-don-hang' => (new adminDonHangController())->postEditDonHang(),
    'chi-tiet-don-hang' => (new adminDonHangController())->detailDonHang(),



    //route quản lý tài khoản
    'list-tai-khoan-quan-tri' => (new AdminTaiKhoanController())->danhSachQuanTri(),
    'form-them-quan-tri' => (new AdminTaiKhoanController())->formAddQuantri(),
    'them-quan-tri' => (new AdminTaiKhoanController())->postAddQuantri(),
    'form-sua-quan-tri' => (new AdminTaiKhoanController())->formEditQuantri(),
    'sua-quan-tri' => (new AdminTaiKhoanController())->postEditQuantri(),


    'reset-pasword' => (new AdminTaiKhoanController())->resetPassword(),





    //ruote quản lí tài khoản khách hàng
    'list-tai-khoan-khach-hang' => (new AdminTaiKhoanController())->danhSachKhachHang(),
    'form-sua-khach-hang' => (new AdminTaiKhoanController())->formEditKhachHang(),
    'sua-khach-hang' => (new AdminTaiKhoanController())->postEditKhachHang(),
    'chi-tiet-khach-hang' => (new AdminTaiKhoanController())->detailKhachHang(),


    //route quan li tai khoan ca nhan (quan tri)
    'form-sua-thong-tin-ca-nhan-quan-tri' => (new AdminTaiKhoanController())->formEditCaNhanQuanTri(),
    'sua-thong-tin-ca-nhan-quan-tri' => (new AdminTaiKhoanController())->postEditCaNhanQuanTri(),
    
    'sua-mat-khau-ca-nhan-quan-tri' => (new AdminTaiKhoanController())->postEditMatKhauCaNhan(),


    // route auth
    'login-admin' => (new AdminTaiKhoanController())->formLogin(),
    'check-login-admin' => (new AdminTaiKhoanController())->login(),
    'logout-admin' => (new AdminTaiKhoanController())->logout(),
};



require_once "./view/asset/footer.php";
