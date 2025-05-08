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

    if (isset($_FILES['img']) && $_FILES['img']['error'] === UPLOAD_ERR_OK) {// when user upload image
        $imgName = $_FILES['img']['name'];
        $imgTempName = $_FILES['img']['tmp_name'];
        $time = time();
        $newImgName = $time . $imgName; 
        $imgTargetFolder = "../images/" . $newImgName; 

        $imgExplode = explode('.', $imgName);
        $imgExt = end($imgExplode);

        $extensions = ['jpg', 'jpeg', 'png'];

        if (in_array($imgExt, $extensions)) {

            if (move_uploaded_file($imgTempName, $imgTargetFolder)) {
            } else {   
                $signUp = "Failed to upload image!";
            }
        }else {
            $signUp = "Invalid Image Format!";
        }

    } else { // if user does not upload image then default image will be used
        $imgTargetFolder = "../images/default.jpg" ;
    }


    $checkEmail = "SELECT * FROM user WHERE email='$email'";
    $result = $conn->query($checkEmail);
    
    if ($result->num_rows > 0) {
        $signUp = "Email Address Already Exists!";
    } else {
        $conn->begin_transaction();
        
        try {
            $insertQuery = "INSERT INTO user (name, phone_number, email, password, role, img)
                            VALUES ('$firstName', '$phone_number', '$email', '$password', '$role', '$imgTargetFolder')";
            
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
            
            $_SESSION['currentID'] = $userId;
            $_SESSION['email'] = $email;
            $_SESSION['role'] = $role;
            $_SESSION['userName'] = $firstName;
            $_SESSION['img'] = $imgTargetFolder;
            
            if ($role == 'Host') {
                header("Location: ../View/hostInfo.php");
            } else {
                header("Location: ../View/index.php");
            }
            exit();
            
        } catch (Exception $e) {
            $conn->rollback();
            $signUp = $e->getMessage();
        }
    }


if (isset($_POST['signIn'])) {
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
       /* $_SESSION['img'] = $row['img'];*/
        header("Location: ../View/index.php");
        exit();
    } else {
        $signIn = "Incorrect Email or Password";
    }
}
}
?>