<?php
$dotenv = new Dotenv();
$dotenv->load();
$x =  getenv('pass');
echo $x;


?>