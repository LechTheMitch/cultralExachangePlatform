<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CultureStay - Travel Meaningfully, Exchange Culturally</title>
    <link href="../bootstrap/css/bootstrap.css" rel="stylesheet">
    <link rel="stylesheet" href="../css/all.min.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Pacifico&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <style>
        .footer-link {
            color: gray;
            text-decoration: none;
            transition: color 0.3s ease;
        }
        .footer-link:hover {
            color: green;
        }
        .footer-main-text {
            color: green;
        }
        .footer-secondary-text {
            color: gray;
        }
    </style>
</head>

<footer class="bg-white py-4 shadow-sm">
    <div class="container">
        <div class="row">
            <!-- Logo and Description -->
            <div class="col-md-4 mb-3">
                <a class="navbar-brand logo-font footer-main-text fs-3" href="./index.php">CultureStay</a>
                <p class="footer-secondary-text small mt-2">
                    Travel meaningfully and exchange culturally with CultureStay. Explore new places, meet amazing people, and create unforgettable memories.
                </p>
            </div>

            <!-- Quick Links -->
            <div class="col-md-4 mb-3 text-center">
                <h5 class="footer-main-text">Quick Links</h5>
                <ul class="list-unstyled">
                    <li><a href="./index.php" class="footer-link">Home</a></li>
                    <li><a href="./about.html" class="footer-link">About Us</a></li>
                    <li><a href="./chat.php" class="footer-link">Messages</a></li>
                    <li><a href="./register.php" class="footer-link">Register</a></li>
                    <li><a href="./login.php" class="footer-link">Login</a></li>
                </ul>
            </div>

            <!-- Social Media Links -->
            <div class="col-md-4 mb-3 text-end">
                <h5 class="footer-main-text">Follow Us</h5>
                <div class="d-flex gap-3 justify-content-end">
                    <a href="#" class="footer-link fs-4"><i class="fa-brands fa-facebook"></i></a>
                    <a href="#" class="footer-link fs-4"><i class="fa-brands fa-instagram"></i></a>
                    <a href="#" class="footer-link fs-4"><i class="fa-brands fa-twitter"></i></a>
                    <a href="#" class="footer-link fs-4"><i class="fa-brands fa-youtube"></i></a>
                </div>
            </div>
        </div>

        <!-- Footer Bottom -->
        <div class="text-center mt-4">
            <p class="footer-secondary-text small mb-0">&copy; <?php echo date("Y"); ?> CultureStay. All rights reserved.</p>
        </div>
    </div>
</footer>