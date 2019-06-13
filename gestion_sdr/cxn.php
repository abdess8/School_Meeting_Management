<?php

define("DB_HOST","localhost:3308");
define("DB_USER", "root");
define("DB_PASSWORD", "");
define("DB_DATABASE", "gestionsdr");


$db = mysqli_connect(DB_HOST,DB_USER,DB_PASSWORD,DB_DATABASE);
	if($db == false){
		echo "No connection";
    }



?>
