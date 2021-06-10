<div class="container"> 
		<div class="row" style="min-height: 37rem">
			<div class="col-md-12">
				<div>
					<div class="text-center mt-4">
						<h3>Tabel Resep</h3>
					</div>
					<br>
					<table class="table">
						<thead>
							<tr>
							<th scope="col">ID Resep</th>
							<th scope="col">Nama Resep</th>
                            <th>action</th>
							<th>
								
							</th>
							</tr>
						</thead>
						<tbody>
							<?php foreach ($resep as $r) {?>
							<tr>
								<td><?= $r['idResep'] ?></td>
								<td><?= $r['judul'] ?></td>
								<td>
									<button class="btn btn-primary" onclick=" window.open('<?= base_url('index.php/RecipeController/view_recipe/').$r['idResep']?>','_blank')"> View Resep</button>
									<button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#modalDeleteResep<?= $r["idResep"]?>">
									Delete Resep
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
<!-- modal delete Resep -->
<?php foreach ($resep as $r) {?>
<div class="modal fade" id="modalDeleteResep<?= $r["idResep"]?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content rounded-0">
            <div class="modal-header">
                <h4 class="display-4">Delete Resep</h4>
            </div>
            <div class="modal-body">
                <form method="POST" action="<?= site_url('AdminController/delete_resep/').$r['idResep']?>">
                    <div class="form-group">
						<label >Apakah anda yakin ingin menghapus Resep <?=$r['judul']?>? </label>
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