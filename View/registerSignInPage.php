<?php
/*
Description: card display teams page.
Author: Oliver Dickens
*/
include "../Model/session.php";
include 'header.php';
include 'navbar.php';

?>
<html>
<body>
  <div class="container text-center mt-2 pt-5">
    <h1>Part of Block 2</h1>
    <h5>Register and Sign In.</h5>
    <div class="row">
      <div class="login-box col-12">
        <div class="col-6 login mr-1"><!--Login----->
          <form class= "form-signIn" action="../Controller/validation.php" method="post">
            <h1>Login</h1>
            <div class="form-group">
              <label>Username</label>
              <input type="text" name="Login_username" placeholder="Username" class="form-control" required>
            </div>
            <div class="form-group">
              <label>Password</label>
              <input type="password" name="Login_password" placeholder="Password" class="form-control" required>
            </div>
            <button type="submit" name="loginbtn" class="btn btn-primary">Log-in</button>
          </form>
        </div>


        <div class="col-6 registration ml-1"><!--Register----->
          <form class= "form-signUp"action="../Controller/registration.php" method="post">
            <h1>Registration</h1>
            <div class="form-group">
              <label>Username</label>
              <input type="text" name="reg_user" placeholder="Username" class="form-control" required>
            </div>
            <div class="form-group">
              <label>Email</label>
              <input type="text" name="reg_email" placeholder="Email" class="form-control" required>
            </div>
            <div class="form-group">
              <label>Password</label>
              <input type="password" name="reg_password" placeholder="Password" class="form-control" required>
            </div>
            <div class="form-group">
              <label>Repeat Password</label>
              <input type="password" name="reg_passwordRepeat" placeholder="RepeatPassword" class="form-control" required>
            </div>
            <button type="submit" name="registerbtn" class="btn btn-primary">Register</button>
          </form>
        </div>
      </div>
    </div>
  </div>
  <?php
  include 'footer.php';
  ?>
</body>
</html>
