<!-- ========================================================= 
    Item Name: Carrot - Multipurpose eCommerce HTML Template.
    Author: ashishmaraviya
    Version: 2.1
    Copyright 2024
 ============================================================-->
 <!DOCTYPE html>
<html lang="en" dir="ltr">


<!-- Mirrored from maraviyainfotech.com/projects/carrot/carrot-v21/carrot-html/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 06 Nov 2024 15:29:37 GMT -->
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="keywords" content="ecommerce, market, shop, mart, cart, deal, multipurpose, marketplace">
    <meta name="description" content="Carrot - Multipurpose eCommerce HTML Template.">
    <meta name="author" content="ashishmaraviya">

    <title>Healthy</title>

    <!-- App favicon -->
    <link rel="shortcut icon" href="assets/User/img/logo/favicon.png">

    <!-- Icon CSS -->
    <link rel="stylesheet" href="assets/User/css/vendor/materialdesignicons.min.css">
    <link rel="stylesheet" href="assets/User/css/vendor/remixicon.css">

    <!-- Vendor -->
    <link rel="stylesheet" href="assets/User/css/vendor/animate.css">
    <link rel="stylesheet" href="assets/User/css/vendor/bootstrap.min.css">
    <link rel="stylesheet" href="assets/User/css/vendor/aos.min.css">
    <link rel="stylesheet" href="assets/User/css/vendor/range-slider.css">
    <link rel="stylesheet" href="assets/User/css/vendor/swiper-bundle.min.css">
    <link rel="stylesheet" href="assets/User/css/vendor/jquery.slick.css">
    <link rel="stylesheet" href="assets/User/css/vendor/slick-theme.css">

    <!-- Main CSS -->
    <link rel="stylesheet" href="assets/User/css/style.css">
</head>

<body class="body-bg-6">

    <!-- Loader -->
    <div id="cr-overlay">
        <span class="loader"></span>
    </div>

   <?php include 'app/Views/User/layouts/header.php' ?>

    <!-- Main -->
    <section class="section-breadcrumb">
        <div class="cr-breadcrumb-image">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="cr-breadcrumb-title">
                            <h2>Chi tiết đơn hàng</h2>
                            <span> <a href="index.html">Home</a> / Order-list-detail</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="section-cart padding-t-100">
        <div class="container">
            <div class="row d-none">
                <div class="col-lg-12">
                    <div class="mb-30 aos-init aos-animate" data-aos="fade-up" data-aos-duration="2000" data-aos-delay="400">
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-12">
                    <div class="cr-cart-content aos-init aos-animate" data-aos="fade-up" data-aos-duration="2000" data-aos-delay="400">
                        <div class="row">
                            <form action="#">
                                <div class="cr-table-content">
                                    <table>
                                        <thead>
                                            <tr>
                                                <th>Product</th>
                                                <th>Quantity</th>
                                                <th>Price</th>
                                                <th>Total</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                        <?php foreach ($orderDetails as $item): ?>
                                            <tr>
                                                <td class="cr-cart-name">
                                                    <a href="javascript:void(0)">
                                                        <img src="<?= htmlspecialchars($item['product_image']) ?>" alt="product-1" class="cr-cart-img">
                                                        <?= htmlspecialchars($item['product_name']) ?>
                                                    </a>
                                                </td>
                                                <td class="cr-cart-price">
                                                    <span class="amount"><?= htmlspecialchars($item['quantity']) ?></span>
                                                </td>
                                                <td class="cr-cart-subtotal"><?= number_format($item['price'], 0, ',', '.') ?> VND</td>
                                                <td class="cr-cart-price">
                                                <?= number_format($item['price'] * $item['quantity'], 0, ',', '.') ?> VND
                                                </td>
                                            </tr>
                                            <?php endforeach; ?>
                                        </tbody>
                                    </table>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
<!-- <body>
    <h1>Chi tiết đơn hàng</h1>
    <p>Mã đơn hàng: <?= htmlspecialchars($order['id']) ?></p>
    <p>Ngày đặt hàng: <?= htmlspecialchars($order['created_at']) ?></p>
    <p>Tổng tiền: <?= number_format($order['total'], 0, ',', '.') ?> VND</p>

    <h2>Sản phẩm</h2>
    <table border="1" cellpadding="10" cellspacing="0">
        <thead>
            <tr>
                <th>Sản phẩm</th>
                <th>Hình ảnh</th>
                <th>Số lượng</th>
                <th>Giá</th>
                <th>Tổng</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($orderDetails as $item): ?>
                <tr>
                    <td><?= htmlspecialchars($item['product_name']) ?></td>
                    <td><img src="<?= htmlspecialchars($item['product_image']) ?>" alt="<?= htmlspecialchars($item['product_name']) ?>" width="50"></td>
                    <td><?= htmlspecialchars($item['quantity']) ?></td>
                    <td><?= number_format($item['price'], 0, ',', '.') ?> VND</td>
                    <td><?= number_format($item['price'] * $item['quantity'], 0, ',', '.') ?> VND</td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</body> -->
    

    <!-- Footer -->
    <?php include 'app/Views/User/layouts/footer.php' ?>


    <!-- Cart -->
    

    <!-- Side-tool -->
    

    <!-- Vendor Custom -->
    <script src="assets/User/js/vendor/jquery-3.6.4.min.js"></script>
    <script src="assets/User/js/vendor/jquery.zoom.min.js"></script>
    <script src="assets/User/js/vendor/bootstrap.bundle.min.js"></script>
    <script src="assets/User/js/vendor/mixitup.min.js"></script>

    <script src="assets/User/js/vendor/range-slider.js"></script>
    <script src="assets/User/js/vendor/aos.min.js"></script>
    <script src="assets/User/js/vendor/swiper-bundle.min.js"></script>
    <script src="assets/User/js/vendor/slick.min.js"></script>

    <!-- Main Custom -->
    <script src="assets/User/js/main.js"></script>
</body>

