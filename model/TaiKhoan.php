<?php
class TaiKhoan
{
    public $conn;

    public function __construct()
    {
        $this->conn = connectDB(); // Đảm bảo connectDB() trả về kết nối PDO hợp lệ
    }
    public function checkLogin($email, $mat_khau)
    {
        try {
            $sql = 'SELECT * FROM tai_khoans 
                    WHERE email = :email';

            $stmt = $this->conn->prepare($sql);

            $stmt ->execute(['email'=>$email]);

            $user = $stmt->fetch();

            if($user && password_verify($mat_khau, $user['mat_khau']))
            {
                if($user['chuc_vu_id'] == 2 )
                {
                    if($user['trang_thai'] == 1)
                    {
                        return $user['email'];  //Truong hop dang nhap thanh cong
                    }else{
                        return "Tai khoan bi cam";
                    }
                }else
                {
                    return "Tai khoan khong co quyen dang nhap";
                }
            }else{
                return "Ban nhap sai thong tin hoac mat khau hoac email";
            }

        } catch (\Exception $e) {
            echo "Loi".$e->getMessage();
            return false;
        }   
    }

    public function getTaikhoanFromEmail($email)
    {
        try {
            $sql = 'SELECT * FROM tai_khoans WHERE email=:email';
            $stmt = $this->conn->prepare($sql);
            $stmt->execute([
                ':email' => $email
            ]);
            return $stmt->fetch();
        } catch (Exception $e) {
            echo "Loi" . $e->getMessage();
            return false;
        }
    }

    public function register($email, $mat_khau, $ten, $chuc_vu_id = 2, $trang_thai = 1)
    {
        try {
            $sql = 'INSERT INTO tai_khoans (email, mat_khau, ho_ten, chuc_vu_id, trang_thai) 
                VALUES (:email, :mat_khau, :ho_ten, :chuc_vu_id, :trang_thai)';
            $stmt = $this->conn->prepare($sql);
            $stmt->execute([
                ':email' => $email,
                ':mat_khau' => $mat_khau,
                ':ho_ten' => $ten,
                ':chuc_vu_id' => $chuc_vu_id,
                ':trang_thai' => $trang_thai
            ]);
            return true;
        } catch (PDOException $e) {
            error_log("Lỗi đăng ký tài khoản: " . $e->getMessage());
            return false;
        }
    }

    
}
