<?php 

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

     $checkEmail="SELECT * From user where email='$email'";
     $result=$conn->query($checkEmail);
     if($result->num_rows>0){
        $signUp = "Email Address Already Exists !";
     }
     else{
        $insertQuery="INSERT INTO user(name,phone_number,email,password,role)
                       VALUES ('$firstName','$phone_number','$email','$password','$role')";
            if($conn->query($insertQuery)==TRUE){
                header("location: index.php");
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
//    if(empty($email) || empty($password)){
//     $error = "All fields are required!";
// }



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