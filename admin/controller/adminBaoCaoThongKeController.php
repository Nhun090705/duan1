<?php
require_once './model/adminThongke.php'; // Đảm bảo yêu cầu model đúng

class adminBaoCaoThongKeController
{
    public $modelThongKe;

    public function __construct()
    {
        // Khởi tạo model
        $this->modelThongKe = new AdminThongke();
    }

    // Phương thức xử lý thống kê theo tài khoản
    public function thongKeTheoKhachHang()
    {
        $year = isset($_GET['year']) ? $_GET['year'] : date('Y'); // Lấy năm từ URL, mặc định là năm hiện tại
        $month = isset($_GET['month']) ? $_GET['month'] : date('m'); // Lấy tháng từ URL, mặc định là tháng hiện tại
        // $accountName = isset($_GET['account_name']) ? $_GET['account_name'] : '';
        
        // Gọi phương thức getThongKeTheoTaiKhoan từ model
        $thongKeData = $this->modelThongKe->getThongKeTheoTaiKhoanTheoThang($year, $month);

        // Kiểm tra xem dữ liệu có trả về không
        if ($thongKeData) {
            // var_dump($thongKeData); 
            require_once './view/thongKe/thongKe.php';
        } else {
            // Trường hợp không có dữ liệu
            echo "Không có dữ liệu cho tháng " . $month . " năm " . $year;
        }
    }
}
?>