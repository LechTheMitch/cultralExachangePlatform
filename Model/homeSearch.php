<?php
include("connect.php");

$location = $_POST['location'] ?? '';
$worktype = $_POST['work_type'] ?? '';
$date = $_POST['duration'] ?? '';


$sql = "SELECT user.name, host.country, host.category, host.datesAvailable ,user.img,user.id,host.description
        FROM host
        INNER JOIN user ON host.id = user.id
        WHERE host.country LIKE '%$location%'
        ORDER BY
          CASE WHEN host.country = '$location' THEN 0 ELSE 1 END, 
          CASE WHEN host.category = '$worktype' THEN 0 ELSE 1 END,  
          DATEDIFF('$date', host.datesAvailable) ASC,              
          host.country, host.category, host.datesAvailable";

$result = mysqli_query($conn, $sql);
?>
<!DOCTYPE html>
<html lang="en">
<l>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>Search Results</title>
  <link rel="stylesheet" href="../css/homeSearch.css" />
 <link rel="stylesheet" href="../bootstrap/css/bootstrap.css">
</head>
<body>
  <header>
    <h1>Search Results</h1>
  </header>

  <main class="host-list">
    <?php

    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
        

            // تجاهل المستخدم الحالي
            if (isset($_SESSION["currentID"]) && $_SESSION["currentID"] == $row["id"]) {
                continue;
            }

           

            echo '<div class="col-md-6 col-lg-4">';
            echo '<div class="card h-100 shadow-sm border-0 overflow-hidden">';
            echo '<div class="position-relative" style="height: 200px;">';
            echo '<img src="' . $row["img"] . '" class="card-img-top h-100 w-100 object-fit-cover" alt="Host Image">';
            echo '<span class="position-absolute top-0 end-0 bg-white text-primary rounded-pill px-3 py-1 m-3 small fw-medium">Verified Host</span>';
            echo '</div>';
            echo '<div class="card-body">';
            echo '<h5 class="card-title fw-semibold">' . htmlspecialchars($row["name"]) . '</h5>';
            echo '<p class="card-text text-muted small"><i class="bi bi-geo-alt"></i> ' . htmlspecialchars($row['country']) . '</p>';
            echo '<p class="card-text text-muted small">' . htmlspecialchars($row['description']) . '</p>';

    
            echo '<form action= "../View/hostProfile.php" method="POST">';
            echo '<input type="hidden" name="user_id" value="' . $row["id"] . '">';
            echo '<button type="submit" class="btn btn-link text-primary fw-medium small p-0 m-0">View Details</button>';
            echo '</form>';

            echo '</div>';
            echo '</div>';
            echo '</div>';
        }
    } else {
        echo '<p>No hosts found.</p>';
    }
    ?>
  </main>
</body>
</html>
