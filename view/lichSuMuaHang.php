<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Đơn hàng</title>
    <style>
        body {
            font-family: 'Arial', sans-serif;
            background-color: #f8f9fa;
            margin: 0;
            padding: 0;
        }

        .card {
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            border-radius: 15px;
            background-color: #fff;
        }

        .card-registration {
            padding: 20px;
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

        .btn-success {
            background-color: #28a745;
            color: #fff;
            border: none;
            width: 100%;
            padding: 12px;
            font-size: 18px;
            border-radius: 5px;
            cursor: pointer;
            transition: background-color 0.3s ease, box-shadow 0.3s ease;
        }

        .btn-success:hover {
            background-color: #218838;
            box-shadow: 0 4px 15px rgba(40, 167, 69, 0.4);
        }

        .row.mb-4:hover {
            background-color: #f8f9fa;
            border-radius: 5px;
            transition: background-color 0.3s ease;
        }

        .text-body {
            text-decoration: none;
            color: #000;
        }

        .text-body:hover {
            color: #007bff;
        }

        .summary {
            background-color: #f9f9f9;
            padding: 20px;
            border-radius: 15px;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
        }

        select {
            border: 1px solid #ced4da;
            border-radius: 5px;
            padding: 5px 10px;
            width: 100%;
        }

        .form-control-lg {
            border: 1px solid #ced4da;
            border-radius: 5px;
        }

        .total-box {
            background-color: white;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 2px 6px rgba(0, 0, 0, 0.1);
        }

        @media (min-width: 768px) {
            .col-lg-8 {
                flex: 0 0 80%;
                max-width: 80%;
            }

            .col-lg-4 {
                flex: 0 0 20%;
                max-width: 20%;
            }
        }

        @media (max-width: 768px) {

            .col-lg-8,
            .col-lg-4 {
                flex: 0 0 100%;
                max-width: 100%;
            }

            .summary {
                margin-top: 20px;
            }
        }
    </style>
</head>

<body>
    <section class="h-100 h-custom">
        <div class="container py-5 h-100">
            <div class="row d-flex justify-content-center align-items-center h-100">
                <div class="col-12">
                    <div class="card card-registration">
                        <div class="row g-4">
                            <!-- Giỏ hàng -->
                            <div class="col-lg-12">
                                <div class="p-5">
                                    <h1 class="fw-bold mb-5">ĐƠN HÀNG</h1>
                                    <hr class="my-4">
                                    <div class="cart-table table-responsive">
                                        <table class="table table-bordered">
                                            <thead>
                                                <tr>
                                                    <th>Mã đơn hàng</th>
                                                    <th>Ngày đặt</th>
                                                    <th>Tổng tiền</th>
                                                    <th>Phương thức thanh toán</th>
                                                    <th>Trạng thái đơn hàng</th>
                                                    <th>Thao tác</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php
                                                foreach ($donHangs as $donHang):
                                                ?>
                                                    <tr>
                                                        <th class="text-center"><?= $donHang['ma_don_hang'] ?></th>
                                                        <td><?= $donHang['ngay_dat'] ?></td>
                                                        <td><?= formatPrice($donHang['tong_tien']) ?>vnđ</td>
                                                        <td><?= $phuongThucThanhToan[$donHang['phuong_thuc_thanh_toan_id']] ?></td>
                                                        <td><?= $trangThaiDonHang[$donHang['trang_thai_id']] ?></td>
                                                        <td>
                                                            <a href="<?= BASE_URL ?>?act=chi-tiet-mua-hang&id=<?= $donHang['id'] ?>" class="btn btn-sqr">
                                                                Chi tiết đơn hàng</a>
                                                            <?php if ($donHang['trang_thai_id'] == 1) : ?>
                                                                <a href="<?= BASE_URL ?>?act=huy-don-hang&id=<?= $donHang['id'] ?>" class="btn btn-sqr"
                                                                    onclick="return confirm('Xác nhận hủy đơn hàng')">
                                                                    Hủy
                                                                </a>
                                                            <?php endif ?>
                                                        </td>
                                                    </tr>
                                                <?php
                                                endforeach;
                                                ?>
                                            </tbody>
                                        </table>

                                    </div>
                                    <div class="pt-5">
                                        <h6 class="mb-0"><a href="<?= BASE_URL  ?>" class="text-body"><i class="fas fa-long-arrow-alt-left me-2"></i>Quay lại trang chủ</a></h6>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</body>

</html>