<div class="container">
		<div class="row" style="min-height: 37rem">
			<div class="col-md-12">
				<div>
					<div class="text-center mt-4">
						<h3>Member Table</h3>
					</div>
					<br>
					<!-- <?php
					$template = array(
						'table_open' => '<table id="member" class="table-hover table-striped" cellspacing="0" style="width:100%">',
						'thead_open' => '<thead class="table-info text-center">',
						'tbody_open' => '<tbody class ="text-center">',
					);
					$this->table->set_template($template);
					$this->table->set_heading('idMember', 'username', 'Action');

					foreach ($member_list as $di) {
						$this->table->add_row(
							$di['idMember'],
							$di['username'],
							'<button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#modalViewMember<?= $di["idMember"]?>">
  							view Member
							</button>'
						);
					}
					echo $this->table->generate();
					$this->table->clear();
					?> -->

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
									view Member
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
                            <label for="formGroupExampleInput">Member ID</label>
                            <input type="text" class="form-control" id="formGroupExampleInput" value="<?= $m['idMember'] ?>" 
                                name="idMember" required>
							<label for="formGroupExampleInput">Username</label>
                            <input type="text" class="form-control" id="formGroupExampleInput" value="<?= $m['username'] ?>" 
                                name="username" required>
							<label for="formGroupExampleInput">Nama</label>
                            <input type="text" class="form-control" id="formGroupExampleInput" value="<?= $m['nama'] ?>" 
                                name="nama" required>
							<label for="formGroupExampleInput">Email</label>
                            <input type="text" class="form-control" id="formGroupExampleInput" value="<?= $m['email'] ?>" 
                                name="email" required>
							<label for="formGroupExampleInput">Jenis Kelamin</label>
                            <input type="text" class="form-control" id="formGroupExampleInput" value="<?= $m['jenisKelamin'] ?>" 
                                name="jenisKelamin" required>
							<label for="formGroupExampleInput">Status</label>
                            <input type="text" class="form-control" id="formGroupExampleInput" value="<?= $m['verified'] ?>" 
                                name="verified" required>
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
<!-- End of modal view Account -->