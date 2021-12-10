<section class="section">
	<div class="d-flex">
		<h2>Cetak Laporan</h2>
	</div>
	<div class="row margin-top-3">
		<div class="col-lg-4 col-md-4 col-12">
			<div class="card ">
				<div class="card-body">
					<div class="d-flex">
						<div class="form-group d-flex flex-column w-100">
							<label for="">Cetak Dari</label>
							<input type="text" name="cetak" id="cetak" required class="form-control" placeholder="Pilih Tanggal" />
						</div>
						<div class="form-group d-flex align-items-end">
							<span>
								<button class="btn btn-primary d-flex align-items-center margin-left-2" id="cari">
									<i class="bi bi-search"></i>
									<div class="margin-left-2">Cari</div>
								</button>
							</span>
						</div>
					</div>

				</div>
			</div>
		</div>
		<div class="col-lg-8">
			<div class="card">
				<div class="card-body">
					<div id="loading"></div>
					<div id="toggleTable" class="d-none">
						<button class="btn btn-danger d-flex align-items-center margin-bottom-2 mx-auto btn-block justify-content-center" onclick="printLaporan()">
							<i class="bi bi-printer"></i>
							<div class="margin-left-1">Cetak</div>
						</button>
						<table class="table table-bordered table-striped">
							<thead>
								<tr>
									<th>NO</th>
									<th>Nama Petugas</th>
									<th>Jadwal</th>
									<th>Total Penyemprotan</th>
								</tr>
							</thead>
							<tbody id="show-result"></tbody>
						</table>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>
