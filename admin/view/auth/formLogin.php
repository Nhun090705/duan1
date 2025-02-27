<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        .w-600 {
            width: 600px;
        }

        body {
            display: grid;
            place-items: center;
            /* Canh giữa cả theo chiều ngang và chiều dọc */
            /* height: 100vh; */
            margin: 0;
        }

        .mbt-70 {
            margin: 70px 0;
        }

        .mb-50 {
            margin-bottom: 50px;
        }

        .mb-20 {
            margin-bottom: 20px;
        }
        .mtb-40 {
            margin: 40px 0;
        }
    </style>
</head>

<body>
    <div class=" w-600 mbt-70 shadow-lg p-3 mb-5 bg-body rounded">
        <h1 class="mtb-40" style="text-align: center;color:blue;font-weight:bold;">TRANG ĐĂNG NHẬP</h1>
        <hr>
        <?php
        if (isset($_SESSION['error'])) { ?>
            <p class="text-danger" style="text-align: center;"><?= $_SESSION['error'] ?></p>
        <?php } else { ?>
            <p class="" style="text-align: center;">Vui lòng đăng nhập</p>
        <?php } ?>

        <form action="<?= BASE_URL_AMIN . '?act=check-login-admin' ?>" method="post">
            <div class="mb-3">
                <input type="email" name="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Nhập email">
            </div>
            <div class="mb-3">
                <input type="password" name="password" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Nhập password">
            </div>
           
            <button type="submit" class="btn btn-primary col-12">LOGIN</button>
            <p>
                <a href="register.html" class="text-center">Quen mat khau ? </a>
            </p>
        </form>
    </div>
</body>

</html>