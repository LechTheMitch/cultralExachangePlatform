<?php
session_start();
if (!isset($_SESSION['currentID'])) {
    header("Location: login.php");
    exit();
}

include("../Model/connect.php");

$loggedInID = $_SESSION['currentID'];
$profileID = isset($_POST['user_id']) ? intval($_POST['user_id']) : $loggedInID;

$sqlHost = "SELECT * FROM host WHERE id = $profileID";
$sqlUser = "SELECT name, phone_number, email, role, img FROM user WHERE id = $profileID";

$resultHost = mysqli_query($conn, $sqlHost);
$resultUser = mysqli_query($conn, $sqlUser);

$host = mysqli_fetch_assoc($resultHost);
$user = mysqli_fetch_assoc($resultUser);
$profileImg = $user['img'];

mysqli_close($conn);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>HostProfile</title>
    <link rel="stylesheet" href="../bootstrap/css/bootstrap.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
    <link rel="stylesheet" href="../css/host.css">
</head>
<body>
<?php include "header.php"; ?>

<main>
    <div class="container mt-5" style="background-color: #f1f1f1; border-radius: 10px; padding: 30px;">
        <div class="row justify-content-center">
            <div class="col-md-4 d-flex justify-content-center align-items-center mb-4 profile-image-container">
                <img src="<?php echo $profileImg; ?>" alt="profileImage"
                    class="img-fluid rounded-circle"
                    style="width: 80%; height: auto; aspect-ratio: 1 / 1; object-fit: cover;">
            </div>

            <div class="col-md-7">
                <div class="row text-center mb-4 text-section">
                    <h1 class="display-4 text-primary"><?php echo $user["name"]; ?></h1>
                </div>
                <div class="row mb-3">
                    <div class="col text-center text-item">
                        <h4><strong>Role:</strong> <?php echo $user["role"]; ?></h4>
                    </div>
                    <div class="col text-center text-item">
                        <h4><strong>Title:</strong> <?php echo $host["title"]; ?></h4>
                    </div>
                </div>
                <div class="row mb-3">
                    <div class="col text-center text-item">
                        <h4><strong>Country:</strong> <?php echo $host["country"]; ?></h4>
                    </div>
                    <div class="col text-center text-item">
                        <h4><strong>Category:</strong> <?php echo $host["category"]; ?></h4>
                    </div>
                </div>
                <div class="row mb-3 text-center text-item">
                    <h4><strong>Languages:</strong> <?php echo $host["spokenLanguages"]; ?></h4>
                </div>

                <?php if ($profileID == $loggedInID): ?>
                <div class="row justify-content-center mb-3">
                    <a href="updateHost.php" class="btn">
                        <i class="bi bi-pencil-fill me-2"></i>Update Profile
                    </a>
                </div>
                <?php endif; ?>
            </div>
        </div>
    </div>

    <div class="container border mt-5 rounded shadow-sm overflow-hidden" style="background-color: #f7f9f9;">
        <div class="row">
            <div class="col-md-6 p-4 rounded-start text-start" style="background-color: #ffe0b2;">
                <h2>Description</h2>
                <h4><?php echo $host["description"]; ?></h4>
            </div>
            <div class="col-md-6 p-0 text-center">
                <div class="hover-box p-3 text-white" style="background-color: #6b705c;">
                    <h3><i class="bi bi-lightbulb me-2"></i>
                        Learning Opportunities: <?php echo $host["learningOpportunities"]; ?>
                    </h3>
                </div>
                <div class="hover-box p-3 text-white" style="background-color: #a5a58d;">
                    <h3><i class="bi bi-tools me-2"></i>
                        Required Help: <?php echo $host["requiredHelp"]; ?>
                    </h3>
                </div>
                <div class="hover-box p-3 text-white rounded-end" style="background-color: #6b705c;">
                    <h3><i class="bi bi-house-heart me-2"></i>
                        Accommodation: <?php echo $host["accommodation"]; ?>
                    </h3>
                </div>
            </div>
        </div>
    </div>

    <div class="container border mt-3 rounded shadow-sm overflow-hidden">
        <div class="row p-3 text-white text-center" style="background-color: #3c403d;">
            <h2><i class="bi bi-person-lines-fill me-2"></i>Contacts</h2>
        </div>
        <div class="row text-center">
            <div class="col p-3 text-white contact-box" style="background-color: #588157;">
                <h4><i class="bi bi-envelope-fill me-2"></i>Email: <?php echo $user["email"]; ?></h4>
            </div>
            <div class="col p-3 text-white rounded-end contact-box" style="background-color: #6b705c;">
                <h4><i class="bi bi-telephone-fill me-2"></i>Phone Number: <?php echo $user["phone_number"]; ?></h4>
            </div>
        </div>
    </div>
</main>

<script src="../bootstrap/js/bootstrap.js"></script>
</body>
</html>
