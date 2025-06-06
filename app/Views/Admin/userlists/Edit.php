<!-----------------------------------------------------------------------------------
    Item Name: Carrot - Multipurpose eCommerce HTML Template.
    Author: ashishmaraviya
    Version: 2.1
    Copyright 2024
----------------------------------------------------------------------------------->
<!DOCTYPE html>
<html lang="en" dir="ltr">


<!-- Mirrored from maraviyainfotech.com/projects/carrot/carrot-v21/admin-html/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 06 Nov 2024 15:41:02 GMT -->
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="keywords" content="admin, dashboard, ecommerce, panel" />
	<meta name="description" content="Carrot - Admin.">
	<meta name="author" content="ashishmaraviya">

	<title>Carrot - Admin.</title>

	<!-- App favicon -->
	<link rel="shortcut icon" href="assets/Admin/img/favicon/favicon.ico">

	<!-- Icon CSS -->
	<link href="assets/Admin/css/vendor/materialdesignicons.min.css" rel="stylesheet">
	<link href="assets/Admin/css/vendor/remixicon.css" rel="stylesheet">
	<link href="assets/Admin/css/vendor/owl.carousel.min.css" rel="stylesheet">

	<!-- Vendor CSS -->
	<link href='assets/Admin/css/vendor/datatables.bootstrap5.min.css' rel='stylesheet'>
	<link href='assets/Admin/css/vendor/responsive.datatables.min.css' rel='stylesheet'>
	<link href='assets/Admin/css/vendor/daterangepicker.css' rel='stylesheet'>
	<link href="assets/Admin/css/vendor/simplebar.css" rel="stylesheet">
	<link href="assets/Admin/css/vendor/bootstrap.min.css" rel="stylesheet">
	<link href="assets/Admin/css/vendor/apexcharts.css" rel="stylesheet">
	<link href="assets/Admin/css/vendor/jquery-jvectormap-1.2.2.css" rel="stylesheet">

	<!-- Main CSS -->
	<link id="main-css" href="assets/Admin/css/style.css" rel="stylesheet">

</head>

<body>
	<main class="wrapper sb-default ecom">
		<!-- Loader -->
		<div id="cr-overlay">
			<div class="loader"></div>
		</div>

		<!-- Header -->
		<?php include 'app/Views/Admin/layouts/header.php' ?>

		<!-- sidebar -->
		<?php include 'app/Views/Admin/layouts/side-bar.php' ?>
          <div class="cr-main-content">
    <div class="container-fluid">
        <!-- Page title & breadcrumb -->
        <div class="cr-page-title cr-page-title-2">
            <div class="cr-breadcrumb">
                <h5>Sửa người dùng</h5>
                <ul>
                    <li><a href="index.html">Carrot</a></li>
                    <li>Edit User</li>
                </ul>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="cr-card card-default">
                    <div class="cr-card-content">
                        <div class="row cr-product-uploads">
                            <div class="col-lg-14">
                                <div class="cr-vendor-upload-detail">
                                    <form action="<?= BASE_URL ?>?role=admin&act=list-post-edit&id=<?= htmlspecialchars($_GET['id'] ?? '') ?>" method="post" enctype="multipart/form-data" class="row g-3">
                                        <input type="hidden" name="id" value="<?= htmlspecialchars($_GET['id'] ?? '') ?>">
                                        <div class="col-md-6">
                                            <label for="name" class="form-label">Tên người dùng</label>
                                            <input type="text" class="form-control" id="name" name="name" value="<?= htmlspecialchars($user->name ?? '') ?>" placeholder="Tên người dùng">
                                        </div>
                                        <div class="col-md-6">
                                            <label for="email" class="form-label">Email</label>
                                            <input type="email" class="form-control" id="email" name="email" value="<?= htmlspecialchars($user->email ?? '') ?>" placeholder="Email" readonly>
                                        </div>
                                        <div class="col-md-6">
                                            <label for="phone" class="form-label">Phone</label>
                                            <input type="text" class="form-control" id="phone" name="phone" value="<?= htmlspecialchars($user->phone ?? '') ?>" placeholder="Phone (10 digits)" pattern="\d{10}" maxlength="10" required>
                                        </div>
                                        <div class="col-md-6">
                                            <label class="form-label">Vai trò</label>
                                            <select name="role" id="role" class="form-control">
                                                <option value="admin" <?= isset($user->role) && $user->role === 'admin' ? 'selected' : '' ?>>Admin</option>
                                                <option value="user" <?= isset($user->role) && $user->role === 'user' ? 'selected' : '' ?>>User</option>
                                            </select>
                                        </div>
                                        <div class="col-md-6">
                                            <label class="form-label">Giới tính</label>
                                            <select name="gender" id="gender" class="form-control">
                                                <option value="male" <?= isset($user->gender) && $user->gender === 'male' ? 'selected' : '' ?>>Nam</option>
                                                <option value="female" <?= isset($user->gender) && $user->gender === 'female' ? 'selected' : '' ?>>Nữ</option>
                                                <option value="unknown" <?= isset($user->gender) && $user->gender === 'unknown' ? 'selected' : '' ?>>Không xác định</option>
                                            </select>
                                        </div>
                                        <div class="col-md-6">
                                            <label for="password" class="form-label">Mật khẩu mới (không bắt buộc)</label>
                                            <input type="password" class="form-control" id="password" name="password" placeholder="Nhập mật khẩu mới nếu muốn thay đổi">
                                        </div>
                                        <div class="col-md-12">
                                            <button type="submit" class="btn cr-btn-primary">Cập nhật</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

		

	
		
	</main>

	<!-- Vendor Custom -->
	<script src="assets/Admin/js/vendor/jquery-3.6.4.min.js"></script>
	<script src="assets/Admin/js/vendor/simplebar.min.js"></script>
	<script src="assets/Admin/js/vendor/bootstrap.bundle.min.js"></script>
	<script src="assets/Admin/js/vendor/apexcharts.min.js"></script>
	<script src="assets/Admin/js/vendor/jquery-jvectormap-1.2.2.min.js"></script>
	<script src="assets/Admin/js/vendor/jquery-jvectormap-world-mill-en.js"></script>
	<script src="assets/Admin/js/vendor/owl.carousel.min.js"></script>
	<!-- Data Tables -->
	<script src='assets/Admin/js/vendor/jquery.datatables.min.js'></script>
	<script src='assets/Admin/js/vendor/datatables.bootstrap5.min.js'></script>
	<script src='assets/Admin/js/vendor/datatables.responsive.min.js'></script>
	<!-- Caleddar -->
	<script src="assets/Admin/js/vendor/jquery.simple-calendar.js"></script>
	<!-- Date Range Picker -->
	<script src="assets/Admin/js/vendor/moment.min.js"></script>
	<script src="assets/Admin/js/vendor/daterangepicker.js"></script>
	<script src="assets/Admin/js/vendor/date-range.js"></script>

	<!-- Main Custom -->
	<script src="assets/Admin/js/main.js"></script>
	<script src="assets/Admin/js/data/ecommerce-chart-data.js"></script>
</body>


<!-- Mirrored from maraviyainfotech.com/projects/carrot/carrot-v21/admin-html/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 06 Nov 2024 15:41:34 GMT -->
</html>
