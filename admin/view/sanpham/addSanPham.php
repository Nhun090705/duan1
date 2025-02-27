<div class="container">
    <h1 class="my-4 text-center">Thêm Sản Phẩm</h1>
    <form action="<?= BASE_URL_AMIN . '?act=them-san-pham' ?>" method="POST" enctype="multipart/form-data">
        <div class="row card-body">
            <div class="form-group">
                <label>Tên sản phẩm</label>
                <input type="text" class="form-control" name="ten_san_pham" placeholder="Nhập tên sản phẩm">
                <?php
                if (isset($_SESSION['errors']['ten_san_pham'])) { ?>
                    <p class="text-danger">Tên sản phẩm không được để trống</p>
                <?php
                }
                ?>
            </div>
            <div class="form-group col-6">
                <label>Gía sản phẩm</label>
                <input type="number" class="form-control" name="gia_san_pham" placeholder="Nhập giá sản phẩm">
                <?php
                if (isset($_SESSION['errors']['gia_san_pham'])) { ?>
                    <p class="text-danger">Gia sản phẩm không được để trống</p>
                <?php
                }
                ?>
            </div>

            <div class="form-group col-6">
                <label>Giá khuyến mãi</label>
                <input type="number" class="form-control" name="gia_khuyen_mai" placeholder="Nhập giá khuyến mãi sản phẩm">
                <?php
                if (isset($_SESSION['errors']['gia_khuyen_mai'])) { ?>
                    <p class="text-danger">Giá khuyến mãi sản phẩm không được để trống</p>
                <?php
                }
                ?>
            </div>


            <div class="form-group col-6">
                <label>Hình ảnh</label>
                <input type="file" class="form-control" name="hinh_anh">
                <?php
                if (isset($_SESSION['errors']['hinh_anh'])) { ?>
                    <p class="text-danger">Hình ảnh sản phẩm không được để trống</p>
                <?php
                }
                ?>
            </div>

            <div class="form-group col-6">
                <label>Thư viện ảnh</label>
                <input type="file" class="form-control" name="img_array[]" multiple>
            </div>

            <div class="form-group col-6">
                <label>Số lượng</label>
                <input type="number" class="form-control" name="so_luong" placeholder="Nhập số lượng sản phẩm">
                <?php
                if (isset($_SESSION['errors']['so_luong'])) { ?>
                    <p class="text-danger">Số lượng sản phẩm không được để trống</p>
                <?php
                }
                ?>
            </div>

            <div class="form-group col-6">
                <label>Ngày nhập</label>
                <input type="date" class="form-control" name="ngay_nhap" placeholder="Nhập ngày nhập sản phẩm">
                <?php
                if (isset($_SESSION['errors']['ngay_nhap'])) { ?>
                    <p class="text-danger">Ngày nhập sản phẩm không được để trống</p>
                <?php
                }
                ?>
            </div>

            <div class="form-group col-6">
                <label>Danh mục</label>
                <!-- <input type="number" class="form-control" name="so_luong" placeholder="Nhập số lượng sản phẩm"> -->
                <select class="form-control" id="exampleFormControlSelect1" name="danh_muc_id">
                    <option selected disabled>Chọn Danh Mục</option>
                    <?php foreach ($listdanhmuc as $danhMuc): ?>

                        <option  value="<?= $danhMuc['id'] ?>"> <?= $danhMuc['ten_danh_muc'] ?> </option>
                    <?php endforeach ?>

                </select>
                <?php
                if (isset($_SESSION['errors']['so_luong'])) { ?>
                    <p class="text-danger">Danh mục sản phẩm không được để trống</p>
                <?php
                }
                ?>
            </div>

            <div class="form-group col-6">
                <label>Trạng thái</label>
                <select class="form-control" name="trang_thai" required>
                    <option selected disabled>Chọn trạng thái</option>
                    <option value="1">Còn bán</option>
                    <option value="2">Dừng bán</option>
                </select>
                <?php if (isset($_SESSION['errors']['trang_thai'])): ?>
                    <p class="text-danger">Trạng thái sản phẩm không được để trống</p>
                <?php endif; ?>
            </div>

            <div class="form-group col-12">
                <label>Mô tả</label>
                <textarea name="mo_ta" class="form-control" placeholder="Nhập mô tả sản phẩm" rows="3" required></textarea>
                <?php if (isset($_SESSION['errors']['mo_ta'])): ?>
                    <p class="text-danger">Mô tả sản phẩm không được để trống</p>
                <?php endif; ?>
            </div>





























            <hr>
            <button type="submit" class="btn btn-primary">Submit</button>
        </div>

    </form>
</div>