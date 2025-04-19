<?php
include("register&login.php");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register & Login</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="container" id="signup" >
      <h1 class="form-title">Register</h1>
      <?php if (!empty($signUp)) { ?>
        <p class="error" style="color: red;display: flex;
justify-content: center;"><?php echo $signUp; ?></p>
      <?php } ?>
      <form method="post" action="register.php">
        <div class="input-group">
           <i class="fas fa-user"></i>
           <input type="text" name="name" id="fName" placeholder="First Name" required>
           <label for="fname">Full Name</label>
        </div>
        <div class="input-group">
            <i class="fas fa-phone"></i>
            <input type="text" name="phone_number" id="lName" placeholder="Last Name" required>
            <label for="lName">phone_number</label>
        </div>
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
        <div id="skills" class="input-group" style="display:none;">
            <i class="fas fa-award"></i>
            <input type="Skills" name="Skills" id="Skills" placeholder="Skills" required>
            <label for="Skills">Skills</label>
        </div>
        <div class="input-group">
            <input  type="text" name="role" id="role" placeholder="Role" required>
            <label for="role">Role</label>

            <!-- <select name="role" id="role">
              <option value="">Host</option>
              <option value="">Traveler</option>

            </select> -->
            
        </div>
       <input type="submit" class="btn" value="Sign Up" name="signUp">
      </form>
      <p class="or">
        ----------or--------
      </p>
      <div class="icons">
        <i class="fab fa-google"></i>
        <i class="fab fa-facebook"></i>
      </div>
      <div class="links">
        <p>Already Have Account ?</p>
        <button id="signInButton"><a href="login.php">Sign In</a></button>
      </div>
    </div>

   
      <script src="script2.js"></script>
</body>
</html>
