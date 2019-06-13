<?php
//including the database connection file
include_once("../../cxn.php");
global $db;
 // using mysqli_query instead


if(isset($_POST['Submit'])) {
    
    $email = mysqli_real_escape_string($db, $_POST['email']);
    $motif = mysqli_real_escape_string($db, $_POST['motif']);
    $date_res = mysqli_real_escape_string($db, $_POST['date_res']);
    $date_m = date("d/m/Y h:i:s");
    $conf = mysqli_real_escape_string($db, $_POST['conf']);

	// checking empty fields
	if(empty($email) || empty($motif) || empty($date_res)|| empty($conf)) {
				
		if(empty($email)) {
			echo "<font color='red'>Email vide.</font><br/>";
		}
		
		if(empty($motif)) {
			echo "<font color='red'>Motif vide.</font><br/>";
		}
		
		if(empty($date_res)) {
			echo "<font color='red'>Date de reservation vide.</font><br/>";
		}
        if(empty($conf)) {
			echo "<font color='red'>Confirmation vide.</font><br/>";
		}
		
		echo "<br/><a href='javascript:self.history.back();'>Return</a>";
	} else { 
			
		$result = mysqli_query($db, "INSERT INTO reservation(email,motif,date_res,date_m,conf) VALUES('$email','$motif','$date_res','$date_m','$conf')");
		
		echo "<font color='green'>Data added successfully.";
		echo "<br/><a href='reservation.php'>View Result</a>";
	}
}
?>

