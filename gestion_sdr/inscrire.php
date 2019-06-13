<?php
session_start();
$_SESSION['message']="";
include("cxn.php");
global $db;

function secureInput($data){
	$data = trim($data);
	$data = stripslashes($data);
	$data = htmlspecialchars($data);
	return $data;
}


?> 

<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<title>Inscription</title>

	   <link rel="stylesheet" href="css/style.css">

        <link rel="icon" type="image/x-icon" href="img/icon2.ico">


</head>

<body>

	<div class="container">
		<div class="text1">
			<div class="text2">
				<h3>Gestion des Salles de Réunion</h3>
			</div>
            <div class="text1">
			<h4>S'inscrire autant que</h4>
			</div>
        </div>
		<div class="text2">
            <p>
 <a href="inscrire_admin.php" class="text2">Administrateur</a> &nbsp;      <a href="inscrire_prof.php" class="text2">Professeur</a>
			     
            </p>
			
		</div>
	</div>

</body>
</html>
