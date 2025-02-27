<?php
ini_set('display_errors', 1);
error_reporting(E_ALL);
class Danhmuc
{
    public $conn;
    public function __construct()
    {
        $this->conn = connectDB();
    }

    public function getAllDanhmuc()
    {
        try {
            $sql = 'SELECT * FROM danh_mucs';
            $stmt = $this->conn->prepare($sql);
            $stmt->execute();
            return $stmt->fetchAll();
        } catch (Exception $e) {
            echo "Loi" . $e->getMessage();
        }
    }
    public function getOneDanhmuc($id)
    {
        try {
            $sql = 'SELECT * FROM danh_mucs WHERE id=:id';
            $stmt = $this->conn->prepare($sql);
            $stmt->execute([
                ':id' => $id
            ]);
            return $stmt->fetch();
        } catch (Exception $e) {
            echo "Loi" . $e->getMessage();
            return false;
        }
    }
}
