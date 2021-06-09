<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="<?= base_url('assets/css/stylesheet.css')?>">
  </head>
  <body>
    <div class="container">
        <div class="inputs">
            <form action="<?=site_url('daftar/register')?>" method="POST">
                <h2 style="text-align: center;">Daftar</h2>
                <label><b>Username</b></label>
                <input type="text" name="username" placeholder="Username" class="input-field"/>
                <label><b>Nama</b></label>
                <input type="text" name="nama" placeholder="Nama" class="input-field"/>
                <label><b>Email</b></label>
                <input type="email" name="email" placeholder="Email" class="input-field"/>
				<label><b>Jenis Kelamin </b></label><br>
                <input type="radio" id="pria" name="jenisKelamin" value="1">
  				<label for="pria">Pria</label><br>
 			    <input type="radio" id="wanita" name="jenisKelamin" value="0">
  				<label for="wanita">Wanita</label><br>
                <label><b>Password</b></label>
                <input type="password" name="password" placeholder="Password" class="input-field"/>
                <div class="btn">
                    <button>Daftar</button>
                </div>
            </form>
        </div>
    </div>
  </body>
</html>
