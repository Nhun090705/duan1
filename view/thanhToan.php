<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Thanh Toán</title>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600&display=swap" rel="stylesheet">
    <style>
        .mt-20 {
            margin-top: 20px;
        }

        .ml-10 {
            margin-left: 10px;
        }

        body {
            font-family: 'Poppins', sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f3f4f6;
        }

        .container {
            max-width: 1000px;
            margin: 40px auto;
            display: flex;
            flex-wrap: wrap;
            background-color: #ffffff;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }

        .box-1,
        .box-2 {
            flex: 1;
            padding: 20px;
        }

        .box-1 {
            background-color: #fafafa;
            border-right: 1px solid #e0e0e0;
        }

        .box-2 {
            background-color: #ffffff;

        }

        h6,
        p {
            margin-bottom: 15px;
            font-weight: 600;
        }

        .table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 20px;
        }

        .table th,
        .table td {
            border: 1px solid #ddd;
            padding: 12px;
            text-align: left;
        }

        .table th {
            background-color: #4caf50;
            color: white;
        }

        .form-control {
            width: 100%;
            padding: 10px;
            margin-bottom: 15px;
            border: 1px solid #ddd;
            border-radius: 5px;
            font-size: 14px;
        }

        .form-control:focus {
            outline: none;
            border-color: #7a34ca;
            box-shadow: 0 0 4px rgba(122, 52, 202, 0.5);
        }

        .btn-primary {
            display: block;
            width: 100%;
            padding: 12px;
            border: none;
            background-color: #7a34ca;
            color: white;
            font-size: 16px;
            font-weight: 600;
            border-radius: 5px;
            cursor: pointer;
            text-align: center;
        }

        .btn-primary:hover {
            background-color: #5e1ab0;
        }

        .subtotal {
            display: flex;
            justify-content: space-between;
            font-size: 14px;
            margin-bottom: 8px;
        }

        .total {
            display: flex;
            justify-content: space-between;
            font-size: 16px;
            font-weight: 600;
            margin-top: 15px;
        }

        @media (max-width: 768px) {
            .container {
                flex-direction: column;
            }

            .box-1 {
                border-right: none;
                border-bottom: 1px solid #e0e0e0;
            }
        }

        @import url('https://fonts.googleapis.com/css?family=Montserrat:400,700&display=swap');

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            list-style: none;
            font-family: 'Montserrat', sans-serif;
        }

        body {
            padding: 5px;
            background-color: #7a34ca;
        }

        p {
            margin: 0%;
        }

        .container {
            max-width: 900px;
            margin: 20px auto;
            overflow: hidden;
            background-color: #f8f9fa;
        }

        .box-1 {
            max-width: 450px;
            padding: 10px 40px;
            user-select: none;
            margin-right: 50px;
        }

        .box-1 div .fs-12 {
            font-size: 8px;
            color: white;
        }

        .box-1 div .fs-14 {
            font-size: 15px;
            color: white;
        }

        .box-1 img.pic {
            width: 20px;
            height: 20px;
            object-fit: cover;
        }

        .box-1 img.mobile-pic {
            width: 100%;
            height: 200px;
            object-fit: cover;
        }

        .box-1 .name {
            font-size: 11px;
            font-weight: 600;
        }

        .dis {
            font-size: 12px;
            font-weight: 500;
        }

        label.box {
            width: 100%;
            font-size: 12px;
            background: #ddd;
            margin-top: 12px;
            padding: 10px 12px;
            border-radius: 5px;
            cursor: pointer;
            border: 1px solid transparent;
        }

        #one:checked~label.first,
        #two:checked~label.second,
        #three:checked~label.third {
            border-color: #7700ff;
        }

        #one:checked~label.first .circle,
        #two:checked~label.second .circle,
        #three:checked~label.third .circle {
            border-color: #7a34ca;
            background-color: #fff;
        }

        label.box .course {
            width: 100%;
        }

        label.box .circle {
            height: 12px;
            width: 12px;
            background: #ccc;
            border-radius: 50%;
            margin-right: 15px;
            border: 4px solid transparent;
            display: inline-block;
        }

        input[type="radio"] {
            display: none;
        }



        .form-control:focus,
        .form-select:focus {
            box-shadow: none;
            outline: none;
            border: 1px solid #7700ff;
        }

        .border:focus-within {
            border: 1px solid #7700ff !important;
        }

        .form-select {
            border-radius: 0;
            border-top-left-radius: 10px;
            border-top-right-radius: 10px;

        }

        .address .form-control.zip {
            border-radius: 0;
            border-bottom-left-radius: 10px;

        }

        .address .form-control.state {
            border-radius: 0;
            border-bottom-right-radius: 10px;

        }

        .carousel-indicators [data-bs-target] {
            width: 10px;
            height: 10px;
            border-radius: 50%;
        }

        .carousel-inner {
            width: 100%;
            height: 250px;
        }

        .carousel-item img {
            object-fit: cover;
            height: 100%;
        }

        .carousel-control-prev {
            transform: translateX(-50%);
            opacity: 1;
        }

        .carousel-control-prev:hover .fas.fa-arrow-left {
            transform: translateX(-5px);
        }

        .carousel-control-next {
            transform: translateX(50%);
            opacity: 1;
        }

        .carousel-control-next:hover .fas.fa-arrow-right {
            transform: translateX(5px);
        }

        .fas.fa-arrow-left,
        .fas.fa-arrow-right {
            font-size: 0.8rem;
            transition: all .2s ease;
        }

        .icon {
            width: 30px;
            height: 30px;
            background-color: #f8f9fa;
            color: black;
            display: flex;
            align-items: center;
            justify-content: center;
            border-radius: 50%;
            transform-origin: center;
            opacity: 1;
        }

        .fas,
        .fab {
            color: #6d6c6d;
        }

        ::placeholder {
            font-size: 12px;
        }
    </style>
</head>

<body>

    <div class="">
        <form action="<?= BASE_URL . '?act=xu-ly-thanh-toan' ?>" class="container" method="POST">
            <!-- Thông tin sản phẩm -->
            <div class="box-1">
                <h6>Thông tin thanh toán</h6>
                <table class="table">
                    <thead>
                        <tr>
                            <th style="color: black;font-weight:bold">Sản phẩm</th>
                            <th style="color: black;font-weight:bold">Tổng tiền</th>
                        </tr>
                    </thead>
                    <tbody>


                        <?php
                        $tongGioHang = 0;
                        foreach ($chiTietGioHang as $sanPham) :
                        ?>
                            <tr>
                                <td>
                                    <a href="" style="text-decoration: none;color:black">
                                        <?= $sanPham['ten_san_pham'] ?>
                                    </a>
                                    <strong class="ml-10"> x<?= $sanPham['so_luong'] ?></strong>
                                </td>
                                <td>
                                    <?php
                                    $tong_tien = $sanPham['so_luong'] * ($sanPham['gia_khuyen_mai'] ?? $sanPham['gia_san_pham']);
                                    $tongGioHang += $tong_tien;
                                    echo formatPrice($tong_tien) . ' vnđ';
                                    ?>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
                <div class="subtotal">
                    <span>Tổng tiền sản phẩm</span>
                    <span><strong><?= formatPrice($tongGioHang) . ' vnđ' ?></strong></span>
                </div>
                <div class="subtotal">
                    <span>Shipping</span>
                    <span>30.000 VND</span>
                </div>
                <div class="total">
                    <span>Tổng thanh toán:</span>
                    <input type="hidden" name="tong_tien" value="<?= $tongGioHang + 30000 ?>">
                    <span><strong>
                            <?= formatPrice($tongGioHang + 30000) . ' vnd' ?>
                        </strong></span>
                </div>
                <div class="radiobtn" style="margin-top: 50px;">
                    <h5>Vui lòng chọn phương thức thanh toán</h5>
                    <input type="radio" name="phuong_thuc_thanh_toan_id" id="one" value="1">
                    <input type="radio" name="phuong_thuc_thanh_toan_id" id="two" value="2">
                    <label for="one" class="box py-2 first">
                        <div class="d-flex align-items-start">
                            <span class="circle"></span>
                            <div class="course">
                                <div class="d-flex align-items-center justify-content-between mb-2">
                                    <span class="fw-bold">
                                        Thanh toán khi nhận hàng
                                    </span>
                                </div>
                                <span>Thanh toán khi sản phẩm giao hàng thành công</span>
                            </div>
                        </div>
                    </label>

                    <label for="two" class="box py-2 second">
                        <div class="d-flex">
                            <span class="circle"></span>
                            <div class="course">
                                <div class="d-flex align-items-center justify-content-between mb-2">
                                    <span class="fw-bold">
                                        Thanh toán chuyển khoản
                                    </span>
                                </div>
                                <span>Thanh toán trước khi nhận hàng</span>
                            </div>
                        </div>
                    </label>
                    <div class="pt-5">
                        <h6 class="mb-0"><a href="<?= BASE_URL . '?act=gio-hang' ?>" class="text-body"><i class="fas fa-long-arrow-alt-left me-2"></i>Quay lại giỏ hàng</a></h6>
                    </div>
                </div>


            </div>

            <!-- Thông tin người nhận -->
            <div class="box-2">
                <h6>Thông tin người nhận</h6>

                <div class="mt-20">
                    <label for="ten_nguoi_nhan">Tên người nhận</label>
                    <input class="form-control" type="text" id="ten_nguoi_nhan" name="ten_nguoi_nhan" value="<?= $user['ho_ten'] ?>" placeholder="Tên người nhận" required>
                </div>

                <div class="mt-20">
                    <label for="email_nguoi_nhan">Địa chỉ email</label>
                    <input class="form-control" type="email" id="email_nguoi_nhan" name="email_nguoi_nhan" value="<?= $user['email'] ?>" placeholder="Email người nhận" required>
                </div>
                <div class="mt-20">
                    <label for="sdt_nguoi_nhan">Số điện thoại người nhận</label>
                    <input class="form-control" type="text" id="sdt_nguoi_nhan" name="sdt_nguoi_nhan" value="<?= $user['so_dien_thoai'] ?>" placeholder="Số điện thoại người nhận" required>
                </div>
                <div class="mt-20">
                    <label for="dia_chi_nguoi_nhan">Địa chỉ người nhận</label>
                    <input class="form-control" type="text" id="dia_chi_nguoi_nhan" name="dia_chi_nguoi_nhan" value="<?= $user['dia_chi'] ?>" placeholder="Địa chỉ người nhận" required>
                </div>
                <div class="mt-20">
                    <label for="ghi_chu">Ghi chú</label>
                    <textarea class="form-control" type="text" id="ghi_chu" name="ghi_chu" placeholder="Ghi chú cho đơn hàng của bạn"></textarea>
                </div>
                <button type="submit" class="btn-primary">Thanh toán ngay</button>

            </div>
        </form>
    </div>

</body>


<script>
    document.querySelector("form").addEventListener("submit", function(event) {
        // Lấy phương thức thanh toán đã được chọn
        var paymentMethod = document.querySelector('input[name="phuong_thuc_thanh_toan_id"]:checked');
        
        // Kiểm tra nếu không có phương thức thanh toán được chọn
        if (!paymentMethod) {
            // Hiển thị thông báo lỗi
            document.getElementById("payment-error").style.display = "block";
            
            // Ngừng gửi form
            event.preventDefault();
        } else {
            // Ẩn thông báo lỗi nếu phương thức thanh toán được chọn
            document.getElementById("payment-error").style.display = "none";
        }
    });
</script>


</html>