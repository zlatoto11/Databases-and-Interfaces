<?php

// Definining constants

define('DB_SERVER', 'localhost');
define('DB_USER', 'root'); 
define('DB_PASSWORD','');
define('DB_NAME', 'psyzk');

$dbcon = mysqli_connect(DB_SERVER, DB_USER, DB_PASSWORD, DB_NAME);
?>