<?php
    session_start();
    if(!isset($_SESSION['currentID'])){
        header("Location: login.php");
    }
    include("connect.php");

    $user_id = $_SESSION['currentID'];
    $sql = "SELECT role FROM user WHERE id = $user_id";
    $result = mysqli_query($conn, $sql); 
    $result = mysqli_fetch_assoc($result); 

    if ($result['role'] == 'host') {
        header("Location: ../View/HostProfile.php");
        exit();
    } 
    elseif ($result['role'] == 'traveler') {
        header("Location: ../View/TravelerProfile.php");
        exit();
    }
    else if( $result['role'] == 'admin') {
        echo "you are an admin go away !!";
    }
    mysqli_close($conn);

?>