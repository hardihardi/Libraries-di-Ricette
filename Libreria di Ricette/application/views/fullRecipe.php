<!-- bradcam_area  -->
<div class="bradcam_area bradcam_bg_1">
    <div class="container">
        <div class="row">
            <div class="col-xl-12">
                <div class="bradcam_text text-center">
                    <h3>Recipe Details</h3>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- /bradcam_area  -->

<div class="recepie_details_area">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-xl-6 col-md-6">
                <div class="recepies_thumb">
                    <img src="<?= base_url('assets/img/').$recipe['resepPic'] ?>" alt="">
                </div>
            </div>
            <div class="col-xl-6 col-md-6">
                <div class="recepies_info">
                    <h2><?= $recipe['judul'];?></h2>
                    <div class="resepies_details">
                        <ul>
							<li><p><strong>Oleh</strong> <?= $member['username'];?></p></li>
                            <li><p><strong>Rating</strong> 
                                <?php
                                    $empty_star = 5 - $recipe['rating'];
                                    for ($i = 0; $i < $recipe['rating']; $i++) {
                                ?>
                                        <span class="fa fa-star checked"></span>
                                    <?php
                                    }
                                    for ($i = 0; $i < $empty_star; $i++) {
                                    ?>
                                        <span class="fa fa-star"></span>
                                <?php } ?>
                            </p></li>
                            <?php 
                            $a =0; 
                            foreach (array_reverse($review) as $r) {
                                $a++;
                            }
                            ?>
                            <li><p><strong>Review</strong><?= $a;?></p></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-xl-12">
                <div class="recepies_text">
					<h3>Deskripsi</h3>
                    <p style="text-indent: 0.5in;"><?= $recipe['deskripsi'];?></p>
                </div>
            </div>
        </div>
		<div class="row">
            <div class="col-xl-12">
                <div class="recepies_step">
					<h3>Bahan-bahan</h3>
                    <?php foreach (($bahan) as $index => $b) { ?>
                        <p style="text-indent: 0.5in;"><?= $bahan[$index]['namaBahan'].' sebanyak '.$takaran[$index]['takaran']?></p>
                    <?php } ?> 
				</div>
            </div>
        </div>
		<div class="row">
            <div class="col-xl-12">
                <div class="recepies_step">
					<h3>Langkah-langkah Pembuatan</h3>
					<ol class="a">
                        <?php foreach (($langkah) as $l) { ?>
                        <li><?= $l['stepKe'] ?>. <?= $l['deskripsi'] ?></li>
                        <?php } ?> 
					</ol> 
					</p>
				</div>
            </div>
        </div>
		<div class="row">
            <div class="col-xl-12">
                <div class="recepies_reviewed">
					<h3>Review</h3>
                    <?php foreach (array_reverse($review) as $index =>$r) { ?>
					<div class="recepies_review">
					    <img class="img2" src="<?= base_url('assets\img\user.png') ?>" alt="Pineapple" width="50" height="50">
                        <h5><?= $memberReview[$index]['username'] ?></h5>
                        <p><?= $review[$index]['isi'] ?></p>
					</div>
                    <?php } ?>
				</div>
            </div>
        </div>
        <?php if ($this->session->has_userdata('username')) : ?>
	    <div class="row">
	    	<h3>Add Reviews</h3>
	    	<form id="feedback" method="POST" action="<?= site_url('RecipeController/add_review/').$recipe['idResep'] ?>">  
				<div class="pinfo">Rate our overall services.</div>  
				<div class="form-group">
				  <div class="col-md-4 inputGroupContainer">
				  <div class="input-group">
				  <span class="input-group-addon"><i class="fa fa-heart" style="margin-top: 10px; margin-right: 10px"></i></span>
				   <select class="form-control" name="rating">
				      <option value="1">1</option>
				      <option value="2">2</option>
				      <option value="3">3</option>
				      <option value="4">4</option>
				      <option value="5">5</option>
				    </select>
				    </div>
				  </div>
				</div>

				 <div class="pinfo">Write your feedback.</div>
				<div class="form-group">
				  <div class="col-md-4 inputGroupContainer">
				  <div class="input-group">
				  <span class="input-group-addon"><i class="fa fa-pencil"style="margin-top: 10px; margin-right: 10px"></i></span>
				  <textarea class="form-control" name="isi" rows="3"></textarea>
				  </div>
				  </div>
				</div>
				 <button type="submit" class="btn btn-primary">Submit</button>
				</form>
	    </div>
	    <?php endif; ?>
    </div>
</div>
