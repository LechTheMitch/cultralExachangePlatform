<?php 


session_start();
include 'connect.php';
$signIn ="";
$signUp ="";
if(isset($_POST['signUp'])){
    $firstName=$_POST['name'];
    $phone_number=$_POST['phone_number'];
    $email=$_POST['email'];
    $password=$_POST['password'];
    $password=md5($password);
    $role=$_POST['role'];
    $Skills=$_POST['Skills'];


    $getUserIdQuery = "SELECT MAX(id) AS lastId FROM user";
    $result = $conn->query($getUserIdQuery);
    
    if ($result && $result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $userId = $row['lastId'] + 1; 
    } else {
        die("User not found.");
    }




    
     $checkEmail="SELECT * From user where email='$email'";
     $result=$conn->query($checkEmail);
     if($result->num_rows>0){
        $signUp = "Email Address Already Exists !";
     }
     else{
        $insertQuery="INSERT INTO user(name,phone_number,email,password,role)
                       VALUES ('$firstName','$phone_number','$email','$password','$role')";
      $insertQuery2="INSERT INTO traveler(id,skills)
                       VALUES ('$userId','$Skills')";
            if($conn->query($insertQuery)==TRUE&&$conn->query($insertQuery2)==TRUE){
               $_SESSION['email']=$email;
               if($role=='Host'){
                  header("location: hostInfo.php");

               }
               else{
                  header("location: homepage.php");

               }
            }
            else{
                $signUp = "Error:".$conn->error;
            }
     }
   

}

if(isset($_POST['signIn'])){
   $email=$_POST['email'];
   $password=$_POST['password'];
   $password=md5($password) ;



   $sql="SELECT * FROM user WHERE email='$email' and password='$password'";
   $result=$conn->query($sql);
   if($result->num_rows>0){
    session_start();
    $row=$result->fetch_assoc();
    $_SESSION['email']=$row['email'];
    header("Location: homepage.php");
    exit();
   }
   else{
    $signIn = "Incorrect Email or Password";
   }

}
?>