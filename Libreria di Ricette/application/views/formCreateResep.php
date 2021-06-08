<div id="carouselExampleSlidesOnly" class="carousel slide" data-bs-ride="carousel">
  <div class="carousel-inner" style="height: 400px">
    <div class="carousel-item active">
      <img src="<?= base_url("assets/img/3.jpg") ?>" class="d-block w-100">
    </div>
  </div>
</div>

<!-- form input resep -->
    <div class="container align-items-center" style="margin-bottom: 75px">
        <form action="" method="post">
            <div class="mb-3" style="margin-top: 20px">
                <label class="form-label">Upload foto resepmu</label>
                <input class="form-control" type="file" id="foto">
            </div>
            <div class="mb-3">
                <label class="form-label">Judul</label>
                <input type="text" class="form-control" id="judul" placeholder="Masukkan teks">
            </div>
            <div class="mb-3">
                <label class="form-label">Deskripsi</label>
                <textarea class="form-control" id="deskripsi" rows="5" placeholder="Masukkan teks"></textarea>
            </div>
            <div class="mb-3">
                <label class="form-label">Bahan - Bahan</label>
            </div>

            <div class="d-grid gap-3 field_wrapper">
                <div class="row g-3">
                    <div class="col-sm-7">
                        <input type="text" name="bahan[]" class="form-control" placeholder="Bahan" aria-label="Bahan">
                    </div>
                    <div class="col-sm">
                        <input type="text" name="takaran[]" class="form-control" placeholder="Takaran" aria-label="Takaran">
                    </div>
                    <a href="javascript:void(0);" class="add_button" title="Add field"><img src="add-icon.png"/></a>
                </div>
            </div>

            <div class="mb-3" style="margin-top: 15px;">
                <label class="form-label">Langkah Pembuatan</label>
                <textarea class="form-control" id="langkah" rows="20" placeholder="Masukkan teks"></textarea>
            </div>
            <div class="col text-center">
                <button type="submit" class="btn btn-primary">Submit</button>
            </div>
        </form>
    </div>
<!-- end form input resep -->


<!-- additional script -->

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

<script type="text/javascript">
$(document).ready(function(){
    var maxField = 10; //Input fields increment limitation
    var addButton = $('.add_button'); //Add button selector
    var wrapper = $('.field_wrapper'); //Input field wrapper
    var fieldHTML = '<div class="row g-3"><div class="col-sm-7"><input type="text" name="bahan[]" class="form-control" placeholder="Bahan" aria-label="Bahan"></div><div class="col-sm"><input type="text" name="takaran[]" class="form-control" placeholder="Takaran" aria-label="Takaran"></div><a href="javascript:void(0);" class="remove_button"><img src="remove-icon.png"/></a></div>'; //New input field html 
    var x = 1; //Initial field counter is 1
    
    //Once add button is clicked
    $(addButton).click(function(){
        //Check maximum number of input fields
        if(x < maxField){ 
            x++; //Increment field counter
            $(wrapper).append(fieldHTML); //Add field html
        }
    });
    
    //Once remove button is clicked
    $(wrapper).on('click', '.remove_button', function(e){
        e.preventDefault();
        $(this).parent('div').remove(); //Remove field html
        x--; //Decrement field counter
    });
});
</script>