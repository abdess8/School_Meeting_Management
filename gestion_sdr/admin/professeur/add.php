<?php
//including the database connection file
include_once("../../cxn.php");
global $db;
 // using mysqli_query instead


if(isset($_POST['Submit'])) {
    
    $nom = mysqli_real_escape_string($db, $_POST['nom']);
    $prenom = mysqli_real_escape_string($db, $_POST['prenom']);
    $email = mysqli_real_escape_string($db, $_POST['email']);
    $departement = mysqli_real_escape_string($db, $_POST['departement']);
    $phone = mysqli_real_escape_string($db, $_POST['phone']);
    $pwd = mysqli_real_escape_string($db, $_POST['pwd']);
    $date_ajout = date("d/m/Y h:i:s");

	// checking empty fields
	if(empty($nom) || empty($prenom)|| empty($email) || empty($departement)|| empty($phone)|| empty($pwd)) {
				
		if(empty($nom)) {
			echo "<font color='red'>Nom vide.</font><br/>";
		}
        if(empty($prenom)) {
			echo "<font color='red'>Prenom vide.</font><br/>";
		}
        if(empty($email)) {
			echo "<font color='red'>Email vide.</font><br/>";
		}
		
		if(empty($departement)) {
			echo "<font color='red'>Département vide.</font><br/>";
		}
		
		if(empty($pwd)) {
			echo "<font color='red'>Password vide.</font><br/>";
		}
		
		echo "<br/><a href='javascript:self.history.back();'>Return</a>";
	} else { 
			
		$result = mysqli_query($db, "insert into inscrire_prof(nom,prenom,email,departement,phone,pwd,conf_pwd,date_ajout,date_m) values ('$nom','$prenom','$email','$departement','$phone','$pwd','$pwd','$date_ajout','$date_ajout')");
		
		echo "<font color='green'>Data added successfully.";
		echo "<br/><a href='professeur.php'>View Result</a>";
	}
}
?>

