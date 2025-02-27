<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Products</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
    <main class="py-5 bg-light">
        <div class="container">
            <!-- Section Title -->
            <div class="text-center mb-5">
                <h2 class="fw-bold">Sản phẩm của chúng tôi</h2>
                <p class="text-muted">Sản phẩm được cập nhật liên tục</p>
            </div>

            <div class="row">
                <!-- Main Products -->
                <div class="col-lg-9 shadow p-5 mb-5 bg-body rounded">
                    <div class="row g-4">
                        <?php foreach ($listSanPham as $sanPham): ?>
                            <div class="col-sm-6 col-md-4">
                                <div class="card h-100 shadow-sm">
                                    <!-- Product Image -->
                                    <div class="position-relative">
                                        <a href="<?= BASE_URL . "?act=chi-tiet-san-pham&id_san_pham=" . $sanPham['id'] ?>">
                                            <img src="<?= BASE_URL . $sanPham['hinh_anh'] ?>" class="card-img-top" alt="<?= $sanPham['ten_san_pham'] ?>">
                                        </a>
                                        <!-- Badge -->
                                        <?php
                                        $ngayNhap = new DateTime($sanPham['ngay_nhap']);
                                        $ngayHienTai = new DateTime();
                                        $tinhNgay = $ngayHienTai->diff($ngayNhap);
                                        ?>
                                        <?php if ($tinhNgay->days <= 7): ?>
                                            <span class="badge bg-success position-absolute top-0 start-0 m-2">Mới</span>
                                        <?php endif; ?>
                                        <?php if ($sanPham['gia_khuyen_mai']): ?>
                                            <span class="badge bg-danger position-absolute top-0 end-0 m-2">Giảm giá</span>
                                        <?php endif; ?>
                                    </div>

                                    <!-- Product Info -->
                                    <div class="card-body text-center">
                                        <h6 class="card-title text-truncate">
                                            <a href="<?= BASE_URL . "?act=chi-tiet-san-pham&id_san_pham=" . $sanPham['id'] ?>" class="text-decoration-none text-dark">
                                                <?= $sanPham['ten_san_pham'] ?>
                                            </a>
                                        </h6>
                                        <div class="fw-bold text-danger"><?= formatPrice($sanPham['gia_khuyen_mai']) . 'đ' ?: formatPrice($sanPham['gia_san_pham']) . 'đ' ?>
                                        </div>
                                        <?php if ($sanPham['gia_khuyen_mai']): ?>
                                            <div class="text-muted text-decoration-line-through">
                                                <?= formatPrice($sanPham['gia_san_pham']) . 'đ' ?>
                                            </div>
                                        <?php endif; ?>
                                    </div>
                                    <div class="card-footer bg-white border-0 text-center">
                                        <a href="<?= BASE_URL . "?act=chi-tiet-san-pham&id_san_pham=" . $sanPham['id'] ?>" class="btn btn-dark w-100 shadow" style="padding: 20px;margin-bottom:10px;" >Xem chi tiết</a>
                                    </div>
                                </div>
                            </div>
                        <?php endforeach; ?>
                    </div>
                </div>

                <!-- Sidebar -->
                <div class="col-lg-3">
                    <!-- <div class="shadow bg-white rounded mb-4">
                        <h4 class="text-center text-white bg-dark p-3">Danh mục</h4>
                        
                        <ul class="list-group list-group-flush">
                            <li class="list-group-item"><a href="#" class="text-decoration-none">Giày adidas 2024</a></li>
                            <li class="list-group-item"><a href="#" class="text-decoration-none">Giày adidas nam</a></li>
                            <li class="list-group-item"><a href="#" class="text-decoration-none">Giày thể thao</a></li>
                        </ul>
                    </div> -->
                    <div class="shadow  bg-body-tertiary rounded mb-4">
                        <h4 class="text-center text-white bg-dark p-3">Danh mục</h4>
                    </div>
                    <ul class="list-group list-group-flush shadow p-3 bg-body-tertiary rounded">
                        <?php if (!empty($listDanhMuc) && is_array($listDanhMuc)): ?>
                            <?php foreach ($listDanhMuc as $key => $danhmuc): ?>
                                <li class="list-group-item">
                                    <!-- <a href="<?= BASE_URL . $danhmuc['ten_danh_muc'] ?>" class="ps-10"><?= $danhmuc['ten_danh_muc'] ?></a> -->
                                    <a href="<?= BASE_URL . "?act=danh-muc-san-pham&id_danh_muc=" . $danhmuc['id'] ?>" class="ps-10"><?= $danhmuc['ten_danh_muc'] ?></a>
                                </li>
                            <?php endforeach; ?>
                        <?php else: ?>
                            <li class="list-group-item">Không có danh mục nào</li>
                        <?php endif; ?>
                    </ul>

                </div>
            </div>
        </div>
    </main>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
<style>
    .card-img-top {
        height: 200px;
        object-fit: cover;
        border-radius: 0.5rem 0.5rem 0 0;
    }

    .card-title a {
        color: #333;
        text-decoration: none;
        transition: color 0.3s ease;
    }

    .card-title a:hover {
        color: #007bff;
    }

    .card:hover {
        transform: scale(1.03);
        transition: transform 0.3s ease;
    }
</style>