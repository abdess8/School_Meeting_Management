<?php
//including the database connection file
include_once("../../cxn.php");
global $db;
 // using mysqli_query instead


if(isset($_POST['Submit'])) {
    
    $intitule = mysqli_real_escape_string($db, $_POST['intitule']);
    $statut = mysqli_real_escape_string($db, $_POST['statut']);

	// checking empty fields
	if(empty($intitule) || empty($statut)) {
				
		if(empty($intitule)) {
			echo "<font color='red'>Intitulé vide.</font><br/>";
		}
		
		if(empty($statut)) {
			echo "<font color='red'>Statut vide.</font><br/>";
		}
		
		
		echo "<br/><a href='javascript:self.history.back();'>Return</a>";
	} else { 
			
		$result = mysqli_query($db, "INSERT INTO salle(intitule,statut) VALUES('$intitule','$statut')");
		
		echo "<font color='green'>Data added successfully.";
		echo "<br/><a href='salle.php'>View Result</a>";
	}
}
?>

