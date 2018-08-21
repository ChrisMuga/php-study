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
    public function insert($model, $args)
    {
        $values = array();
        foreach($args as $key => $value)
        {
            #echo $key.": ".$value."<br/>";
            $values[] = $value;
        }
        
        $svalues = "'".implode("','",$values)."'";
        #echo $svalues;

        $sql = "INSERT INTO ".$model." VALUES (".$svalues.")";

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

    public function fetch($entity)
    {

        #fetch fields.
        $fields = $this->fields($entity);

        $this->students =   array();
        $this->data     =   array();
        $sql = "SELECT * FROM ".$entity;
        $result = $this->conn->query($sql);
        if( isset( $result->num_rows ) )
        {
            if ($result->num_rows > 0) {
                #loop through each row
                while($row = $result->fetch_assoc()) {

                    #load values into respective arrays

                    foreach ($fields as $field)
                    {
                        $this->data[$field]     =   $row[$field];
                    }
                

                    $this->students[]               = $this->data;
                }

                #$this->students = json_encode($this->students);
            
                
            } else {
                echo "0 results";
            }
        }
        else
        {
            $this->error        = 0;
            $this->error_msg    = "Nothing to display";
        }
    }

    #get the columns in a table

    public function fields($model)
    {
          #fetch all columns in the table/model
          $this->fields = array();
          $result = $this->conn->query("SHOW COLUMNS FROM ".$model);
          if (!$result) {
              echo 'Could not run query: ';
              exit;
          }
          if ($result->num_rows > 0) {
              while ( $row = $result->fetch_assoc() ) {
                  $this->fields[] = $row["Field"];
              }
          }

          return $this->fields;
    }

    #fetch students based on params.

    public function get( $model, $key, $value )
    {

        #fetch fields.
        $fields = $this->fields($model);



        $this->students =   array();
        $this->data     =   array();
        $sql = "SELECT * FROM ". $model ." WHERE ".$key." = '".$value."' LIMIT 1";
        $result = $this->conn->query($sql);
        if( isset( $result->num_rows ) )
        {
            if ($result->num_rows > 0) {
                #loop through each row
                while($row = $result->fetch_assoc()) {

                    #load values into respective arrays

                    foreach ($fields as $field)
                    {
                        $this->data[$field]     =   $row[$field]; 
                    }
              
                

                    $this->students[]               = $this->data;
                }

                #$this->students = json_encode($this->students);
            
                
            } else {
                echo "0 results";
            }
        }
        else
        {

            $this->error        = 0;
            $this->error_msg    = "Nothing to display";

        }

    }

    #update/edit

    public function update($model, $args)
    {
        #create part of the query string

        $str    = "";
        foreach($args as $key => $value)
        {
         
            $str        .=  $key." = '".$value."', ";
           
        }
        $str    = rtrim($str,", ");    

        $sql = "UPDATE ".$model." SET ".$str." WHERE id = '".$args['id']."'";

        if ( $this->conn->query($sql) === TRUE ) 
        {
            $this->query_msg    =   "Update successful";
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