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

    #fetch all students

    public function fetch_students()
    {
        $this->students =   array();
        $this->data     =   array();
        $sql = "SELECT * FROM students_info";
        $result = $this->conn->query($sql);

        if ($result->num_rows > 0) {
            #loop through each row
            while($row = $result->fetch_assoc()) {

                #load values into respective arrays

                $this->data["id"]               = $row["id"];
                $this->data["name"]             = $row['name'];
                $this->data["class"]            = $row["class"];
                $this->data["phone_number"]     = $row['phone_number'];
                $this->data["location"]         = $row["location"];
             

                $this->students[]               = $this->data;
            }

            #$this->students = json_encode($this->students);
          
            
        } else {
            echo "0 results";
        }
    }

    #fetch students based on params.

    public function get_student( $key, $value )
    {

        $this->students =   array();
        $this->data     =   array();
        $sql = "SELECT * FROM students_info WHERE ".$key." = '".$value."' LIMIT 1";
        $result = $this->conn->query($sql);

        if ($result->num_rows > 0) {
            #loop through each row
            while($row = $result->fetch_assoc()) {

                #load values into respective arrays

                $this->data["id"]               = $row["id"];
                $this->data["name"]             = $row['name'];
                $this->data["class"]            = $row["class"];
                $this->data["phone_number"]     = $row['phone_number'];
                $this->data["location"]         = $row["location"];
             

                $this->students[]               = $this->data;
            }

            #$this->students = json_encode($this->students);
          
            
        } else {
            echo "0 results";
        }

    }

}

$mysql = new Mysql;
$mysql->connect();



?>