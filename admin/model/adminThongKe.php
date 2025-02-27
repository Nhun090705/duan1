<?php
class AdminThongke
{
    public $conn;

    public function __construct()
    {
        $this->conn = connectDB(); // Đảm bảo hàm kết nối cơ sở dữ liệu hoạt động
        if (!$this->conn) {
            die("Kết nối cơ sở dữ liệu thất bại.");
        }
    }

    // Phương thức lấy thống kê theo tài khoản và theo tháng/năm
    public function getThongKeTheoTaiKhoanTheoThang($year, $month)
    {
        try {
            // Truy vấn SQL để lấy thống kê doanh thu theo tài khoản (chỉ đơn hàng giao thành công)
            $sql = "SELECT tai_khoans.ho_ten AS account_name, 
                           SUM(chi_tiet_don_hangs.thanh_tien) AS total_amount, 
                           COUNT(don_hangs.id) AS total_orders
                    FROM don_hangs
                    INNER JOIN tai_khoans ON don_hangs.tai_khoan_id = tai_khoans.id
                    INNER JOIN chi_tiet_don_hangs ON don_hangs.id = chi_tiet_don_hangs.don_hang_id
                    WHERE don_hangs.ngay_dat IS NOT NULL
                      AND don_hangs.trang_thai_id = 5 -- Chỉ thống kê khi giao hàng thành công
                      AND YEAR(don_hangs.ngay_dat) = :year
                      AND MONTH(don_hangs.ngay_dat) = :month
                    GROUP BY tai_khoans.id
                    ORDER BY tai_khoans.ho_ten";

            // Chuẩn bị và thực thi truy vấn
            $stmt = $this->conn->prepare($sql);
            $stmt->bindValue(':year', $year, PDO::PARAM_INT);
            $stmt->bindValue(':month', $month, PDO::PARAM_INT);
            $stmt->execute();
            $thongKeTaiKhoan = $stmt->fetchAll(PDO::FETCH_ASSOC);

            // Truy vấn thống kê sản phẩm bán chạy nhất (chỉ đơn hàng giao thành công)
            $sql_products = "SELECT san_phams.ten_san_pham AS product_name,
                                    SUM(chi_tiet_don_hangs.so_luong) AS total_sold,
                                    SUM(chi_tiet_don_hangs.thanh_tien) AS total_sales
                             FROM chi_tiet_don_hangs
                             INNER JOIN san_phams ON chi_tiet_don_hangs.san_pham_id = san_phams.id
                             INNER JOIN don_hangs ON chi_tiet_don_hangs.don_hang_id = don_hangs.id
                             WHERE don_hangs.trang_thai_id = 5
                               AND YEAR(don_hangs.ngay_dat) = :year
                               AND MONTH(don_hangs.ngay_dat) = :month
                             GROUP BY san_phams.id
                             ORDER BY total_sold DESC LIMIT 5";

            // Chuẩn bị và thực thi truy vấn
            $stmt_products = $this->conn->prepare($sql_products);
            $stmt_products->bindValue(':year', $year, PDO::PARAM_INT);
            $stmt_products->bindValue(':month', $month, PDO::PARAM_INT);
            $stmt_products->execute();
            $topProducts = $stmt_products->fetchAll(PDO::FETCH_ASSOC);// Truy vấn thống kê sản phẩm được xem nhiều nhất
            $sql_views = "SELECT ten_san_pham AS product_name,
                               luot_xem AS total_views
                        FROM san_phams
                        WHERE YEAR(ngay_cap_nhat_luot_xem) = :year
                          AND MONTH(ngay_cap_nhat_luot_xem) = :month
                        ORDER BY luot_xem DESC
                        LIMIT 5";

            $stmt_views = $this->conn->prepare($sql_views);
            $stmt_views->bindValue(':year', $year, PDO::PARAM_INT);
            $stmt_views->bindValue(':month', $month, PDO::PARAM_INT);
            $stmt_views->execute();
            $topViewedProducts = $stmt_views->fetchAll(PDO::FETCH_ASSOC);

            // Trả về kết quả thống kê
            return [
                'thong_ke_tai_khoan' => $thongKeTaiKhoan,
                'top_products' => $topProducts,
                'top_viewed_products' => $topViewedProducts
            ];
        } catch (PDOException $e) {
            throw new Exception("Lỗi khi thực thi truy vấn: " . $e->getMessage());
        }
    }
}
?>