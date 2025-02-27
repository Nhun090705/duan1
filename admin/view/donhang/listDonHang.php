<div class="container">
    <h1 class="my-4 text-center">Quản lý danh sách đơn hàng</h1>

    <!-- <form action="" class="my-4 text-center">
    <input type="text" name="" id="" class="form-control-sm" placeholder="Nhập từ khóa">
    <button type="submit" class="btn btn-primary">Tìm kiếm</button>
  </form> -->

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