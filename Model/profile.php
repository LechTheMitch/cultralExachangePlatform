<?php
    include("connect.php");

    $user_id = $_SESSION['user_id'];

    /* based on the role of the user, you will be redirected to either host.php or traveler.php */
    $sql = "SELECT role FROM user WHERE id = $user_id";
    $result = mysqli_query($conn, $sql); 
    $result = mysqli_fetch_assoc($result); 

    if ($result['role'] == 'host') {
        header("Location: HostProfile.php");
        exit();
    } 
    elseif ($result['role'] == 'traveler') {
        header("Location: TravelerProfile.php");
        exit();
    }
    else if( $result['role'] == 'admin') {
        echo "you are an admin go away !!";
    }
    mysqli_close($conn);

?>
