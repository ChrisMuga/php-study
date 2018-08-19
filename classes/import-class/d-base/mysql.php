<?php


class Mysql{

    #connection
    public function connect()
    {
        $servername     = "localhost";
        $username       = "rootx";
        $password       = "rootx";
        $dbname         = "students";

        #Create connection
        $conn = new mysqli($servername, $username, $password, $dbname);

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

    #inserts
    public function insert($args)
    {
        $values = array();
        foreach($args as $key => $value)
        {
            echo $key.": ".$value."<br/>";
            $values[] = $value;
        }
        
        $svalues = "'".implode("','",$values)."'";
        echo $svalues;

        $sql = "INSERT INTO students_info VALUES (".$svalues.")";

        echo '<br/>'.$sql;

        if ($conn->query($sql) === TRUE) {
            echo "New record created successfully";
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }


    }
}

$mysql = new Mysql;
$mysql->connect();



?>