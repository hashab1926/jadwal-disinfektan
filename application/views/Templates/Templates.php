<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Admin Polres Cianjur - Jadwal Disinfektan</title>

	<link rel="preconnect" href="https://fonts.gstatic.com">
	<link href="https://fonts.googleapis.com/css2?family=Nunito:wght@300;400;600;700;800&display=swap" rel="stylesheet">
	<link rel="stylesheet" href="<?= base_url() ?>assets/css/bootstrap.css">

	<link rel="stylesheet" href="<?= base_url() ?>assets/vendors/perfect-scrollbar/perfect-scrollbar.css">
	<link rel="stylesheet" href="<?= base_url() ?>assets/vendors/bootstrap-icons/bootstrap-icons.css">
	<link rel="stylesheet" href="<?= base_url() ?>assets/css/app.css">
	<link rel="stylesheet" href="<?= base_url() ?>assets/vendors/snackbar/snackbar.min.css">

	<link rel="stylesheet" href="<?= base_url() ?>assets/css/custom.css">
	<link rel="shortcut icon" href="<?= base_url() ?>assets/images/favicon.svg" type="image/x-icon">
	<script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
	<?php
	if (isset($css)) {
		foreach ($css as $list) : ?>
			<link rel="stylesheet" href="<?= $list ?>">

		<?php endforeach;
	}
	if (isset($js)) {
		foreach ($js as $list) : ?>
			<script src="<?= $list ?>" defer></script>

	<?php endforeach;
	} ?>
</head>

<body>
	<div id="app">
		<div id="sidebar" class="active">
			<div class="sidebar-wrapper active">
				<div class="px-4 pt-4">
					<div class="d-flex">
						<a href="index.html"><img src="<?= base_url() ?>assets/images/logo/logo.png" width="50" style="margin-left:10px"></a>
						<div class="d-flex flex-column" style="margin-left:10px">
							<div class="text-danger" style="font-weight:700">Polres Cianjur</div>
							<div class="text-muted" style="font-size:13px">Administrator</div>
						</div>
					</div>
					<div class="toggler">
						<a href="#" class="sidebar-hide d-xl-none d-block"><i class="bi bi-x bi-middle"></i></a>
					</div>
				</div>
				<div class="sidebar-menu">
					<ul class="menu">

						<li class="sidebar-item <?= str_contains(current_url(), "dashboard") ? 'active' : '' ?>">
							<a href="<?= base_url('admin/dashboard') ?>" class='sidebar-link d-flex align-items-center'>
								<div class="bicon bi bi-grid-fill text-4"></div>
								<div class="text-3 margin-left-5">Beranda</div>
							</a>
						</li>

						<li class="sidebar-item <?= str_contains(current_url(), "jadwal") ? 'active' : '' ?>">
							<a href="<?= base_url('admin/jadwal') ?>" class="sidebar-link d-flex align-items-center ">
								<div class="bicon bi bi-calendar-week text-4"></div>
								<div class="text-3 margin-left-5">Jadwal Disinfektan</div>
							</a>
						</li>

						<li class="sidebar-item <?= str_contains(current_url(), "laporan") ? 'active' : '' ?>">
							<a href="<?= base_url('admin/laporan') ?>" class="sidebar-link d-flex align-items-center ">
								<i class="bicon bi bi-printer text-4"></i>
								<div class="text-3 margin-left-5">Cetak Laporan</div>
							</a>
						</li>

					</ul>
				</div>
				<button class="sidebar-toggler btn x"><i data-feather="x"></i></button>
			</div>
		</div>
		<div id="main" class='layout-navbar'>
			<header>
				<nav class="navbar navbar-expand navbar-light bg-white ">
					<div class="container-fluid">
						<a href="#" class="burger-btn d-block">
							<i class="bi bi-justify fs-3"></i>
						</a>

						<button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
							<span class="navbar-toggler-icon"></span>
						</button>
						<div class="collapse navbar-collapse" id="navbarSupportedContent">
							<ul class="navbar-nav ms-auto mb-2 mb-lg-0">
							</ul>
							<div class="dropdown">
								<a href="#" data-toggle="dropdown" aria-expanded="false">
									<div class="user-menu d-flex">
										<div class="user-name text-end me-3">
											<h6 class="mb-0 text-gray-600">Hi, <?= $this->session->userdata("username") ?></h6>
											<p class="mb-0 text-sm text-gray-600">Administrator</p>
										</div>
										<div class="user-img d-flex align-items-center">
											<div class="avatar avatar-md">
												<img src="<?= base_url() ?>assets/images/faces/1.jpg">
											</div>
										</div>
									</div>
								</a>
								<ul class="dropdown-menu dropdown-menu-end" aria-labelledby="dropdownMenuButton" style="min-width: 11rem;">
									<li><a class="dropdown-item" href="<?= base_url('admin/profil-saya') ?>"><i class="icon-mid bi bi-person me-2"></i> Profil saya</a></li>
									<li><a class="dropdown-item" href="<?= base_url('admin/logout') ?>"><i class="icon-mid bi bi-box-arrow-left me-2"></i> Keluar</a></li>
								</ul>
							</div>
						</div>
					</div>
				</nav>
			</header>
			<div id="main-content" style="padding:1.5rem">
				<?php $this->load->view($page) ?>
				<footer>
					<div class="footer clearfix mb-0 text-muted">
						<div class="float-start">
							<p>2021 &copy; Polres Cianjur</p>
						</div>
					</div>
				</footer>
			</div>
		</div>
	</div>
	<script src="<?= base_url() ?>assets/vendors/perfect-scrollbar/perfect-scrollbar.min.js"></script>
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-fQybjgWLrvvRgtW6bFlB7jaZrFsaBXjsOMm/tB9LTS58ONXgqbR9W8oWht/amnpF" crossorigin="anonymous"></script>
	<script src='https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js'></script>
	<script src="<?= base_url() ?>assets/js/mazer.js"></script>
	<script src="<?= base_url() ?>assets/js/utils.js"></script>
	<script src="<?= base_url() ?>assets/vendors/snackbar/snackbar.min.js"></script>
	<script>
		<?php echo $this->session->flashdata("pesan") ?>
	</script>
</body>

</html>
