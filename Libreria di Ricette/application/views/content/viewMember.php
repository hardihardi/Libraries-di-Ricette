<div class="container">
		<div class="row" style="min-height: 37rem">
			<div class="col-md-12">
				<div>
					<div class="text-center mt-4">
						<h3>Member Table</h3>
					</div>
					<br>
					<?php
					$template = array(
						'table_open' => '<table id="member" class="table-hover table-striped" cellspacing="0" style="width:100%">',
						'thead_open' => '<thead class="table-info text-center">',
						'tbody_open' => '<tbody class ="text-center">',
					);
					$this->table->set_template($template);
					$this->table->set_heading('idMember', 'username', 'Action');

					foreach ($data_member as $di) {
						$this->table->add_row(
							$di['idMember'],
							$di['username'],
							<button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="modal">
  							view Member
							</button>
						);
					}
					echo $this->table->generate();
					$this->table->clear();
					?>
				</div>
			</div>
		</div>
	</div>
