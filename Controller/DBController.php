<?php


namespace Controller;
use mysqli;


final class DBController
{
    private $dbServer = "localhost";
    private $dbUser = "root";
    private $dbPass = "";
    private $dbName = "homestays_and_cultural_exchange";
    public mysqli $connection;

    //TODO
    public function openConnection(): bool
    {
        $this->connection=new mysqli($this->dbServer,$this->dbUser,$this->dbPass,$this->dbName);
        if($this->connection->connect_error)
        {
            echo " Error : ".$this->connection->connect_error;
            return false;
        }
        else
        {
            return true;
        }
    }
    public function closeConnection(): bool{
        if($this->connection)
        {
            $this->connection->close();
            return true;
        }
        else
        {
            echo "Connection is not open";
            return false;
        }
    }
    public function query($query){
        $this->connection->query($query);
    }
    public function getConnection(){
        return $this->connection;
    }
    public function getUserById($user_id)
    {
        $sql = "SELECT * FROM user WHERE id = $user_id";
        $result = $this->connection->query($sql);
        return $result->fetch_assoc();
    }
    public function getUserByEmail($email)
    {
        $sql = "SELECT * FROM user WHERE email = '$email'";
        $result = $this->connection->query($sql);
        if ($result->num_rows > 0) {
            return $result->fetch_assoc();
        } else {
            return null;
        }
    }
    public function getUserByUsername($username){
        $sql = "SELECT * FROM user WHERE username = '$username'";
        $result = $this->connection->query($sql);
        if ($result->num_rows > 0) {
            return $result->fetch_assoc();
        } else {
            return null;
        }
    }
    public function filterUsersByCountry($country, $role)
    {
        $sql = "SELECT * FROM user WHERE country = '$country' AND role = '$role'";
        $result = $this->connection->query($sql);
        if ($result->num_rows > 0) {
            return $result->fetch_all(MYSQLI_ASSOC);
        } else {
            return null;
        }
    }
    public function filterUsersByCity($city, $role){

    }
    public static function insertWithStyle($userID, $cardNumber, $expiryMonth, $expiryYear, $zipCode):bool
    {
        $dbController = new DBController();
        $dbController->openConnection();
        $cardInformation = "$cardNumber-$expiryMonth-$expiryYear-$zipCode";
        $sql = "INSERT INTO traveler WHERE id=$userID (cardInformation) VALUES ('$cardInformation')";
        $result = $dbController->connection->query($sql);
        $dbController->closeConnection();
        return $result;
    }
    public static function retrieveWithStyle($userID):array
    {
        $dbController = new DBController();
        $dbController->openConnection();
        $sql = "SELECT cardInformation FROM traveler WHERE id = $userID";
        $result = $dbController->connection->query($sql);
        $dbController->closeConnection();
        $result->fetch_assoc();
        return explode("-", $result);
    }
    public static function setProfileImage(string $image):void
    {
        $dbController = new DBController();
        $dbController->openConnection();
        $sql = "UPDATE user SET profileImage = ':image' WHERE id = {$_SESSION['currentID']}";
        $stmt = $dbController->connection->prepare($sql);
        $stmt->bind_param(':image', $image);
        $stmt->execute();
        $stmt->close();
        $dbController->closeConnection();

    }
    


}
?>
