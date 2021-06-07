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
								<li><p><strong>Oleh</strong> <?= $recipe['idMember'];?></p></li>
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
                    <div class="recepies_text">
						<h3>Bahan-bahan</h3>
						<p style="text-indent: 0.5in;">Example	3 Sdm</p>
						<p style="text-indent: 0.5in;">Example	4 Sdt</p>
						<p style="text-indent: 0.5in;">Example	1 Siung</p>
						<p style="text-indent: 0.5in;">Example	3 Sdm</p>
					</div>
                </div>
            </div>
			<div class="row">
                <div class="col-xl-12">
                    <div class="recepies_step">
						<h3>Langkah-langkah Pembuatan</h3>
						<ol class="a">
							<li>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Fusce ut turpis laoreet, ultricies arcu id, tempor dolor.</li> 
							<li>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Fusce ut turpis laoreet, ultricies arcu id, tempor dolor.</li> 
							<li>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Fusce ut turpis laoreet, ultricies arcu id, tempor dolor.</li> 
							<li>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Fusce ut turpis laoreet, ultricies arcu id, tempor dolor.</li> 
						</ol> 
						</p>
					</div>
                </div>
            </div>
			<div class="row">
                <div class="col-xl-12">
                    <div class="recepies_reviewed">
						<h3>Review</h3>
                        <?php foreach (array_reverse($review) as $r) { ?>
						<div class="recepies_review">
						    <img class="img2" src="https://www.jobstreet.co.id/en/cms/employer/wp-content/plugins/all-in-one-seo-pack/images/default-user-image.png" alt="Pineapple" width="50" height="50">
						    <h5><?= $r['idMember'] ?></h5>
                            <p><?= $r['isi'] ?></p>
						</div>
                        <?php } ?>
					</div>
                </div>
            </div>
        </div>
    </div>
