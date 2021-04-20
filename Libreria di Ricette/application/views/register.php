<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="stylesheet.css">
  </head>
  <body>
    <div class="container">
        <div class="inputs">
            <label>Username</label>
            <input type="text" name="username" placeholder="Username" class="input-field"/>
            <label>Password</label>
            <input type="password" name="password" placeholder="password" class="input-field"/>
            <label>Full Name</label>
            <input type="text" name="name" placeholder="Your Name" class="input-field"/>
            <label>Email Adress</label>
            <input type="email" name="email" placeholder="Email Address" class="input-field"/>
            <label>Gender</label>
            <div class="radio-btn">

                <label>
                <input type="radio" name="gender" value="male">
                <span class="mark"></span>
                <span class="btn-border"></span>
                Male</label>

                <label>
                <input type="radio" name="gender" value="female">
                <span class="mark"></span>
                <span class="btn-border"></span>
                Female</label>

            </div>
            <div class="btn">
                <button>Create Account</button>
            </div>
        </div>
    </div>
  </body>
</html>
