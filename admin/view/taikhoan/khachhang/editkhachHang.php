<div class="container">
    <h1 class="my-4 text-center">Sửa thông tin tài khoản khách hàng : <?= $khachHang['ho_ten'] ?> </h1>
    <form action="<?= BASE_URL_AMIN . '?act=sua-khach-hang' ?>" method="POST">
        <input type="hidden" name="khach_hang_id" value="<?= $khachHang['id'] ?>">
        <div class="form-group">
            <label>Họ tên</label>
            <input type="text" class="form-control" name="ho_ten" value=" <?= $khachHang['ho_ten'] ?> " placeholder="Nhập họ tên ">
            <?php
            if (isset($_SESSION['error']['ho_ten'])) { ?>
                <p class="text-danger">Tên sản phẩm không được để trống</p>
            <?php } ?>
        </div>

        <div class="form-group">
            <label>Email</label>
            <input type="email" class="form-control" name="email" value=" <?= $khachHang['email'] ?> " placeholder="Nhập email ">
            <?php
            if (isset($_SESSION['error']['email'])) { ?>
                <p class="text-danger">Email không được để trống</p>
            <?php } ?>
        </div>

        <div class="form-group">
            <label>Số điện thoại</label>
            <input type="text" class="form-control" name="so_dien_thoai" value=" <?= $khachHang['so_dien_thoai'] ?> " placeholder="Nhập số điện thoại ">
            <?php
            if (isset($_SESSION['error']['so_dien_thoai'])) { ?>
                <p class="text-danger">Số điện thoại không được để trống</p>
            <?php } ?>
        </div>

        <div class="form-group">
            <label>Ngày sinh</label>
            <input type="date" class="form-control" name="ngay_sinh" value=" <?= $khachHang['ngay_sinh'] ?> " >
            <?php
            if (isset($_SESSION['error']['ngay_sinh'])) { ?>
                <p class="text-danger">Ngày sinh không được để trống</p>
            <?php } ?>
        </div>

        <div class="form-group">
            <label>Giới tính</label>
            <select name="gioi_tinh" id="inputStatus" class="form-control custom-select">
                <option <?= $khachHang['gioi_tinh'] == 1 ? 'selected' : '' ?> value="1">Nam</option>
                <option <?= $khachHang['gioi_tinh'] !== 1 ? 'selected' : '' ?> value="2">Nữ</option>
            </select>
        </div>

        <div class="form-group">
            <label>Địa chỉ</label>
            <input type="text" class="form-control" name="dia_chi" value=" <?= $khachHang['dia_chi'] ?> " placeholder="Nhập địa chỉ ">
            <?php
            if (isset($_SESSION['error']['dia_chi'])) { ?>
                <p class="text-danger">Dịa chỉ không được để trống</p>
            <?php } ?>
        </div>

        <div class="form-group">
            <label for="inputStatus">Trạng thái tài khoản</label>
            <select name="trang_thai" id="inputStatus" class="form-control custom-select">
                <option <?= $khachHang['trang_thai'] == 1 ? 'selected' : '' ?> value="1">Active</option>
                <option <?= $khachHang['trang_thai'] !== 1 ? 'selected' : '' ?> value="2">Inactive</option>
            </select>

        </div>

        <hr>
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
</div>