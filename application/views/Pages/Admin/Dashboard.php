<div class="page-heading">
	<h3>Ringkasan Disinfektan</h3>
</div>
<div class="page-content">
	<div class="row">

		<div class="col-6 col-lg-3 col-md-6">
			<div class="card">
				<div class="card-body px-3 py-4-5">
					<div class="row">
						<div class="col-md-3 padding-left-6">
							<div class="bi bi-bug" style="font-size:42px"></div>
						</div>
						<div class="col-md-8">
							<h6 class="fweight-700 text-primary font-semibold">Hari ini</h6>
							<div class="d-flex align-items-center">
								<h6 class="font-extrabold mb-0"><?= $hariini["total_jadwal"] . " Jadwal | " . $hariini["total_disinfektan"] ?> Semprot</h6>
							</div>
						</div>

					</div>
				</div>
			</div>
		</div>
		
		<div class="col-6 col-lg-3 col-md-6">
			<div class="card">
				<div class="card-body px-3 py-4-5">
					<div class="row">
						<div class="col-md-3 padding-left-6">
							<div class="bi bi-bug" style="font-size:42px"></div>
						</div>
						<div class="col-md-8">
							<h6 class="fweight-700 text-primary font-semibold">Bulan ini</h6>
							<div class="d-flex align-items-center">
								<h6 class="font-extrabold mb-0"><?= $bulanini["total_jadwal"] . " Jadwal | " . $bulanini["total_disinfektan"] ?> Semprot</h6>
							</div>
						</div>

					</div>
				</div>
			</div>
		</div>

		<div class="col-6 col-lg-3 col-md-6">
			<div class="card">
				<div class="card-body px-3 py-4-5">
					<div class="row">
						<div class="col-md-3 padding-left-6">
							<div class="bi bi-bug" style="font-size:42px"></div>
						</div>
						<div class="col-md-8">
							<h6 class="fweight-700 text-primary font-semibold">Tahun ini</h6>
							<div class="d-flex align-items-center">
								<h6 class="font-extrabold mb-0"><?= $tahunini["total_jadwal"] . " Jadwal | " . $tahunini["total_disinfektan"] ?> Semprot</h6>
							</div>
						</div>

					</div>
				</div>
			</div>
		</div>

	</div>
</div>
