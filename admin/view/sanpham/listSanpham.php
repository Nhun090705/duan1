<div class="container">
  <h1 class="my-4 text-center">Quản lý danh sách sản phẩm</h1>

  <!-- <form action="" class="my-4 text-center">
    <input type="text" name="" id="" class="form-control-sm" placeholder="Nhập từ khóa">
    <button type="submit" class="btn btn-primary">Tìm kiếm</button>
  </form> -->
  <a href="<?= BASE_URL_AMIN . '?act=form-them-san-pham' ?>"><button class="btn btn-success">Thêm</button></a>
  <table class="table" border="1">

    <thead>
      <tr>
        <th scope="col">STT</th>
        <th scope="col">Ten san pham</th>
        <th scope="col">Anh san pham</th>
        <th scope="col">Gia san pham</th>
        <th scope="col">So luong san pham</th>
        <th scope="col">Danh muc san pham</th>
        <th scope="col">Trang thai san pham</th>
        <!-- <th scope="col">Mo ta</th> -->
        <th scope="col">Thao tac</th>

      </tr>
    </thead>
    <tbody>
      <?php foreach ($listSanPham as $key => $sanPham) : ?>
        <tr>
          <td><?= $key + 1 ?></td>
          <td><?= $sanPham['ten_san_pham'] ?></td>
          <td><img src="<?= BASE_URL . $sanPham['hinh_anh'] ?>" style="width:100px" alt="" onerror="this.onerror=null; this.src='https://cdn.storims.com/api/v2/image/resize?path=https://storage.googleapis.com/storims_cdn/storims/uploads/e4866a58448d438c71c8b448355913cd.jpeg&format=jpeg'"></td>
          <td><?= $sanPham['gia_san_pham'] ?></td>
          <td><?= $sanPham['so_luong'] ?></td>

          <td><?= $sanPham['ten_danh_muc'] ?></td>
          <td><?= $sanPham['trang_thai'] == 1 ? 'Còn hàng' : 'Dừng bán' ?></td>
          <td></td>

          <td>
            <a href="<?= BASE_URL_AMIN . '?act=chi-tiet-san-pham&id_san_pham=' . $sanPham['id'] ?>">
              <button class="btn btn-primary">Chi tiết</button>
            </a>

            <a href="<?= BASE_URL_AMIN . '?act=form-sua-san-pham&id_san_pham=' . $sanPham['id'] ?>">
              <button class="btn btn-warning">Sửa</button>
            </a>
            <a href="<?= BASE_URL_AMIN . '?act=xoa-san-pham&id_san_pham=' . $sanPham['id'] ?>"
              onclick="return confirm('Bạn muốn xóa không ?')">
              <button class="btn btn-danger">Xóa</button>
            </a>

          </td>

        </tr>
      <?php endforeach ?>
    </tbody>
  </table>
</div>