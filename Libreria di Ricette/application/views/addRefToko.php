<div class="container"> 
		<div class="row" style="min-height: 37rem">
			<div class="col-md-12">
				<div>
					<div class="text-center mt-4">
						<h3>Tabel Bahan</h3>
					</div>
					<br>
					<table class="table">
						<thead>
							<tr>
							<th scope="col">ID Bahan</th>
							<th scope="col">Nama Bahan</th>
							<th scope="col">Action</th>
							</tr>
						</thead>
						<tbody>
							<?php foreach ($bahan_list as $di) {?>
							<tr>
								<td><?= $di['idBahan'] ?></td>
								<td><?= $di['namaBahan'] ?></td>
								<td>
									<button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#modalViewBahan<?= $di["idBahan"]?>">
									Tambah Ref. Toko
									</button>
								</td>
							</tr>
							<?php } ?>
						</tbody>
					</table>

				</div>
			</div>
		</div>
</div>

<!-- Modal view Bahan -->
<?php foreach ($bahan_list as $b) {?>
    <div class="modal fade" id="modalViewBahan<?= $b['idBahan']?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content rounded-0">
                <div class="modal-header">
                    <h4 class="display-4">Tambah Referensi Toko</h4>
                </div>
                <div class="modal-body">
                    <form method="POST" action="<?= site_url('AdminController') ?>/add_ref_toko/<?= $b['idBahan'] ?>">
                        <div class="form-group">
                            <h3>Tambah Referensi Toko untuk bahan <?= $b['idBahan']?></h3>
							<label for="formGroupExampleInput">Nama Toko</label>
                            <input type="text" class="form-control" id="formGroupExampleInput" value="<?= $b['namaToko'] ?>" 
                                name="namaToko" required>
							<label for="formGroupExampleInput">alamat</label>
                            <input type="text" class="form-control" id="formGroupExampleInput" value="<?= $b['alamat'] ?>" 
                                name="alamat" required>
                        </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary rounded-0" data-dismiss="modal">Cancel</button>
                    <input type="submit" class="btn btn-primary rounded-0" id="virification" value="Submit" placeholder="Verify">
                    </form>
                </div>
            </div>
        </div>
    </div>
    <?php }?>
<!-- End of modal view Bahan -->
