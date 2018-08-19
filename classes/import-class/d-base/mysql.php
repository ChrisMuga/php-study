<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

class Mysql{
    public $conn;
    #connection
    public function connect()
    {
        $servername     = "localhost";
        $username       = "rootx";
        $password       = "rootx";
        $dbname         = "students";

        #Create connection
        $this->conn = new mysqli($servername, $username, $password, $dbname);

        #Check connection
        if ($this->conn->connect_error)
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

    #inserts
    public function insert($args)
    {
        $values = array();
        foreach($args as $key => $value)
        {
            #echo $key.": ".$value."<br/>";
            $values[] = $value;
        }
        
        $svalues = "'".implode("','",$values)."'";
        #echo $svalues;

        $sql = "INSERT INTO students_info VALUES (".$svalues.")";

        #echo '<br/>'.$sql;

        if ( $this->conn->query($sql) === TRUE ) 
        {
            $this->query_msg    =   "New record created successfully";
            $this->query_code   =   0;
        } 
        else 
        {
            $this->query_msg    =   $this->conn->error;
            $this->query_code   =   1;
        }


    }
}

$mysql = new Mysql;
$mysql->connect();



?>