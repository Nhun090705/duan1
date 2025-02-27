<?php
// Kiểm tra và khởi tạo dữ liệu rỗng nếu cần
$thongKeData = $thongKeData ?? [
    'thong_ke_tai_khoan' => [],
    'top_products' => []
];

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Thống kê doanh thu theo tài khoản</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>

<body>
    <div class="container mt-5">
        <h2 class="text-center">Thống kê doanh thu theo tài khoản</h2>

        <!-- Form lọc thống kê theo tháng và năm -->
        <form action="<?= BASE_URL_AMIN . '?act=thong-ke' ?>" method="get" class="mb-4">
            <input type="hidden" name="act" value="thong-ke">
            <div class="form-row">
                <div class="col-md-4">
                    <label for="year">Năm</label>
                    <input type="number" class="form-control" name="year" id="year" value="<?= $_GET['year'] ?? date('Y') ?>" required>
                </div>
                <div class="col-md-4">
                    <label for="month">Tháng</label>
                    <input type="number" class="form-control" name="month" id="month" value="<?= $_GET['month'] ?? date('m') ?>" min="1" max="12" required>
                </div>
                <div class="col-md-4">
                    <label>&nbsp;</label>
                    <button type="submit" class="btn btn-primary form-control">Thống kê</button>
                </div>
            </div>
        </form>

        <!-- Bảng thống kê -->
        <table class="table table-bordered table-striped">
            <thead>
                <tr>
                    <th>Tên tài khoản</th>
                    <th>Tổng số tiền</th>
                    <th>Tổng số đơn hàng</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $totalAmount = 0;
                if (!empty($thongKeData['thong_ke_tai_khoan'])):
                    foreach ($thongKeData['thong_ke_tai_khoan'] as $row):
                        $totalAmount += $row['total_amount'] ?? 0;
                ?>
                        <tr>
                            <td><?= isset($row['account_name']) ? htmlspecialchars($row['account_name']) : 'Không xác định' ?></td>
                            <td><?= isset($row['total_amount']) ? number_format($row['total_amount'], 0, ',', '.') : '0' ?> VND</td>
                            <td><?= $row['total_orders'] ?? '0' ?></td>
                        </tr>
                    <?php endforeach; ?>
                    <tr>
                        <td colspan="2" class="text-center"><strong>Tổng cộng</strong></td>
                        <td><?= number_format($totalAmount, 0, ',', '.') ?> VND</td>
                    </tr>
                <?php else: ?>
                    <tr>
<td colspan="3" class="text-center">Không có dữ liệu</td>
                    </tr>
                <?php endif; ?>
            </tbody>
        </table>

        <!-- Phần hiển thị sản phẩm bán chạy -->
        <h4>Top 5 sản phẩm bán chạy</h4>
        <table class="table table-bordered table-striped">
            <thead>
                <tr>
                    <th>Tên sản phẩm</th>
                    <th>Số lượng bán</th>
                    <th>Tổng doanh thu</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $total = 0;
                if (!empty($thongKeData['top_products'])): ?>
                    <?php foreach ($thongKeData['top_products'] as $product):
                        // Cộng tổng doanh thu vào $total
                        $total += $product['total_sales'] ?? 0;
                    ?>
                        <tr>
                            <td><?= htmlspecialchars($product['product_name'] ?? 'Không xác định') ?></td>
                            <td><?= $product['total_sold'] ?? '0' ?></td>
                            <td><?= isset($product['total_sales']) ? number_format($product['total_sales'], 0, ',', '.') : '0' ?></td>
                        </tr>
                    <?php endforeach; ?>
                    <tr>
                        <td colspan="2" class="text-center"><strong>Tổng cộng</strong></td>
                        <td><?= number_format($total, 0, ',', '.') ?></td>
                    </tr>
                <?php else: ?>
                    <tr>
                        <td colspan="3" class="text-center">Không có dữ liệu</td>
                    </tr>
                <?php endif; ?>

            </tbody>
        </table>
        <h4>Top 5 sản phẩm được xem nhiều nhất</h4>
        <table class="table table-bordered table-striped">
            <thead>
                <tr>
                    <th>Tên sản phẩm</th>
                    <th>Lượt xem</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $totalViews = 0;
                if (!empty($thongKeData['top_viewed_products'])):
                    foreach ($thongKeData['top_viewed_products'] as $product):
                        // Cộng dồn lượt xem từ dữ liệu đúng
                        $totalViews += $product['total_views'] ?? 0;  // Dùng $product thay vì $row
                ?>
                        <tr>
                            <td><?= htmlspecialchars($product['product_name']) ?></td>
                            <td><?= number_format($product['total_views']) ?></td>
                        </tr>
                    <?php endforeach; ?>
                    <tr>
                        <td colspan="2" class="text-center"><strong>Tổng cộng</strong></td>
                        <td><?= number_format($totalViews, 0) ?></td>
                    </tr>
<?php else: ?>
                    <tr>
                        <td colspan="2" class="text-center">Không có dữ liệu</td>
                    </tr>
                <?php endif; ?>

            </tbody>
        </table>


    </div>
</body>

</html>