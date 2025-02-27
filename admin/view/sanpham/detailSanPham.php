<!-- Main content -->
<!-- Default box -->
<div class="card card-solid">
  <div class="card-body">
    <div class="row">
      <div class="col-12 col-sm-6">

        <div class="col-12">
          <!-- <img src="<?= BASE_URL . $sanPham['hinh_anh'] ?>" class="product-image" alt="Product Image"> -->
          <img style="width: 600px; height: auto;" src="<?= BASE_URL . $sanPham['hinh_anh'] ?>" class="product-image" alt="Product Image">
        </div>
        <!-- <div class="col-12 product-image-thumbs"> -->
        <!-- <div class="product-image-thumb active"><img src="../../dist/img/prod-1.jpg" alt="Product Image"></div> -->
        <!-- <div class="product-image-thumb" ><img src="../../dist/img/prod-2.jpg" alt="Product Image"></div> -->
        <!-- <div class="product-image-thumb" ><img src="../../dist/img/prod-3.jpg" alt="Product Image"></div> -->
        <!-- <div class="product-image-thumb" ><img src="../../dist/img/prod-4.jpg" alt="Product Image"></div> -->
        <!-- <div class="product-image-thumb" ><img src="../../dist/img/prod-5.jpg" alt="Product Image"></div> -->
        <!-- </div> -->
      </div>
      <div class="col-12 col-sm-6">
        <h3 class="my-3">Tên Sản Phẩm : <?= $sanPham['ten_san_pham'] ?></h3>
        <!-- <p>Raw denim you probably haven't heard of them jean shorts Austin. Nesciunt tofu stumptown aliqua butcher retro keffiyeh dreamcatcher synth. Cosby sweater eu banh mi, qui irure terr.</p> -->

        <hr>

        <h4 class="mt-3">Giá tiền: <small><?= $sanPham['gia_san_pham'] ?></small></h4>
        <h4 class="mt-3">Giá khuyến mãi: <small><?= $sanPham['gia_khuyen_mai'] ?></small></h4>
        <h4 class="mt-3">Số lượng: <small><?= $sanPham['so_luong'] ?></small></h4>
        <h4 class="mt-3">Lượt xem: <small><?= $sanPham['luot_xem'] ?></small></h4>
        <h4 class="mt-3">Ngày nhập: <small><?= $sanPham['ngay_nhap'] ?></small></h4>
        <h4 class="mt-3">Danh mục sản phẩm: <small><?= $sanPham['ten_danh_muc'] ?></small></h4>
        <h4 class="mt-3">Trạng thái: <small><?= $sanPham['trang_thai'] == 1 ? 'Còn hàng' : 'Hết háng' ?></small></h4>
        <h4 class="mt-3">Mô tả sản phẩm: <small><?= $sanPham['mo_ta'] ?></small></h4>


      </div>
    </div>


    <div class="row mt-4">
      <nav class="w-100">
        <div class="nav nav-tabs" id="product-tab" role="tablist">
          <!-- <a class="nav-item nav-link active" id="product-desc-tab" data-toggle="tab" href="#binh-luan" role="tab" aria-controls="product-desc" aria-selected="true">Bình luận của sản phẩm</a> -->
          <!-- <a class="nav-item nav-link" id="product-comments-tab" data-toggle="tab" href="#product-comments" role="tab" aria-controls="product-comments" aria-selected="false">Comments</a> -->
          <!-- <a class="nav-item nav-link" id="product-rating-tab" data-toggle="tab" href="#product-rating" role="tab" aria-controls="product-rating" aria-selected="false">Rating</a> -->
        </div>
      </nav>
      <div class="tab-content p-3" id="nav-tabContent">
        <div class="tab-pane fade show active" id="binh-luan" role="tabpanel" aria-labelledby="product-desc-tab"
          <div class="col-12">
          <h2>Bình luận của sản phẩm</h2>
          <div>
            <table class="table" border="1">

              <thead>
                <tr>
                  <th scope="col">STT</th>
                  <th scope="col">Tên khách hàng</th>
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
                    <td><a target="_blank" href="<?= BASE_URL_AMIN . '?act=chi-tiet-khach-hang&id_khach_hang=' . $binhLuan['tai_khoan_id'] ?>"><?= $binhLuan['ho_ten'] ?></a></td>
                    <td><?= $binhLuan['noi_dung'] ?></td>
                    <td><?= $binhLuan['ngay_dang'] ?></td>
                    <td><?= $binhLuan['trang_thai'] == 1 ? 'Hiển thị' : 'Bị ẩn' ?></td>
                    <td>

                      <form action="<?= BASE_URL_AMIN . '?act=update-trang-thai-binh-luan' ?>" method="POST">
                        <input type="hidden" name="id_binh_luan" value="<?= $binhLuan['id'] ?>">
                        <input type="hidden" name="name_view" value="detail_sanpham">
                        <button onclick="return confirm('bạn có muốn ẩn bình luận này không ?')" class="btn btn-warning">
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

      </div>
    </div>
  </div>
</div>
<!-- /.card-body -->
</div>
<!-- /.card -->

</section>
<!-- /.content -->