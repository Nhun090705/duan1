<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="view/asset/css/style.css">
    <style>
        .ms-30{
            margin-left: 30px;
        }
    </style>
</head>

<body>
    <header id="header" >

        <nav class="navbar navbar-expand-lg navbar-light" style="background-color: white;">
            <div class="container ">
                <a class="navbar-brand" href="#" style="height:100px">
                    <img  src="<?= BASE_URL ?>/view/asset/images/logo.png" width="120px" alt="">
                </a>
                <!-- <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarPrimaryMenu" aria-controls="navbarPrimaryMenu" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon">sản phẩm</span>
                </button> -->
                <div class="collapse navbar-collapse ms-50" id="navbarPrimaryMenu">
                    <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                        <li class="nav-item">
                            <a class="nav-link active" aria-current="page" href="<?= BASE_URL . '?act=/' ?>">Trang chủ</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">Liên hệ</a>
                        </li>
                        <!-- <li class="nav-item ">
                            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                Sản phẩm
                            </a> -->
                        <!-- <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                                <li><a class="dropdown-item" href="#">Giày mới</a></li>
                                <li>
                                    <hr class="dropdown-divider">
                                </li>
                                <li><a class="dropdown-item" href="#">Giày hot trend</a></li>
                                <li>
                                    <hr class="dropdown-divider">
                                </li>
                                <li><a class="dropdown-item" href="#">Mẫu sắp tới</a></li>
                            </ul> -->
                        <!-- </li> -->
                        <!-- <li class="nav-item">
                            <a class="nav-link disabled">Disabled</a>
                        </li> -->
                    </ul>

                </div>

                <div class="collapse navbar-collapse ms-50" id="navbarPrimaryMenu">
                    <!-- <form class="d-flex">
                        <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
                        <button class="btn btn-outline-success" type="submit">
                            <img style="width:25px" src="https://upload.wikimedia.org/wikipedia/commons/thumb/0/0b/Search_Icon.svg/750px-Search_Icon.svg.png" alt="">
                        </button>
                    </form> -->
                    <form class="d-flex" method="GET" action="view/search.php">
                        <input class="form-control me-2" type="search" name="query" placeholder="Search" aria-label="Search">
                        <button class="btn btn-outline-success" type="submit" style="width:45px">
                            <img style="width:35px" src="https://upload.wikimedia.org/wikipedia/commons/thumb/0/0b/Search_Icon.svg/750px-Search_Icon.svg.png">
                        </button>
                    </form>
                    <div class="nav-item dropdown ">
                        <a class="nav-link ms-50" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            <img src="./view/asset/images/login.png" alt="" style="width:60px">
                        </a>
                        <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <?php if (!isset($_SESSION['user_client'])) { ?>
                                <li><a class="dropdown-item" href="<?= BASE_URL . '?act=login' ?>">Đăng nhập</a></li>
                                <li>
                                    <hr class="dropdown-divider">
                                </li>
                                <li><a class="dropdown-item" href="<?=  BASE_URL . '?act=register' ?>">Đăng kí</a></li>
                            <?php }else { ?>
                            <li><a class="dropdown-item" href="<?= BASE_URL . '?act=lich-su-mua-hang' ?>">Đơn hàng</a></li>
                            <li><a class="dropdown-item" href="#">Tài khoản</a></li>
                            <li><a class="dropdown-item" aria-current="page" href="view/auth/thoat.php" onclick="return confirm('Đăng xuất tài khoản ?')">Đăng xuất</a></li>
                            <?php } ?>

                        </ul>
                    </div>
                    <div class="gio_hang">
                    <a class="nav-link active" aria-current="page" href="<?= BASE_URL . '?act=gio-hang' ?>">
                            <img src="view/asset/images/gio_hang.png" alt="" style="width:50px">
                        </a>
                    </div>
                    <div class="nav-item dropdown ms-30">
                        <label for="">
                            <?php if (isset($_SESSION['user_client'])) {
                                echo $_SESSION['user_client'];
                            }  ?>
                        </label>
                    </div>
                </div>


            </div>
        </nav>

    </header>
</body>
<!-- <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script> -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>

</html>