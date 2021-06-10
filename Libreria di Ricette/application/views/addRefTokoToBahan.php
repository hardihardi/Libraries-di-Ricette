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
							<tr>
								<td>
									<button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#modalTambahBahan">
									Tambah Bahan
									</button>
								</td>
							</tr>
							<?php foreach ($bahan_list as $di) {?>
							<tr>
								<td><?= $di['idBahan'] ?></td>
								<td><?= $di['namaBahan'] ?></td>
								<td>
									<button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#modalViewBahan<?= $di["idBahan"]?>">
									Tambah Ref. Toko
									</button>
                                    <button type="button" class="btn btn-warning" data-bs-toggle="modal" data-bs-target="#modalEditBahan<?= $di["idBahan"]?>">
                                    Edit Bahan
                                    </button>
                                    <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#modalDeleteBahan<?= $di["idBahan"]?>">
                                    Delete Bahan
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
<?php foreach ($bahan_list as $index => $b) {?>
    <div class="modal fade" id="modalViewBahan<?= $b['idBahan']?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content rounded-0">
                <div class="modal-header">
                    <h4 class="display-4">Tambah Referensi Toko</h4>
                </div>
                <div class="modal-body">
                	<h5>Referensi Toko untuk bahan <?= $b['namaBahan']?></h5>
                	<table style="width: 100%;">
                		<thead>
                			<th>Nama Toko</th>
                			<th>Action</th>
                		</thead>
                		<tbody>
                			<?php foreach ($toko[$index] as $i => $t) {?>
                			<tr>
                				<td>
                					<?= ($i+1).'. '.$t[0]['namaToko']?>
                					<p style="margin-left: 15px;"><?= $t[0]['alamat']?></p>
                				</td>
                				<td>
                					<form method="POST" action="<?= site_url('AdminController/delete_ref_toko/').$b['idBahan'].'/'.$t[0]['idToko']?>">
                					<input type="submit" class="btn btn-danger rounded-0" id="virification" value="Delete Referensi" placeholder="Verify">
									</form>
                				</td>
                			</tr>

                			<?php }?>
                		</tbody>
                	</table>
                    <form method="POST" action="<?= site_url('AdminController') ?>/add_ref_toko/<?= $b['idBahan'] ?>">
                        <div class="form-group">
                            <h5>Tambah Referensi Toko untuk bahan <?= $b['namaBahan']?></h5>
                            <label for="exampleFormControlSelect1">Toko yang Tersedia</label>
						    <select class="form-control" id="exampleFormControlSelect1" name="idToko" action="<?= site_url('AdminController') ?>/add_ref_toko/<?= $b['idBahan'] ?>">
						      <?php foreach ($allToko as $br){ ?>
						      <option value="<?= $br['idToko']?>" name="idToko">
						      	<?= $br['namaToko'].' | '?>
						      	<?= $br['alamat']?>
						      </option>
						      <?php } ?>
						    </select>
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
<?php foreach ($bahan_list as $b) {?>
<div class="modal fade" id="modalEditBahan<?= $b["idBahan"]?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content rounded-0">
            <div class="modal-header">
                <h4 class="display-4">Edit Bahan</h4>
            </div>
            <div class="modal-body">
                <form method="POST" action="<?= site_url('AdminController/edit_Bahan/').$b['idBahan']?>">
                    <div class="form-group">
                        <label for="formGroupExampleInput">Nama Bahan</label>
                        <input type="text" class="form-control" id="formGroupExampleInput" value="<?=$b['namaBahan']?>" 
                            name="namaBahan" required>
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
<!--modal delete Bahan -->
<?php foreach ($bahan_list as $b) {?>
<div class="modal fade" id="modalDeleteBahan<?= $b["idBahan"]?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content rounded-0">
            <div class="modal-header">
                <h4 class="display-4">Delete Bahan</h4>
            </div>
            <div class="modal-body">
                <form method="POST" action="<?= site_url('AdminController/delete_bahan/').$b['idBahan']?>">
                    <div class="form-group">
                        <label >Apakah anda yakin ingin menghapus bahan <?=$b['namaBahan']?>? </label>
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
<!-- Modal add Bahan -->
<div class="modal fade" id="modalTambahBahan" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content rounded-0">
            <div class="modal-header">
                <h4 class="display-4">Tambah Bahan</h4>
            </div>
            <div class="modal-body">
                <form method="POST" action="<?= site_url('AdminController/add_bahan') ?>">
                    <div class="form-group">
						<label for="formGroupExampleInput">Nama Bahan</label>
                        <input type="text" class="form-control" id="formGroupExampleInput" value="" 
                            name="namaBahan" required>
                    </div>
            </div>
            <div class="modal-footer">
                <input type="submit" class="btn btn-primary rounded-0" id="virification" value="Submit" placeholder="Verify">
          		</form>
            </div>
        </div>
    </div>
</div>