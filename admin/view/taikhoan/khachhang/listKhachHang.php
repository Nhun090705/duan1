<div class="container">
    <h1 class="my-4 text-center">Quản lý tài khoản khách hàng</h1>

    <!-- <form action="" class="my-4 text-center">
        <input type="text" name="" id="" class="form-control-sm" placeholder="Nhập từ khóa">
        <button type="submit" class="btn btn-primary">Tìm kiếm</button>
    </form> -->
    <table class="table">

        <thead>
            <tr>
                <th scope="col">STT</th>
                <th scope="col">Họ tên</th>
                <th scope="col">Ảnh đại diện</th>
                <th scope="col">Email</th>
                <th scope="col">Số điện thoại</th>
                <th scope="col">Trạng thái</th>
                <th scope="col">Thao tac</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($listKhachHang as $key => $khachHang) : ?>
                <tr>
                    <td><?= $key + 1 ?></td>
                    <td><?= $khachHang['ho_ten'] ?></td>
                    <td>
                        <img src="<?= $khachHang['anh_dai_dien'] ?>" style="width: 70px;height: 70px;border-radius: 50%;object-fit: cover;margin-right: 15px;" alt="" onerror="this.onerror=null; this.src='https://cdn-icons-png.flaticon.com/512/149/149071.png'">
                    </td>
                    <td><?= $khachHang['email'] ?></td>
                    <td><?= $khachHang['so_dien_thoai'] ?></td>
                    <td><?= $khachHang['trang_thai'] == 1 ? 'Active' : 'Inactive' ?></td>
                    <td>
                        <div class="btn-group">

                            <a href="<?= BASE_URL_AMIN . '?act=chi-tiet-khach-hang&id_khach_hang=' . $khachHang['id'] ?>">
                                <button class="btn btn-primary">Chi tiết</button>
                            </a>
                            <a href="<?= BASE_URL_AMIN . '?act=form-sua-khach-hang&id_khach_hang=' . $khachHang['id'] ?>">
                                <button class="btn btn-warning">Sửa</button>
                            </a>
                            <a href="<?= BASE_URL_AMIN . '?act=reset-pasword&id_quan_tri=' . $khachHang['id'] ?>"
                                onclick="return confirm('bạn có muốn reset password của tài khỏa hay khong ?')">
                                <button class="btn btn-danger">Reset</button>
                            </a>

                        </div>

                    </td>

                </tr>
            <?php endforeach ?>
        </tbody>
    </table>
</div>