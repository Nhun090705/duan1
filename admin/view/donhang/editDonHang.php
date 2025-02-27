<div class="container">
    <h1 class="my-4 text-center">Quản lí thông tin đơn hàng</h1>
    <h2>Sửa thông tin đơn hàng: <?= htmlspecialchars($donHang['ma_don_hang']) ?></h2>
    <form action="<?= htmlspecialchars(BASE_URL_AMIN) . '?act=sua-don-hang' ?>" method="POST">
        <!-- ID đơn hàng (ẩn) -->
        <input type="hidden" name="don_hang_id" value="<?= htmlspecialchars($donHang['id']) ?>">

        <!-- Thông tin người nhận -->
        <div class="form-group">
            <label>Tên Người nhận</label>
            <input type="text" class="form-control" value="<?= htmlspecialchars($donHang['ten_nguoi_nhan']) ?>" disabled>
            <input type="hidden" name="ten_nguoi_nhan" value="<?= htmlspecialchars($donHang['ten_nguoi_nhan']) ?>">
            <?php if (isset($errors['ten_nguoi_nhan'])) : ?>
                <p class="text-danger"><?= htmlspecialchars($errors['ten_nguoi_nhan']) ?></p>
            <?php endif; ?>

            <label>Số điện thoại</label>
            <input type="text" class="form-control" value="<?= htmlspecialchars($donHang['sdt_nguoi_nhan']) ?>" disabled>
            <input type="hidden" name="sdt_nguoi_nhan" value="<?= htmlspecialchars($donHang['sdt_nguoi_nhan']) ?>">
            <?php if (isset($errors['sdt_nguoi_nhan'])) : ?>
                <p class="text-danger"><?= htmlspecialchars($errors['sdt_nguoi_nhan']) ?></p>
            <?php endif; ?>

            <label>Email Người nhận</label>
            <input type="email" class="form-control" value="<?= htmlspecialchars($donHang['email_nguoi_nhan']) ?>" disabled>
            <input type="hidden" name="email_nguoi_nhan" value="<?= htmlspecialchars($donHang['email_nguoi_nhan']) ?>">
            <?php if (isset($errors['email_nguoi_nhan'])) : ?>
                <p class="text-danger"><?= htmlspecialchars($errors['email_nguoi_nhan']) ?></p>
            <?php endif; ?>

            <label>Địa chỉ Người nhận</label>
            <input type="text" class="form-control" value="<?= htmlspecialchars($donHang['dia_chi_nguoi_nhan']) ?>" disabled>
            <input type="hidden" name="dia_chi_nguoi_nhan" value="<?= htmlspecialchars($donHang['dia_chi_nguoi_nhan']) ?>">
            <?php if (isset($errors['dia_chi_nguoi_nhan'])) : ?>
                <p class="text-danger"><?= htmlspecialchars($errors['dia_chi_nguoi_nhan']) ?></p>
            <?php endif; ?>
        </div>

        <!-- Ghi chú -->
        <div class="form-group">
            <label>Ghi chú</label>
            <textarea class="form-control" disabled><?= htmlspecialchars($donHang['ghi_chu']) ?></textarea>
            <input type="hidden" name="ghi_chu" value="<?= htmlspecialchars($donHang['ghi_chu']) ?>">
        </div>

        <hr>

        <!-- Trạng thái đơn hàng -->
        <div class="form-group">
            <label for="inputStatus">Trạng thái đơn hàng</label>
            <select name="trang_thai_id" id="inputStatus" class="form-control custom-select">
                <?php foreach ($listTrangThaiDonHang as $trangThai) : ?>
                    <option
                        value="<?= htmlspecialchars($trangThai['id']) ?>"
                        <?= $trangThai['id'] == $donHang['trang_thai_id'] ? 'selected' : '' ?>
                        <?php
                        if (
                            $donHang['trang_thai_id'] > $trangThai['id'] ||
                            $donHang['trang_thai_id'] == 5 ||
                            ($donHang['trang_thai_id'] == 4 && $trangThai['id'] == 7) // Thêm điều kiện tại đây
                        ) {
                            echo 'disabled';
                        }
                        ?>>
                        <?= htmlspecialchars($trangThai['ten_trang_thai']) ?>
                    </option>
                <?php endforeach; ?>
            </select>

        </div>

        <hr>

        <!-- Nút Submit -->
        <button type="submit" class="btn btn-primary">Cập nhật</button>
    </form>
</div>