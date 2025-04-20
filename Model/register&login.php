<?php
session_start();
include 'connect.php';

$signIn = "";
$signUp = "";

if (isset($_POST['signUp'])) {
    $firstName = $conn->real_escape_string($_POST['name']);
    $phone_number = $conn->real_escape_string($_POST['phone_number']);
    $email = $conn->real_escape_string($_POST['email']);
    $password = md5($_POST['password']); 
    $role = $conn->real_escape_string($_POST['role']);
    $Skills = isset($_POST['Skills']) ? $conn->real_escape_string($_POST['Skills']) : '';

    $checkEmail = "SELECT * FROM user WHERE email='$email'";
    $result = $conn->query($checkEmail);
    
    if ($result->num_rows > 0) {
        $signUp = "Email Address Already Exists!";
    } else {
        $conn->begin_transaction();
        
        try {
            $insertQuery = "INSERT INTO user (name, phone_number, email, password, role)
                          VALUES ('$firstName', '$phone_number', '$email', '$password', '$role')";
            
            if (!$conn->query($insertQuery)) {
                throw new Exception("Error in user registration: " . $conn->error);
            }
            
            $userId = $conn->insert_id; 
            
            if ($role == 'Traveler') {
                $insertQuery2 = "INSERT INTO traveler (id, skills)
                                VALUES ('$userId', '$Skills')";
                if (!$conn->query($insertQuery2)) {
                    throw new Exception("Error in traveler registration: " . $conn->error);
                }
            }
            
            $conn->commit();
            
            $_SESSION['user_id'] = $userId;
            $_SESSION['email'] = $email;
            $_SESSION['role'] = $role;
            
            if ($role == 'Host') {
                header("Location: hostInfo.php");
            } else {
                header("Location: homepage.php");
            }
            exit();
            
        } catch (Exception $e) {
            $conn->rollback();
            $signUp = $e->getMessage();
        }
    }
}

if (isset($_POST['signIn'])) {
    $email = $conn->real_escape_string($_POST['email']);
    $password = md5($_POST['password']); 
    
    $sql = "SELECT * FROM user WHERE email='$email' AND password='$password'";
    $result = $conn->query($sql);
    
    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $_SESSION['user_id'] = $row['id'];
        $_SESSION['email'] = $row['email'];
        $_SESSION['role'] = $row['role'];
        header("Location: homepage.php");
        exit();
    } else {
        $signIn = "Incorrect Email or Password";
    }
}
?>