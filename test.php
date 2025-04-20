<?php
include("Model/connect.php");

$location = $_POST['location'] ?? '';
$worktype = $_POST['work_type'] ?? '';
$date = $_POST['duration'] ?? '';
$sql = "SELECT * FROM host WHERE 
       country LIKE '%$location%'
       ORDER BY
       CASE WHEN country = '$location' THEN 0 ELSE 1 END, 
       CASE WHEN category = '$worktype' THEN 0 ELSE 1 END,  
       DATEDIFF('$date', datesAvailable) ASC,             
       country, category, datesAvailable";


$result = mysqli_query($conn, $sql);
while ($row = mysqli_fetch_assoc($result)) {
    echo $row['country']." | ".$row['category']." | ".$row['datesAvailable']."<br>";
}
?>