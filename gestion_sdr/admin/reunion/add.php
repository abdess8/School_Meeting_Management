<?php
//including the database connection file
include_once("../../cxn.php");
global $db;
 // using mysqli_query instead


if(isset($_POST['Submit'])) {
    
    $date_reunion = mysqli_real_escape_string($db, $_POST['date_reunion']);
    $heure_debut = mysqli_real_escape_string($db, $_POST['heure_debut']);
    $heure_fin = mysqli_real_escape_string($db, $_POST['heure_fin']);

	// checking empty fields
	if(empty($date_reunion) || empty($heure_debut) || empty($heure_fin)) {
				
		if(empty($date_reunion)) {
			echo "<font color='red'>date reunion vide.</font><br/>";
		}
		
		if(empty($heure_debut)) {
			echo "<font color='red'>heure de depart vide.</font><br/>";
		}
		
		if(empty($heure_fin)) {
			echo "<font color='red'>heure de fin vide.</font><br/>";
		}
		
		echo "<br/><a href='javascript:self.history.back();'>Return</a>";
	} else { 
			
		$result = mysqli_query($db, "INSERT INTO reunion(date_reunion,heure_debut,heure_fin) VALUES('$date_reunion','$heure_debut','$heure_fin')");
		
		echo "<font color='green'>Data added successfully.";
		echo "<br/><a href='reunion.php'>View Result</a>";
	}
}
?>

