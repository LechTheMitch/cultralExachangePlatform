<?php
    if (session_status() == PHP_SESSION_NONE) {
        session_start();
    }
include 'connect.php'; // Include your database connection file

// Query to fetch hosts
$query = "SELECT * FROM host ORDER BY country ASC";
$result = $conn->query($query);

if ($result->num_rows > 0) {
    echo '<div class="container py-5">';
    echo '<div class="row g-4">';

    while ($row = $result->fetch_assoc()) {
        // Fetch user details for the host
        $detailsQuery = "SELECT * FROM user WHERE id = $row[id]";
        $detailsResult = $conn->query($detailsQuery);
        $details = $detailsResult->fetch_assoc();

        // Skip the current user if logged in
        if (isset($_SESSION["currentID"]) && $_SESSION["currentID"] == $row["id"]) {
            continue;
        }

        // Host card
        echo '<div class="col-md-6 col-lg-4">';
        echo '<div class="card h-100 shadow-sm border-0 overflow-hidden">';
        echo '<div class="position-relative" style="height: 200px;">';
        echo '<img src="' . htmlspecialchars($details["img"]) . '" class="card-img-top h-100 w-100 object-fit-cover" alt="Host Image">';
        echo '<span class="position-absolute top-0 end-0 bg-white text-primary rounded-pill px-3 py-1 m-3 small fw-medium">Verified Host</span>';
        echo '</div>';
        echo '<div class="card-body">';
        echo '<h5 class="card-title fw-semibold">' . htmlspecialchars($details["name"]) . '</h5>';
        echo '<p class="card-text text-muted small"><i class="bi bi-geo-alt"></i> ' . htmlspecialchars($row['country']) . '</p>';
        echo '<p class="card-text text-muted small">' . htmlspecialchars($row['description']) . '</p>';
        echo '<a href="chat.php" class="text-primary fw-medium small">View Details</a>';
        echo '</div>';
        echo '</div>';
        echo '</div>';
    }

    echo '</div>';
    echo '</div>';
} else {
    echo '<div class="container py-5">';
    echo '<p class="text-center text-muted">No hosts found.</p>';
    echo '</div>';
}
?>