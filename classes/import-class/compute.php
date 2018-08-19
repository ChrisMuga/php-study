<?php
#require mysql class once.
require_once('d-base/mysql.php');

#fetching all variables in a $_POST array

// foreach($_POST as $key => $value)
// {
//     echo $key.": ".$value."<br/>";
// }


$mysql->insert($_POST);


?>