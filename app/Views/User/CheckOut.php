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
    <section class="cr-checkout-section padding-tb-100">
        <div class="container">
            <div class="row">
                <!-- Sidebar Area Start -->
                <div class="cr-checkout-rightside col-lg-4 col-md-12">
                    <div class="cr-sidebar-wrap">
                        <!-- Sidebar Summary Block -->
                        <div class="cr-sidebar-block">
                            <div class="cr-sb-title">
                                <h3 class="cr-sidebar-title">Summary</h3>
                            </div>
                            <div class="cr-sb-block-content">
                            <?php if (!empty($cartDetails)): ?>
                                <?php foreach ($cartDetails as $item): ?>
                                <div class="cr-checkout-pro">
                                    <div class="col-sm-12 mb-0">
                                        <div class="cr-product-inner">
                                            <div class="cr-pro-image-outer">
                                                <div class="cr-pro-image">
                                                    <a href="product-left-sidebar.html" class="image">
                                                        <img class="main-image" src="<?= htmlspecialchars($item['image']) ?>" alt="<?= htmlspecialchars($item['name']) ?>" width="50">
                                                    </a>
                                                </div>
                                            </div>
                                            <div class="cr-pro-content cr-product-details">
                                                <h5 class="cr-pro-title"><a href="product-left-sidebar.html"><?= htmlspecialchars($item['name']) ?></a>
                                            </h5>
                                                <p class="cr-price"><span class="new-price"><?= number_format($item['price'], 0, ',', '.') ?> VND</span>
                                                <div class="cr-checkout-summary">
                                                <span>Quantity:<?= htmlspecialchars($item['quantity']) ?></span>
                                            <div>
                                                <span class="text-left">Sub-Total</span>
                                                <span class="text-right"><?= number_format($item['price'] * $item['quantity'], 0, ',', '.') ?> VND</span>
                                            </div>
                                            </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <?php endforeach; ?>
                                <?php else: ?>
                                <tr>
                                <td colspan="5">Giỏ hàng của bạn đang trống.</td>
                                    </tr>
                                <?php endif; ?>
                            </div>
                        </div>
                        <!-- Sidebar Summary Block -->
                    </div>
                    <div class="cr-sidebar-wrap cr-checkout-pay-wrap">
                        <!-- Sidebar Payment Block -->
                        <div class="cr-sidebar-block">
                            <div class="cr-sb-title">
                                <h3 class="cr-sidebar-title">Payment Method</h3>
                            </div>
                            <div class="cr-sb-block-content">
                                <div class="cr-checkout-pay">
                                    <div class="cr-pay-desc">Please select the preferred payment method to use on this
                                        order.</div>
                                    <form action="#" class="payment-options">
                                        <span class="cr-pay-option">
                                            <span>
                                                <input type="radio" id="pay1" name="radio-group" checked="">
                                                <label for="pay1">Cash On Delivery</label>
                                            </span>
                                        </span>
                                    </form>
                                </div>
                            </div>
                        </div>
                        <!-- Sidebar Payment Block -->
                    </div>
                </div>
                <div class="cr-checkout-leftside col-lg-8 col-md-12 m-t-991">
                    <!-- checkout content Start -->
                    <div class="cr-checkout-content">
                        <div class="cr-checkout-inner">
                            <div class="cr-checkout-wrap">
                                <div class="cr-checkout-block cr-check-bill">
                                    <h3 class="cr-checkout-title">Billing Details</h3>
                                    <div class="cr-bl-block-content">
                                        <div class="cr-check-subtitle">Checkout Options</div>
                                        <span class="cr-bill-option">
                                            <span>
                                                <input type="radio" id="bill1" name="radio-group">
                                                <label for="bill1">I want to use an existing address</label>
                                            </span>
                                            <span>
                                                <input type="radio" id="bill2" name="radio-group" checked="">
                                                <label for="bill2">I want to use new address</label>
                                            </span>
                                        </span>
                                        <div class="cr-check-bill-form mb-minus-24">
                                            <form action="?role=user&act=create-order" method="POST">
                                                <span class="cr-bill-wrap cr-bill-half">
                                                    <label> Name*</label>
                                                    <input type="text" name="name" placeholder="Enter your first name" required="">
                                                </span>
                                                <span class="cr-bill-wrap">
                                                    <label>Address</label>
                                                    <input type="text" name="address" placeholder="Address">
                                                </span>
                                                <span class="cr-bill-wrap">
                                                    <label>Phone</label>
                                                    <input type="text" name="phone" placeholder="Phone">
                                                </span>
                                                <span class="cr-bill-wrap">
                                                    <label>Notes</label>
                                                    <input type="text" name="notes" placeholder="notes">
                                                </span>
                                                    <button class="cr-button mt-20"  type="submit">Đặt hàng</button>
                                            </form>
                                        </div>

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!--cart content End -->
                </div>
            </div>
        </div>
    </section>
    

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


<!-- Mirrored from maraviyainfotech.com/projects/carrot/carrot-v21/carrot-html/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 06 Nov 2024 15:30:08 GMT -->
</html>
<!-- <h1>Thông tin thanh toán</h1> -->
    <!-- <form action="?role=user&act=create-order" method="POST">
        <label for="name">Tên người nhận:</label>
        <input type="text" id="name" name="name" required><br><br>

        <label for="address">Địa chỉ:</label>
        <input type="text" id="address" name="address" required><br><br>

        <label for="phone">Số điện thoại:</label>
        <input type="text" id="phone" name="phone" required><br><br>

        <label for="notes">Ghi chú:</label>
        <textarea id="notes" name="notes"></textarea><br><br>

        <h2>Chi tiết giỏ hàng</h2>
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
                <?php if (!empty($cartDetails)): ?>
                    <?php foreach ($cartDetails as $item): ?>
                        <tr>
                            <td><?= htmlspecialchars($item['name']) ?></td>
                            <td><img src="<?= htmlspecialchars($item['image']) ?>" alt="<?= htmlspecialchars($item['name']) ?>" width="50"></td>
                            <td><?= htmlspecialchars($item['quantity']) ?></td>
                            <td><?= number_format($item['price'], 0, ',', '.') ?> VND</td>
                            <td><?= number_format($item['price'] * $item['quantity'], 0, ',', '.') ?> VND</td>
                        </tr>
                    <?php endforeach; ?>
                <?php else: ?>
                    <tr>
                        <td colspan="5">Giỏ hàng của bạn đang trống.</td>
                    </tr>
                <?php endif; ?>
            </tbody>
        </table>
        <br>
        <button type="submit">Đặt hàng</button>
    </form> -->