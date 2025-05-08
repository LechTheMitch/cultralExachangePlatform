<?php 
    session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register & Login</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    <link rel="stylesheet" href="../css/style2.css">
    <style>
        .input-group select {
            width: 100%;
            padding: 10px;
            border: none;
            border-bottom: 1px solid #ccc;
            background: transparent;
            outline: none;
            color: #333;
        }
        .input-group select option {
            background: #f9f9f9;
            color: #333;
        }
    </style>
</head>
<body>
    <div class="container" id="signup">
        <h1 class="form-title">Register</h1>
        <?php if (!empty($signUp)) { ?>
            <p class="error" style="color: red; display: flex; justify-content: center;">
                <?php echo $signUp; ?>
            </p>
        <?php } ?>
        <form method="post" action="../Model/registerController.php" enctype="multipart/form-data">
            <div class="input-group">
                <i class="fas fa-user"></i>
                <input type="text" name="name" id="fName" placeholder="Full Name" required>
                <label for="fName">Full Name</label>
            </div>
            <div class="input-group">
                <i class="fas fa-phone"></i>
                <input type="text" name="phone_number" id="phone_number" placeholder="Phone Number" required>
                <label for="phone_number">Phone Number</label>
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
            <div class="input-group">
                <i class="fas fa-image"></i>
                <input type="file" name="img">
                <label for="img">Image</label>
            </div>
            <div id="skills" class="input-group" style="display: none;">
                <i class="fas fa-award"></i>
                <input type="text" name="Skills" id="Skills" placeholder="Skills">
                <label for="Skills">Skills</label>
            </div>
            <div class="input-group">
                <select name="role" id="role" required>
                    <option value="" disabled selected>Select Role</option>
                    <option value="Host">Host</option>
                    <option value="Traveler">Traveler</option>
                </select>
                <!-- <label for="role">Role</label> -->
            </div>
            <input type="submit" class="btn" value="Sign Up" name="signUp">
        </form>
        <p class="or">---------- or --------</p>
        <div class="icons">
            <i class="fab fa-google"></i>
            <i class="fab fa-facebook"></i>
        </div>
        <div class="links">
            <p>Already Have an Account?</p>
            <button id="signInButton"><a href="login.php">Sign In</a></button>
        </div>
    </div>

    <script>
        document.getElementById("role").addEventListener("change", function() {
            const role = this.value;
            const skillsDiv = document.getElementById("skills");
            const skillsInput = document.getElementById("Skills");
            
            if (role === "Traveler") {
                skillsDiv.style.display = "block";
                skillsInput.required = true;
            } else {
                skillsDiv.style.display = "none";
                skillsInput.required = false;
            }
        });
    </script>
</body>
</html>