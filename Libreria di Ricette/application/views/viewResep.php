<!-- bootstrap -->
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" 
integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

<!-- Navbar -->
<div class="container">
    <nav class="navbar navbar-light bg-light">
        <a class="navbar-brand">List Resep</a>
        <form class="form-inline" id="formItem">
            <input class="form-control mr-sm-2" type="search" placeholder="Search"  id="keyword" aria-label="Search">
            <button class="btn btn-outline-success my-2 my-sm-0" type="submit" id="searchItem">Search</button>
        </form>
    </nav>
</div>

<!-- view list resep -->
<div class="container"> 
		<div class="row" style="min-height: 37rem">
			<div class="col-md-12">
        <?php foreach ($content as $recipe_content) : ?>
          <div class="card" style="width: 18rem;">
            <img src="$recipe_content['resepPic']" class="card-img-top"  alt="Card image cap">
            <div class="card-body">
              <h5 class="card-title"><?= $$recipe_content['judul'] ?></h5>
              <p class="card-text"><?= $$recipe_content['deskripsi']?></p>
              <a href="#" class="btn btn-primary">View Full Recipe</a>
            </div>
          </div>
        <?php endforeach; ?>
      </div>
    </div>
</div>
