<div class="container">
    <h1 class="my-4 text-center">Sửa thông tin tài khoản quản trị viên : <?= $quanTri['ho_ten'] ?> </h1>
    <form action="<?= BASE_URL_AMIN . '?act=sua-quan-tri' ?>" method="POST">
        <input type="hidden" name="quan_tri_id" value="<?= $quanTri['id'] ?>">
        <div class="form-group">
            <label>Họ tên</label>
            <input type="text" class="form-control" name="ho_ten" value=" <?= $quanTri['ho_ten'] ?> " placeholder="Nhập họ tên ">
            <?php
            if (isset($_SESSION['error']['ho_ten'])) { ?>
                <p class="text-danger">Tên sản phẩm không được để trống</p>
            <?php } ?>
        </div>

        <div class="form-group">
            <label>Email</label>
            <input type="email" class="form-control" name="email" value=" <?= $quanTri['email'] ?> " placeholder="Nhập email ">
            <?php
            if (isset($_SESSION['error']['email'])) { ?>
                <p class="text-danger">Tên sản phẩm không được để trống</p>
            <?php } ?>
        </div>

        <div class="form-group">
            <label>Số điện thoại</label>
            <input type="text" class="form-control" name="so_dien_thoai" value=" <?= $quanTri['so_dien_thoai'] ?> " placeholder="Nhập số điện thoại ">
            <?php
            if (isset($_SESSION['error']['so_dien_thoai'])) { ?>
                <p class="text-danger">Số điện thoại không được để trống</p>
            <?php } ?>
        </div>

        <div class="form-group">
            <label for="inputStatus">Trạng thái tài khoản</label>
            <select name="trang_thai" id="inputStatus" class="form-control custom-select">
                <option <?= $quanTri['trang_thai'] == 1 ? 'selected' : '' ?> value="1">Active</option>
                <option <?= $quanTri['trang_thai'] !== 1 ? 'selected' : '' ?> value="2">Inactive</option>
            </select>

        </div>

        <hr>
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
</div>