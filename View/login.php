<?php

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register & Login</title>
    <link rel="stylesheet" href="../css/all.min.css">
    <link rel="stylesheet" href="../css/style2.css">
</head>
<body>
    <div class="container" id="signIn">
      <h1 class="form-title">Sign In</h1>

          <?php 
          if (isset($signIn)) {
              echo '<p class="error" style="color: red;display: flex; justify-content: center;">Incorrect Email or Password</p>';
          }
          ?>
        <br>
        <br>
        <form method="post" action="../Model/loginController.php">
          <div class="input-group">
              <i class="fas fa-envelope"></i>
              <input type="email" name="email" id="email" placeholder="Email" required>
              <label for="email">Email</label>
          </div>
          <div class="input-group">
              <i class="fas fa-lock"></i>
              <input type="password" name="password" id="password" placeholder="Password" required>
              <label for="password">Password</label>
          </div>
          <p class="recover">
            <a href="#">Recover Password</a>
          </p>
          <input type="submit" class="btn" value="Sign In" name="signIn">
        </form>
        <p class="or">
          ----------or--------
        </p>
        <div class="icons">
          <i class="fab fa-google"></i>
          <i class="fab fa-facebook"></i>
        </div>
        <div class="links">
          <p>Don't have account yet?</p>
          <button id="signUpButton"><a href="register.php">Sign Up</a></button>
        </div>
      </div>
      <script src="../js/script2.js"></script>
</body>
</html>
