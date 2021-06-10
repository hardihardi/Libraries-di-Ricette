<div class="container"> 
		<div class="row" style="min-height: 37rem">
			<div class="col-md-12">
				<div>
					<div class="text-center mt-4">
						<h3>Member Table</h3>
					</div>
					<br>
					<table class="table">
						<thead>
							<tr>
							<th scope="col">ID Member</th>
							<th scope="col">Username</th>
							<th scope="col">Action</th>
							</tr>
						</thead>
						<tbody>
							<?php foreach ($member_list as $di) {?>
							<tr>
								<td><?= $di['idMember'] ?></td>
								<td><?= $di['username'] ?></td>
								<td>
									<button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#modalViewMember<?= $di["idMember"]?>">
									View Member
									</button>
									<button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#modalDeleteMember<?= $di["idMember"]?>">
									Delete Member
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

<!-- Modal view Account -->
<?php foreach ($member_list as $m) {?>
    <div class="modal fade" id="modalViewMember<?= $m['idMember']?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content rounded-0">
                <div class="modal-header">
                    <h4 class="display-4">Account Details</h4>
                </div>
                <div class="modal-body">
                    <form method="POST" action="<?= site_url('AdminController') ?>/verify/<?= $m['idMember'] ?>">
                        <div class="form-group">
                            <h5>ID Member</h5>
                            <p style="font-size: 17px;"><?= $m['idMember'] ?></p>
                            <h5>Username</h5>
                            <p style="font-size: 17px;"><?= $m['username'] ?></p>
                            <h5>Nama</h5>
                            <p style="font-size: 17px;"><?= $m['nama'] ?></p>
                            <h5>Email</h5>
                            <p style="font-size: 17px;"><?= $m['email'] ?></p>
                            <h5>Jenis Kelamin</h5>
                            <?php if ($m['jenisKelamin'] == 0) {?>
                            	<p style="font-size: 17px;">Wanita</p>
                            <?php } else { ?>
                            	<p style="font-size: 17px;">Pria</p>
                            <?php } ?>
                            <h5>Status User</h5>
			                <?php if ($m['verified'] == 0) {?>
                            	<p style="font-size: 17px;">Unverified</p>
                            	<input type="submit" class="btn btn-primary rounded-0" id="virification" value="Verify User" placeholder="Verify" name="verified">
                            <?php } elseif ($m['verified'] == 1) { ?>
                            	<p style="font-size: 17px;">Verified</p>
                            	<input type="submit" class="btn btn-danger rounded-0" id="virification" value="Unverify User" placeholder="Verify" name="verified">
                            <?php } ?>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
<?php }?>
<!-- modal delete Account -->
<?php foreach ($member_list as $m) {?>
<div class="modal fade" id="modalDeleteMember<?= $m["idMember"]?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content rounded-0">
            <div class="modal-header">
                <h4 class="display-4">Delete Member</h4>
            </div>
            <div class="modal-body">
                <form method="POST" action="<?= site_url('AdminController/delete_member/').$m['idMember']?>">
                    <div class="form-group">
						<label >Apakah anda yakin ingin menghapus member <?=$m['idMember']?>? </label>
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