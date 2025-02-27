<?php
class SanPham
{
    public $conn;

    public function __construct()
    {
        $this->conn = connectDB();
    }
    public function getAllSanPham()
    {
        try {
            $sql = 'SELECT san_phams.*, danh_mucs.ten_danh_muc 
            FROM san_phams
            INNER JOIN danh_mucs ON san_phams.danh_muc_id = danh_mucs.id';
            $stmt = $this->conn->prepare($sql);

            $stmt->execute();

            return $stmt->fetchAll();
        } catch (Exception $e) {
            echo "lỗi" . $e->getMessage();
        }
    }


    public function getDetailSanPham($id)
    {
        try {
            $sql = 'SELECT san_phams.*, danh_mucs.ten_danh_muc
                    FROM san_phams
                    INNER JOIN danh_mucs ON san_phams.danh_muc_id = danh_mucs.id
                    WHERE san_phams.id = :id';
            $stmt = $this->conn->prepare($sql);
            $stmt->execute([':id' => $id]);
            return $stmt->fetch();
        } catch (Exception $e) {
            echo "Lỗi: " . $e->getMessage();
        }
    }


    // public function getBinhLuanFromSanPham($id){
    //     try {
    //         $sql = 'SELECT binh_luans.*, tai_khoans.ho_ten, tai_khoans.anh_dai_dien
    //         FROM binh_luans 
    //         INNER JOIN tai_khoans on binh_luans.tai_khoan_id = tai_khoans.id
    //         WHERE binh_luans.san_pham_id = :id';

    //         $stmt = $this->conn->prepare($sql);
    //         $stmt->execute([':id' => $id]); 
    //         return $stmt->fetch();

    //     } catch (Exception $e) {
    //         echo "Lỗi: " . $e->getMessage(); 
    //     }
    // }
    // public function getListSanPhamDanhMuc($danh_muc_id)
    // {
    //     try {
    //         $sql = 'SELECT * FROM san_phams
    //         WHERE id_danh_muc  = :$id_danh_muc ';
    //         $stmt = $this->conn->prepare($sql);

    //         $stmt->execute([':id_danh_muc'=>$danh_muc_id]);

    //         return $stmt->fetchAll();

    //     }catch(Exception $e){
    //         echo "lỗi" . $e->getMessage();
    //     }
    // }
    public function getListSanPhamDanhMuc($danh_muc_id)
    {
        try {
            // Sửa cú pháp placeholder trong câu lệnh SQL
            $sql = 'SELECT * FROM san_phams WHERE danh_muc_id = :danh_muc_id';

            // Chuẩn bị câu lệnh
            $stmt = $this->conn->prepare($sql);

            // Thực thi câu lệnh với giá trị truyền vào
            $stmt->execute([':danh_muc_id' => $danh_muc_id]);

            // Trả về tất cả kết quả
            return $stmt->fetchAll();
        } catch (Exception $e) {
            // Xử lý lỗi
            echo "Lỗi: " . $e->getMessage();
            return false; // Trả về false nếu xảy ra lỗi
        }
    }

    public function getBinhLuanFromSanPham($id)
    {
        try {
            $sql = 'SELECT  binh_luans.*,tai_khoans.ho_ten,tai_khoans.anh_dai_dien
        FROM binh_luans
        INNER JOIN tai_khoans ON binh_luans.tai_khoan_id = tai_khoans.id
        WHERE binh_luans.san_pham_id = :id
        ';

            $stmt = $this->conn->prepare($sql);
            $stmt->execute([':id' => $id]);

            return $stmt->fetchAll();
        } catch (Exception $e) {
            echo "Loi" . $e->getMessage();
        }
    }

    public function addBinhLuan($san_pham_id, $tai_khoan_id, $noi_dung, $ngay_dang, $trang_thai)
{
    try {
        // Sửa câu lệnh SQL cho đúng
        $sql = "INSERT INTO `binh_luans` (`san_pham_id`, `tai_khoan_id`, `noi_dung`, `ngay_dang`, `trang_thai`) 
                VALUES (:san_pham_id, :tai_khoan_id, :noi_dung, :ngay_dang, :trang_thai)";

        // Chuẩn bị câu lệnh SQL
        $stmt = $this->conn->prepare($sql);

        // Thực thi câu lệnh với các giá trị
        $stmt->execute([
            ':san_pham_id' => $san_pham_id,
            ':tai_khoan_id' => $tai_khoan_id,
            ':noi_dung' => $noi_dung,
            ':ngay_dang' => $ngay_dang,
            ':trang_thai' => $trang_thai
        ]);

        return true;
    } catch (Exception $e) {
        echo "Lỗi: " . $e->getMessage();
    }
}

}
