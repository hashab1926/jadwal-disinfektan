<!DOCTYPE html>
<html lang="en">

<head>

	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<meta name="description" content="">
	<meta name="author" content="">
	<title>Polres Cianjur - Jadwal Disinfektan</title>

	<!-- Bootstrap core CSS -->
	<link href="<?= base_url() ?>assets/user/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">
	<!--

TemplateMo 570 Chain App Dev
    <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

https://templatemo.com/tm-570-chain-app-dev

-->
	<link rel="stylesheet" href="<?= base_url() ?>assets/vendors/bootstrap-icons/bootstrap-icons.css">

	<link href="<?= base_url() ?>assets/user/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">


	<!-- Additional CSS Files -->
	<link rel="stylesheet" href="<?= base_url() ?>assets/user/css/templatemo-chain-app-dev.css">
	<link rel="stylesheet" href="<?= base_url() ?>assets/user/css/animated.css">
	<link rel="stylesheet" href="<?= base_url() ?>assets/user/css/owl.css">
	<style>
		.pricing-item-regular {
			padding: 30px 30px;
			border-radius: 15px;
		}

		.header-area .main-nav .logo {
			line-height: 1;
		}

		.header-area .main-nav .nav li:last-child a:hover {
			color: black;
		}
	</style>
	<script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>

</head>

<body>

	<!-- ***** Preloader Start ***** -->
	<div id="js-preloader" class="js-preloader">
		<div class="preloader-inner">
			<span class="dot"></span>
			<div class="dots">
				<span></span>
				<span></span>
				<span></span>
			</div>
		</div>
	</div>
	<!-- ***** Preloader End ***** -->

	<!-- ***** Header Area Start ***** -->
	<header class="header-area header-sticky" style="border:none">
		<div class="container">
			<div class="row">
				<div class="col-12">
					<nav class="main-nav">
						<!-- ***** Logo Start ***** -->
						<div href="index.html" class="logo d-flex mt-4">
							<img src="<?= base_url() ?>assets/images/logo/logo.png" style="width:50px;">
							<div class="d-flex flex-column" style="margin-left:10px; margin-top:2px">
								<div class="text-danger" style="font-weight:700">Polres Jawabarat</div>
								<div class="text-muted mt-2">Cianjur</div>
							</div>
						</div>
						<!-- ***** Logo End ***** -->
						<!-- ***** Menu Start ***** -->
						<ul class="nav">
							<li class="scroll-to-section"><a href="#">Beranda</a></li>
							<li class="scroll-to-sectioxn"><a href="#">Jadwal Disinfektan</a></li>
						</ul>
						<a class='menu-trigger'>
							<span>Menu</span>
						</a>
						<!-- ***** Menu End ***** -->
					</nav>
				</div>
			</div>
		</div>
	</header>
	<!-- ***** Header Area End ***** -->

	<div class=" wow fadeIn" id="top" data-wow-duration="1s" data-wow-delay="0.5s">
		<div id="pricing" class="pricing-tables">
			<div class="container">
				<div class="row">
					<div class="col-lg-8 offset-lg-2">
						<div class="section-heading" style="margin-bottom:20px">
							<h4><em>Jadwal Disinfektan</em><br />
								Bulan <?=$this->library->bulanToText($bulan)?> ini
							</h4>
							<img src="<?= base_url() ?>assets/user/images/heading-line-dec.png" alt="">
						</div>
					</div>
					<div class="row">
						<div class="col d-flex justify-content-end">
							<div class="position-relative">
								<div class="position-absolute" style="top:10px; right:10px"><i class="bi bi-caret-down" id="caret-down"></i></div>
								<select class="form-control" name="bulan" style="width:200px">
									<option <?= $bulan == "1" ? "selected" : "" ?> value="1">Januari</option>
									<option <?= $bulan == "2" ? "selected" : "" ?> value="2">Februari</option>
									<option <?= $bulan == "3" ? "selected" : "" ?> value="3">Maret</option>
									<option <?= $bulan == "4" ? "selected" : "" ?> value="4">April</option>
									<option <?= $bulan == "5" ? "selected" : "" ?> value="5">Mei</option>
									<option <?= $bulan == "6" ? "selected" : "" ?> value="6">Juni</option>
									<option <?= $bulan == "7" ? "selected" : "" ?> value="7">Juli</option>
									<option <?= $bulan == "8" ? "selected" : "" ?> value="8">Agustus</option>
									<option <?= $bulan == "9" ? "selected" : "" ?> value="9">September</option>
									<option <?= $bulan == "10" ? "selected" : "" ?> value="10">Oktober</option>
									<option <?= $bulan == "11" ? "selected" : "" ?> value="11">November</option>
									<option <?= $bulan == "12" ? "selected" : "" ?> value="12">Desember</option>
								</select>
							</div>
						</div>
					</div>
					<?php
					if(!count($data)): ?>
						<div class="col text-center" style="margin-top:40px">
							<h2 class="text-center text-muted">Belum Ada jadwal </h2>
						</div>
					<?php else: 
						foreach ($data as $item) : ?>
							<div class="col-12">
								<div class="pricing-item-regular wow fadeIn" data-wow-duration="1s" data-wow-delay="0.2s">
									<div class="services-content d-flex justify-content-between align-items-center">
										<div class="d-flex">
											<div style="margin-right:10px">
												<img src="<?= base_url() ?>assets/images/logo/logo.png" style="width:50px;">
											</div>
											<div class="d-flex flex-column text-left">
												<h4 class="mb-2"><a href="#" class="text-danger"><?= $item['nama_petugas'] ?></a></h4>
												<div style="text-align:left"><?= $this->library->tanggalToText($item['jadwal'], false) ?></div>
											</div>
										</div>
										<div class="text-dark d-flex flex-column" style="">
											<div style="font-size:24px;  font-weight:700" class="text-primary"><?= str_replace(":", ".", $item["jam_range"]) ?> WIB</div>
											<div class="text-muted"><?= number_format($item["total_disinfektan"], 0) ?> Penyemprotan</div>
										</div>
									</div>
								</div> <!-- single services -->
							</div>
						<?php endforeach; ?>
					<?php endif;?>

				</div>
			</div>
		</div>
		<br /><br /><br />
		<br /><br /><br />
		<br /><br /><br />
	</div>


	<footer id="newsletter">
		<div class="container">
			<div class="row">
				<div class="col-lg-8 offset-lg-2">
					<div class="section-heading mb-3">
						<h4>Tentang Kami</h4>
					</div>
				</div>
				<div class="col-lg-6 offset-lg-3">
					<div>
						<img src="<?= base_url() ?>assets/images/logo/logo.png" class="mx-auto d-block" style="width:100px !important">
					</div>
					<p class="text-white text-center">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore.</p>
				</div>
			</div>

		</div>
	</footer>


	<!-- Scripts -->
	<script src="<?= base_url() ?>assets/user/vendor/jquery/jquery.min.js"></script>
	<script src="<?= base_url() ?>assets/user/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
	<script src="<?= base_url() ?>assets/user/js/owl-carousel.js"></script>
	<script src="<?= base_url() ?>assets/user/js/animation.js"></script>
	<script src="<?= base_url() ?>assets/user/js/imagesloaded.js"></script>
	<script src="<?= base_url() ?>assets/user/js/popup.js"></script>
	<script src="<?= base_url() ?>assets/user/js/custom.js"></script>
	<script>
		$("select[name=bulan]").change(function(evt){
			document.location = `?month=${$(this).val()}`;
		})
	</script>
</body>

</html>
