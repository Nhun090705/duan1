<?php
class HomeController
{
    public $modelDanhmuc;
    public $modelSanPham;
    public $modelTaiKhoan;
    public $modelGioHang;
    public $modelDonHang;

    public function __construct()
    {
        $this->modelDanhmuc = new Danhmuc(); // Khởi tạo đối tượng SanPham
        $this->modelSanPham = new SanPham();
        $this->modelTaiKhoan = new TaiKhoan();
        $this->modelGioHang = new GioHang();
        $this->modelDonHang = new DonHang();
    }
    public function home()
    {
        $listSanPham = $this->modelSanPham->getAllSanPham();
        $listDanhMuc = $this->modelDanhmuc->getAllDanhmuc();
        require_once "./view/home.php";
    }

    public function chiTietSanPham()
    {
        $id = $_GET['id_san_pham'];

        $sanPham = $this->modelSanPham->getDetailSanPham($id);
        //$listAnhSanPham = $this->modelSanPham->getListAnhSanPham($id);
        $listBinhLuan = $this->modelSanPham->getBinhLuanFromSanPham($id);

        $listSanPhamCungDanhMuc = $this->modelSanPham->getListSanPhamDanhMuc($sanPham['danh_muc_id']);
        // var_dump($listSanPhamCungDanhMuc);die;
        if ($sanPham) {
            require_once './view/detailSanPham.php';
        } else {
            header("Location:" . BASE_URL);
            exit();
        }
    }

    public function formLogin()
    {
        require_once './view/auth/formLogin.php';

        deleteSessionsError();
        exit();
    }

    public function postLogin()
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
                $_SESSION['user_client'] = $user;

                header("Location: " . BASE_URL);
                exit();
            } else {
                $_SESSION['error'] = $user;
                // var_dump($_SESSION['error']);die;

                $_SESSION['flash'] = true;

                header("Location: " . BASE_URL . '?act=login');
                exit();
            }
        }
    }

    public function addGioHang()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            if (isset($_SESSION['user_client'])) {
                $mail = $this->modelTaiKhoan->getTaikhoanFromEmail($_SESSION['user_client']);
                //Lấy dữ liệu giỏ hàng của người dùng
                $gioHang = $this->modelGioHang->getGioHangFromUser($mail['id']);
                if (!$gioHang) {
                    $gioHangId = $this->modelGioHang->addGioHang($mail['id']);
                    $gioHang = ['id' => $gioHangId];
                    $chiTietGioHang = $this->modelGioHang->getDetailGioHang($gioHang['id']);
                } else {
                    $chiTietGioHang = $this->modelGioHang->getDetailGioHang($gioHang['id']);
                }

                $san_pham_id = $_POST['san_pham_id'];
                $so_luong = $_POST['so_luong'];


                $checkSanPham = false;
                foreach ($chiTietGioHang as $detail) {
                    if ($detail['san_pham_id'] == $san_pham_id) {
                        $newSoLuong = $detail['so_luong'] + $so_luong;
                        $this->modelGioHang->updateSoLuong($gioHang['id'], $san_pham_id, $newSoLuong);
                        $checkSanPham = true;
                        break;
                    }
                }
                if (!$checkSanPham) {
                    $this->modelGioHang->addDetailGioHang($gioHang['id'], $san_pham_id, $so_luong);
                }
                // var_dump('Thêm giỏ hàng thành công');die;
                header("Location: " . BASE_URL . '?act=gio-hang');
            } else {
                // var_dump('Chưa đăng nhập');
                // die;

            }
        }
    }

    public function gioHang()
    {
        try {
            if (isset($_SESSION['user_client'])) {
                $mail = $this->modelTaiKhoan->getTaikhoanFromEmail($_SESSION['user_client']);
                //Lấy dữ liệu giỏ hàng của người dùng
                $gioHang = $this->modelGioHang->getGioHangFromUser($mail['id']);
                if (!$gioHang) {
                    $gioHangId = $this->modelGioHang->addGioHang($mail['id']);
                    $gioHang = ['id' => $gioHangId];
                    $chiTietGioHang = $this->modelGioHang->getDetailGioHang($gioHang['id']);
                } else {
                    $chiTietGioHang = $this->modelGioHang->getDetailGioHang($gioHang['id']);
                }
                // var_dump($chiTietGioHang);die;

                require_once './view/gioHang.php';
            } else {
                // var_dump('Chưa đăng nhập');
                // die;
                header("Location: " . BASE_URL . '?act=login');
            }
        } catch (\Throwable $th) {
            //throw $th;
        }
    }

    public function thanhToan()
    {
        try {

            if (isset($_SESSION['user_client'])) {
                $user = $this->modelTaiKhoan->getTaikhoanFromEmail($_SESSION['user_client']);
                //Lấy dữ liệu giỏ hàng của người dùng
                $gioHang = $this->modelGioHang->getGioHangFromUser($user['id']);
                if (!$gioHang) {
                    $gioHangId = $this->modelGioHang->addGioHang($user['id']);
                    $gioHang = ['id' => $gioHangId];
                    $chiTietGioHang = $this->modelGioHang->getDetailGioHang($gioHang['id']);
                } else {
                    $chiTietGioHang = $this->modelGioHang->getDetailGioHang($gioHang['id']);
                }
                // var_dump($chiTietGioHang);die;

                require_once './view/thanhToan.php';
            } else {
                var_dump('Chưa đăng nhập');
                die;
            }
        } catch (\Throwable $th) {
            //throw $th;
        }
    }
    public function postThanhToan()
    {
        try {
            if ($_SERVER['REQUEST_METHOD'] == 'POST') {
                // var_dump($_POST);die;
                $ten_nguoi_nhan = $_POST['ten_nguoi_nhan'];
                $email_nguoi_nhan = $_POST['email_nguoi_nhan'];
                $sdt_nguoi_nhan = $_POST['sdt_nguoi_nhan'];
                $dia_chi_nguoi_nhan = $_POST['dia_chi_nguoi_nhan'];
                $ghi_chu = $_POST['ghi_chu'];
                $tong_tien = $_POST['tong_tien'];
                $phuong_thuc_thanh_toan_id = $_POST['phuong_thuc_thanh_toan_id'];

                $ngay_dat =  date('Y-m-d');
                $trang_thai_id = 1;

                $user = $this->modelTaiKhoan->getTaikhoanFromEmail($_SESSION['user_client']);
                $tai_khoan_id = $user['id'];

                $ma_don_hang = 'DH-' . rand(1, 9999);

                //thêm thông tin vào db
                $donHang = $this->modelDonHang->addDonHang(
                    $tai_khoan_id,
                    $ten_nguoi_nhan,
                    $email_nguoi_nhan,
                    $sdt_nguoi_nhan,
                    $dia_chi_nguoi_nhan,
                    $ghi_chu,
                    $tong_tien,
                    $phuong_thuc_thanh_toan_id,
                    $ngay_dat,
                    $ma_don_hang,
                    $trang_thai_id
                );

                // var_dump('Thêm thành công');die;
                //lấy thông tin giỏ hàng của người dùng

                $gioHang = $this->modelGioHang->getGioHangFromUser($tai_khoan_id);

                //Lưu sản phẩm vào chi tiết đơn hàng
                if ($donHang) {
                    //lấy ra toàn bộ sản phảm trong giỏ hàng
                    $chiTietGioHang = $this->modelGioHang->getDetailGioHang($gioHang['id']);

                    //thêm từng sản phầm từ giỏ hàng vào bảng chi tiết đơn hàng
                    foreach ($chiTietGioHang as $item) {
                        $donGia = $item['gia_khuyen_mai'] ?? $item['gia_san_pham']; //ưu tiên đơn giá sẽ lấy giá khuyến mãi

                        $this->modelDonHang->addChiTietDonHang(
                            $donHang, //ID đơn hàng vừa tạo
                            $item['san_pham_id'], // ID sản phẩm
                            $donGia, //Đơn giá lấy từ sản phẩm
                            $item['so_luong'], //Số lượng
                            $donGia * $item['so_luong'] // thành tiền
                        );
                    }

                    //Sau khi thêm xong thì tiến hành xáo sản phẩm  trong giỏ hàng
                    //Xóa toàn bộ sản phảm chi tiết giõ hàng
                    $this->modelGioHang->clearDetailGioHang($gioHang['id']);

                    //Xóa thông tin giỏ hàng nguời dùng
                    $this->modelGioHang->clearGioHang($tai_khoan_id);

                    //chuyển xuống về trang lịch sử mua hàng

                    header("Location: " . BASE_URL . '?act=lich-su-mua-hang');
                    echo "<script>alert('Đặt hàng thành công');</script>";
                    exit;
                } else {

                    echo "<script>alert('Lỗi đặt hàng. Vui lòng thử lại sau');</script>";
                    die;
                }
            }
        } catch (\Throwable $th) {
            //throw $th;
        }
    }

    public function formRegister()
    {
        require_once './view/auth/register.php';
        exit();
    }
    public function postRegister()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $email = trim($_POST['email']);
            $password = $_POST['password'];
            $ten = trim($_POST['ten']);

            // Kiểm tra email đã tồn tại
            $existingUser = $this->modelTaiKhoan->getTaikhoanFromEmail($email);
            if ($existingUser) {
                $_SESSION['error'] = "Email đã tồn tại. Vui lòng sử dụng email khác.";
                header("Location: " . BASE_URL . '?act=register');
                exit();
            }

            // Mã hóa mật khẩu
            $hashedPassword = password_hash($password, PASSWORD_DEFAULT);
            if (!$hashedPassword) {
                $_SESSION['error'] = "Không thể mã hóa mật khẩu. Vui lòng thử lại.";
                header("Location: " . BASE_URL . '?act=register');
                exit();
            }

            // Thực hiện đăng ký
            $register = $this->modelTaiKhoan->register($email, $hashedPassword, $ten);
            if ($register) {
                $_SESSION['success'] = "Đăng ký thành công! Vui lòng đăng nhập.";
                header("Location: " . BASE_URL . '?act=login');
            } else {
                $_SESSION['error'] = "Đăng ký thất bại. Vui lòng thử lại.";
                header("Location: " . BASE_URL . '?act=register');
            }
            exit();
        }
    }

    public function updateQuantity()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $input = json_decode(file_get_contents('php://input'), true);

            $productId = $input['product_id'];
            $quantity = $input['quantity'];

            // Kiểm tra nếu người dùng đã đăng nhập
            if (isset($_SESSION['user_client'])) {
                $mail = $this->modelTaiKhoan->getTaikhoanFromEmail($_SESSION['user_client']);
                $gioHang = $this->modelGioHang->getGioHangFromUser($mail['id']);

                if ($gioHang) {
                    // Cập nhật số lượng trong database
                    $this->modelGioHang->updateSoLuong($gioHang['id'], $productId, $quantity);
                    echo json_encode(['success' => true]);
                } else {
                    echo json_encode(['success' => false, 'message' => 'Giỏ hàng không tồn tại.']);
                }
            } else {
                echo json_encode(['success' => false, 'message' => 'Người dùng chưa đăng nhập.']);
            }
        } else {
            http_response_code(405); // Method Not Allowed
            echo json_encode(['success' => false, 'message' => 'Phương thức không hợp lệ.']);
        }
    }

    public function removeItemFromCart()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $input = json_decode(file_get_contents('php://input'), true);

            $productId = $input['product_id'];

            if (isset($_SESSION['user_client'])) {
                $mail = $this->modelTaiKhoan->getTaikhoanFromEmail($_SESSION['user_client']);
                $gioHang = $this->modelGioHang->getGioHangFromUser($mail['id']);

                if ($gioHang) {
                    // Xóa sản phẩm khỏi giỏ hàng
                    $this->modelGioHang->removeProductFromCart($gioHang['id'], $productId);
                    echo json_encode(['success' => true]);
                } else {
                    echo json_encode(['success' => false, 'message' => 'Giỏ hàng không tồn tại.']);
                }
            } else {
                echo json_encode(['success' => false, 'message' => 'Người dùng chưa đăng nhập.']);
            }
        } else {
            http_response_code(405); // Method Not Allowed
            echo json_encode(['success' => false, 'message' => 'Phương thức không hợp lệ.']);
        }
    }

    public function lichSuMuaHang()
    {
        if (isset($_SESSION['user_client'])) {
            // lấy thông tin tài khoản đăng nhập

            $user = $this->modelTaiKhoan->getTaikhoanFromEmail($_SESSION['user_client']);
            $tai_khoan_id = $user['id'];

            // lấy ra danh sách trạng thái đơn hàng
            $arrTrangThaiDonHang = $this->modelDonHang->getTrangThaiDonHang();
            $trangThaiDonHang = array_column($arrTrangThaiDonHang, 'ten_trang_thai', 'id');

            // lấy ra danh sách phương thức thanh toán
            $arrPhuongThucThanhToan = $this->modelDonHang->getPhuongThucThanhToan();
            $phuongThucThanhToan = array_column($arrPhuongThucThanhToan, 'ten_phuong_thuc', 'id');

            // lấy ra danh sách tất cả đơn hàng ciuar tài khoản
            $donHangs = $this->modelDonHang->getDonHangFromUser($tai_khoan_id);
            require_once "./view/lichSuMuaHang.php";
        } else {
            var_dump('bạn chua đăng nhập');
            die;
        }
    }
    public function chiTietMuaHang()
    {
        if (isset($_SESSION['user_client'])) {
            // lấy thông tin tài khoản đăng nhập
            $user = $this->modelTaiKhoan->getTaikhoanFromEmail($_SESSION['user_client']);
            $tai_khoan_id = $user['id'];

            // lấy id đơn hàng truyền từ URL
            $donHangId = $_GET['id'];


            // lấy ra danh sách trạng thái đơn hàng
            $arrTrangThaiDonHang = $this->modelDonHang->getTrangThaiDonHang();
            $trangThaiDonHang = array_column($arrTrangThaiDonHang, 'ten_trang_thai', 'id');

            // lấy ra danh sách phương thức thanh toán
            $arrPhuongThucThanhToan = $this->modelDonHang->getPhuongThucThanhToan();
            $phuongThucThanhToan = array_column($arrPhuongThucThanhToan, 'ten_phuong_thuc', 'id');

            // Lấy ra thông tin đơn hàng thheo ID
            $donHang = $this->modelDonHang->getDonHangById($donHangId);

            //Lấy thông tin sản phẩm của đơn hàng trong bảng chi tiết ddown hàng
            $chiTietDonHang = $this->modelDonHang->getChiTietDonHangByDonHangId($donHangId);

            // echo "<pre>";
            // print_r($donHang);
            // print_r($chiTietDonHang);
            if ($donHang['tai_khoan_id'] != $tai_khoan_id) {
                echo "Bạn khônng có quyền truy cập đơn hàng này";
                exit;
            }
            require_once "./view/chiTietMuaHang.php";
        } else {
            var_dump('bạn chua đăng nhập');
            die;
        }
    }
    public function huyDonHang()
    {
        if (isset($_SESSION['user_client'])) { // lấy thông tin tài khoản đăng nhập
            $user = $this->modelTaiKhoan->getTaikhoanFromEmail($_SESSION['user_client']);
            $tai_khoan_id = $user['id'];

            // lấy id đơn hàng truyền từ URL
            $donHangId = $_GET['id'];

            // kiểm tra đơn hàng
            $donHang = $this->modelDonHang->getDonHangById($donHangId);

            if ($donHang['tai_khoan_id'] != $tai_khoan_id) {
                echo "bạn không có quyền hủy đơn hàng này";
                exit;
            }
            if ($donHang['trang_thai_id'] != 1) {
                echo "Chỉ đơn hàng chưa xác nhận mới được hủy";
                exit;
            }

            // hủy đơn hàng
            $this->modelDonHang->updateTrangThaiDonHang($donHangId, 7);
            header("Location: " . BASE_URL . '?act=lich-su-mua-hang');
            exit;
        } else {
            var_dump('bạn chua đăng nhập');
            die;
        }
    }

    public function sanPhamTheoDanhMuc()
    {
        $danh_muc_id = $_GET['id_danh_muc'];

        $listSanPhamDanhMuc = $this->modelSanPham->getListSanPhamDanhMuc($danh_muc_id);
        $listDanhMuc = $this->modelDanhmuc->getAllDanhmuc();
        require_once "./view/sanPhamDanhMuc.php";

        // var_dump($listSanPhamDanhMuc);die;
    }

    public function postAddBinhLuan()
    {
        if (isset($_SESSION['user_client'])) {

            // Kiểm tra email trong session
            // var_dump($_SESSION['user_client']); die();  // Kiểm tra xem có đúng email trong session không
            if ($_SERVER['REQUEST_METHOD'] == 'POST') {
                if (isset($_POST['san_pham_id'])) {
                    $san_pham_id = $_POST['san_pham_id'];
                } else {
                    // Xử lý trường hợp không có id_san_pham
                    $error['san_pham_id'] = 'Không tìm thấy sản phẩm';
                }

                // Lấy thông tin người dùng từ email trong session
                $user = $this->modelTaiKhoan->getTaikhoanFromEmail($_SESSION['user_client']);

                // Kiểm tra xem có tìm thấy người dùng không
                // var_dump($user); die();  // Kiểm tra kết quả trả về từ modelTaiKhoan

                if ($user) {
                    $tai_khoan_id = $user['id'];  // Gán giá trị id từ user
                } else {
                    $error['tai_khoan'] = 'Không tìm thấy tài khoản';
                }

                $noi_dung = $_POST['noi_dung'];
                $ngay_dang = date('Y-m-d');
                $trang_thai = 1;

                $error = [];
                if (empty($noi_dung)) {
                    $error['noi_dung'] = 'Không để trống nội dung bình luận';
                }

                if (empty($error)) {
                    // var_dump($san_pham_id, $tai_khoan_id, $noi_dung, $ngay_dang, $trang_thai);
                    $this->modelSanPham->addBinhLuan($san_pham_id, $tai_khoan_id, $noi_dung, $ngay_dang, $trang_thai);
                    header('Location: ' . BASE_URL . '?act=chi-tiet-san-pham&id_san_pham=' . $san_pham_id);
                    exit();
                } else {
                    $_SESSION['flash'] = true;
                    $_SESSION['error'] = $error;
                    header('Location: ' . BASE_URL . '?act=chi-tiet-san-pham&id_san_pham=' . $san_pham_id);
                    exit();
                }
            }
        } else {
            header("Location: " . BASE_URL . '?act=login');
        }
    }
}
