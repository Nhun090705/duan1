<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Giỏ hàng</title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
    <style>
        body {
            font-family: 'Arial', sans-serif;
            background-color: #f8f9fa;
            margin: 0;
            padding: 0;
        }

        .container {
            max-width: 1200px;
            margin: auto;
            padding: 20px;
        }

        .card {
            background-color: #fff;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            margin-bottom: 20px;
        }

        .card-header {
            padding: 20px;
            background-color: #007bff;
            color: white;
            font-size: 1.5rem;
            border-radius: 10px 10px 0 0;
            text-align: center;
        }

        .product-row {
            display: flex;
            align-items: center;
            justify-content: space-between;
            padding: 15px 20px;
            border-bottom: 1px solid #f1f1f1;
        }

        .product-row img {
            width: 120px;
            /* Giữ nguyên tỷ lệ khung hình */
            border-radius: 5px;
            /* Bo tròn góc */
            object-fit: contain;
            /* Đảm bảo ảnh hiển thị gọn trong khung */
        }


        .product-info {
            flex: 2;
            margin-left: 15px;
        }

        .product-controls {
            display: flex;
            align-items: center;
            gap: 10px;
        }

        .quantity-box {
            display: flex;
            align-items: center;
            gap: 5px;
        }

        .btn-link {
            color: #007bff;
            background-color: #e9ecef;
            border-radius: 50%;
            padding: 8px;
            border: none;
            cursor: pointer;
            transition: transform 0.3s ease, background-color 0.3s ease;
        }

        .btn-link:hover {
            background-color: #007bff;
            color: #fff;
            transform: scale(1.1);
        }

        .price {
            font-weight: bold;
            font-size: 1rem;
        }

        .total-price {
            color: #28a745;
            font-size: 1.2rem;
            font-weight: bold;
        }

        .btn-success {
            background-color: #28a745;
            color: white;
            padding: 15px;
            font-size: 1rem;
            border: none;
            border-radius: 5px;
            width: 100%;
            cursor: pointer;
            transition: all 0.3s ease;
        }

        .btn-success:hover {
            background-color: #218838;
            box-shadow: 0 4px 10px rgba(40, 167, 69, 0.4);
        }

        .summary {
            background-color: #f9f9f9;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
            margin-top: 20px;
        }

        .summary h3 {
            font-size: 1.5rem;
            margin-bottom: 20px;
        }

        .summary p {
            font-size: 1rem;
            margin-bottom: 10px;
        }

        .voucher-box {
            margin: 20px 0;
        }

        @media (max-width: 768px) {
            .product-row {
                flex-wrap: wrap;
                text-align: center;
            }

            .product-info,
            .product-controls,
            .price {
                margin: 10px 0;
                text-align: center;
            }
        }
    </style>
</head>

<body>
    <div class="container">
        <div class="card">
            <div class="card-header" style="background-color: #28a745;">
                Giỏ hàng của bạn
            </div>
            
            <div class="card-body">
                <?php
                $tongGioHang = 0;
                foreach ($chiTietGioHang as $sanPham) :
                    $giaSanPham = $sanPham['gia_khuyen_mai'] ?? $sanPham['gia_san_pham'];
                    $tongTienSanPham = $sanPham['so_luong'] * $giaSanPham;
                    $tongGioHang += $tongTienSanPham;
                ?>
                    <div class="product-row">
                        <img src="<?= BASE_URL . $sanPham['hinh_anh'] ?>" alt="<?= $sanPham['ten_san_pham'] ?>">
                        <div class="product-info">
                            <p><strong><?= $sanPham['ten_san_pham'] ?></strong></p>
                            <!-- <p class="price"><?= formatPrice($giaSanPham) ?> vnđ</p> -->
                        </div>
                        <div class="product-controls">
                            <button style="text-decoration: none;" class="btn-link" onclick="updateQuantity(this, 'down', <?= $sanPham['san_pham_id'] ?>)">-</button>
                            <input min="1" name="quantity" value="<?= $sanPham['so_luong'] ?>" type="number" class="form-control form-control-sm" onchange="updateQuantity(this, 'input', <?= $sanPham['san_pham_id'] ?>)" />
                            <button style="text-decoration: none;" class="btn-link" onclick="updateQuantity(this, 'up', <?= $sanPham['san_pham_id'] ?>)">+</button>
                        </div>
                        <p class="total-price" style="margin: 0 30px;"><?= formatPrice($sanPham['gia_khuyen_mai'] ?? $sanPham['gia_san_pham']) ?> vnđ</p>
                        <!-- <button class="btn-link" onclick="removeItem(<?= $sanPham['san_pham_id'] ?>)">
                            <i class="fas fa-trash-alt"></i>
                        </button> -->

                        <button class="btn-link" onclick="removeItem(<?= $sanPham['san_pham_id'] ?>)">
                            <i class="fas fa-trash-alt"></i>
                        </button>

                    </div>
                <?php endforeach; ?>
            </div>
        </div>

        <!-- Tổng hợp -->
        <div class="summary">
            <div class="voucher-box">
                <h5 class="text-uppercase mb-3 mt-4">Voucher</h5>
                <input type="text" placeholder="Nhập mã giảm giá" class="form-control form-control-lg">
            </div>
            <!-- <button class="btn-success">Thanh toán</button> -->
            <a href="<?= BASE_URL . '?act=thanh-toan' ?>" class=" btn btn-success mt-4" style="text-decoration: none;color:white;padding:20px;background-color:#28a745">Thanh toán</a>
            <div class="pt-5">
                <h6 class="mb-0"><a href="<?= BASE_URL ?>" class="text-body"><i class="fas fa-long-arrow-alt-left me-2"></i>Quay lại trang chủ</a></h6>
            </div>
        </div>
    </div>

    <script>
        function updateQuantity(element, action, productId) {
            let quantityInput = action === 'input' ? element : element.parentNode.querySelector('input');
            let newQuantity = parseInt(quantityInput.value);

            if (action === 'up') {
                newQuantity++;
            } else if (action === 'down' && newQuantity > 1) {
                newQuantity--;
            }

            quantityInput.value = newQuantity;

            // Gửi yêu cầu AJAX đến server
            fetch('<?= BASE_URL ?>?act=update-quantity', {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json',
                    },
                    body: JSON.stringify({
                        product_id: productId,
                        quantity: newQuantity,
                    }),
                })
                .then(response => response.json())
                .then(data => {
                    if (data.success) {
                        // Cập nhật giao diện (nếu cần)
                        console.log('Cập nhật thành công');
                        location.reload();
                    } else {
                        alert('Cập nhật thất bại. Vui lòng thử lại.');
                    }
                })
                .catch(error => console.error('Error:', error));
        }

        function removeItem(productId) {
            // Gửi yêu cầu AJAX để xóa sản phẩm khỏi giỏ hàng
            fetch('<?= BASE_URL ?>?act=remove-item-from-cart', {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json',
                    },
                    body: JSON.stringify({
                        product_id: productId
                    }),
                })
                .then(response => response.json())
                .then(data => {
                    if (data.success) {
                        // Cập nhật giao diện (xóa sản phẩm khỏi giỏ hàng)
                        location.reload();
                    } else {
                        alert('Xóa sản phẩm thất bại. Vui lòng thử lại.');
                    }
                })
                .catch(error => console.error('Error:', error));
        }
    </script>
</body>

</html>