<?php
    session_start();
    ?>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CultureStay - Travel Meaningfully, Exchange Culturally</title>
    <link href="../bootstrap/css/bootstrap.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.0/font/bootstrap-icons.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Pacifico&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <style>
        .text-primary {
            color: green !important;
        }
        .logo-font {
            font-family: 'Pacifico', cursive;
        }
        .main-text {
            color: black;
        }

    </style>
</head>
<header class="bg-white shadow-sm sticky-top">
    <div class="container">
        <nav class="navbar navbar-expand-lg py-3">
            <div class="container-fluid">
                <a class="navbar-brand logo-font text-primary fs-3" href="#">CultureStay</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarNav">
                    <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                        <li class="nav-item">
                            <a class="nav-link" href="#">Home</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">Find Hosts</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">Messages</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="../View/about.html">About Us</a>
                        </li>
                    </ul>
                    <div class="d-flex ms-lg-4">
                        <?php if (isset($_SESSION['userName'])): ?>
                            <div class="dropdown d-flex align-items-center">
                                <button class="btn btn-link text-decoration-none dropdown-toggle text-primary d-flex align-items-center" type="button" id="profileDropdown" data-bs-toggle="dropdown">
                                    <i class="bi bi-person-circle fs-4 me-2 text-primary"></i>
                                    <span class="main-text"><?= htmlspecialchars($_SESSION['userName'], ENT_QUOTES, 'UTF-8') ?></span>
                                </button>
                                <ul class="dropdown-menu">
                                    <li><a class="dropdown-item" href="../View/profile.php">My Profile</a></li>
                                    <li><a class="dropdown-item" href="../Model/logout.php">Logout</a></li>
                                </ul>

                            </div>
                        <?php else: ?>
                            <a href="../View/login.php">
                                <button class="btn btn-outline-primary rounded-button me-2">Sign In</button>
                            </a>
                            <a href="../View/register.php">
                                <button class="btn btn-primary rounded-button">Register</button>
                            </a>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        </nav>
    </div>
</header>