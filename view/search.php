<?php
// Kết nối đến tệp chứa các hàm
require_once $_SERVER['DOCUMENT_ROOT'] . '/duan1/commons/function.php';

// Kết nối cơ sở dữ liệu
$conn = connectDB();

// Lấy từ khóa tìm kiếm từ URL
$query = isset($_GET['query']) ? trim($_GET['query']) : '';
$results = [];

// Thực hiện tìm kiếm nếu từ khóa không rỗng
if (!empty($query)) {
    try {
        $sql = "SELECT * FROM san_phams WHERE ten_san_pham LIKE :query OR gia_san_pham LIKE :query";
        $stmt = $conn->prepare($sql);
        $stmt->execute(['query' => "%$query%"]);
        $results = $stmt->fetchAll(PDO::FETCH_ASSOC);
    } catch (Exception $e) {
        echo "Đã xảy ra lỗi trong quá trình tìm kiếm.";
    }
}
?>
<!DOCTYPE html>
<html lang="vi">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kết quả tìm kiếm</title>
    <!-- Thêm link tới CSS của Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="../asset/css/style.css">

    <style>
        /* Thêm một số kiểu CSS để cải thiện giao diện */
        .card {
            border: none;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            transition: transform 0.3s ease, box-shadow 0.3s ease;
        }

        .card:hover {
            transform: translateY(-5px);
            box-shadow: 0 8px 16px rgba(0, 0, 0, 0.2);
        }

        .card-title {
            font-size: 1.2rem;
            font-weight: bold;
        }

        .product-image {
            height: 200px;
            object-fit: cover;
        }

        .price {
            font-size: 1.1rem;
            font-weight: bold;
            color: #d9534f;
        }

        .old-price {
            text-decoration: line-through;
            color: #6c757d;
        }

        .btn-primary {
            background-color: #007bff;
            border: none;
            transition: background-color 0.3s ease;
        }

        .btn-primary:hover {
            background-color: #0056b3;
        }

        .alert-warning {
            font-size: 1.1rem;
            padding: 1rem;
        }
    </style>
</head>

<body>
    <!-- Thanh điều hướng -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">Tìm kiếm sản phẩm</a>
        </div>
    </nav>

    <!-- Tiêu đề trang -->
    <div class="container mt-4 text-center">
        <h1 class="display-4">Kết quả tìm kiếm cho: <span class="text-primary"><?= htmlspecialchars($query) ?></span></h1>
    </div>

    <!-- Kết quả tìm kiếm -->
    <div class="container mt-5">
        <?php if (!empty($results)): ?>
            <div class="row row-cols-1 row-cols-md-3 g-4">
                <?php foreach ($results as $product): ?>
                    <div class="col">
                        <div class="card h-100">
                            <!-- Hình ảnh sản phẩm -->
                            <?php
                            $imageFileName = htmlspecialchars(basename($product['hinh_anh'] ?? ''));
                            $imageUrl = "/duan1/upload/" . $imageFileName;
                            $imageAlt = htmlspecialchars($product['ten_san_pham']);
                            ?>
                            <img src="<?= !empty($imageFileName) && file_exists($_SERVER['DOCUMENT_ROOT'] . $imageUrl) ? $imageUrl : '/duan1/upload/default.png' ?>"
                                 alt="<?= $imageAlt ?>" class="card-img-top product-image">

                            <div class="card-body">
                                <h5 class="card-title"><?= htmlspecialchars($product['ten_san_pham']) ?></h5>

                                <p class="price">
                                    Giá gốc: <span class="old-price"><?= number_format($product['gia_san_pham'], 0, ',', '.') ?> VND</span>
                                </p>

                                <p class="price">
                                    Giá khuyến mãi: <?= number_format($product['gia_khuyen_mai'], 0, ',', '.') ?> VND
                                </p>

                                <p class="card-text">
                                    Mô tả:
                                    <?= htmlspecialchars($product['mo_ta']) ?></p>
                            </div>

                            <div class="card-footer text-center">
                                <a href="?act=chi-tiet-san-pham&id_san_pham=<?= htmlspecialchars($product['id']) ?>" class="btn btn-primary w-100">Xem chi tiết</a>
                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
        <?php else: ?>
            <div class="alert alert-warning text-center">Không tìm thấy sản phẩm nào.</div>
        <?php endif; ?>
    </div>

    <!-- Thêm script của Bootstrap -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
