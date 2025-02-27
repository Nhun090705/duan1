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
                                <div class="card-header text-center bg-primary text-white">
                                    <h2>Đăng ký tài khoản</h2>
                                </div>
                                <div class="card-body">
                                    <!-- Hiển thị thông báo -->
                                    <?php if (isset($_SESSION['success'])): ?>
                                        <div class="alert alert-success">
                                            <?php
                                            echo $_SESSION['success'];
                                            unset($_SESSION['success']);
                                            ?>
                                        </div>
                                    <?php endif; ?>
                                    <?php if (isset($_SESSION['error'])): ?>
                                        <div class="alert alert-danger">
                                            <?php
                                            echo $_SESSION['error'];
                                            unset($_SESSION['error']);
                                            ?>
                                        </div>
                                    <?php endif; ?>
                                    <!-- Form đăng ký -->
                                    <form action="?act=postRegister" method="POST">
                                        <div class="mb-3">
                                            <label for="ten" class="form-label">Họ tên người đăng kí:</label>
                                            <input type="text" class="form-control" id="ten" name="ten" required>
                                        </div>
                                        <div class="mb-3">
                                            <label for="email" class="form-label">Email người đăng kí:</label>
                                            <input type="email" class="form-control" id="email" name="email" required>
                                        </div>
                                        <div class="mb-3">
                                            <label for="password" class="form-label">Mật khẩu:</label>
                                            <input type="password" class="form-control" id="password" name="password" required>
                                        </div>
                                        <div class="d-grid">
                                            <button type="submit" class="btn btn-primary">Đăng ký</button>
                                        </div>
                                    </form>
                                </div>
                                <div class="card-footer text-center">
                                    <p>Đã có tài khoản? <a href="?act=login" class="text-primary">Đăng nhập</a></p>
                                </div>



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