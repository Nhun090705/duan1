<?php
ob_start();
ob_end_flush();
class adminDonHangController
{
    public $modelDonHang;

    public function __construct()
    {
        $this->modelDonHang = new adminDonHang();
    }
    public function danhsachDonHang()
    {
        $listDonHang = $this->modelDonHang->getAllDonHang();
        require_once './view/donhang/listDonHang.php';
    }

    public function detailDonHang()
    {
        $don_hang_id = $_GET['id_don_hang'];
        $donHang = $this->modelDonHang->getDetailDonHang($don_hang_id);

        // lấy danh sách sản phẩm đã đặt của đơn hàng ở bảng chi_tiet_don_háng

        $sanPhamDonHang = $this->modelDonHang->getListSpDonHang($don_hang_id);


        $listTrangThaiDonHang = $this->modelDonHang->getAllTrangThaiDonHang();

        require_once './view/donhang/detailDonHang.php';
    }

    public function formEditDonHang()
    {
        // hien thi form nhập
        // var_dump('form thêm');
        // lấy ra tt dm cần sua
        $id = $_GET['id_don_hang'];
        $donHang = $this->modelDonHang->getDetailDonHang($id);

        $listTrangThaiDonHang = $this->modelDonHang->getAllTrangThaiDonHang();
        if ($donHang) {
            require_once './view/donhang/editDonHang.php';
            deleteSessionsError();
        } else {
            header("Location: " . BASE_URL_AMIN . '?act=don-hang');
            exit();
        }
    }
    // public function postEditDonHang()

    // {
    //     // hàm dùng để thêm dữ liệu
    //     // var_dump($_POST);
    //     // kiểm tra xem dư lieu co phai dc sb lên form không
    //     if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    //         $don_hang_id = $_POST['don_hang_id'] ?? '';
    //         // lấy ra dữ liệu
    //         $ten_nguoi_nhan = $_POST['ten_nguoi_nhan'] ?? '';
    //         $sdt_nguoi_nhan = $_POST['sdt_nguoi_nhan'] ?? '';
    //         $email_nguoi_nhan = $_POST['email_nguoi_nhan'] ?? '';
    //         $dia_chi_nguoi_nhan = $_POST['dia_chi_nguoi_nhan'] ?? '';
    //         $ghi_chu = $_POST['ghi_chu'] ?? '';
    //         $trang_thai_id= $_POST['trang_thai_id'] ?? '';



    //         // $img_array = $_FILES['img_array'];
    //         // tao một mảng trống chứa dl
    //         $errors=[];
    //         // tao một mảng chứa dl

    //         if (empty($ten_nguoi_nhan)) {
    //            $errors['ten_nguoi_nhan'] = 'Tên người nhận không bỏ trống';
    //         }
    //         if (empty($sdt_nguoi_nhan)) {
    //             $errors['sdt_nguoi_nhan'] = 'Số điện thoại không bỏ trống';
    //          }
    //          if (empty($email_nguoi_nhan)) {
    //             $errors['email_nguoi_nhan'] = 'email không bỏ trống';
    //          }
    //          if (empty($dia_chi_nguoi_nhan)) {
    //             $errors['dia_chi_nguoi_nhan'] = 'Địa chỉ không bỏ trống';
    //          }

    //          if (empty($trang_thai_id)) {
    //             $errors['trang_thai_id'] = 'Trạng thái không bỏ trống';
    //          }         
    //         $_SESSION['error'] = $errors;

    //         }
    //         if (empty($errors)) {

    //        $this->modelDonHang->UpdateDonHang(
    //                 $don_hang_id,
    //                 $ten_nguoi_nhan,
    //                 $sdt_nguoi_nhan,
    //                 $email_nguoi_nhan,
    //                 $dia_chi_nguoi_nhan,
    //                 $ghi_chu,
    //                 $trang_thai_id
    //             );

    //             header("Location: " . BASE_URL_AMIN . '?act=don-hang');
    //             exit();
    //         } else {
    //             // trả về form và lỗi
    //             // đặt chỉ thị xóa session khi ht form
    //             // require_once './view/sanpham/addSanPham.php';
    //             $_SESSION['flash'] = true;
    //             header("Location: " . BASE_URL_AMIN . '?act=form-sua-don-hang&id_don_hang' . $don_hang_id);
    //             exit();
    //         }
    // }


    public function postEditDonHang()
    {
        // hàm dùng để thêm dữ liệu
        // var_dump($_POST);
        // kiểm tra xem dư lieu co phai dc sb lên form không
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $don_hang_id = $_POST['don_hang_id'] ?? '';
            // lấy ra dữ liệu
            $ten_nguoi_nhan = $_POST['ten_nguoi_nhan'] ?? '';
            $sdt_nguoi_nhan = $_POST['sdt_nguoi_nhan'] ?? '';
            $email_nguoi_nhan = $_POST['email_nguoi_nhan'] ?? '';
            $dia_chi_nguoi_nhan = $_POST['dia_chi_nguoi_nhan'] ?? '';
            $ghi_chu = $_POST['ghi_chu'] ?? '';
            $trang_thai_id = $_POST['trang_thai_id'] ?? '';



            // $img_array = $_FILES['img_array'];
            // tao một mảng trống chứa dl
            $errors = [];
            // tao một mảng chứa dl

            if (empty($ten_nguoi_nhan)) {
                $errors['ten_nguoi_nhan'] = 'Tên người nhận không bỏ trống';
            }
            if (empty($sdt_nguoi_nhan)) {
                $errors['sdt_nguoi_nhan'] = 'Số điện thoại không bỏ trống';
            }
            if (empty($email_nguoi_nhan)) {
                $errors['email_nguoi_nhan'] = 'email không bỏ trống';
            }
            if (empty($dia_chi_nguoi_nhan)) {
                $errors['dia_chi_nguoi_nhan'] = 'Địa chỉ không bỏ trống';
            }

            if (empty($trang_thai_id)) {
                $errors['trang_thai_id'] = 'Trạng thái không bỏ trống';
            }
            $_SESSION['error'] = $errors;
        }
        // var_dump($don_hang_id);die;
        if (empty($errors)) {
            // nếu không có lỗi thì tiến ảnh thêm dm
            // var_export('ok');
            // die;
            $this->modelDonHang->UpdateDonHang(
                $don_hang_id,
                $ten_nguoi_nhan,
                $sdt_nguoi_nhan,
                $email_nguoi_nhan,
                $dia_chi_nguoi_nhan,
                $ghi_chu,
                $trang_thai_id

            );

            header("Location: " . BASE_URL_AMIN . '?act=don-hang');
            exit();
        } else {
            // trả về form và lỗi
            // đặt chỉ thị xóa session khi ht form
            // require_once './view/sanpham/addSanPham.php';
            $_SESSION['flash'] = true;
            header("Location: " . BASE_URL_AMIN . '?act=form-sua-don-hang&id_don_hang' . $don_hang_id);
            exit();
        }
    }
}
