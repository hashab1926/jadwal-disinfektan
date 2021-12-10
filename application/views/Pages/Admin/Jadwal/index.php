<section class="section">
	<div class="d-flex justify-content-center">
		<h2>Jadwal Disinfektan</h2>
		<div id="wrapper-atur-jadwal" class="d-none">
			<button class="btn btn-primary btn-md d-flex align-items-center fweight-600" data-toggle="modal" data-target="#modalJadwal">
				<div class="bi bi-plus text-2 fweight-700"></div>
				<div class="margin-left-1">Atur Jadwal</div>
			</button>
		</div>
	</div>
	<div class="card margin-top-3">

		<div class="card-body">
			<div id='calendar'></div>
		</div>
	</div>
</section>

<div class="modal fade" id="modalJadwal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
	<div class="modal-dialog modal-dialog-centered" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h3 class="modal-title" id="exampleModalLabel">Atur Jadwal</h3>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<form autocomplete="off" method="POST" id="add-jadwal">
				<div class="modal-body">
					<div class="form-group">
						<label>Nama Petugas</label>
						<input type="text" name="nama_petugas" class="form-control" id="nama_petugas" placeholder="Masukan Nama Petugas" />
					</div>

					<div class="form-group d-flex flex-column">
						<label>Tanggal</label>
						<input type="text" name="jadwal" id="jadwal" required class="form-control" placeholder="Masukan Tanggal" />
					</div>

					<div class="row">
						<div class="col-12 col-lg-6">
							<div class="form-group d-flex flex-column">
								<label>Dari Jam</label>
								<input type="text" name="jam_awal" id="jam_awal" class="form-control timepicker" placeholder="Dari" />
							</div>
						</div>
						<div class="col-12 col-lg-6">
							<div class="form-group d-flex flex-column">
								<label>Sampai Jam</label>
								<input type="text" name="jam_akhir" id="jam_akhir" class="form-control timepicker" placeholder="Sampai " />
							</div>
						</div>
					</div>

				</div>
				<div class="modal-footer no-border pt-0">
					<button type="submit" class="btn btn-block btn-primary justify-content-center d-flex align-items-center fweight-700" type="submit">
						<div class="bi bi-plus text-2 fweight-700"></div>
						<div class="margin-left-1">Tambahkan</div>
					</button>
				</div>
			</form>
		</div>
	</div>
</div>



<div class="modal fade" id="modalEdit" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
	<div class="modal-dialog modal-dialog-centered" role="document">
		<div class="modal-content">
			<div class="modal-header bg-danger" id="modal-header-edit">
				<h3 class="modal-title" id="exampleModalLabel">Atur Ulang Jadwal</h3>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<form autocomplete="off" method="POST" id="edit-jadwal">
				<input type="hidden" readonly name="id" class="form-control" id="Eid_jadwal" />
				<div class="modal-body">
					<div class="form-group">
						<label>Nama Petugas</label>
						<input type="text" name="nama_petugas" class="form-control" id="Enama_petugas" placeholder="Masukan Nama Petugas" />
					</div>

					<div class="form-group d-flex flex-column">
						<label>Tanggal</label>
						<input type="text" name="jadwal" id="Ejadwal" required class="form-control" placeholder="Masukan Tanggal" />
					</div>

					<div class="row">
						<div class="col-12 col-lg-6">
							<div class="form-group d-flex flex-column">
								<label>Dari Jam</label>
								<input type="text" name="jam_awal" id="Ejam_awal" class="form-control timepicker" placeholder="Dari" />
							</div>
						</div>
						<div class="col-12 col-lg-6">
							<div class="form-group d-flex flex-column">
								<label>Sampai Jam</label>
								<input type="text" name="jam_akhir" id="Ejam_akhir" class="form-control timepicker" placeholder="Sampai " />
							</div>
						</div>
					</div>

					<div class="row">
						<div class="col">
							<div class="form-group d-flex flex-column">
								<label>Total Penyemprotan</label>
								<input type="number" name="total_disinfektan" id="Etotal_disinfektan" class="form-control" placeholder="Total Penyemprotan" />
							</div>

						</div>
					</div>

				</div>
				<div class="modal-footer no-border pt-0">
					<button type="submit" class="btn btn-block btn-danger justify-content-center d-flex align-items-center fweight-700 no-border" id="btn-edit" type="submit">
						<div class="bi bi-pencil-square text-2 fweight-700"></div>
						<div class="margin-left-1">Atur Ulang</div>
					</button>
					<button class="btn btn-block justify-content-center d-flex align-items-center fweight-700 no-border" id="btn-hapus">
						<div class="bi bi-trash text-2 fweight-700"></div>
						<div class="margin-left-1">Hapus jadwal</div>
					</button>

				</div>
			</form>
		</div>
	</div>
</div>
