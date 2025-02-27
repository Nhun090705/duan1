<?php
require_once 'env.php';
// Kết nối CSDL qua PDO
function connectDB() {
    // Kết nối CSDL
    $host = DB_HOST;
    $port = DB_PORT;
    $dbname = DB_NAME;

    try {
        $conn = new PDO("mysql:host=$host;port=$port;dbname=$dbname", DB_USERNAME, DB_PASSWORD);

        // cài đặt chế độ báo lỗi là xử lý ngoại lệ
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        // cài đặt chế độ trả dữ liệu
        $conn->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
    
        return $conn;
    } catch (PDOException $e) {
        echo ("Connection failed: " . $e->getMessage());
    }

}
function   uploadFile($file,$folderUpload){
    $pathStorage = $folderUpload . time(). $file['name'];
    $from = $file ['tmp_name'];
    $to = PATH_ROOT . $pathStorage;
    if (move_uploaded_file($from,$to)) {
        return $pathStorage;
    }
    return null;
 }
//Xóa file
function deleteFile($file){
    $pathDelete = PATH_ROOT . $file;
    if (file_exists($pathDelete)) {
        unlink($pathDelete);
    }
}

//xóa sau khi load sp
function  deleteSessionsError(){
    if (isset($_SESSION['flash'])) {
        // Hủy ss sau khi tải trang
        unset($_SESSION['flash']);
        unset($_SESSION['error']);
        // session_unset();
    }
}
function formatDate($date){
    return date("d-m-Y", strtotime($date));
}

function checkLoginAdmin(){
    if(!isset ($_SESSION['user_admin'])) { //Khong co session thi redirect ve trang login
        header("Location: ". BASE_URL_AMIN . '?act=login-admin');
        exit();
    }   
}

function formatPrice($price) {
    return  number_format($price, 0, ',', '.');
}

