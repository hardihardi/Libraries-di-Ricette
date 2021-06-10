<div class="container"> 
		<div class="row" style="min-height: 37rem">
			<div class="col-md-12">
				<div>
					<div class="text-center mt-4">
						<h3>Tabel Toko</h3>
					</div>
					<br>
					<table class="table">
						<thead>
							<tr>
							<th scope="col">ID Toko</th>
							<th scope="col">Nama Toko</th>
                            <th>action</th>
							<th>
								
							</th>
							</tr>
						</thead>
						<tbody>
							<tr>
								<td>
									<button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#modalTambahToko">
									Tambah Toko
									</button>
								</td>
							</tr>
							<?php foreach ($toko as $t) {?>
							<tr>
								<td><?= $t['idToko'] ?></td>
								<td><?= $t['namaToko'] ?></td>
								<td>
									<button type="button" class="btn btn-warning" data-bs-toggle="modal" data-bs-target="#modalEditToko<?= $t["idToko"]?>">
									Update Toko
									</button>
									<button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#modalDeleteToko<?= $t["idToko"]?>">
									Delete Toko
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

<!-- Modal add Toko -->
<div class="modal fade" id="modalTambahToko" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content rounded-0">
            <div class="modal-header">
                <h4 class="display-4">Tambah Toko</h4>
            </div>
            <div class="modal-body">
                <form method="POST" action="<?= site_url('AdminController/add_toko') ?>">
                    <div class="form-group">
						<label for="formGroupExampleInput">Nama Toko</label>
                        <input type="text" class="form-control" id="formGroupExampleInput" value="" 
                            name="namaToko" required>
						<label for="formGroupExampleInput">alamat</label>
                        <input type="text" class="form-control" id="formGroupExampleInput" value="" 
                            name="alamat" required>
                    </div>
            </div>
            <div class="modal-footer">
                <input type="submit" class="btn btn-primary rounded-0" id="virification" value="Submit" placeholder="Verify">
          		</form>
            </div>
        </div>
    </div>
</div>
<!-- Modal Edit Toko -->
<?php foreach ($toko as $tokoo) {?>
<div class="modal fade" id="modalEditToko<?= $tokoo["idToko"]?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content rounded-0">
            <div class="modal-header">
                <h4 class="display-4">Edit Toko</h4>
            </div>
            <div class="modal-body">
                <form method="POST" action="<?= site_url('AdminController/edit_toko/').$tokoo['idToko']?>">
                    <div class="form-group">
						<label for="formGroupExampleInput">Nama Toko</label>
                        <input type="text" class="form-control" id="formGroupExampleInput" value="<?=$tokoo['namaToko']?>" 
                            name="namaToko" required>
						<label for="formGroupExampleInput">alamat</label>
                        <input type="text" class="form-control" id="formGroupExampleInput" value="<?=$tokoo['alamat']?>" 
                            name="alamat" required>
                    </div>
            </div>
            <div class="modal-footer">
                <input type="submit" class="btn btn-primary rounded-0" id="virification" value="Submit" placeholder="Verify">
          		</form>
            </div>
        </div>
    </div>
</div>
<?php }?>
<!-- modal delete Toko -->
<?php foreach ($toko as $tokoo) {?>
<div class="modal fade" id="modalDeleteToko<?= $tokoo["idToko"]?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content rounded-0">
            <div class="modal-header">
                <h4 class="display-4">Delete Toko</h4>
            </div>
            <div class="modal-body">
                <form method="POST" action="<?= site_url('AdminController/delete_toko/').$tokoo['idToko']?>">
                    <div class="form-group">
						<label >Apakah anda yakin ingin menghapus toko <?=$tokoo['namaToko']?>? </label>
                    </div>
            </div>
            <div class="modal-footer">
                <input type="submit" class="btn btn-primary rounded-0" id="virification" value="Submit" placeholder="Verify">
          		</form>
            </div>
        </div>
    </div>
</div>
<?php }?>
<!-- End of modal delete Toko -->