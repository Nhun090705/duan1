<div class="container">
    <h1 class="my-4 text-center">Thêm tài khoản quản trị viên</h1>
    <form action="<?= BASE_URL_AMIN . '?act=them-quan-tri' ?>" method="POST">
        <div class="form-group">
            <label>Họ tên</label>
            <input type="text" class="form-control" name="ho_ten" placeholder="Nhập họ tên ">
            <?php
            if (isset($_SESSION['error']['ho_ten'])) { ?>
                <p class="text-danger">Tên sản phẩm không được để trống</p>
            <?php
            }
            ?>
        </div>

        <div class="form-group">
            <label>Email</label>
            <input type="email" class="form-control" name="email" placeholder="Nhập email ">
            <?php
            if (isset($_SESSION['error']['email'])) { ?>
                <p class="text-danger">Tên sản phẩm không được để trống</p>
            <?php
            }
            ?>
        </div>
        <!-- <div class="form-check"> -->
        <!-- <input type="checkbox" class="form-check-input" id="exampleCheck1"> -->
        <!-- <label class="form-check-label" for="exampleCheck1">Check me out</label> -->
        <!-- </div> -->
        <hr>
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
</div>