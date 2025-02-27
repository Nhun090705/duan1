<div class="container">
    <h1 class="my-4 text-center">Quản lý đơn hàng: <?= $donHang['ma_don_hang'] ?></h1>
    <div>
        <div>
            <form action="" method="post">
                <select name="" id="" class="form-group">
                    <?php foreach ($listTrangThaiDonHang as $key => $trangThai): ?>
                        <option
                            <?= $trangThai['id'] == $donHang['trang_thai_id'] ? 'selected' : '' ?>
                            <?= $trangThai['id'] < $donHang['trang_thai_id'] ? 'disabled' : '' ?>

                            value="<?= $trangThai['id']; ?>">
                            <?= $trangThai['ten_trang_thai']; ?>
                        </option>

                    <?php endforeach ?>
                </select>
            </form>
        </div>
    </div>
    <form action="" class="my-4 text-center">
        <input type="text" name="" id="" class="form-control-sm" placeholder="Nhập từ khóa">
        <button type="submit" class="btn btn-primary">Tìm kiếm</button>
    </form>
    <section class="content">
        <div class="container-fluid">
            <div class="col-12">
                <?php
                if ($donHang['trang_thai_id'] == 1) {
                    $colorAlerts = 'primary';
                } elseif ($donHang['trang_thai_id'] >= 2 && $donHang['trang_thai_id'] <= 9) {
                    $colorAlerts = 'warning'; // Sửa 'waring' thành 'warning'
                } elseif ($donHang['trang_thai_id'] == 10) {
                    $colorAlerts = 'success';
                } else {
                    $colorAlerts = 'danger';
                }
                ?>
                <div class="alert alert-<?= $colorAlerts; ?>" role="alert">
                    Đơn hàng: <?= $donHang['ten_trang_thai'] ?>
                </div>

                <!-- main content -->
                <div class="invoice p-3 mb-3">
                    <!-- title row -->
                    <div class="row">
                        <div class="col-12">
                            <h4>
                                <i>shop giày</i>
                                <small class="float-right">Ngày đặt:<?= formatDate($donHang['ngay_dat']); ?></small>
                            </h4>
                        </div>
                    </div>
                    <div class="row invoice-info">
                        <div class="col-sm-4 invoice-col">
                            Thông tin người đặt
                            <address>
                                <strong><?= $donHang['ho_ten'] ?></strong><br>
                                Email:<?= $donHang['email'] ?><br>
                                Số điện thoai:<?= $donHang['so_dien_thoai'] ?><br>
                            </address>
                        </div>
                        <div class="col-sm-4 invoice-col">
                            Thông tin người nhận
                            <address>
                                <strong><?= $donHang['ten_nguoi_nhan'] ?></strong><br>
                                Email:<?= $donHang['email_nguoi_nhan'] ?><br>
                                Số điện thoai:<?= $donHang['sdt_nguoi_nhan'] ?><br>
                                Địa chỉ:<?= $donHang['dia_chi_nguoi_nhan'] ?><br>
                            </address>
                        </div>
                        <div class="col-sm-4 invoice-col">
                            <b>Mã đơn hàng: <?= $donHang['ma_don_hang']; ?></b><br>
                            <br>
                            <b>Tổng tiền:</b><?= $donHang['tong_tien']; ?><br>
                            <b>Ghi chú:</b><?= $donHang['ghi_chu']; ?><br>
                            <b>Phương thức thanh toán:</b><?= $donHang['ten_phuong_thuc']; ?>
                        </div>
                    </div>
                    <!-- table row -->
                    <div class="row">
                        <div class="col-12 table-responsive">
                            <table class="table tablestriped">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Tên sản phẩm</th>
                                        <th>Đơn giá</th>
                                        <th>Số lượng</th>
                                        <th>Thành tiền</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $tong_tien = 0; ?>
                                    <?php foreach ($sanPhamDonHang as $key => $sanPham): ?>
                                        <tr>
                                            <td><?= $key + 1 ?></td>
                                            <td><?= $sanPham['ten_san_pham'] ?></td>
                                            <td><?= $sanPham['don_gia'] ?></td>
                                            <td><?= $sanPham['so_luong'] ?></td>
                                            <td><?= $sanPham['thanh_tien'] ?></td>
                                        </tr>
                                        <?php $tong_tien += $sanPham['thanh_tien']; ?>
                                    <?php endforeach; ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div class="row">
                        <!-- thanh toán column -->
                        <div class="col-6">
                            <p class="lead">Ngày đặt hàng: <?= $donHang['ngay_dat'] ?></p>
                            <div class="table-responsive">
                                <table class="table">
                                    <tr>
                                        <th style="width:50%">Thành tiền</th>
                                        <td>
                                            <?= $tong_tien ?>
                                        </td>
                                    </tr>
                                    <tr>
                                        <th>Vận chuyển</th>
                                        <td>200.000</td>
                                    </tr>
                                    <tr>
                                        <th>Tổng tiền</th>
                                        <td><?= $tong_tien + 200000 ?></td>
                                    </tr>

                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

</div>