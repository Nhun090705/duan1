
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <div class="container">
        <!-- Section: Design Block -->
        <section class="text-center text-lg-start">
            <style>
                .cascading-right {
                    margin-right: -50px;
                }

                @media (max-width: 991.98px) {
                    .cascading-right {
                        margin-right: 0;
                    }
                }
            </style>

            <!-- Jumbotron -->
            <div class="container py-4">
                <div class="row g-0 align-items-center">
                    <div class="col-lg-6 mb-5 mb-lg-0">
                        <div class="card cascading-right bg-body-tertiary" style="backdrop-filter: blur(30px); ">
                            <div class="card-body p-5 shadow-5 text-center">
                                <h2 class="fw-bold mb-5">ĐĂNG NHẬP</h2>
                                <?php
                                if (isset($_SESSION['error'])) { ?>
                                    <p class="text-danger" style="text-align: center;"><?= $_SESSION['error'] ?></p>
                                <?php } else { ?>
                                    <p class="" style="text-align: center;">Vui lòng đăng nhập</p>
                                <?php } ?>
                                <form action="<?= BASE_URL . '?act=check-login' ?>" method="POST">
                                    <!-- 2 column grid layout with text inputs for the first and last names -->
                                    <!-- <div class="row">
                                        <div class="col-md-6 mb-4">
                                            <div data-mdb-input-init class="form-outline">
                                                <input type="text" id="form3Example1" class="form-control" placeholder="HỌ TÊN" />
                                            </div>
                                        </div>
                                        <div class="col-md-6 mb-4">
                                            <div data-mdb-input-init class="form-outline">
                                                <input type="text" id="form3Example2" class="form-control" placeholder="SỐ ĐIỆN THOẠI" />
                                            </div>
                                        </div>
                                    </div> -->

                                    <!-- Email input -->
                                    <div data-mdb-input-init class="form-outline mb-4">
                                        <input type="email" id="form3Example3" class="form-control" name="email" placeholder="Email address" />
                                    </div>

                                    <!-- Password input -->
                                    <div data-mdb-input-init class="form-outline mb-4">
                                        <input type="password" id="form3Example4" class="form-control" name="password" placeholder="Password" />
                                    </div>

                                    <!-- Checkbox -->
                                    <div class="form-check d-flex justify-content-center mb-4">
                                        <label class="form-check-label" for="form2Example33">
                                            <a href="#" style="text-decoration: none;" class="link-info">Quên mật khẩu ?</a>
                                        </label>
                                        <p style="padding:0 20px">Bạn chưa có mật khẩu? <a href="<?= BASE_URL . '?act=register' ?>" class="link-info">Đăng ký tại đây</a></p>
                                    </div>

                                    <!-- Submit button -->
                                    <button type="submit" data-mdb-button-init data-mdb-ripple-init class="btn btn-success btn-block mb-4" style="width:100%;padding:15px 0">
                                        ĐĂNG NHẬP
                                    </button>
                                </form>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-6 mb-5 mb-lg-0">
                        <img src="https://channel.mediacdn.vn/2021/12/17/photo-1-16397193100991304104115.jpg" class="w-100 rounded-4 shadow-4"
                            alt="" />
                    </div>
                </div>
            </div>
            <!-- Jumbotron -->
        </section>
        <!-- Section: Design Block -->
    </div>
    <footer class="bg-dark text-white py-5">
        <div class="container">
            <div class="row">
                <div class="col-12 col-md-6 col-lg-4 col-xl-3">
                    <ul class="menu-footer">
                        <li><a href="">Về chúng tôi</a></li>
                        <li><a href="">Về chúng tôi</a></li>
                        <li><a href="">Về chúng tôi</a></li>
                        <li><a href="">Về chúng tôi</a></li>
                        <li><a href="">Về chúng tôi</a></li>
                    </ul>
                </div>
                <div class="col-12 col-md-6 col-lg-4 col-xl-3">
                    <ul class="menu-footer">
                        <li><a href="">Chính sách bảo hành</a></li>
                        <li><a href="">Chính sách bảo hành</a></li>
                        <li><a href="">Chính sách bảo hành</a></li>
                        <li><a href="">Chính sách bảo hành</a></li>
                        <li><a href="">Chính sách bảo hành</a></li>
                    </ul>
                </div>
                <div class="col-12 col-md-6 col-lg-4 col-xl-3">
                    <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3723.8639311820666!2d105.74468687639252!3d21.038129780613524!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x313455e940879933%3A0xcf10b34e9f1a03df!2zVHLGsOG7nW5nIENhbyDEkeG6s25nIEZQVCBQb2x5dGVjaG5pYw!5e0!3m2!1svi!2s!4v1730641951609!5m2!1svi!2s" width="100%" height="150" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                </div>
                <div class="col-12 col-md-6 col-lg-4 col-xl-3">

                </div>
                <div class="col-12 col-md-6 col-lg-4 col-xl-3">

                </div>
                <div class="col-12 text-canter">
                    Công ty cổ phần đầu tư và công nghệ Mygroup
                    Địa chỉ: 249 Xã Đàn, Nam Đồng, Đống Đa, Hà Nội
                    GPĐKKD: 0108085873. © 2016 - 2024 Myshoes.vn
                </div>

            </div>
        </div>
    </footer>
</body>

</html>