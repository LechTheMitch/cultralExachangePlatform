<?php
    if (session_status() == PHP_SESSION_NONE) {
        session_start();
    }
    include 'connect.php';

    $query = "SELECT * FROM host ORDER BY country ASC LIMIT 3";
    $result = $conn->query($query);

    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            $detailsQuery = "SELECT * FROM user WHERE id = {$row['id']}";
            $detailsResult = $conn->query($detailsQuery);
            $details = $detailsResult->fetch_assoc();

            // تجاهل المستخدم الحالي
            if (isset($_SESSION["currentID"]) && $_SESSION["currentID"] == $row["id"]) {
                continue;
            }

            // تحديد صفحة البروفايل حسب الدور
            $profilePage = "../View/" . (($details['role'] === 'traveler') ? 'travelerProfile.php' : 'hostProfile.php');

            echo '<div class="col-md-6 col-lg-4">';
            echo '<div class="card h-100 shadow-sm border-0 overflow-hidden">';
            echo '<div class="position-relative" style="height: 200px;">';
            echo '<img src="' . $details["img"] . '" class="card-img-top h-100 w-100 object-fit-cover" alt="Host Image">';
            echo '<span class="position-absolute top-0 end-0 bg-white text-primary rounded-pill px-3 py-1 m-3 small fw-medium">Verified Host</span>';
            echo '</div>';
            echo '<div class="card-body">';
            echo '<h5 class="card-title fw-semibold">' . htmlspecialchars($details["name"]) . '</h5>';
            echo '<p class="card-text text-muted small"><i class="bi bi-geo-alt"></i> ' . htmlspecialchars($row['country']) . '</p>';
            echo '<p class="card-text text-muted small">' . htmlspecialchars($row['description']) . '</p>';

            // فورم للذهاب إلى صفحة البروفايل
            echo '<form action="' . $profilePage . '" method="POST">';
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