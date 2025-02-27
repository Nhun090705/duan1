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

                        <!-- Giỏ hàng -->
                        <div class="p-5">
                            <h1 class="fw-bold mb-5">CHI TIẾT ĐƠN HÀNG</h1>
                            <hr class="my-4">
                            <div class="row">
                                <div class="col-lg-7">
                                    <!-- thông tin sản phẩm đơn hàng -->
                                    <div class="cart-table table-responsive">
                                        <table class="table table-bordered">
                                            <thead>
                                                <tr>
                                                    <th colspan="5">Thông tin sản phẩm</th>

                                                </tr>

                                            </thead>
                                            <tbody>
                                                <tr class="text-center">
                                                    <th>Hình ảnh</th>
                                                    <th>Tên sản phẩm</th>
                                                    <th>Đơn giá</th>
                                                    <th>Số lượng</th>
                                                    <th>Thành tiền</th>
                                                </tr>
                                                <?php foreach ($chiTietDonHang as $item) : ?>
                                                    <tr class="">
                                                        <td> <img src="<?= BASE_URL . $item['hinh_anh'] ?>" class="img-fluid" alt="Product"></td>
                                                        <td><?= $item['ten_san_pham'] ?></td>
                                                        <td> <?= formatPrice($item['don_gia']) . ' vnd' ?></td>
                                                        <td><?= $item['so_luong'] ?></td>
                                                        <td> <?= formatPrice($item['thanh_tien']) . ' vnd' ?></td>

                                                    </tr>
                                                <?php endforeach ?>
                                            </tbody>
                                        </table>
                                    </div>
                                    <div class="pt-5">
                                        <h6 class="mb-0"><a href="<?= BASE_URL . '?act=lich-su-mua-hang' ?>" class="text-body"><i class="fas fa-long-arrow-alt-left me-2"></i>Quay lại lịch sử mua hàng</a></h6>
                                    </div>
                                </div>
                                <div class="col-lg-5">
                                    <!-- thông tin đơn hàng -->
                                    <div class="cart-table table-responsive">
                                        <table class="table table-bordered">
                                            <thead>
                                                <tr>
                                                    <th colspan="5">Thông tin đơn hàng</th>

                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr>
                                                    <th colspan="2">Mã đơn hàng:</th>
                                                    <td><?= $donHang['ma_don_hang'] ?></td>

                                                </tr>
                                                <tr>
                                                    <th colspan="2">Người nhận:</th>
                                                    <td><?= $donHang['ten_nguoi_nhan'] ?></td>

                                                </tr>
                                                <tr>
                                                    <th colspan="2">Email:</th>
                                                    <td><?= $donHang['email_nguoi_nhan'] ?></td>

                                                </tr>
                                                <tr>
                                                    <th colspan="2">Số điện thoại</th>
                                                    <td><?= $donHang['sdt_nguoi_nhan'] ?></td>

                                                </tr>
                                                <tr>
                                                    <th colspan="2">Địa chỉ:</th>
                                                    <td><?= $donHang['dia_chi_nguoi_nhan'] ?></td>

                                                </tr>
                                                <tr>
                                                    <th colspan="2">Ngày đặt:</th>
                                                    <td><?= $donHang['ngay_dat'] ?></td>

                                                </tr>
                                                <tr>
                                                    <th colspan="2">Ghi chú:</th>
                                                    <td><?= $donHang['ghi_chu'] ?></td>

                                                </tr>
                                                <tr>
                                                    <th colspan="2">Tổng tiền:</th>
                                                    <td> <?= formatPrice($donHang['tong_tien']) . ' vnd' ?></td>


                                                </tr>
                                                <tr>
                                                    <th colspan="2">Phương thức thanh toán</th>
                                                    <td><?= $phuongThucThanhToan[$donHang['phuong_thuc_thanh_toan_id']] ?></td>

                                                </tr>
                                                <tr>
                                                    <th colspan="2">Trạng thái đơn hàng</th>
                                                    <td><?= $trangThaiDonHang[$donHang['trang_thai_id']] ?></td>

                                                </tr>
                                            </tbody>
                                        </table>
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