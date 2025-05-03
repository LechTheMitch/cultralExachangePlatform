<?php
    include("connect.php");

    $user_id = 1; // هنظبط الجزئية دي مع الLogin

    /* based on the role of the user, you will be redirected to either host.php or traveler.php */
    $sql = "SELECT role FROM user WHERE id = $user_id";
    $result = mysqli_query($conn, $sql); // it returns the result as an object
    $result = mysqli_fetch_assoc($result); // it Transforms the object into an associative array

    if ($result['role'] == 'host') {
        header("Location: HostProfile.php");
    } 
    elseif ($result['role'] == 'traveler') {
        header("Location: TravelerProfile.php");
    }
    else if( $result['role'] == 'admin') {
        echo "you are an admin go away !!";
    }
    mysqli_close($conn);

?>
