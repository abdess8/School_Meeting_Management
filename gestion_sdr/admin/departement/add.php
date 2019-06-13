<?php
//including the database connection file
include_once("../../cxn.php");
global $db;
 // using mysqli_query instead


if(isset($_POST['Submit'])) {
    
    $nom = mysqli_real_escape_string($db, $_POST['nom']);
    $sigle = mysqli_real_escape_string($db, $_POST['sigle']);
    $date_c = date("d/m/Y h:i:s");

	// checking empty fields
	if(empty($nom) || empty($sigle)) {
				
		if(empty($nom)) {
			echo "<font color='red'>nom du departement vide.</font><br/>";
		}
		
		if(empty($sigle)) {
			echo "<font color='red'>sigle vide.</font><br/>";
		}
		
		
		echo "<br/><a href='javascript:self.history.back();'>Return</a>";
	} else { 
			
		$result = mysqli_query($db, "INSERT INTO departement(nom,sigle,date_c,date_m) VALUES('$nom','$sigle','$date_c','$date_c')");
		
		echo "<font color='green'>Data added successfully.";
		echo "<br/><a href='departement.php'>View Result</a>";
	}
}
?>

