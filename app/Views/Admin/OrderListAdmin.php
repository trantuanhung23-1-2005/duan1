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
				<!-- Page title & breadcrumb -->
				<div class="cr-page-title cr-page-title-2">
					<div class="cr-breadcrumb">
						<h5>Order List</h5>
						<ul>
							<li><a href="index.html">Carrot</a></li>
							<li>Order List</li>
						</ul>
					</div>
				</div>
				<div class="row">
					<div class="col-md-12">
						<div class="cr-card" id="ordertbl">
							<div class="cr-card-header">
								<h4 class="cr-card-title">Recent Orders</h4>
								<div class="header-tools">
									<a href="javascript:void(0)" class="m-r-10 cr-full-card"><i class="ri-fullscreen-line"></i></a>
									<div class="cr-date-range dots">
										<span><a href="javascript:void(0)" class="calendar" data-bs-toggle="tooltip" aria-label="Date" data-bs-original-title="Date"><i class="ri-equalizer-line"></i></a></span>
									</div>
								</div>
							</div>
							<div class="cr-card-content card-default">
								<div class="order-table">
									<div class="table-responsive tbl-1200">
										<div id="recent_order_wrapper" class="dataTables_wrapper dt-bootstrap5 no-footer">
                                        <table id="recent_order" class="table dataTable no-footer" aria-describedby="recent_order_info">
											<thead>
												<tr>
                                                    <th class="sorting sorting_asc" tabindex="0" aria-controls="recent_order" rowspan="1" colspan="1" aria-sort="ascending" aria-label="ID: activate to sort column descending" style="width: 36.9125px;">ID</th>
                                                    <th class="sorting" tabindex="0" aria-controls="recent_order" rowspan="1" colspan="1" aria-label="Customer: activate to sort column ascending" style="width: 87.2125px;">Customer</th>
                                                    <th class="sorting" tabindex="0" aria-controls="recent_order" rowspan="1" colspan="1" aria-label="Amount: activate to sort column ascending" style="width: 65.7875px;">Total</th>
                                                    <th class="sorting" tabindex="0" aria-controls="recent_order" rowspan="1" colspan="1" aria-label="Status: activate to sort column ascending" style="width: 53.35px;">Status</th>
                                                    <th class="sorting" tabindex="0" aria-controls="recent_order" rowspan="1" colspan="1" aria-label="Status: activate to sort column ascending" style="width: 53.35px;">Created_At</th>
                                                    <th class="sorting" tabindex="0" aria-controls="recent_order" rowspan="1" colspan="1" aria-label="Status: activate to sort column ascending" style="width: 53.35px;">Action</th>
                                                </tr>
											</thead>
											<tbody>
                                            <?php foreach ($orders as $order): ?>
												<tr class="odd">
													<td class="token sorting_1"><?= htmlspecialchars($order['id']) ?></td>
													<td><?= htmlspecialchars($order['name']) ?></td>
													<td><?= number_format($order['total'], 0, ',', '.') ?> VND</td>
													<td class="cod">
                                                    <?php if ($order['status'] === 'completed' || $order['status'] === 'cancelled'): ?>
                                                        <?= ucfirst(htmlspecialchars($order['status'])) ?>
                                                    <?php else: ?>
                                                        <form action="?role=admin&act=update-order-status" method="POST">
                                                            <input type="hidden" name="order_id" value="<?= $order['id'] ?>">
                                                            <select name="status" onchange="this.form.submit()">
                                                                <option value="pending" <?= $order['status'] === 'pending' ? 'selected' : '' ?>>Pending</option>
                                                                <option value="completed" <?= $order['status'] === 'completed' ? 'selected' : '' ?>>Completed</option>
                                                                <option value="cancelled" <?= $order['status'] === 'cancelled' ? 'selected' : '' ?>>Cancelled</option>
                                                            </select>
                                                        </form>
                                                    <?php endif; ?>
                                                    </td>
                                                    <td><?= htmlspecialchars($order['created_at']) ?></td>
                                                        <td>
                                                            <a href="?role=admin&act=view-order_details&order_id=<?= $order['id'] ?>">Xem chi tiết</a>
                                                        </td>
												</tr>
                                            <?php endforeach; ?>
                                            </tbody>
										</table>
                                    </div>
                                    <div class="clear">
                                    </div></div>
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
