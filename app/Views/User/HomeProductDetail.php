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
                                <div aria-live="polite" class="slick-list draggable"><div class="slick-track" role="listbox" style="opacity: 1; width: 3328px;"><div class="slider-banner-image slick-slide slick-current slick-active" data-slick-index="0" aria-hidden="false" tabindex="-1" role="option" aria-describedby="slick-slide00" style="width: 416px; position: relative; left: 0px; top: 0px; z-index: 999; opacity: 1;">
                                    <div class="zoom-image-hover" style="position: relative; overflow: hidden;">
                                        <img src="<?=$productDetailList->image?>" alt="product-tab-1" class="product-image">
                                    <img role="presentation" alt="" src="file:///D:/xam/htdocs/baseduan1/frontend/projects/carrot/carrot-v21/carrot-html/assets/img/product/9.jpg" class="zoomImg" style="position: absolute; top: -37.5962px; left: -104.65px; opacity: 0; width: 600px; height: 600px; border: none; max-width: none; max-height: none;"></div>
                                </div> 
                              </div>
                            </div>
                          </div>
                            <div class="slider slider-nav thumb-image slick-initialized slick-slider">
                                <div aria-live="polite" class="slick-list draggable"><div class="slick-track" role="listbox" style="opacity: 1; width: 1548px; transform: translate3d(-430px, 0px, 0px);"><div class="thumbnail-image slick-slide slick-cloned" data-slick-index="-5" id="" aria-hidden="true" tabindex="-1" style="width: 86px;">
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
                        <h2 class="heading"><?=$productDetailList->name?></h2>
                    </div>
                    <div class="cr-size-and-weight">
                        <div class="list">
                            <ul>
                                <li><label>Brand <span>:</span></label>Carrot</li>
                                <li><label>Stock <span>:</span></label><?=$productDetailList->stock?></li>
                                <li><label>Info <span>:</span></label>Độc quyền tại Carrot</li>
                            </ul>
                        </div>
                        <div class="cr-product-price">
                            <span class="new-price"><?=$productDetailList->price?></span>
                        </div>
                        <div class="cr-add-card">
                            <div class="cr-qty-main">
                                <input type="text" placeholder="." value="1" minlength="1" maxlength="20" class="quantity">
                                <button type="button" class="plus">+</button>
                                <button type="button" class="minus">-</button>
                            </div>
                            <div class="cr-add-button">
                                <button type="button" class="cr-button cr-shopping-bag">Add to cart</button>
                            </div>
                        </div>
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
                                <button class="nav-link" id="additional-tab" data-bs-toggle="tab" data-bs-target="#additional" type="button" role="tab" aria-controls="additional" aria-selected="false" tabindex="-1">Rating</button>
                            </li>
                            <li class="nav-item" role="presentation">
                                <button class="nav-link" id="review-tab" data-bs-toggle="tab" data-bs-target="#review" type="button" role="tab" aria-controls="review" aria-selected="false" tabindex="-1">Review</button>
                            </li>
                        </ul>
                        <div class="tab-content" id="myTabContent">
                            <div class="tab-pane fade show active" id="description" role="tabpanel" aria-labelledby="description-tab">
                                <div class="cr-tab-content">
                                    <div class="cr-description">
                                        <p><?=$productDetailList->description?><p>
                                    </div>
                                </div>
                            </div>
                            <!-- đánh giá -->
                            <div class="tab-pane fade" id="additional" role="tabpanel" aria-labelledby="additional-tab">
                                
                            </div>
                            <div class="tab-pane fade" id="review" role="tabpanel" aria-labelledby="review-tab">
                                <div class="cr-tab-content-from">
                                    <div class="post">
                                        <div class="content">
                                            <img src="assets/img/review/1.jpg" alt="review">
                                            <div class="details">
                                                <span class="date">Jan 08, 2024</span>
                                                <span class="name">Oreo Noman</span>
                                            </div>
                                        </div>
                                        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Error in vero
                                            sapiente doloribus debitis corporis, eaque dicta, repellat amet, illum
                                            adipisci vel
                                            perferendis dolor! quae vero in perferendis provident quis.</p>
                                    </div>
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