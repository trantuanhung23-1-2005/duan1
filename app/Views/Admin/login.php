<!DOCTYPE html>
<html lang="en" dir="ltr">


<!-- Mirrored from maraviyainfotech.com/projects/carrot/carrot-v21/admin-html/signin.html by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 06 Nov 2024 15:41:49 GMT -->
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

	<!-- Vendor CSS -->
	<link href='assets/Admin/css/vendor/datatables.bootstrap5.min.css' rel='stylesheet'>
	<link href='assets/Admin/css/vendor/responsive.datatables.min.css' rel='stylesheet'>
	<link href='assets/Admin/css/vendor/daterangepicker.css' rel='stylesheet'>
	<link href="assets/Admin/css/vendor/simplebar.css" rel="stylesheet">
	<link href="assets/Admin/css/vendor/bootstrap.min.css" rel="stylesheet">
	<link href="assets/Admin/css/vendor/apexcharts.css" rel="stylesheet">
	<link href="assets/Admin/css/vendor/jquery-jvectormap-1.2.2.css" rel="stylesheet">

	<!-- Main CSS -->
	<link id="main-css" href="assets/css/style.css" rel="stylesheet">

</head>

<body>
	<main class="wrapper sb-default">
		<section class="auth-section anim">
			<div class="cr-login-page">
				<div class="container-fluid no-gutters">
					<div class="row">
						<div class="offset-lg-6 col-lg-6">
							<div class="content-detail">
								<div class="main-info">
									<div class="hero-container">
										<!-- Login form -->
										  <form action="<?= BASE_URL ?>?role=admin&act=post-login" method="post" enctype="multipart/form-data" class="row g-3">
											<div class="imgcontainer">
												<a href="index.html"><img src="assets/Admin/img/logo/full-logo.png" alt="logo" class="logo"></a>
											</div>
											 <?php if (isset($_SESSION['success'])): ?>
                                                <div class="alert alert-success"><?php echo htmlspecialchars($_SESSION['success']); unset($_SESSION['success']); ?></div>
                                            <?php endif; ?>
                                            <?php if (isset($_SESSION['error'])): ?>
                                                <div class="alert alert-danger"><?php echo htmlspecialchars($_SESSION['error']); unset($_SESSION['error']); ?></div>
                                            <?php endif; ?>
                                        <div class="mb-3">
                                            <label for="email" class="form-label">Email:</label>
                                            <input type="email" id="email" name="email" class="form-control" required>
                                        </div>
                                        <div class="mb-3">
                                            <label for="password" class="form-label">Password:</label>
                                            <input type="password" id="password" name="password" class="form-control" required>
                                        </div>
												<div class="login-btns">
													<button type="submit">Login</button>
												</div>
												<div class="division-lines">
													<p>or login with</p>
												</div>
												<div class="login-with-btns">
													<button type="button" class="google">
														<i class="ri-google-fill"></i>
													</button>
													<button type="button" class="facebook">
														<i class="ri-facebook-fill"></i>
													</button>
													<button type="button" class="twitter">
														<i class="ri-twitter-fill"></i>
													</button>
													<button type="button" class="linkedin">
														<i class="ri-linkedin-fill"></i>
													</button>
													<span class="already-acc">Not a member? <a href="<?= BASE_URL ?>?role=admin&act=register" class="signup-btn">Sign up</a></span>
															
												</div>
											</div>
										</form>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</section>
	</main>

	<!-- Vendor Custom -->
	<script src="assets/Admin/js/vendor/jquery-3.6.4.min.js"></script>
	<script src="assets/Admin/js/vendor/simplebar.min.js"></script>
	<script src="assets/Admin/js/vendor/bootstrap.bundle.min.js"></script>
	<script src="assets/Admin/js/vendor/apexcharts.min.js"></script>
	<script src="assets/Admin/js/vendor/jquery-jvectormap-1.2.2.min.js"></script>
	<script src="assets/Admin/js/vendor/jquery-jvectormap-world-mill-en.js"></script>
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
</body>


<!-- Mirrored from maraviyainfotech.com/projects/carrot/carrot-v21/admin-html/signin.html by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 06 Nov 2024 15:41:49 GMT -->
</html>