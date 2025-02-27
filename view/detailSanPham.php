<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.bundle.min.js"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css" integrity="sha512-xh6O/CkQoPOWDdYTDqeRdPCVd1SpvCA9XXcUnZS2FmJNp1coAFzvtCN9BmamE+4aHK8yyUHUSCcJHgXloTyT2A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
<script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/js/all.min.js" integrity="sha512-naukR7I+Nk6gp7p5TMA4ycgfxaZBJ7MO5iC3Fp6ySQyKFHOGfpkSZkYVWV5R7u7cfAicxanwYQ5D1e17EfJcMA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

<div class="container my-5">
    <div class="row shadow p-3 mb-5 bg-body-tertiary rounded">
        <!-- Main Product Image and Previews -->
        <div class="col-md-5">
            <div class="main-img mb-4">
                <img class="img-fluid" src="<?= $sanPham['hinh_anh'] ?? 'ảnh sản phẩm' ?>" alt="Product">
                <!-- <div class="row my-3 previews">
                    <div class="col-3">
                        <img src="./view/asset/images/1.jpg" alt="Sale">
                    </div>
                    <div class="col-3">
                        <img src="./view/asset/images/2.jpg" alt="Sale">
                    </div>
                    <div class="col-3">
                        <img src="./view/asset/images/3.jpg" alt="Sale">
                    </div>
                    <div class="col-3">
                        <img src="./view/asset/images/4.jpg" alt="Sale">
                    </div>
                </div> -->
            </div>
        </div>

        <!-- Product Description and Details -->
        <div class="col-md-7 ">
            <div class="main-description px-2">
                <div class="manufacturer-name mb-2">
                    <!-- <a href="#"><?= htmlspecialchars($sanPham['ten_danh_muc'] ?? 'Không xác định') ?></a> -->
                    <a href="<?= BASE_URL . "?act=danh-muc-san-pham&id_danh_muc=" . $sanPham['danh_muc_id'] ?>" class="ps-10"><?= htmlspecialchars($sanPham['ten_danh_muc'] ?? 'Không xác định') ?></a>
                </div>
                <div class="product-title text-bold my-3">
                    <h3 class="product-name"><?= htmlspecialchars($sanPham['ten_san_pham'] ?? 'Tên sản phẩm') ?></h3>
                </div>
                <!-- <div class="pro-review">
                    <?php $countComment = is_array($listBinhLuan) ? count($listBinhLuan) : 0; ?>
                    <span><?= $countComment ?> bình luận</span>
                </div> -->

                <!-- Price Area -->
                <div class="price-area my-4">
                    <p class="old-price mb-1">
                        <del><span class="price-old"><?= formatPrice($sanPham['gia_san_pham']) . 'đ' ?></span></del>

                    </p>
                    <p class="new-price text-danger"><?= isset($sanPham['gia_khuyen_mai']) ? formatPrice($sanPham['gia_khuyen_mai']) . 'đ' : formatPrice($sanPham['gia_san_pham']) . 'đ' ?></p>
                    <!-- <p class="text-secondary mb-1">(Có thể áp dụng thuế bổ sung khi thanh toán)</p> -->
                </div>

                <!-- Buttons -->
                <form action="
                <?php if (isset($_SESSION['user_client'])) {
                    echo "?act=them-gio-hang";
                } else {
                    echo "?act=login";
                }  ?>" method="POST">
                    <div class="buttons d-flex my-5">
                        <!-- <div class="me-2">
                            <a href="<?= BASE_URL . '?act=thanh-toan' ?>" class="shadow btn custom-btn w-100">Mua hàng</a>
                        </div> -->
                        <div class="me-5">
                            <button type="submit" class="shadow btn custom-btn w-100 btn-primary" style="padding: 20px 20px 30px 20px;">Thêm vào giỏ hàng</button>
                        </div>
                        <div class="quantity d-flex align-items-center">
                            <input type="hidden" name="san_pham_id" value="<?= $sanPham['id']; ?>">
                            <button type="button" class="btn btn-success p-2 " id="decrease">-</button>
                            <input type="text" class="form-control text-center mx-2" id="so_luong" value="1" min="0" max="20" name="so_luong" style="width: 60px;">
                            <button type="button" class="btn btn-success p-2 " id="increase">+</button>
                        </div>
                    </div>

                </form>
            </div>

            <!-- Product Details -->
            <div class="product-details my-4">
                <p class="pro-desc"><?= htmlspecialchars($sanPham['mo_ta'] ?? 'Không có mô tả') ?></p>
            </div>

            <!-- Delivery Info -->
            <div class="delivery my-4">
                <p class="font-weight-bold mb-0"><span><i class="fa-solid fa-truck"></i></span> <b>Giao hàng được thực hiện trong 3 ngày kể từ ngày mua</b></p>
                <p class="text-secondary">Đặt hàng ngay để nhận được sản phẩm này giao hàng</p>
            </div>
            <div class="delivery-options my-4">
                <p class="font-weight-bold mb-0"><span><i class="fa-solid fa-filter"></i></span> <b>Tùy chọn giao hàng</b></p>
                <p class="text-secondary">Xem các tùy chọn giao hàng tại đây</p>
            </div>
        </div>
        <!-- bình luân -->
        <div class="tab-content reviews-tab">
            <div class="tab-pane fade show active" id="tab_three">

            
                    <?php if (!empty($listBinhLuan)): ?>
                        <?php foreach ($listBinhLuan as $binhLuan): ?>
                            <div class="total-reviews shadow p-3 mb-3 bg-body rounded">
                                <div class="rev-avatar">
                                    <img src="<?= isset($binhLuan['anh_dai_dien']) ? htmlspecialchars($binhLuan['anh_dai_dien']) : 'default-avatar.jpg' ?>" alt="Avatar">
                                </div>
                                <div class="review-box" style="background-color: white;">
                                    <div class="post-author" style="display: flex;justify-content: space-between;">
                                        <span style="font-weight: bold;color:#007bff"><?= isset($binhLuan['ho_ten']) ? htmlspecialchars($binhLuan['ho_ten']) : 'Không xác định' ?></span>
                                        <p style="padding-right: 30px;">- <?= isset($binhLuan['ngay_dang']) ? htmlspecialchars($binhLuan['ngay_dang']) : 'Không xác định' ?> -</p>
                                    </div>
                                    <p style="color:black"><?= isset($binhLuan['noi_dung']) ? htmlspecialchars($binhLuan['noi_dung']) : 'Nội dung bình luận không có.' ?></p>
                                </div>
                            </div>
                        <?php endforeach; ?>
                    <?php else: ?>
                        <p>Không có bình luận nào.</p>
                    <?php endif; ?>
                <form action="<?= BASE_URL . '?act=them-binh-luan' ?>" method="POST" class="review-form">
                    <div class="form-group row">
                        <div class="col">
                            <label class="col-form-label mt-5"><span class="text-danger">*</span>Nội dung bình luận</label>
                            <textarea name="noi_dung" class="form-control" required></textarea>
                        </div>
                    </div>
                    <input type="hidden" name="san_pham_id" value="<?= $sanPham['id'] ?>">
                    <button class="btn btn-sqr" type="submit">Bình luận</button>
                </form>
            </div>
        </div>
    </div>

    <!-- Similar Products -->
    <div class="similar-products my-4">
        <hr>
        <h4 style="font-family: Arial, Helvetica, sans-serif; font-weight:bold;margin-bottom:40px">SẢN PHẨM TƯƠNG TỰ</h4>
        <div class="row ">
            <?php if (!empty($listSanPhamCungDanhMuc) && is_array($listSanPhamCungDanhMuc)): ?>
                <?php foreach ($listSanPhamCungDanhMuc as $sp): ?>
                    <div class="col-md-3 mb-4 shadow p-3 mb-5 bg-body-tertiary rounded ms-5">
                        <div class="similar-product text-center">
                            <!-- Chỉnh sửa đường dẫn tại đây -->
                            <a href="?act=chi-tiet-san-pham&id_san_pham=<?= htmlspecialchars($sp['id']) ?>">
                                <img class="img-fluid" src="<?= htmlspecialchars($sp['hinh_anh']) ?>" alt="<?= htmlspecialchars($sp['ten_san_pham']) ?>">
                                <p class="title" style="color: black;"><?= htmlspecialchars($sp['ten_san_pham']) ?></p>
                                <p class="price" style="color: red;"><?= formatPrice($sp['gia_san_pham']) ?> đ</p>
                            </a>
                        </div>
                    </div>
                <?php endforeach; ?>
            <?php else: ?>
                <p>Không có sản phẩm liên quan.</p>
            <?php endif; ?>
        </div>



    </div>

</div>

<style>
    .text-bold {
        font-weight: 800;
        
    }

    .main-img img {
        width: 100%;
    }

    .previews img {
        width: 100%;
        height: 140px;
        object-fit: cover;
    }

    .old-price-discount {
        font-weight: 600;
    }

    .new-price {
        font-size: 2rem;
    }

    .buttons .me-2 {
        margin-right: 10px;
    }

    .custom-btn {
        background-color: #0093c4;
        color: white;
        width: 150px;
        height: 40px;
        border-radius: 0;
        text-transform: capitalize;
    }

    .custom-btn:hover {
        background-color: #007b92;
        color: white;
    }

    .similar-product img {
        height: 200px;
        object-fit: cover;
    }

    .similar-product .title {
        margin: 10px 0;
    }

    .similar-product .price {
        font-weight: bold;
    }

    /* Responsiveness */
    @media (max-width: 767px) {
        .previews img {
            height: auto;
        }
    }

    /* css bình luân */
    .tab-content {
        margin-top: 20px;
        font-family: Arial, sans-serif;

    }

    .rev-avatar img {
        width: 50px;
        height: 50px;
        border-radius: 50%;
        object-fit: cover;
        margin-right: 15px;
    }

    */

    /* Thông báo không có bình luận */
    p {
        font-size: 14px;
        color: #777;
        text-align: center;
    }

    /* Form bình luận */
    .review-form {
        margin-top: 20px;
        padding: 20px;
        border: 1px solid #ddd;
        border-radius: 5px;
        background-color: #f9f9f9;
    }

    .review-form .form-group {
        margin-bottom: 15px;
    }

    .review-form label {
        font-weight: bold;
        color: black;
        margin-bottom: 5px;
        display: block;
    }

    .review-form textarea {
        width: 100%;
        height: 100px;
        padding: 10px;
        border: 1px solid #ccc;
        border-radius: 5px;
        font-size: 14px;
        resize: none;
        box-shadow: inset 0 1px 3px rgba(0, 0, 0, 0.1);
    }

    .review-form textarea:focus {
        outline: none;
        border-color: #007bff;
        box-shadow: 0 0 5px rgba(0, 123, 255, 0.5);
    }

    .review-form .buttons {
        text-align: right;
    }

    .review-form .btn-sqr {
        background-color: #007bff;
        color: #fff;
        border: none;
        padding: 10px 20px;
        border-radius: 5px;
        font-size: 14px;
        cursor: pointer;
        transition: background-color 0.3s ease;
    }

    .review-form .btn-sqr:hover {
        background-color: #0056b3;
    }

    /* Responsive */
    @media (max-width: 768px) {
        .total-reviews {
            flex-direction: column;
            align-items: flex-start;
        }

        .rev-avatar {
            margin-bottom: 10px;
        }
    }
</style>

<script>
    // Lấy phần tử input và các nút
    const quantityInput = document.getElementById('so_luong'); // Sửa id để khớp với HTML
    const increaseBtn = document.getElementById('increase');
    const decreaseBtn = document.getElementById('decrease');

    // Xử lý khi nhấn nút +
    increaseBtn.addEventListener('click', () => {
        let currentValue = parseInt(quantityInput.value) || 0; // Lấy giá trị hiện tại hoặc mặc định là 0
        const max = parseInt(quantityInput.max) || Infinity; // Lấy giá trị tối đa
        if (currentValue < max) {
            quantityInput.value = currentValue + 1; // Tăng số lượng
        }
    });

    // Xử lý khi nhấn nút -
    decreaseBtn.addEventListener('click', () => {
        let currentValue = parseInt(quantityInput.value) || 0; // Lấy giá trị hiện tại hoặc mặc định là 0
        const min = parseInt(quantityInput.min) || 0; // Lấy giá trị tối thiểu
        if (currentValue > min) {
            quantityInput.value = currentValue - 1; // Giảm số lượng
        }
    });
</script>
<!-- <script>
    const quantityInput = document.getElementById('cart_quantity');
    const increaseBtn = document.getElementById('increase');
    const decreaseBtn = document.getElementById('decrease');

    increaseBtn.addEventListener('click', () => {
        let currentValue = parseInt(quantityInput.value) || 0;
        const max = parseInt(quantityInput.max);
        if (currentValue < max) {
            quantityInput.value = currentValue + 1;
        }
    });decreaseBtn.addEventListener('click', () => {
        let currentValue = parseInt(quantityInput.value) || 0;
        const min = parseInt(quantityInput.min);
        if (currentValue > min) {
            quantityInput.value = currentValue - 1;
        }
    });
</script> -->