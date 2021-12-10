<div class="row">
	<div class="col-xl-5 col-lg-6 col-md-12 col-12 offset-lg-3">
		<div class="card">
			<div class="card-body">
				<form id="update-profil" method="POST">
					<input type="hidden" readonly name="id" class="form-control" value="<?= $id ?>">
					<h4 class="card-title">Profil Saya</h4>

					<div class="form-group">
						<label for="">Username</label>
						<input type="text" name="username" placeholder="Username" class="form-control" value="<?= $username ?>">
					</div>

					<div class="form-group">
						<label for="">Password</label>
						<input type="password" name="password" placeholder="Password" class="form-control">
						<i>Kosongkan password jika tidak ingin di ubah</i>
					</div>

					<div class="form-group">
						<label for="">Hak akses</label>
						<div class="d-flex align-items-center fweight-600 margin-top-1 text-success">
							<i class="bi bi-person"></i>
							<div class="margin-left-2">Administrator</div>
						</div>
					</div>
					<div class="form-group">
						<button class="btn btn-danger btn-block d-flex align-items-center justify-content-center" type="submit">
							<i class="bi bi-pencil-square"></i>
							<div class="margin-left-2">Terapkan</div>
						</button>
					</div>
				</form>
			</div>
		</div>
	</div>
</div>
