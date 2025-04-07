<!-- Header -->
<header>
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="top-header">
                    <a href="index.html" class="cr-logo">
                        <img src="assets/User/img/logo/logo.png" alt="logo" class="logo">
                        <img src="assets/User/img/logo/dark-logo.png" alt="logo" class="dark-logo">
                    </a>
                    <form class="cr-search">
                        <input class="search-input" type="text" placeholder="Search For items...">
                        <select class="form-select" aria-label="Default select example">
                            <option selected>All Categories</option>
                            <option value="1">Mens</option>
                            <option value="2">Womens</option>
                            <option value="3">Electronics</option>
                        </select>
                        <a href="javascript:void(0)" class="search-btn">
                            <i class="ri-search-line"></i>
                        </a>
                    </form>
                    <div class="cr-right-bar">
                        <ul class="navbar-nav">
                            <?php if (!empty($_SESSION['users'])): ?>
                                <li class="nav-item dropdown">
                                    <a class="nav-link dropdown-toggle cr-right-bar-item" href="javascript:void(0)">
                                        <i class="ri-user-3-line"></i>
                                        <span><?= htmlspecialchars($_SESSION['users']['name'] ?? 'User') ?></span>
                                    </a>
                                    <ul class="dropdown-menu">
                                        <li><a class="dropdown-item" href="#">Action</a></li>
                                        <li><a class="dropdown-item" href="#">Another action</a></li>
                                        <li><a class="dropdown-item" href="<?= BASE_URL ?>?role=admin&act=logout">Logout</a></li>
                                    </ul>
                                </li>
                            <?php else: ?>
                                <li class="nav-item dropdown">
                                    <a class="nav-link dropdown-toggle cr-right-bar-item" href="javascript:void(0)">
                                        <i class="ri-user-3-line"></i>
                                        <span>Account</span>
                                    </a>
                                    <ul class="dropdown-menu">
                                        <li><a class="dropdown-item" href="<?= BASE_URL ?>?role=admin&act=register">Register</a></li>
                                        <li><a class="dropdown-item" href="">Checkout</a></li>
                                        <li><a class="dropdown-item" href="<?= BASE_URL ?>?role&act=login">Login</a></li>
                                    </ul>
                                </li>
                            <?php endif; ?>
                        </ul>
                        <a href="<?=BASE_URL?>?act=list-orders" style="padding:10px">
                            <i class="ri-shopping-cart-line"></i>
                            <span>Order</span>
                        </a>
                    </div>
                </div>
            </div>
        </div>
        <div class="cr-fix" id="cr-main-menu-desk">
            <div class="container">
                <div class="cr-menu-list">
                    <nav class="navbar navbar-expand-lg">
                        <a href="javascript:void(0)" class="navbar-toggler shadow-none">
                            <i class="ri-menu-3-line"></i>
                        </a>
                        <div class="cr-header-buttons">
                            <ul class="navbar-nav">
                                <li class="nav-item dropdown">
                                    <a class="nav-link" href="javascript:void(0)">
                                        <i class="ri-user-3-line"></i>
                                    </a>
                                    <ul class="dropdown-menu">
                                        <li>
                                            <a class="dropdown-item" href="<?=BASE_URL?>?role=admin&act=register">Register</a>
                                        </li>
                                        <li>
                                            <a class="dropdown-item" href="checkout.html">Checkout</a>
                                        </li>
                                        <li>
                                            <a class="dropdown-item" href="<?=BASE_URL?>?role=admin&act=login">Login</a>
                                        </li>
                                    </ul>
                                </li>
                            </ul>
                            <a href="wishlist.html" class="cr-right-bar-item">
                                <i class="ri-heart-line"></i>
                            </a>
                            <a href="javascript:void(0)" class="cr-right-bar-item Shopping-toggle">
                                <i class="ri-shopping-cart-line"></i>
                            </a>
                        </div>
                        <div class="collapse navbar-collapse" id="navbarSupportedContent">
                            <ul class="navbar-nav">
                                <li class="nav-item">
                                    <a class="nav-link" href="<?=BASE_URL?>?act=''">
                                        Home
                                    </a>
                                </li>
                                <li class="nav-item dropdown">
                                    <a class="nav-link dropdown-toggle" href="<?=BASE_URL?>?act=category_list">
                                        Category
                                    </a>
                                    <ul class="dropdown-menu">
                                        <li>
                                            <a class="dropdown-item" href="<?=BASE_URL?>?act=category_list">Vegetable</a>
                                        </li>
                                        <li>
                                            <a class="dropdown-item" href="<?=BASE_URL?>?act=category_list">Fruit</a>
                                        </li>
                                        <li>
                                            <a class="dropdown-item" href="<?=BASE_URL?>?act=category_list">Flower</a>
                                        </li>
                                    </ul>
                                </li>
                                <li class="nav-item dropdown">
                                    <a class="nav-link dropdown-toggle" href="<?= BASE_URL ?>?act=product-list-user">
                                        Products
                                    </a>
                                </li>
                                <li class="nav-item dropdown">
                                    <a class="nav-link dropdown-toggle" href="javascript:void(0)">
                                        Pages
                                    </a>
                                    <ul class="dropdown-menu">
                                        <li>
                                            <a class="dropdown-item" href="about.html">About Us</a>
                                        </li>
                                        <li>
                                            <a class="dropdown-item" href="contact-us.html">Contact Us</a>
                                        </li>
                                        <li>
                                            <a class="dropdown-item" href="cart.html">Cart</a>
                                        </li>
                                        <li>
                                            <a class="dropdown-item" href="checkout.html">Checkout</a>
                                        </li>
                                        <li>
                                            <a class="dropdown-item" href="track-order.html">Track Order</a>
                                        </li>
                                        <li>
                                            <a class="dropdown-item" href="wishlist.html">Wishlist</a>
                                        </li>
                                        <li>
                                            <a class="dropdown-item" href="faq.html">Faq</a>
                                        </li>
                                        <li>
                                            <a class="dropdown-item" href="login.html">Login</a>
                                        </li>
                                        <li>
                                            <a class="dropdown-item" href="register.html">Register</a>
                                        </li>
                                        <li>
                                            <a class="dropdown-item" href="policy.html">Policy</a>
                                        </li>
                                    </ul>
                                </li>
                            </ul>
                        </div>
                    </nav>
                    <div class="cr-calling">
                        <i class="ri-phone-line"></i>
                        <a href="javascript:void(0)">+123 ( 456 ) ( 7890 )</a>
                    </div>
                </div>
            </div>
        </div>
    </header>