<div class="container">
  <h1 class="my-4 text-center">Quản lý tài khoản quản trị viên</h1>

  <!-- <form action="" class="my-4 text-center">
    <input type="text" name="" id="" class="form-control-sm" placeholder="Nhập từ khóa">
    <button type="submit" class="btn btn-primary">Tìm kiếm</button>
  </form> -->
  <a href="<?= BASE_URL_AMIN . '?act=form-them-quan-tri' ?>"><button class="btn btn-success">Thêm tài khoản</button></a>
  <table class="table">

    <thead>
      <tr>
        <th scope="col">STT</th>
        <th scope="col">Họ tên</th>
        <th scope="col">Email</th>
        <th scope="col">Số điện thoại</th>
        <th scope="col">Trạng thái</th>
        <th scope="col">Thao tac</th>
      </tr>
    </thead>
    <tbody>
      <?php foreach ($listQuanTri as $key => $quanTri) : ?>
        <tr>
          <td><?= $key + 1 ?></td>
          <td><?= $quanTri['ho_ten'] ?></td>
          <td><?= $quanTri['email'] ?></td>
          <td><?= $quanTri['so_dien_thoai'] ?></td>
          <td><?= $quanTri['trang_thai'] == 1 ? 'Active' : 'Inactive' ?></td>
          <td>

            <a href="<?= BASE_URL_AMIN . '?act=form-sua-quan-tri&id_quan_tri=' . $quanTri['id'] ?>">
              <button class="btn btn-warning">Sửa</button>
            </a>
            <a href="<?= BASE_URL_AMIN . '?act=reset-pasword&id_quan_tri=' . $quanTri['id'] ?>"  
            onclick="return confirm('bạn có muốn reset password của tài khỏa hay khong ?')">
              <button class="btn btn-danger">Reset</button>
            </a>
          </td>

        </tr>
      <?php endforeach ?>
    </tbody>
  </table>
</div>