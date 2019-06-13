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

	<title>Connexion</title>

		   <link rel="stylesheet" href="css/style.css">



</head>

<body>

	<div class="container">
		<div class="text1">
			<div class="text2">
                <h3>Gestion des Salles de Réunion</h3>
			</div>
            <div class="text1">
			<h4>Se connecter autant que</h4>
			</div>
        </div>
		<div class="text2">
			<p>
             <a href="login_admin.php" class="text2">Administrateur</a>&nbsp;&nbsp;
            <a href="login_prof.php" class="text2">Professeur</a>
			
            </p>
		</div>
	</div>


</body>

</html>
