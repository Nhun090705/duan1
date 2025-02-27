<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="./view/asset/css/style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <style>
        .col-4 img {
        width: 400px;
        height: 400px;
        border-radius: 50%;
        object-fit: cover;
        margin-right: 15px;
    }
    </style>
</head>

<body>

    <div class="col-sm-6  mb-100">
        <h1>Thông tin chi tiết khách hàng</h1>
    </div>
    <div class="container" style="display: flex; margin-top: 100px;margin-bottom:100px;">
        <div class="col-4" style="margin-right: 100px;">
            <img src="<?= $khachHang['anh_dai_dien'] ?>" alt="" onerror="this.onerror=null; this.src='https://cdn-icons-png.flaticon.com/512/149/149071.png'">
            <!-- <?php echo $khachHang['anh_dai_dien'] ?> -->
        </div>
        <div class="col-8">
            <div class="container">
                <table class="table table-borderless">
                    <tbody style="font-size: x-large;">
                        <tr>
                            <th>Họ tên :</th>
                            <td><?= $khachHang['ho_ten'] ?? '' ?></td>
                        </tr>
                        <tr>
                            <th>Ngày sinh :</th>
                            <td><?= $khachHang['ngay_sinh'] ?? '' ?></td>
                        </tr>
                        <tr>
                            <th>Email:</th>
                            <td><?= $khachHang['email'] ?? '' ?></td>
                        </tr>
                        <tr>
                            <th>Số điện thoại:</th>
                            <td><?= $khachHang['so_dien_thoai'] ?? '' ?></td>
                        </tr>
                        <tr>
                            <th>Địa chỉ :</th>
                            <td><?= $khachHang['dia_chi'] ?? '' ?></td>
                        </tr>
                        <tr>
                            <th>Giới tính:</th>
                            <td><?= $khachHang['gioi_tinh'] == 1 ? 'Nam' : 'Nữ'; ?></td>
                        </tr>
                        <tr>
                            <th>Trạng thái :</th>
                            <td><?= $khachHang['trang_thai'] == 1 ? 'Active' : 'Inactive'; ?></td>
                        </tr>
                    </tbody>

                </table>

            </div>


        </div>



    </div>
    <hr>
    <div class="col-12 " style="margin-bottom: 100px;">
        <h2>Lịch sử mua hàng</h2>
        <div>
            <table class="table" border="1">

                <thead>
                    <tr>
                        <th scope="col">STT</th>
                        <th scope="col">Mã đơn hàng</th>
                        <th scope="col">Tên người nhận</th>
                        <th scope="col">Số điện thoại</th>
                        <th scope="col">Ngày đặt</th>
                        <th scope="col">Tổng tiền</th>
                        <th scope="col">Trạng thái đơn hàng</th>
                        <!-- <th scope="col">Mo ta</th> -->
                        <th scope="col">Thao tac</th>

                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($listDonHang as $key => $donHang): ?>
                        <tr>
                            <td><?= $key + 1 ?></td>
                            <td><?= $donHang['ma_don_hang'] ?></td>
                            <td><?= $donHang['ten_nguoi_nhan'] ?></td>
                            <td><?= $donHang['sdt_nguoi_nhan'] ?></td>
                            <td><?= $donHang['ngay_dat'] ?></td>
                            <td><?= $donHang['tong_tien'] ?></td>
                            <td><?= $donHang['ten_trang_thai'] ?></td>
                            <td></td>

                            <td>
                                <a href="<?= BASE_URL_AMIN . '?act=chi-tiet-don-hang&id_don_hang=' . $donHang['id'] ?>">
                                    <button class="btn btn-warning">Chi tiết</button>
                                </a>
                                <a href="<?= BASE_URL_AMIN . '?act=form-sua-don-hang&id_don_hang=' . $donHang['id'] ?>">
                                    <button class="btn btn-warning">Sửa</button>
                                </a>

                            </td>

                        </tr>
                    <?php endforeach ?>
                </tbody>

            </table>
        </div>
    </div>

    <div class="col-12">
        <h2>Lịch sử bình luận</h2>
        <div>
            <table class="table" border="1">

                <thead>
                    <tr>
                        <th scope="col">STT</th>
                        <th scope="col">Sản phẩm</th>
                        <th scope="col">Nội dung</th>
                        <th scope="col">Ngày bình luận</th>
                        <th scope="col">Trạng thái đơn hàng</th>
                        <!-- <th scope="col">Mo ta</th> -->
                        <th scope="col">Thao tac</th>

                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($listBinhLuan as $key => $binhLuan): ?>
                        <tr>
                            <td><?= $key + 1 ?></td>
                            <td><a target="_blank" href="<?= BASE_URL_AMIN . '?act=chi-tiet-san-pham&id_san_pham=' . $binhLuan['san_pham_id'] ?>"><?= $binhLuan['ten_san_pham'] ?></a></td>
                            <td><?= $binhLuan['noi_dung'] ?></td>
                            <td><?= $binhLuan['ngay_dang'] ?></td>
                            <td><?= $binhLuan['trang_thai'] == 1 ? 'Hiển thị' : 'Bị ẩn' ?></td>
                            <td>

                            <form action="<?= BASE_URL_AMIN . '?act=update-trang-thai-binh-luan' ?>" method="POST">
                                <input type="hidden" name="id_binh_luan" value="<?= $binhLuan['id'] ?>">
                                <input type="hidden" name="name_view" value="detail_khach">
                                <button  onclick="return confirm('bạn có muốn ẩn bình luận này không ?')" class="btn btn-warning">
                                    <?= $binhLuan['trang_thai'] == 1 ? 'Ẩn' : 'Bỏ ẩn' ?>
                                </button>
                            </form>


                            </td>

                        </tr>
                    <?php endforeach ?>
                </tbody>

            </table>
        </div>
    </div>




</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>

</html>