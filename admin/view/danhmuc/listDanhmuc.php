<div class="container">
  <h1 class="my-4 text-center">Quản lý danh mục</h1>

  <!-- <form action="" class="my-4 text-center">
    <input type="text" name="" id="" class="form-control-sm" placeholder="Nhập từ khóa">
    <button type="submit" class="btn btn-primary">Tìm kiếm</button>
  </form> -->
  <a href="<?= BASE_URL_AMIN . '?act=form-them-danh-muc' ?>"><button class="btn btn-success">Thêm</button></a>
  <table class="table">

    <thead>
      <tr>
        <th scope="col">STT</th>
        <th scope="col">Ten danh muc</th>
        <th scope="col">Mo ta</th>
        <th scope="col">Thao tac</th>
      </tr>
    </thead>
    <tbody>
      <?php foreach ($listDanhmuc as $key => $danhmuc) : ?>
        <tr>
          <td><?= $key + 1 ?></td>
          <td><?= $danhmuc['ten_danh_muc'] ?></td>
          <td><?= $danhmuc['mo_ta'] ?></td>
          <td>

            <a href="<?= BASE_URL_AMIN . '?act=form-sua-danh-muc&id_danh_muc=' . $danhmuc['id'] ?>">
              <button class="btn btn-warning">Sửa</button>
            </a>
            <a href="<?= BASE_URL_AMIN . '?act=xoa-danh-muc&id_danh_muc=' . $danhmuc['id'] ?>"  
            onclick="return confirm('Bạn muốn xóa không ?')">
              <button class="btn btn-danger">Xóa</button>
            </a>
           
          </td>

        </tr>
      <?php endforeach ?>
    </tbody>
  </table>
</div>