<?php 

session_start();
include 'connect.php';
$email=$_SESSION['email'];
$signUp ="";
if(isset($_POST['submit'])){
    $getUserIdQuery="SELECT id From user where email='$email'";
    $result = $conn->query($getUserIdQuery);
    if ($result && $result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $userId = $row['id'];
    } else {
        die("User not found.");
    }
    $Description=$_POST['Description'];
    $Accommodation=$_POST['Accommodation'];
    $Country=$_POST['Country'];
    $RequiredHelp=$_POST['RequiredHelp'];
    $Title=$_POST['Title'];
    $State_ID=$_POST['State_ID'];
    $Dates_Available=$_POST['Dates_Available'];
    $Category=$_POST['Category'];
    $Learning_Opportunities=$_POST['Learning_Opportunities'];
    $SpokenLanguages=$_POST['SpokenLanguages'];

        $insertQuery="INSERT INTO host(id,description,accommodation,country,requiredHelp,title,stateID,datesAvailable,category,learningOpportunities,spokenLanguages)
                        VALUES ('$userId','$Description','$Accommodation','$Country','$RequiredHelp','$Title','$State_ID','$Dates_Available','$Category','$Learning_Opportunities','$SpokenLanguages')";
            if($conn->query($insertQuery)==TRUE){
                header("location: ../View/index.php");
            }
            else{
                $signUp = "Error:".$conn->error;
            }
    }




?>