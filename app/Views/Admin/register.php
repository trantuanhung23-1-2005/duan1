<!DOCTYPE html>
<html lang="en" dir="ltr">


<!-- Mirrored from maraviyainfotech.com/projects/carrot/carrot-v21/admin-html/signup.html by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 06 Nov 2024 15:41:52 GMT -->
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
	<link href="assets/Admin/css/materialdesignicons.min.css" rel="stylesheet">
	<link href="assets/Admin/css/remixicon.css" rel="stylesheet">

	<!-- Vendor CSS -->
	<link href='assets/Admin/css/datatables.bootstrap5.min.css' rel='stylesheet'>
	<link href='assets/Admin/css/responsive.datatables.min.css' rel='stylesheet'>
	<link href='assets/Admin/css/daterangepicker.css' rel='stylesheet'>
	<link href="assets/Admin/css/simplebar.css" rel="stylesheet">
	<link href="assets/Admin/css/bootstrap.min.css" rel="stylesheet">
	<link href="assets/Admin/css/apexcharts.css" rel="stylesheet">
	<link href="assets/Admin/css/jquery-jvectormap-1.2.2.css" rel="stylesheet">

	<!-- Main CSS -->
	<link id="main-css" href="assets/Admin/css/style.css" rel="stylesheet">

</head>

<body>
	<main class="wrapper sb-default">
		<section class="auth-section anim">
			<div class="cr-login-page">
				<div class="container-fluid">
					<div class="row justify-content-end">
						<div class="col-lg-6">
							<div class="content-detail form-shift-right">
								<div class="main-info">
									<div class="hero-container">
										<?php
										// Generate CSRF token
										if (empty($_SESSION['csrf_token'])) {
											$_SESSION['csrf_token'] = bin2hex(random_bytes(32));
										}
										?>
										<?php if (isset($_SESSION['error'])): ?>
											<div class="alert alert-danger">
												<?php echo htmlspecialchars($_SESSION['error']); unset($_SESSION['error']); ?>
											</div>
										<?php endif; ?>
										<?php if (isset($_SESSION['success'])): ?>
											<div class="alert alert-success">
												<?php echo htmlspecialchars($_SESSION['success']); unset($_SESSION['success']); ?>
											</div>
										<?php endif; ?>
										<!-- Signup form -->
										<form class="signup-form" action="<?php echo BASE_URL; ?>?role=admin&act=postRegister" method="POST">
											<input type="hidden" name="csrf_token" value="<?php echo htmlspecialchars($_SESSION['csrf_token']); ?>">
											<div class="imgcontainer">
												<a href="index.html"><img src="assets/Admin/img/logo/full-logo.png" alt="logo" class="logo"></a>
											</div>
											<div class="input-control">
												<div class="row p-3">
													<div class="col-md-6 mb-3">
														<input type="text" class="form-control" placeholder="Enter Full Name" name="name" required>
														<?php if (isset($errors['name'])): ?>
															<small class="text-danger"><?php echo htmlspecialchars($errors['name']); ?></small>
														<?php endif; ?>
													</div>
													<div class="col-md-6 mb-3">
														<input type="email" class="form-control" placeholder="Enter Email" name="email" required>
														<?php if (isset($errors['email'])): ?>
															<small class="text-danger"><?php echo htmlspecialchars($errors['email']); ?></small>
														<?php endif; ?>
													</div>
													<div class="col-md-6 mb-3">
														<input type="password" class="form-control" placeholder="Enter Password" name="password" required>
														<?php if (isset($errors['password'])): ?>
															<small class="text-danger"><?php echo htmlspecialchars($errors['password']); ?></small>
														<?php endif; ?>
													</div>
													<div class="col-md-6 mb-3">
														<input type="password" class="form-control" placeholder="Re-enter Password" name="confirm_password" required>
														<?php if (isset($errors['confirm_password'])): ?>
															<small class="text-danger"><?php echo htmlspecialchars($errors['confirm_password']); ?></small>
														<?php endif; ?>
													</div>
													<div class="col-md-6 mb-3">
														<input type="text" class="form-control" placeholder="Enter Phone Number" name="phone" required>
														<?php if (isset($errors['phone'])): ?>
															<small class="text-danger"><?php echo htmlspecialchars($errors['phone']); ?></small>
														<?php endif; ?>
													</div>
												</div>
												<label class="form-check-label">
													<input type="checkbox" class="form-check-input" required> I agree with <a href="#">privacy policy</a>
												</label>
												<div class="login-btns mt-3">
													<button type="submit" class="btn btn-primary">Sign up</button>
												</div>
												<div class="division-lines mt-3">
													<p>or signup with</p>
												</div>
												<div class="login-with-btns">
													<button type="button" class="btn btn-light"><i class="ri-google-fill"></i></button>
													<button type="button" class="btn btn-light"><i class="ri-facebook-fill"></i></button>
													<button type="button" class="btn btn-light"><i class="ri-twitter-fill"></i></button>
													<button type="button" class="btn btn-light"><i class="ri-linkedin-fill"></i></button>
													<span class="already-acc">Already have an account? <a href="<?php echo BASE_URL; ?>?role=admin&act=login" class="login-btn">Login</a></span>
												</div>
											</div>
											<small id="password-strength" class="text-muted"></small>
										</form>
										<script>
											// Password strength checker
											document.querySelector('input[name="password"]').addEventListener('input', function () {
												const password = this.value;
												const strengthText = document.getElementById('password-strength');
												if (!strengthText) return;

												if (password.length < 6) {
													strengthText.textContent = 'Weak';
													strengthText.style.color = 'red';
												} else if (password.match(/[A-Z]/) && password.match(/[0-9]/)) {
													strengthText.textContent = 'Strong';
													strengthText.style.color = 'green';
												} else {
													strengthText.textContent = 'Moderate';
													strengthText.style.color = 'orange';
												}
											});
										</script>
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
	<script src="assets/Admin/js/jquery-3.6.4.min.js"></script>
	<script src="assets/Admin/js/simplebar.min.js"></script>
	<script src="assets/Admin/js/bootstrap.bundle.min.js"></script>
	<script src="assets/Admin/js/apexcharts.min.js"></script>
	<script src="assets/Admin/js/jquery-jvectormap-1.2.2.min.js"></script>
	<script src="assets/Admin/js/jquery-jvectormap-world-mill-en.js"></script>
	<!-- Data Tables -->
	<script src='assets/Admin/js/jquery.datatables.min.js'></script>
	<script src='assets/Admin/js/datatables.bootstrap5.min.js'></script>
	<script src='assets/Admin/js/datatables.responsive.min.js'></script>
	<!-- Calendar -->
	<script src="assets/Admin/js/jquery.simple-calendar.js"></script>
	<!-- Date Range Picker -->
	<script src="assets/Admin/js/moment.min.js"></script>
	<script src="assets/Admin/js/daterangepicker.js"></script>
	<script src="assets/Admin/js/date-range.js"></script>

	<!-- Main Custom -->
	<script src="assets/Admin/js/main.js"></script>
</body>


<!-- Mirrored from maraviyainfotech.com/projects/carrot/carrot-v21/admin-html/signup.html by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 06 Nov 2024 15:41:52 GMT -->
</html>