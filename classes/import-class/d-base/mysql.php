<?php


class Mysql{

    public function __construct()
    {
        $this->x = "Christ is Lord!";
        
    }

    public function connect()
    {
        $servername = "localhost";
        $username = "rootx";
        $password = "rootx";

        #Create connection
        $conn = new mysqli($servername, $username, $password);

        #Check connection
        if ($conn->connect_error)
        {
            $this->connection_msg     =    $conn->connect_error;
            $this->connection_signal  =    1;
        }
        else
        {
            $this->connection_signal  =   0;
            $this->connection_msg     =   "Connected successfully";
            
        }

    }
}

$mysql = new Mysql;
$mysql->connect();



?>