<header class="cr-header">
			<div class="container-fluid">
				<div class="cr-header-items">
					<div class="left-header">
						<a href="javascript:void(0)" class="cr-toggle-sidebar">
							<span class="outer-ring">
								<span class="inner-ring"></span>
							</span>
						</a>
						<div class="header-search-box">
							<div class="header-search-drop">
								<a href="javascript:void(0)" class="open-search"><i class="ri-search-line"></i></a>
								<form class="cr-search">
									<input class="search-input" type="text" placeholder="Search...">
									<a href="javascript:void(0)" class="search-btn"><i class="ri-search-line"></i>
									</a>
								</form>
							</div>
						</div>
					</div>
					<div class="right-header">
						<div class="cr-right-tool cr-flag-drop language">
							
						</div>
						<div class="cr-right-tool apps">
							<div class="cr-hover-drop">
								<div class="cr-hover-tool">
									<i class="ri-apps-2-line"></i>
								</div>
								<div class="cr-hover-drop-panel right">
									<h6 class="title">Apps</h6>
									<ul>
										<li><a href="javascript:void(0)"><img class="app" src="assets/Admin/img/apps/1.png"
													alt="flag">English</a></li>
										<li><a href="javascript:void(0)"><img class="app" src="assets/Admin/img/apps/2.png"
													alt="flag">Hindi</a></li>
										<li><a href="javascript:void(0)"><img class="app" src="assets/Admin/img/apps/3.png"
													alt="flag"> Deutsch</a></li>
										<li><a href="javascript:void(0)"><img class="app" src="assets/Admin/img/apps/4.png"
													alt="flag">Italian</a></li>
										<li><a href="javascript:void(0)"><img class="app" src="assets/Admin/img/apps/5.png"
													alt="flag">Japanese</a></li>
										<li><a href="javascript:void(0)"><img class="app" src="assets/Admin/img/apps/6.png"
													alt="flag">Japanese</a></li>
									</ul>
								</div>
							</div>
						</div>
						<div class="cr-right-tool display-screen">
							<a class="cr-screen full" href="javascript:void(0)"><i
									class="ri-fullscreen-line"></i></a>
							<a class="cr-screen reset" href="javascript:void(0)"><i
									class="ri-fullscreen-exit-line"></i></a>
						</div>
						
						<div class="cr-right-tool display-dark">
							<a class="cr-mode dark" href="javascript:void(0)"><i class="ri-moon-clear-line"></i></a>
							<a class="cr-mode light" href="javascript:void(0)"><i class="ri-sun-line"></i></a>
						</div>
						<div class="cr-right-tool cr-user-drop">
							<div class="cr-hover-drop">
								<div class="cr-hover-tool">
									<?php if (!empty($_SESSION['users'])): ?>
										<img class="user" src="assets/Admin/img/user/1.jpg" alt="user">
									<?php else: ?>
										<i class="ri-user-line"></i>
									<?php endif; ?>
								</div>
								<div class="cr-hover-drop-panel right">
									<?php if (!empty($_SESSION['users'])): ?>
										<div class="details">
											<h6><?= htmlspecialchars($_SESSION['users']['name'] ?? 'User') ?></h6>
											<p><?= htmlspecialchars($_SESSION['users']['email'] ?? 'user@example.com') ?></p>
										</div>
										<ul class="border-top">
											<li><a href="team-profile.html">Profile</a></li>
											<li><a href="faq.html">Help</a></li>
											<li><a href="chatapp.html">Messages</a></li>
											<li><a href="project-overview.html">Projects</a></li>
											<li><a href="team-update.html">Settings</a></li>
										</ul>
										<ul class="border-top">
											<li><a href="?role=admin&act=login"><i class="ri-logout-circle-r-line"></i>Logout</a></li>
										</ul>
									<?php else: ?>
										<ul class="border-top">
											<li><a href="<?= BASE_URL ?>?act=login"><i class="ri-login-circle-line"></i>Login</a></li>
										</ul>
									<?php endif; ?>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</header>