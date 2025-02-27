<?php
ob_start();
ob_end_flush();
class adminSanPhamController
{
    public $modelSanPham;
    public $modelDanhMuc;
    public function __construct()
    {
        $this->modelSanPham = new adminSanPham();
        $this->modelDanhMuc = new adminDanhMuc();
    }
    public function danhsachSanPham()
    {
        $listSanPham = $this->modelSanPham->getAllSanPham();
        require_once './view/sanpham/listSanpham.php';
    }
    public function formAddSanPham()
    {
        // hien thi form nhập
        // var_dump('form thêm');
        $listdanhmuc = $this->modelDanhMuc->getAllDanhmuc();
        require_once './view/sanpham/addSanPham.php';
        //xóa ss load trang
        deleteSessionsError();
    }
    public function postAddSanPham()
    {
        // hàm dùng để thêm dữ liệu
        // var_dump($_POST);
        // kiểm tra xem dư lieu co phai dc sb lên form không
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            // lấy ra dữ liệu
            $ten_san_pham = $_POST['ten_san_pham'] ?? '';
            $gia_san_pham = $_POST['gia_san_pham'] ?? '';
            $gia_khuyen_mai = $_POST['gia_khuyen_mai'] ?? '';
            $so_luong = $_POST['so_luong'] ?? '';
            $ngay_nhap = $_POST['ngay_nhap'] ?? '';
            $danh_muc_id = $_POST['danh_muc_id'] ?? '';
            $trang_thai = $_POST['trang_thai'] ?? '';
            $mo_ta = $_POST['mo_ta'] ?? '';
            $hinh_anh = $_FILES['hinh_anh'] ?? null;
            //lưu hình ảnh vào 
            $file_thumb = uploadFile($hinh_anh, './upload/');

            $img_array = $_FILES['img_array'];

            // tao một mảng chứa dl
            $_SESSION['errors'] = [];
            if (empty($ten_san_pham)) {
                $_SESSION['errors']['ten_san_pham'] = 'Tên sản phẩm không bỏ trống';
            }
            if (empty($gia_san_pham)) {
                $_SESSION['errors']['gia_san_pham'] = 'Giá sản phẩm không bỏ trống';
            }
            if (empty($gia_khuyen_mai)) {
                $_SESSION['errors']['gia_khuyen_mai'] = 'Giá khuyễn mãi sản phẩm không bỏ trống';
            }
            if (empty($so_luong)) {
                $_SESSION['errors']['so_luong'] = 'Số lượng sản phẩm không bỏ trống';
            }
            if (empty($ngay_nhap)) {
                $_SESSION['errors']['ngay_nhap'] = 'Ngày nhập sản phẩm không bỏ trống';
            }
            if (empty($danh_muc_id)) {
                $_SESSION['errors']['danh_muc_id'] = 'Danh mục sản phẩm không bỏ trống';
            }
            if (empty($trang_thai)) {
                $_SESSION['errors']['trang_thai'] = 'Trạng thái sản phẩm không bỏ trống';
            }
            if ($hinh_anh['error'] !== 0) {
                $_SESSION['errors']['hinh_anh'] = 'Phải chọn sản phẩm không bỏ trống';
            }
            $_SESSION['error'] = $_SESSION['errors'];
            // nếu ko có lỗi tiến hành thêm dm
            if (empty($_SESSION['errors'])) {
                // nếu không có lỗi thì tiến ảnh thêm dm
                // var_export('ok');
                $san_pham_id = $this->modelSanPham->insertSanPham(
                    $ten_san_pham,
                    $gia_san_pham,
                    $gia_khuyen_mai,
                    $so_luong,
                    $ngay_nhap,
                    $danh_muc_id,
                    $trang_thai,
                    $mo_ta,
                    $file_thumb
                );
                header("Location: " . BASE_URL_AMIN . '?act=san-pham');
                exit();
            } else {
                // trả về form và lỗi
                // đặt chỉ thị xóa session khi ht form
                // require_once './view/sanpham/addSanPham.php';
                $_SESSION['flash'] = true;
                header("Location: " . BASE_URL_AMIN . '?act=form-them-san-pham');
                exit();
            }
        }
    }
    public function formEditSanPham()
    {
        // hien thi form nhập
        // var_dump('form thêm');
        // lấy ra tt dm cần sua
        $id = $_GET['id_san_pham'];
        $sanPham = $this->modelSanPham->getOneSanPham($id);
        // var_dump($sanPham);
        // die;
        $listDanhMuc = $this->modelDanhMuc->getAllDanhmuc();
        if ($sanPham) {
            require_once './view/sanpham/editSanPham.php';
        } else {
            header("Location: " . BASE_URL_AMIN . '?act=san-pham');
            exit();
        }
    }
    public function postEditSanPham()
    {
        // hàm dùng để thêm dữ liệu
        // var_dump($_POST);
        // kiểm tra xem dư lieu co phai dc sb lên form không
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $san_pham_id = $_POST['san_pham_id'] ?? '';
            // try vấb
            $sanPhamOld = $this->modelSanPham->getOneSanPham($san_pham_id);
            $old_file = $sanPhamOld['hinh_anh']; // lấy ảnh cũ nếu có sửa ảnh

            // lấy ra dữ liệu
            $ten_san_pham = $_POST['ten_san_pham'] ?? '';
            $gia_san_pham = $_POST['gia_san_pham'] ?? '';
            $gia_khuyen_mai = $_POST['gia_khuyen_mai'] ?? '';
            $so_luong = $_POST['so_luong'] ?? '';
            $ngay_nhap = $_POST['ngay_nhap'] ?? '';
            $danh_muc_id = $_POST['danh_muc_id'] ?? '';
            $trang_thai = $_POST['trang_thai'] ?? '';
            $mo_ta = $_POST['mo_ta'] ?? '';
            $hinh_anh = $_FILES['hinh_anh'] ?? null;
            //lưu hình ảnh vào 
            // $new_file = uploadFile($hinh_anh, '../uploads');

            // $img_array = $_FILES['img_array'];
            // tao một mảng chứa dl

            // tao một mảng chứa dl
            $_SESSION['errors'] = [];
            if (empty($ten_san_pham)) {
                $_SESSION['errors']['ten_san_pham'] = 'Tên sản phẩm không bỏ trống';
            }
            if (empty($gia_san_pham)) {
                $_SESSION['errors']['gia_san_pham'] = 'Giá sản phẩm không bỏ trống';
            }
            if (empty($gia_khuyen_mai)) {
                $_SESSION['errors']['gia_khuyen_mai'] = 'Giá khuyễn mãi sản phẩm không bỏ trống';
            }
            if (empty($so_luong)) {
                $_SESSION['errors']['so_luong'] = 'Số lượng sản phẩm không bỏ trống';
            }
            if (empty($ngay_nhap)) {
                $_SESSION['errors']['ngay_nhap'] = 'Ngày nhập sản phẩm không bỏ trống';
            }
            if (empty($danh_muc_id)) {
                $_SESSION['errors']['danh_muc_id'] = 'Danh mục sản phẩm không bỏ trống';
            }
            if (empty($trang_thai)) {
                $_SESSION['errors']['trang_thai'] = 'Trạng thái sản phẩm không bỏ trống';
            }
            // if ($hinh_anh['error'] !== 0) {
            // $_SESSION['errors']['hinh_anh'] = 'Phải chọn sản phẩm không bỏ trống';
            // }
            $_SESSION['error'] = $_SESSION['errors'];
            // logic lỗi sữa ảnh
            if (isset($hinh_anh) && $hinh_anh['error'] == UPLOAD_ERR_OK) {
                $new_file = uploadFile($hinh_anh, './upload/');
                if (!empty($old_file)) {
                    deleteFile($old_file);
                }
            } else {
                $new_file = $old_file;
            }
            if (empty($_SESSION['errors'])) {
                // nếu không có lỗi thì tiến ảnh thêm dm
                // var_export('ok');
                // die;
                $this->modelSanPham->UpdateSanPham(
                    $san_pham_id,
                    $ten_san_pham,
                    // $san_pham_id,
                    $gia_san_pham,
                    $gia_khuyen_mai,
                    $so_luong,
                    $ngay_nhap,
                    $danh_muc_id,
                    $trang_thai,
                    $mo_ta,
                    $new_file
                );
                header("Location: " . BASE_URL_AMIN . '?act=san-pham');
                exit();
            } else {
                // trả về form và lỗi
                // đặt chỉ thị xóa session khi ht form
                // require_once './view/sanpham/addSanPham.php';
                $_SESSION['flash'] = true;
                header("Location: " . BASE_URL_AMIN . '?act=form-sua-san-pham&id_san_pham' . $san_pham_id);
                exit();
            }
        }
    }

    public function deleteSanPham()
    {
        // $id = $_GET['san_pham_id'];
        $id_san_pham = $_GET['id_san_pham'] ?? null;
        // var_dump($id);
        $sanPham = $this->modelSanPham->getOneSanPham($id_san_pham);
        if ($sanPham) {
            $this->modelSanPham->destroySanPham($id_san_pham);
        }
        header("Location: " . BASE_URL_AMIN . '?act=san-pham');
        exit();
    }
    public function DetailSanPham()
    {

        $id = $_GET['id_san_pham'];
        $sanPham = $this->modelSanPham->getOneSanPham($id);
        $listBinhLuan = $this->modelSanPham->getBinhLuanFromSanPham($id);
        if ($sanPham) {
            require_once './view/sanpham/detailSanPham.php';
        } else {
            header("Location: " . BASE_URL_AMIN . '?act=san-pham');
            exit();
        }
    }

    public function updateTrangThaiBinhLuan()
    {
        $id_binh_luan = $_POST['id_binh_luan'];
        $name_view = $_POST['name_view'];
        $binhLuan = $this->modelSanPham->getDetailBinhLuan($id_binh_luan);

        if ($binhLuan) {
            $trang_thai_update = "";
            if ($binhLuan['trang_thai'] == 1) {
                $trang_thai_update = 2;
            } else {
                $trang_thai_update = 1;
            }
            $status = $this->modelSanPham->updateTrangThaiBinhLuan($id_binh_luan, $trang_thai_update);

            if ($status) {
                if ($name_view == 'detail_khach') {
                    header("Location: " . BASE_URL_AMIN . '?act=chi-tiet-khach-hang&id_khach_hang=' . $binhLuan['tai_khoan_id']);
                }else{
                    header("Location: " . BASE_URL_AMIN . '?act=chi-tiet-san-pham&id_san_pham=' . $binhLuan['san_pham_id']);
                }
            }
        }
    }
}
