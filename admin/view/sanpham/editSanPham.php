<link href="https://maxcdn.bootstrapcdn.com/bootstrap/5.3.0/css/bootstrap.min.css" rel="stylesheet">

<div class="container mt-5">

    <h2 class="card-title">Thông tin sản phẩm</h2>
    <form action="<?= BASE_URL_AMIN . '?act=sua-san-pham' ?>" method="post" enctype="multipart/form-data">

        <div class="mb-4">
            <input type="hidden" name="san_pham_id" value="<?=  $sanPham['id'] ?>">
            <label class="form-label">Tên sản phẩm</label>
            <input type="text" id="ten_san_pham" name="ten_san_pham" class="form-control" placeholder="Nhập tên sản phẩm" value="<?= $sanPham['ten_san_pham'] ?>">
            <?php
            if (isset($_SESSION['errors']['ten_san_pham'])) { ?>
                <p class="text-danger">Tên sản phẩm không được để trống</p>
            <?php
            }
            ?>
        </div>



        <div class="mb-4">
            <label class="form-label">Giá sản phẩm</label>
            <input type="number" id="gia_san_pham" name="gia_san_pham" class="form-control" value="<?= $sanPham['gia_san_pham'] ?>">
            <?php
            if (isset($_SESSION['errors']['gia_san_pham'])) { ?>
                <p class="text-danger">Gia sản phẩm không được để trống</p>
            <?php
            }
            ?>
        </div>



        <div class="mb-4">
            <label class="form-label">Giá khuyến mãi</label>
            <input type="number" id="gia_khuyen_mai" name="gia_khuyen_mai" class="form-control" value="<?= $sanPham['gia_khuyen_mai'] ?>">
            <?php
            if (isset($_SESSION['errors']['gia_khuyen_mai'])) { ?>
                <p class="text-danger">Giá khuyến mãi sản phẩm không được để trống</p>
            <?php
            }
            ?>
        </div>



        <div class="mb-4">
            <label class="form-label">Hình ảnh sản phẩm</label>
            <input type="file" id="hinh_anh" name="hinh_anh" class="form-control">
        </div>



        <div class="mb-4">
            <label class="form-label">Số lượng sản phẩm</label>
            <input type="number" id="so_luong" name="so_luong" class="form-control" value="<?= $sanPham['so_luong'] ?>">
            <?php
            if (isset($_SESSION['errors']['so_luong'])) { ?>
                <p class="text-danger">Số lượng sản phẩm không được để trống</p>
            <?php
            }
            ?>
        </div>



        <div class="mb-4">
            <label class="form-label">Ngày nhập sản phẩm</label>
            <input type="date" id="ngay_nhap" name="ngay_nhap" class="form-control" value="<?= $sanPham['ngay_nhap'] ?>">
            <?php
            if (isset($_SESSION['errors']['ngay_nhap'])) { ?>
                <p class="text-danger">Ngày nhập sản phẩm không được để trống</p>
            <?php
            }
            ?>
        </div>

        <div class="mb-4">
            <label>Danh mục</label>
            <select class="form-control" id="exampleFormControlSelect1" name="danh_muc_id">
                <option selected disabled>Chọn Danh Mục</option>
                <?php foreach ($listDanhMuc as $danhMuc): ?>
                    <option <?= $danhMuc['id'] == $sanPham['danh_muc_id'] ? 'selected' : '' ?> value="<?= $danhMuc['id'] ?>">
                        <?= $danhMuc['ten_danh_muc'] ?>
                    </option>
                <?php endforeach ?>
            </select>
            <?php
            if (isset($_SESSION['errors']['so_luong'])) { ?>
                <p class="text-danger">Danh mục sản phẩm không được để trống</p>
            <?php
            }
            ?>
        </div>

        <div class="mb-4">
            <label>Trạng thái</label>
            <select class="form-control" id="exampleFormControlSelect1" name="trang_thai">
                <option selected disabled>Chọn Danh Mục</option>

                <option <?= $sanPham['trang_thai'] == 1 ? 'selected' : '' ?> value="1">
                    Còn bán
                </option>
                <option <?= $sanPham['trang_thai'] == 2 ? 'selected' : '' ?> value="2">
                    Dừng bán
                </option>
            </select>
            <?php
            if (isset($_SESSION['errors']['trang_thai'])) { ?>
                <p class="text-danger">Trạng thái sản phẩm không được để trống</p>
            <?php
            }
            ?>
        </div>


        <div class="mb-4">
            <label>Mô tả</label>
            <textarea name="mo_ta" class="form-control" rows="4" required><?= $sanPham['mo_ta'] ?></textarea>
            <?php if (isset($_SESSION['errors']['mo_ta'])): ?>
                <p class="text-danger">Mô tả sản phẩm không được để trống</p>
            <?php endif; ?>
        </div>










</div>
<button type="submit" class="btn btn-primary w-100">Submit</button>
</form>
</div>