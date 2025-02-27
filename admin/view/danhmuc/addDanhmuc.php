<div class="container">
    <h1 class="my-4 text-center">Thêm Danh Mục</h1>
<form action="<?= BASE_URL_AMIN . '?act=them-danh-muc' ?>" method="POST">
  <div class="form-group">
    <label>Tên danh mục</label>
    <input type="text" class="form-control" name="ten_danh_muc" placeholder="Nhập tên danh mục">
    <?php
    if (isset($errors['ten_danh_muc'])) { ?>
      <p class="text-danger">Tên danh mục không được để trống</p>
    <?php
    }
    ?>
    
  </div>
  <div class="form-group">
    <label>Mô tả</label>
    <input type="text" class="form-control" name="mo_ta"  placeholder="Nhập mô tả">
    

  </div>
  <!-- <div class="form-check"> -->
    <!-- <input type="checkbox" class="form-check-input" id="exampleCheck1"> -->
    <!-- <label class="form-check-label" for="exampleCheck1">Check me out</label> -->
  <!-- </div> -->
   <hr>
  <button type="submit" class="btn btn-primary">Submit</button>
</form>
</div>