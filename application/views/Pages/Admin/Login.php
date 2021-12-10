<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Login - Mazer Admin Dashboard</title>
	<link href="https://fonts.googleapis.com/css2?family=Nunito:wght@300;400;600;700;800&display=swap" rel="stylesheet">
	<link rel="stylesheet" href="<?= base_url() ?>assets/css/bootstrap.css">
	<link rel="stylesheet" href="<?= base_url() ?>assets/vendors/bootstrap-icons/bootstrap-icons.css">
	<link rel="stylesheet" href="<?= base_url() ?>assets/css/app.css">
	<link rel="stylesheet" href="<?= base_url() ?>assets/css/pages/auth.css">
</head>

<body>
	<div id="auth">

		<div class="row h-100">
			<div class="col-lg-5 col-12 mx-auto">
				<div id="auth-left">
					<?php
					if ($this->session->flashdata("pesan") !== null) { ?>
						<div class="alert alert-danger alert-dismissible show fade">
							<?=$this->session->flashdata("pesan")?>
						</div>
					<?php }
					?>
					<div class="text-center">
						<img width="150" src="<?= base_url() ?>assets/images/logo/logo.png" alt="Logo">
					</div>

					<div class="d-flex justify-content-center flex-column align-items-center mb-4">
						<h4 class="text-center">LOGIN</h1>
							<h3>Polres Cianjur</h1>
					</div>

					<form action="<?= base_url('admin/login/store') ?>" method="POST">
						<div class="form-group position-relative has-icon-left mb-4">
							<input type="text" name="username" class="form-control form-control-xl" placeholder="Username">
							<div class="form-control-icon">
								<i class="bi bi-person"></i>
							</div>
						</div>
						<div class="form-group position-relative has-icon-left mb-4">
							<input type="password" name="password" class="form-control form-control-xl" placeholder="Password">
							<div class="form-control-icon">
								<i class="bi bi-shield-lock"></i>
							</div>
						</div>

						<button class="btn btn-primary btn-block btn-lg shadow-lg mt-2">Masuk</button>
					</form>

				</div>
			</div>

		</div>

	</div>
</body>

</html>
