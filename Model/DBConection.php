<?php


class DBConection
{
    private $DB_server = "localhost";
    private $DB_user = "root";
    private $DB_pass = "";
    private $DB_name = "users";

    //TODO
    public function getConnection(){
        $conn = new mysqli($this->DB_server, $this->DB_user, $this->DB_pass, $this->DB_name);
        return $conn;
    }

}
