<?php


namespace Controller;
use mysqli;

class DBController
{
    private $dbServer = "localhost";
    private $dbUser = "root";
    private $dbPass = "";
    private $dbName = "users";
    public $connection;

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
            echo "Connection is not opened";
            return false;
        }
    }
    public function query($query){
        $this->connection->query($query);
    }

}
?>
