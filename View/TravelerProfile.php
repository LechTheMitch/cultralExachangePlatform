<?php
include("connect.php");

$user_id = 1;                       // هنظبط الجزئية دي مع الLogin

$sqlTraveler = "SELECT * FROM traveler WHERE id = $user_id";
$sqlUser = "SELECT name, phone_number , email , role FROM user WHERE id = $user_id";
$resultTraveler = mysqli_query($conn, $sqlTraveler);
$resultUser = mysqli_query($conn, $sqlUser);
$traveler = mysqli_fetch_assoc($resultTraveler);
$user = mysqli_fetch_assoc($resultUser);

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
    <title>HostProfile</title>
    <link rel="stylesheet" href="../bootstrap/css/bootstrap.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css"> <!--for icons-->
    <link rel="stylesheet" href="../css/host.css"> <!--for icons-->
</head>

<body>
    <header>
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
    </header>

    <main>
        <div class="container mt-5" style="background-color: #f1f1f1; border-radius: 10px; padding: 30px;">
            <div class="row justify-content-center">
                <!-- Profile Image -->
                <div class="col-md-4 d-flex justify-content-center align-items-center mb-4 profile-image-container">
                    <img src="../images/test.jpeg" alt="profileImage"
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
    </main>









</body>


</html>