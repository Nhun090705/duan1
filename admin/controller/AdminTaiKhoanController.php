<?php
class AdminTaiKhoanController
{
    public $modelTaiKhoan;
    public $modelDonHang;
    public $modelSanPham;

    public function __construct()
    {
        $this->modelTaiKhoan = new AdminTaiKhoan();
        $this->modelDonHang = new adminDonHang();
        $this->modelSanPham = new adminSanPham();
    }
    public function danhSachQuanTri()
    {
        $listQuanTri = $this->modelTaiKhoan->getAllTaiKhoan(1);
        // var_dump($listQuanTri);die;

        require_once './view/taikhoan/quantri/listQuantri.php';
    }

    public function formAddQuantri()
    {
        require_once './view/taikhoan/quantri/addQuantri.php';

        deleteSessionsError();
    }
    public function postAddQuantri()
    {
        //hàm dùng để thêm dữ liệu
        // var_dump($_POST);
        //kiểm tra xem dư lieu co phai dc sb lên form không
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            // lấy ra dữ liệu
            $ho_ten = $_POST['ho_ten'];
            $email = $_POST['email'];
            //tao một mảng chứa dl
            $errors = [];
            if (empty($ho_ten)) {
                $errors['ho_ten'] = 'Họ tên không được bỏ trống';
            }
            if (empty($email)) {
                $errors['email'] = 'Email không được bỏ trống';
            }
            $_SESSION['error'] = $errors;

            // nếu ko có lỗi tiến hành thêm tài khoản
            if (empty($errors)) {
                //nếu không có lỗi thì tiến ảnh thêm tài khoản
                // var_export('ok');

                // đặt password mặc định
                $password = password_hash('123@123ab', PASSWORD_BCRYPT);
                // var_dump($password);die;
                //khai báo chức vụ
                $chuc_vu_id = 1;
                $this->modelTaiKhoan->insertTaiKhoan($ho_ten, $email, $password, $chuc_vu_id);

                header("Location: " . BASE_URL_AMIN . '?act=list-tai-khoan-quan-tri');
                exit();
            } else {
                //trả về form và lỗi
                $_SESSION['flash'] = true;

                header("Location: " . BASE_URL_AMIN . '?act=form-them-quan-tri');
                exit();
            }
        }
    }
    public function formEditQuantri()
    {
        $id_quan_tri = $_GET['id_quan_tri'];

        $quanTri = $this->modelTaiKhoan->getDetailTaiKhoan($id_quan_tri);

        // var_dump($quanTri);die;
        require_once './view/taikhoan/quantri/editQuantri.php';

        deleteSessionsError();
    }

    public function postEditQuantri()
    {
        // var_dump("ABCD");
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {

            //Lấy dữ liệu
            $quan_tri_id = $_POST['quan_tri_id'] ?? '';;

            $ho_ten = $_POST['ho_ten'] ?? '';
            $email = $_POST['email'] ?? '';
            $so_dien_thoai = $_POST['so_dien_thoai'] ?? '';
            $trang_thai = $_POST['trang_thai'] ?? '';

            $errors = [];

            if (empty($ho_ten)) {
                $errors['ho_ten'] = 'Họ tên không được để trống';
            }
            if (empty($email)) {
                $errors['email'] = 'Họ tên không được để trống';
            }
            if (empty($trang_thai)) {
                $errors['trang_thai'] = 'Vui lòng chọn trạng thái';
            }

            $_SESSION['error'] = $errors;

            if (empty($errors)) {

                // var_dump("ABCD");
                $this->modelTaiKhoan->upDateTaiKhoan($quan_tri_id, $ho_ten, $email, $so_dien_thoai, $trang_thai);

                header("Location: " . BASE_URL_AMIN . '?act=list-tai-khoan-quan-tri');
                exit();
            } else {

                $_SESSION['flash'] = true;

                header("Location: " . BASE_URL_AMIN . '?act=form-sua-quan-tri&id_quan_tri=' . $quan_tri_id);
                exit();
            }
        }
    }

    public function resetPassword()
    {
        $tai_khoan_id = $_GET['id_quan_tri'];
        $tai_khoan = $this->modelTaiKhoan->getDetailTaiKhoan($tai_khoan_id);

        $password = password_hash('123@123ab', PASSWORD_BCRYPT);
        $status = $this->modelTaiKhoan->resetPassword($tai_khoan_id, $password);

        if ($status && $tai_khoan['chuc_vu_id'] == 1) {
            header("Location: " . BASE_URL_AMIN . '?act=list-tai-khoan-quan-tri');
            exit();
        } elseif ($status && $tai_khoan['chuc_vu_id'] == 2) {
            header("Location: " . BASE_URL_AMIN . '?act=list-tai-khoan-khach-hang');
            exit();
        } else {
            var_dump('Lỗi khi reset tài khoản');
            die;
        }
    }

    public function danhSachKhachHang()
    {
        $listKhachHang = $this->modelTaiKhoan->getAllTaiKhoan(2);
        // var_dump($listKhachHang);die;

        require_once './view/taikhoan/khachhang/listKhachHang.php';
    }

    public function formEditKhachHang()
    {
        $id_khach_hang = $_GET['id_khach_hang'];

        $khachHang = $this->modelTaiKhoan->getDetailTaiKhoan($id_khach_hang);

        // var_dump($khachHang);die;
        require_once './view/taikhoan/khachhang/editkhachHang.php';

        deleteSessionsError();
    }

    public function postEditKhachHang()
    {
        // var_dump("ABCD");
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {

            //Lấy dữ liệu
            $khach_hang_id = $_POST['khach_hang_id'] ?? '';;

            $ho_ten = $_POST['ho_ten'] ?? '';
            $email = $_POST['email'] ?? '';
            $so_dien_thoai = $_POST['so_dien_thoai'] ?? '';
            $ngay_sinh = $_POST['ngay_sinh'] ?? '';
            $gioi_tinh = $_POST['gioi_tinh'] ?? '';
            $dia_chi = $_POST['dia_chi'] ?? '';
            $trang_thai = $_POST['trang_thai'] ?? '';

            $errors = [];

            if (empty($ho_ten)) {
                $errors['ho_ten'] = 'Họ tên không được để trống';
            }
            if (empty($email)) {
                $errors['email'] = 'Email không được để trống';
            }

            if (empty($ngay_sinh)) {
                $errors['ngay_sinh'] = 'Ngày không được để trống';
            }

            if (empty($gioi_tinh)) {
                $errors['gioi_tinh'] = 'Giới tính không được để trống';
            }

            if (empty($trang_thai)) {
                $errors['trang_thai'] = 'Vui lòng chọn trạng thái';
            }

            $_SESSION['error'] = $errors;

            if (empty($errors)) {

                // var_dump("ABCD");
                $this->modelTaiKhoan->upDateKhachHang($khach_hang_id, $ho_ten, $email, $so_dien_thoai, $ngay_sinh, $gioi_tinh, $dia_chi, $trang_thai);

                header("Location: " . BASE_URL_AMIN . '?act=list-tai-khoan-khach-hang');
                exit();
            } else {

                $_SESSION['flash'] = true;

                header("Location: " . BASE_URL_AMIN . '?act=form-sua-khach-hang&id_khach_hang=' . $khach_hang_id);
                exit();
            }
        }
    }

    public function detailKhachHang()
    {
        $id_khach_hang = $_GET['id_khach_hang'];
        $khachHang = $this->modelTaiKhoan->getDetailTaiKhoan($id_khach_hang);

        $listDonHang = $this->modelDonHang->getDonHangFormKhachHang($id_khach_hang);
        $listBinhLuan = $this->modelSanPham->getBinhLuanFromKhachHang($id_khach_hang);

        require_once './view/taikhoan/khachhang/detailKhachHang.php';
    }
    public function formLogin()
    {
        require_once './view/auth/formLogin.php';

        deleteSessionsError();
    }

    public function login()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            //lay email va pass gui len tu form
            $email = $_POST['email'];
            $password = $_POST['password'];

            // var_dump($email);
            // xu ly kiem tra thong tin dang nhap

            $user = $this->modelTaiKhoan->checkLogin($email, $password);


            if ($user == $email) { //truong hop dang nhap thanh cong
                //luu thong tin vao session
                $_SESSION['user_admin'] = $user;

                header("Location: " . BASE_URL_AMIN);
                exit();
            } else {
                $_SESSION['error'] = $user;
                // var_dump($_SESSION['error']);die;

                $_SESSION['flash'] = true;

                header("Location: " . BASE_URL_AMIN . '?act=login-admin');
                exit();
            }
        }
    }

    public function logout()
    {
        if (isset($_SESSION['user_admin'])) {
            unset($_SESSION['user_admin']);
            header("Location: " . BASE_URL_AMIN . '?act=login-admin');
        }
    }

    public function formEditCaNhanQuanTri()
    {
        $email = $_SESSION['user_admin'];
        $thongTin = $this->modelTaiKhoan->getTaiKhoanformEmail($email);
        // var_dump($thongTin);die;
        require_once './view/taikhoan/canhan/editCaNhan.php';
        deleteSessionsError();
    }

    public function postEditMatKhauCaNhan()
    {
        // var_dump($_POST);die;
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $old_pass = $_POST['old_pass'];
            $new_pass = $_POST['new_pass'];
            $confirm_pass = $_POST['confirm_pass'];
            // var_dump($old_pass);


            //Lây thong tin user từ session
            $user = $this->modelTaiKhoan->getTaiKhoanformEmail($_SESSION['user_admin']);

            // var_dump($user);die;

            $checkPass = password_verify($old_pass, $user['mat_khau']);
            $errors = [];

            if (!$checkPass) {
                $errors['old_pass'] = 'Mật khẩu người dùng không đúng';
            }
            if ($new_pass !== $confirm_pass) {
                $errors['confirm_pass'] = 'Mật khẩu nhập lại không đúng';
            }
            if (empty($old_pass)) {
                $errors['old_pass'] = 'Vui lòng điền dữ liệu vào ô này !';
            }
            if (empty($new_pass)) {
                $errors['new_pass'] = 'Vui lòng điền dữ liệu vào ô này !';
            }
            if (empty($confirm_pass)) {
                $errors['confirm_pass'] = 'Vui lòng điền dữ liệu vào ô này !';
            }

            $_SESSION['error'] = $errors;
            if (!$errors) {
                //Thực hiện đổi mật khẩu
                $hashPass = password_hash($new_pass, PASSWORD_BCRYPT);
                $status = $this->modelTaiKhoan->resetPassword($user['id'], $hashPass);
                if ($status) {
                    $_SESSION['success'] = "Đã đổi mật khẩu thành công";
                    $_SESSION['flash'] = true;
                    header("Location: " . BASE_URL_AMIN . '?act=form-sua-thong-tin-ca-nhan-quan-tri');
                }
            } else {

                $_SESSION['flash'] = true;

                header("Location: " . BASE_URL_AMIN . '?act=form-sua-thong-tin-ca-nhan-quan-tri');
                exit();
            }
        }
    }
}
