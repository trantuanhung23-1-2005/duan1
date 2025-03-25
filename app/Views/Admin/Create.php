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

    <div class="d-flex">
        <!-- Sidebar -->
        <?php include 'app/Views/Admin/layouts/side-bar.php' ?>

        <!-- Main Content -->
        <div class="content flex-grow-1 d-flex align-items-center justify-content-center p-4" style="min-height: 100vh; overflow: auto;">
            <div class="container">
                <h2 class="mb-4 text-center">➕ Thêm Người Dùng</h2>
                <div class="row justify-content-center">
                    <div class="col-md-6 col-lg-5">
                        <form action="?role=admin&act=store" method="POST" class="border p-4 shadow rounded bg-white" style="max-width: 500px; margin: auto;">
                            
                            <div class="mb-3">
                                <label class="form-label fw-bold">Tên:</label>
                                <input type="text" name="name" class="form-control" placeholder="Nhập tên" required>
                            </div>

                            <div class="mb-3">
                                <label class="form-label fw-bold">Email:</label>
                                <input type="email" name="email" class="form-control" placeholder="Nhập email" required>
                            </div>

                            <div class="mb-3">
                                <label class="form-label fw-bold">Mật khẩu:</label>
                                <input type="password" name="password" class="form-control" placeholder="Nhập mật khẩu" required>
                            </div>

                            <div class="mb-3">
                                <label class="form-label fw-bold">Vai trò:</label>
                                <select name="role" class="form-select">
                                    <option value="user">User</option>
                                    <option value="admin">Admin</option>
                                </select>
                            </div>

                            <div class="mb-3">
                                <label class="form-label fw-bold">Giới tính:</label>
                                <select name="gender" class="form-select">
                                    <option value="male">Nam</option>
                                    <option value="female">Nữ</option>
                                </select>
                            </div>

                            <div class="text-center">
                                <button type="submit" class="btn btn-success w-100">
                                    <i class="bi bi-check-circle"></i> Lưu
                                </button>
                                <a href="index.php?role=user&act=list" class="btn btn-secondary w-100 mt-2">
                                    <i class="bi bi-arrow-left"></i> Quay lại
                                </a>
                            </div>

                        </form>
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