<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="view/asset/css/style.css">
</head>

<body>
    <header id="header">

        <nav class="navbar navbar-expand-lg navbar-light" style="background-color: white;">
            <div class="container ">
                <a class="navbar-brand" href="#">
                    <!-- <img src="data:image/png;base64,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" height="60px" alt=""> -->
                    <img  src="<?= BASE_URL ?>/view/asset/images/logo.png" width="120px" alt="">
                </a>
                <!-- <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarPrimaryMenu" aria-controls="navbarPrimaryMenu" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon">sản phẩm</span>
                </button> -->
                <div class="collapse navbar-collapse ms-50" id="navbarPrimaryMenu">
                    <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                        <li class="nav-item ">
                            <!-- <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                Quản lý tài khoan
                            </a> -->
                            <!-- <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                                <li><a class="dropdown-item" href="<?= BASE_URL_AMIN . '?act=list-tai-khoan-quan-tri' ?>">Tài khoản quản trị</a></li>
                                <li>
                                    <hr class="dropdown-divider">
                                </li>
                                <li><a class="dropdown-item" href="#">tài khoản khách hàng</a></li>
                                <li>
                                    <hr class="dropdown-divider">
                                </li>
                                <li><a class="dropdown-item" href="#">tài khoản cá nhân</a></li>
                            </ul> -->
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                Quản lý tài khoan
                            </a>
                            <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                                <li><a class="dropdown-item" href="<?= BASE_URL_AMIN . '?act=list-tai-khoan-quan-tri' ?>">Tài khoản quản trị</a></li>
                                <li>
                                    <hr class="dropdown-divider">
                                </li>
                                <li><a class="dropdown-item" href="<?= BASE_URL_AMIN . '?act=list-tai-khoan-khach-hang' ?>">Tài khoản khách hàng</a></li>
                                <li>
                                    <hr class="dropdown-divider">
                                </li>
                                <li><a class="dropdown-item" href="<?= BASE_URL_AMIN . '?act=form-sua-thong-tin-ca-nhan-quan-tri' ?>">Đổi mật khẩu quản trị</a></li>
                            </ul>
                        </li>
                        </li>
                        <li class="nav-item ps-10">
                            <!-- <a class="nav-link active" aria-current="page" href="http://localhost/duan1/admin/">Báo cáo thống kê</a> -->
                            <a class="nav-link active" aria-current="page" href=<?= BASE_URL_AMIN . '?act=thong-ke&month=' . ($_GET['month'] ?? date('m')) . '&year=' . ($_GET['year'] ?? date('Y')) ?>">Thong ke</a>
                        </li>
                        <li class="nav-item ps-10">
                            <a class="nav-link active" aria-current="page" href="<?= BASE_URL_AMIN . '?act=danh-muc' ?>">Danh muc</a>
                        </li>
                        <li class="nav-item ps-10">
                            <a class="nav-link active" aria-current="page" href="<?= BASE_URL_AMIN . '?act=san-pham' ?>">San pham</a>
                        </li>
                        <li class="nav-item ps-10">
                            <a class="nav-link active" aria-current="page" href="<?= BASE_URL_AMIN . '?act=don-hang' ?>">Don hang</a>
                        </li>
                        <li class="nav-item ps-10">
                            <!-- <a class="nav-link active" aria-current="page" href="#">Binh luan</a> -->
                        </li>
                        <li class="nav-item ps-10">
                            <a class="nav-link active" aria-current="page" href="#">Binh luan</a>
                        </li>

                    </ul>
                </div>
                <div class="nav-item dropdown ms-50">
                    <a class="nav-link active" aria-current="page" href="<?= BASE_URL_AMIN . '?act=logout-admin' ?>" onclick="return confirm('Đăng xuất tài khoản ?')"><img src="./view/asset/images/logout.jpg" alt="" style="width:35px"></a>
                </div>
            </div>
        </nav>

    </header>
    <main>

    </main>
    <footer id="footer">

    </footer>


</body>
<!-- <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script> -->
<!-- <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script> -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>

</html>