<?php
session_start();
if(!isset($_SESSION['currentID'])){
    header("Location: login.php");
}
include("../Model/connect.php");

$user_id = $_SESSION['currentID'];       

$sqlTraveler = "SELECT * FROM traveler WHERE id = $user_id";
$sqlUser = "SELECT name, phone_number , email , role , img FROM user WHERE id = $user_id";
$resultTraveler = mysqli_query($conn, $sqlTraveler);
$resultUser = mysqli_query($conn, $sqlUser);
$traveler = mysqli_fetch_assoc($resultTraveler);
$user = mysqli_fetch_assoc($resultUser);

if (!empty($traveler['currentHostID'])) {
    $sqlHost = "SELECT * FROM host WHERE id = {$traveler['currentHostID']}";
    $resultHost = mysqli_query($conn, $sqlHost);
    $host = mysqli_fetch_assoc($resultHost);
}



$hostName = null; // Default
if (!empty($traveler["currentHostID"])) {
    $currentHostID = $traveler["currentHostID"];
    $sqlHostName = "SELECT name FROM user WHERE id = $currentHostID";
    $resultHostName = mysqli_query($conn, $sqlHostName);
    if ($resultHostName && mysqli_num_rows($resultHostName) > 0) {
        $hostName = mysqli_fetch_assoc($resultHostName);
    }
}



mysqli_close($conn);
//                     Current Data -> role email phone number skills dayBooked CurrentHost
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>TravelerProfile</title>
    <link rel="stylesheet" href="../bootstrap/css/bootstrap.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css"> <!--for icons-->
    <link rel="stylesheet" href="../css/host.css">
</head>

<body>
    <?php
        include "header.php" ;
    ?>
    <!-- <header>
        <nav class="navbar navbar-expand-lg bg-body-tertiary">
            <div class="container-fluid">
                <a class="navbar-brand" href="#">Navbar</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                        <li class="nav-item">
                            <a class="nav-link active" aria-current="page" href="#">Home</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">Link</a>
                        </li>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                Dropdown
                            </a>
                            <ul class="dropdown-menu">
                                <li><a class="dropdown-item" href="#">Action</a></li>
                                <li><a class="dropdown-item" href="#">Another action</a></li>
                                <li>
                                    <hr class="dropdown-divider">
                                </li>
                                <li><a class="dropdown-item" href="#">Something else here</a></li>
                            </ul>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link disabled" aria-disabled="true">Disabled</a>
                        </li>
                    </ul>
                    <form class="d-flex" role="search">
                        <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
                        <button class="btn btn-outline-success" type="submit">Search</button>
                    </form>
                </div>
            </div>
        </nav>
    </header> -->

    <main>
        <div class="container my-5" style="background-color: #f1f1f1; border-radius: 10px; padding: 30px;">
            <div class="row justify-content-center">
                <!-- Profile Image -->
                <div class="col-md-4 d-flex justify-content-center align-items-center mb-4 profile-image-container">
                    <img src="../<?php echo $user['img'] ?>" alt="profileImage"
                        class="img-fluid rounded-circle"
                        style="width: 80%; height: auto; aspect-ratio: 1 / 1; object-fit: cover;">
                </div>

                <!-- Profile Info -->
                <div class="col-md-7">
                    <!-- Name -->
                    <div class="row text-center mb-4 text-section">
                        <h1 class="display-4 text-primary">~| <?php echo $user["name"] ?> |~</h1>
                    </div>

                    <!-- Role -->
                    <div class="row mb-3 text-center text-item">
                        <h4><strong>Role:</strong> <?php echo $user["role"] ?></h4>
                    </div>

                    <!-- Skills -->
                    <div class="row mb-3 text-center text-item">
                        <h4><strong>Skills:</strong> <?php echo $traveler["skills"] ?></h4>
                    </div>

                    <!-- Current Host -->
                    <div class="row mb-3 text-center text-item">
                        <h4><strong>Current Host:</strong> <?php
                                                            if (empty($traveler["currentHostID"])) {
                                                                echo "No Current Host";
                                                            } else {
                                                                echo $hostName["name"];
                                                            }
                                                            ?></h4>
                    </div>
                </div>
            </div>
        </div>

        <?php if (empty($traveler['currentHostID'])): ?>
            <!-- No Host Assigned -->
            <div class="container border mt-5 rounded shadow-sm p-4 text-center" style="background-color: #ffcccc;">
                <h3 class="text-danger">
                    <i class="bi bi-exclamation-triangle-fill me-2"></i>
                    You do not currently have a host assigned.
                </h3>
            </div>
        <?php else: ?>
            <!-- Booking and Host Info -->
            <div class="container border mt-5 rounded shadow-sm overflow-hidden" style="background-color: #f7f9f9;">
                <div class="row">
                    <!-- Booking Date & Time -->
                    <div class="col-md-6 p-4 rounded-start text-start" style="background-color: #ffe0b2;">
                        <h2>Booking Info</h2>
                        <h4>
                            <i class="bi bi-calendar-event me-2"></i>
                            Day Booked & Time: <?php echo $traveler['dayBooked']; ?>
                        </h4>
                    </div>

                    <!-- Help & Accommodation Info -->
                    <div class="col-md-6 p-0 text-center">
                        <div class="hover-box p-3 text-white" style="background-color: #6b705c;">
                            <h3 class="w-100">
                                <i class="bi bi-tools me-2"></i>
                                Helping In: <?php echo $host['requiredHelp']; ?>
                            </h3>
                        </div>
                        <div class="hover-box p-3 text-white rounded-end" style="background-color: #a5a58d;">
                            <h3 class="w-100">
                                <i class="bi bi-house-heart me-2"></i>
                                Accommodation: <?php echo $host['accommodation']; ?>
                            </h3>
                        </div>
                    </div>
                </div>
            </div>
        <?php endif; ?>



        <!-- contact section -->
        <div class="container border mt-3 rounded shadow-sm overflow-hidden">
            <!-- Header Row -->
            <div class="row p-3 text-white text-center" style="background-color: #3c403d;">
                <h2 class="w-100"><i class="bi bi-person-lines-fill me-2"></i>Contacts</h2>
            </div>

            <!-- Contact Info -->
            <div class="row text-center">
                <div class="col p-3 text-white contact-box" style="background-color: #588157;">
                    <h4><i class="bi bi-envelope-fill me-2"></i>Email: <?php echo $user["email"] ?></h4>
                </div>
                <div class="col p-3 text-white rounded-end contact-box" style="background-color: #6b705c;">
                    <h4><i class="bi bi-telephone-fill me-2"></i>Phone Number: <?php echo $user["phone_number"] ?></h4>
                </div>
            </div>
    </main>


</body>


</html>