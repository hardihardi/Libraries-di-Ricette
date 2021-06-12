<!-- Member Info Start -->
<div style="margin-top:130px;">
    <div class="container mt-3" >
        <h2>Profile Info</h2>
        <hr>
        <table style="width:100%">
            <tr>
                <td>
                    <div class="img-profile mb-4" style="display: block; margin-left: auto; margin-right: auto;  width: 75%; text-align: center;">
                        <div class="row">
                            <div>
                                <img src="#" class="img-thumbnail" width="200" height="250">
                            </div>
                        </div>
                    </div>
                    <div style="text-align: center;">
                        <button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#modalEditProfile">Edit Profile</button>
                        <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#modalDeleteMember">Delete Account</button>
                    </div>
                </td>

                <td>
                <?= form_open('User/lihat_profile') ?>
                    <div class="form-group">
                        <?= form_label('Nama') ?>
                        <?= form_input(['name' => 'nama', 'class' => 'form-control', 'required' => 'required', 'value' => $member_info['nama'], 'readonly' => 'true']) ?>
                    </div>
                    <div class="form-group">
                        <?= form_label('Username') ?>
                        <?= form_input(['name' => 'username', 'class' => 'form-control', 'required' => 'required', 'value' => $member_info['username'], 'readonly' => 'true']) ?>
                    </div>
                    <div class="form-group">
                        <?= form_label('Email') ?>
                        <?= form_input(['name' => 'email', 'class' => 'form-control', 'required' => 'required', 'value' =>  $member_info['email'], 'readonly' => 'true']) ?>
                    </div>
                    <div class="form-group">
                        <?= form_label('Jenis Kelamin') ?>
                        <?php
                            if ($member_info['jenisKelamin'] == '1'){ ?>
                                <?= form_input(['name' => 'jenis kelamin', 'class' => 'form-control', 'required' => 'required', 'value' => 'Laki-Laki', 'readonly' => 'true']); ?>
                        <?php  } else{ ?>
                                <?= form_input(['name' => 'jenis kelamin', 'class' => 'form-control', 'required' => 'required', 'value' => 'Perempuan', 'readonly' => 'true']); ?>
                        <?php   }
                             
                        ?>
                    </div>
                    <div class="form-group">
                        <?= form_label('Verified') ?>
                        <?php
                            if ($member_info['verified'] == '1'){ ?>
                                <?= form_input(['name' => 'verified', 'class' => 'form-control', 'required' => 'required', 'value' => 'Yes', 'readonly' => 'true']); ?>
                        <?php  } else{ ?>
                                <?= form_input(['name' => 'verified', 'class' => 'form-control', 'required' => 'required', 'value' => 'No', 'readonly' => 'true']); ?>
                        <?php   }
                             
                        ?>
                    </div>
                   
                <?= form_close() ?>
                </td>
            </tr>
        </table>
    </div>
</div>
<!-- Member Info End -->

<!-- recepie_area_start  -->
<!-- Menampilkan resep-resep yang tersedia, dapat dilakukan sort berdasarkan triteria tertentu, selain itu dapat juga dilakukan pencarian resep berdasarkan nama hidangan -->
<div style="margin-bottom: 200px; padding-top: 50px;">
  <div class="recepie_area">
  <div class="container">
    <div class="row" style="margin-bottom: 20px;">
      <div class="col-lg-6">
        <h2 >Your Recipes</h2>
      </div> 
    </div>
    <div class="row">
      <!-- content -->
      <?php foreach (array_reverse($resep_member) as $index =>$r) { ?>
      <div class="col-xl-4 col-lg-4 col-md-6">
        <img class="card-img-top" style="height: 250px;" src="<?= base_url('assets/img/').$resep_member[$index]['resepPic'] ?>" alt="Card image cap">
        <div class="card-body">
          <h3 class="card-title"><?= $resep_member[$index]['judul'] ?></h3>
          <?php
            $empty_star = 5 - $resep_member[$index]['rating'];
            for ($i = 0; $i < $resep_member[$index]['rating']; $i++) {
          ?>
              <span class="fa fa-star checked"></span>
          <?php
            }

            for ($i = 0; $i < $empty_star; $i++) {
          ?>
              <span class="fa fa-star"></span>
          <?php } ?>
          <p><?= $resep_member[$index]['rating'] ?>/5</p>
          <table> 
              <tr>  
                  <td><p style="font-size: 16px;">By <?= $member_info['username'] ?></p></td>
                  <td>  
                      <?php if ($member_info['verified'] == 1) {?>
                          <img src="<?= base_url('assets/img/check.png')?>" style="width: 20px; height: 20px;">
                      <?php } ?>
                  </td>
              </tr>
          </table>
          <p></p>
          <a href="<?= base_url('index.php/RecipeController/view_recipe/').$resep_member[$index]['idResep'] ?>" class="genric-btn primary circle">View Full Recipe</a>
          <a href="<?= base_url('index.php/AccountController/delete_resep/').$resep_member[$index]['idResep'] ?>" class="genric-btn danger circle">Delete Resep</a>
        </div>
      </div>
      <?php } ?>
    </div>
  </div>
</div>
</div> 

<!-- recepie_area_end  -->

<!-- Modal Modal -->

<div class="modal fade" id="modalEditProfile" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content rounded-0">
            <div class="modal-header">
                <h4 class="display-4">Edit Profile</h4>
            </div>
            <div class="modal-body">
                <form method="POST" action="<?= site_url('AccountController/edit_profile/').$member_info['idMember'] ?>">
                    <div class="form-group">
                        <label for="formGroupExampleInput"><b>Nama</b></label>
                        <input type="text" class="form-control" id="formGroupExampleInput" value="<?= $member_info['nama']?>" 
                            name="nama" required>
                        <label for="formGroupExampleInput"><b>Email</b></label>
                        <input type="text" class="form-control" id="formGroupExampleInput" value="<?= $member_info['email']?>" 
                            name="email" required>
                        <label><b>Jenis Kelamin </b></label><br>
                        <input type="radio" id="pria" name="jenisKelamin" value="1">
                        <label for="pria">Laki-Laki</label><br>
                        <input type="radio" id="wanita" name="jenisKelamin" value="0">
                        <label for="wanita">Perempuan</label><br>

                        <label><b>Current Password / New Password</b></label>
                        <input type="password" name="password" placeholder="Password" class="form-control" required/>
                    </div>
            </div>
            <div class="modal-footer">
                <input type="submit" class="btn btn-primary rounded-0" id="virification" value="Submit" placeholder="Verify">
                  </form>
            </div>
        </div>
    </div>
</div>
<!-- modal delete Member -->
<div class="modal fade" id="modalDeleteMember" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content rounded-0">
            <div class="modal-header">
                <h4 class="display-4">Delete Member</h4>
            </div>
            <div class="modal-body">
                <form method="POST" action="<?= site_url('AccountController/delete_member/').$member_info['idMember']?>">
                    <div class="form-group">
            <label >Are you sure you want to delete your account?</label>
                    </div>
            </div>
            <div class="modal-footer">
                <input type="submit" class="btn btn-primary rounded-0" id="virification" value="Submit" placeholder="Verify">
              </form>
            </div>
        </div>
    </div>
</div>
