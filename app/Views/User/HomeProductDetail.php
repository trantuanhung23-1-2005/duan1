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
    <section class="section-product padding-t-100">
        <div class="container">
            <div class="row mb-minus-24 aos-init aos-animate" data-aos="fade-up" data-aos-duration="2000" data-aos-delay="600">
                <div class="col-xxl-4 col-xl-5 col-md-6 col-12 mb-24">
                    <div class="vehicle-detail-banner banner-content clearfix">
                        <div class="banner-slider">
                            <div class="slider slider-for slick-initialized slick-slider">
                                <div aria-live="polite" class="slick-list draggable">
                                    <div class="slick-track" role="listbox" style="opacity: 1; width: 3328px;">
                                        <div class="slider-banner-image slick-slide slick-current slick-active" data-slick-index="0" aria-hidden="false" tabindex="-1" role="option" aria-describedby="slick-slide00" style="width: 416px; position: relative; left: 0px; top: 0px; z-index: 999; opacity: 1;">
                                            <div class="zoom-image-hover" style="position: relative; overflow: hidden;">
                                                <img src="<?= $productDetailList->image ?>" alt="product-tab-1" class="product-image">
                                                <img role="presentation" alt="" src="file:///D:/xam/htdocs/baseduan1/frontend/projects/carrot/carrot-v21/carrot-html/assets/img/product/9.jpg" class="zoomImg" style="position: absolute; top: -37.5962px; left: -104.65px; opacity: 0; width: 600px; height: 600px; border: none; max-width: none; max-height: none;">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="slider slider-nav thumb-image slick-initialized slick-slider">
                                <div aria-live="polite" class="slick-list draggable">
                                    <div class="slick-track" role="listbox" style="opacity: 1; width: 1548px; transform: translate3d(-430px, 0px, 0px);">
                                        <div class="thumbnail-image slick-slide slick-cloned" data-slick-index="-5" id="" aria-hidden="true" tabindex="-1" style="width: 86px;">
                                            <div class="thumbImg">
                                                <img src="assets/img/product/12.jpg" alt="product-tab-1">
                                            </div>
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xxl-8 col-xl-7 col-md-6 col-12 mb-24">
                    <div class="cr-size-and-weight-contain">
                        <h2 class="heading"><?= $productDetailList->name ?></h2>
                    </div>
                    <div class="cr-size-and-weight">
                        <div class="list">
                            <ul>
                                <li><label>Brand <span>:</span></label>Carrot</li>
                                <li><label>Stock <span>:</span></label><?= $productDetailList->stock ?></li>
                                <li><label>Info <span>:</span></label>Độc quyền tại Carrot</li>
                            </ul>
                        </div>
                        <div class="cr-product-price">
                            <span class="new-price"><?= $productDetailList->price ?></span>
                        </div>
                        <form method="GET" action="<?= BASE_URL ?>">
                            <input type="hidden" name="act" value="cart"> <!-- Gửi act=cart -->
                            <input type="hidden" name="product_id" value="<?= isset($_GET['product_id']) ? htmlspecialchars($_GET['product_id']) : '' ?>">
                            <div class="cr-add-card">
                                <div class="cr-qty-main">
                                    <button type="submit" name="quantity" value="<?= (isset($_GET['quantity']) ? $_GET['quantity'] - 1 : 1) ?>" class="minus">-</button>
                                    <input type="number" name="quantity" value="1" min="1" class="quantity">
                                    <button type="submit" name="quantity" value="<?= (isset($_GET['quantity']) ? $_GET['quantity'] + 1 : 2) ?>" class="plus"> +</button>
                                </div>
                                <div class="cr-add-button">
                                    <button type="submit">Add to cart</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <div class="row aos-init aos-animate" data-aos="fade-up" data-aos-duration="2000" data-aos-delay="600">
                <div class="col-12">
                    <div class="cr-paking-delivery">
                        <ul class="nav nav-tabs" id="myTab" role="tablist">
                            <li class="nav-item" role="presentation">
                                <button class="nav-link active" id="description-tab" data-bs-toggle="tab" data-bs-target="#description" type="button" role="tab" aria-controls="description" aria-selected="true">Description</button>
                            </li>
                            <li class="nav-item" role="presentation">
                                <button class="nav-link" id="review-tab" data-bs-toggle="tab" data-bs-target="#review" type="button" role="tab" aria-controls="review" aria-selected="false" tabindex="-1">Review</button>
                            </li>
                        </ul>
                        <div class="tab-content" id="myTabContent">
                            <!-- Tab Description -->
                            <div class="tab-pane fade show active" id="description" role="tabpanel" aria-labelledby="description-tab">
                                <div class="cr-tab-content">
                                    <div class="cr-description">
                                        <p><?= $productDetailList->description ?>
                                        <p>
                                    </div>
                                </div>
                            </div>
                            <!-- Tab Review -->
                            <div class="tab-pane fade" id="review" role="tabpanel" aria-labelledby="review-tab">
                                <div class="cr-tab-content">
                                    <h3>Đánh giá trung bình: <?= number_format($averageRating, 1) ?>/5</h3>

                                    <!-- Hiển thị danh sách bình luận -->
                                    <h4>Danh sách bình luận</h4>
                                    <?php if (!empty($reviews)): ?>
                                        <?php foreach ($reviews as $review): ?>
                                            <div style="border: 1px solid #ccc; padding: 10px; margin-bottom: 10px;">
                                                <p><strong><?= htmlspecialchars($review['user_name']) ?>:</strong></p>
                                                <p><?= htmlspecialchars($review['comment']) ?></p>
                                                <p><em>Ngày: <?= htmlspecialchars($review['created_at']) ?></em></p>
                                            </div>
                                        <?php endforeach; ?>
                                    <?php else: ?>
                                        <p>Chưa có bình luận nào cho sản phẩm này.</p>
                                    <?php endif; ?>

                                    <!-- Form thêm bình luận và đánh giá -->
                                    <h4>Thêm bình luận và đánh giá</h4>
                                    <form action="?role=user&act=add-review" method="POST">
                                        <input type="hidden" name="product_id" value="<?= htmlspecialchars($_GET['product_id']) ?>">
                                        <textarea name="comment" placeholder="Nhập bình luận của bạn" required style="width: 100%; height: 100px;"></textarea><br>
                                        <label for="rating">Đánh giá:</label>
                                        <select name="rating" id="rating" required>
                                            <option value="1">1 Sao</option>
                                            <option value="2">2 Sao</option>
                                            <option value="3">3 Sao</option>
                                            <option value="4">4 Sao</option>
                                            <option value="5">5 Sao</option>
                                        </select><br><br>
                                        <button type="submit">Gửi</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
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