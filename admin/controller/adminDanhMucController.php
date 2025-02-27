<?php
ob_start();
class adminDanhmucController
{
    public $modelDanhmuc;
    public function __construct()
    {
        $this->modelDanhmuc = new adminDanhmuc();
    }
    public function danhsachdanhmuc()
    {


        $listDanhmuc = $this->modelDanhmuc->getAllDanhmuc();
        require_once './view/danhmuc/listDanhmuc.php';
    }
    public function formAddDanhmuc()
    {
        //hien thi form nhập
        // var_dump('form thêm');
        require_once './view/danhmuc/addDanhmuc.php';
    }
    public function postAddDanhmuc()
    {
        //hàm dùng để thêm dữ liệu
        // var_dump($_POST);
        //kiểm tra xem dư lieu co phai dc sb lên form không
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            // lấy ra dữ liệu
            $ten_danh_muc = $_POST['ten_danh_muc'];
            $mo_ta = $_POST['mo_ta'];
            //tao một mảng chứa dl
            $errors = [];
            if (empty($ten_danh_muc)) {
                $errors['ten_danh_muc'] = 'Tên danh mục không bỏ trống';
            }

            // nếu ko có lỗi tiến hành thêm dm
            if (empty($errors)) {
                //nếu không có lỗi thì tiến ảnh thêm dm
                // var_export('ok');
                $this->modelDanhmuc->insertDanhmuc($ten_danh_muc, $mo_ta);
                header("Location: " . BASE_URL_AMIN . '?act=danh-muc');
                exit();
            } else {
                //trả về form và lỗi
                require_once './view/danhmuc/addDanhmuc.php';
            }
        }
    }
    public function formEditDanhmuc()
    {
        //hien thi form nhập
        // var_dump('form thêm');
        //lấy ra tt dm cần sua
        $id = $_GET['id_danh_muc'];
        $danhmuc = $this->modelDanhmuc->getOneDanhmuc($id);
        if ($danhmuc) {
            require_once './view/danhmuc/editDanhmuc.php';
        } else {
            header("Location: " . BASE_URL_AMIN . '?act=danh-muc');
            exit();
        }
        // var_dump($danhmuc);
        // die();
        require_once './view/danhmuc/editDanhmuc.php';
    }
    public function postEditDanhmuc()
    {
        //hàm dùng để thêm dữ liệu
        // var_dump($_POST);
        //kiểm tra xem dư lieu co phai dc sb lên form không
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            // lấy ra dữ liệu
            $id = $_POST['id'];
            $ten_danh_muc = $_POST['ten_danh_muc'];
            $mo_ta = $_POST['mo_ta'];
            // tao một mảng chứa dl
            $errors = [];
            if (empty($ten_danh_muc)) {
                $errors['ten_danh_muc'] = 'Tên danh mục không bỏ trống';
            }

            // nếu ko có lỗi tiến hành s dm
            if (empty($errors)) {
                // nếu không có lỗi thì tiến ảnh s dm
                // var_export('ok');
                $this->modelDanhmuc->UpdatetDanhmuc($id, $ten_danh_muc, $mo_ta);
                header("Location: " . BASE_URL_AMIN . '?act=danh-muc');
                exit();
            } else {
                // trả về form và lỗi
                $danhmuc = ['id' => $id, 'ten_danh_muc' => $ten_danh_muc, 'mo_ta' => $mo_ta];
                require_once './view/danhmuc/editDanhmuc.php';
            }
        }
    }
    public function deleteDanhmuc ()
    {
        $id = $_GET['id_danh_muc'];
        $danhmuc = $this->modelDanhmuc->getOneDanhmuc($id);
        
        if ($danhmuc) {
            $this->modelDanhmuc->destroyDanhmuc($id);
        }
            header("Location: " . BASE_URL_AMIN . '?act=danh-muc');
            exit();
        
    }
}
