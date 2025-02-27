<div class="container">
    <h1 class="my-4 text-center">Sửa Danh Mục</h1>
<form action="<?= BASE_URL_AMIN . '?act=sua-danh-muc' ?>" method="POST">
<input type="text" class="form-control" name="id" value="<?=$danhmuc['id']?>" hidden>
  <div class="form-group">
    <label>Tên danh mục</label>
    <input type="text" class="form-control" name="ten_danh_muc" value="<?=$danhmuc['ten_danh_muc']?>" placeholder="Nhập tên danh mục">
    <?php
    if (isset($errors['ten_danh_muc'])) { ?>
      <p class="text-danger">Tên danh mục không được để trống</p>
    <?php
    }
    ?>
    
  </div>
  <div class="form-group">
    <label>Mô tả</label>
    <textarea name="mo_ta" class="form-control" id="" placeholder="Nhập mô tả"><?= $danhmuc['mo_ta']?>
    </textarea>
    

  </div>
  <!-- <div class="form-check"> -->
    <!-- <input type="checkbox" class="form-check-input" id="exampleCheck1"> -->
    <!-- <label class="form-check-label" for="exampleCheck1">Check me out</label> -->
  <!-- </div> -->
   <hr>
  <button type="submit" class="btn btn-primary">Submit</button>
</form>
</div>