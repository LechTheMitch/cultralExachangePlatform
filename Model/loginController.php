<?php
session_start();
include 'connect.php';

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['email']) && isset($_POST['password'])) {
    $email = $conn->real_escape_string($_POST['email']);
    $password = md5($_POST['password']); 
    
    $sql = "SELECT * FROM user WHERE email='$email' AND password='$password'";
    $result = $conn->query($sql);
    
    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $_SESSION['currentID'] = $row['id'];
        $_SESSION['email'] = $row['email'];
        $_SESSION['role'] = $row['role'];
        $_SESSION['userName'] = $row['name'];
        $_SESSION['img'] = $row['img'];

        if ($row['role'] === 'admin') {
            header("Location: ../View/adminDash.php"); 
            exit();
        }

        header("Location: ../View/index.php");
        exit();
    } else {
        $signIn = "Incorrect Email or Password";
        header("Location: ../View/login.php?error=1");
        exit();
    }
} else {
    // Invalid request
    echo "Invalid request";
    exit();
}
?>
