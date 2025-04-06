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
		<!-- Main content -->
        <div class="cr-main-content">
			<div class="container-fluid">
				<div class="row">
					<div class="col-md-12">
						<div class="cr-card cr-invoice max-width-1170">
							<div class="cr-card-header">
								<h4 class="cr-card-title">Invoice</h4>
							</div>
							<div class="cr-card-content card-default">

								<div class="invoice-wrapper">

									<div class="row">
										<div class="col-md-6 col-lg-3 col-sm-6">
											<p class="text-dark mb-2">Order</p>
											<address>
												<span><strong>Mã đơn hàng:</strong> <?= htmlspecialchars($order['id']) ?></span>
												<br><strong>Tổng tiền:</strong> <?= number_format($order['total'], 0, ',', '.') ?> VND
												<br> <span><strong>Trạng thái:</strong></span><?= htmlspecialchars(ucfirst($order['status'])) ?>
												<br> <span><strong>Ngày tạo:</strong></span> <?= htmlspecialchars($order['created_at']) ?>
											</address>
										</div>
										<div class="col-md-6 col-lg-3 col-sm-6">
											<p class="text-dark mb-2">User</p>
											<address>
												<span><strong>Tên người nhận:</strong> <?= htmlspecialchars($order['name']) ?></span>
												<br><strong>Địa chỉ:</strong> <?= htmlspecialchars($order['address']) ?>
												<br> <span><strong>Số điện thoại:</strong></span>  <?= htmlspecialchars($order['phone']) ?>
                                                <br> <span><strong>Ghi chú:</strong> </span><?= htmlspecialchars($order['notes'] ?? 'Không có') ?>
											</address>
										</div>
									</div>
									
									<div class="table-responsive tbl-800">
										<div>
											<table class="table-invoice table-striped" style="width:100%">
												<thead>
													<tr>
														<th>Sản phẩm</th>
														<th>Hình ảnh</th>
														<th>Quantity</th>
														<th>Giá</th>
														<th>Tổng</th>
													</tr>
												</thead>

												<tbody>
                                                <?php foreach ($orderDetails as $detail): ?>
													<tr>
                                                        <td><?= htmlspecialchars($detail['product_name']) ?></td>
														<td><img class="invoice-item-img" src="<?= htmlspecialchars($detail['product_image']) ?>" alt="<?= htmlspecialchars($detail['product_name']) ?>" width="50"></td>
														<td><?= htmlspecialchars($detail['quantity']) ?></td>
														<td><?= number_format($detail['price'], 0, ',', '.') ?> VND</td>
														<td><?= number_format($detail['price'] * $detail['quantity'], 0, ',', '.') ?> VND</td>
													</tr>
                                                    <?php endforeach; ?>
												</tbody>
											</table>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		<!-- Footer -->
		

		<!-- Feature tools -->
		
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
	<!-- <script src='assets/Admin/js/vendor/jquery.datatables.min.js'></script>
	<script src='assets/Admin/js/vendor/datatables.bootstrap5.min.js'></script> -->
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

