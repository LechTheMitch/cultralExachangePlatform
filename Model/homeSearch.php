<?php
include("connect.php");

$location = $_POST['location'] ?? '';
$worktype = $_POST['work_type'] ?? '';
$date = $_POST['duration'] ?? '';

// JOIN user table to get the name
$sql = "SELECT user.name, host.country, host.category, host.datesAvailable 
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
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>Search Results</title>
  <link rel="stylesheet" href="../css/homeSearch.css" />
</head>
<body>
  <header>
    <h1>Search Results</h1>
  </header>

  <main class="host-list">
    <?php
    if (mysqli_num_rows($result) > 0) {
      while ($row = mysqli_fetch_assoc($result)) {
        echo "
        <div class='host-card'>
          <div class='host-info'>
            <h2>{$row['name']}</h2>
            <p>📍 <strong>{$row['country']}</strong></p>
            <p>🛠️ Work Type: <strong>{$row['category']}</strong></p>
            <p>📅 Available from: <strong>{$row['datesAvailable']}</strong></p>
            <button>View Profile</button>
          </div>
        </div>";
      }
    } else {
      echo "<p class='no-result'>No hosts found.</p>";
    }
    ?>
  </main>
</body>
</html>
