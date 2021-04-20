<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="<?= base_url('assets/css/stylesheet.css')?>">
  </head>
  <body>
    <div class="container">
        <div class="inputs">
            <form action="<?=site_url('AccountController/login')?>" method="POST">
                <h2 style="text-align: center;">Login</h2>
                <label><b>Username</b></label>
                    <input type="text" name="username" placeholder="Username" class="input-field"/>
                <label><b>Password</b></label>
                <input type="password" name="password" placeholder="Password" class="input-field"/>
                <div class="btn">
                    <button>Login</button>
                </div>
            </form>
        </div>
    </div>
  </body>
</html>
