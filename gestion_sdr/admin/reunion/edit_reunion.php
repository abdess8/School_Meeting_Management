<?php
// including the database connection file
include_once("../../cxn.php");

if(isset($_POST['update']))
{	

	$id_reunion = mysqli_real_escape_string($db, $_POST['id_reunion']);
	
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
		//updating the table
		$result = mysqli_query($db, "UPDATE reunion SET date_reunion='$date_reunion',heure_debut='$heure_debut',heure_fin='$heure_fin' WHERE id_reunion=$id_reunion;");
		if (!$result) {
            printf("Error: %s\n", mysqli_error($db));
            exit();}
		//redirectig to the display page. In our case, it is index.php
		header("Location: reunion.php");
	}
}
?>
<?php
//getting id from url
$id_reunion = $_GET['id_reunion'];

//selecting data associated with this particular id
$result = mysqli_query($db, "SELECT * FROM reunion WHERE id_reunion=$id_reunion");
if($result){
    while($res = mysqli_fetch_array($result))
    {
	$date_reunion = $res['date_reunion'];
	$heure_debut = $res['heure_debut'];
	$heure_fin = $res['heure_fin'];
    }
}else{
            printf("Error: %s\n", mysqli_error($db));
            exit();}

?>
<html>
<head>	
	<title>Edit Réunion</title>
    <style type="text/css" media="screen">
body {
	font: .95em/1.5 "Lucida Grande", "Lucida Sans Unicode", helvetica, verdana, arial, sans-serif;
  margin: 0 auto;
  width: 800px;
}
strong {
  background: #ffc;
}
    </style>
</head>

<body>
	<a href="../index.php">Accueil</a>
	<br/><br/>
	
	<form name="form1" method="post" action="edit_reunion.php">
		<table border="0">
			<tr> 
				<td>Date de réunion</td>
				<td><input type="date" name="date_reunion"></td>
			</tr>
			<tr> 
				<td>Heure début</td>
				<td><input type="time" name="heure_debut"></td>
			</tr>
			<tr>
				<td>Heure fin</td>
				<td><input type="time" name="heure_fin" placeholder="Date de réservation"></td>
			</tr>
			<tr> 
				<td><input type="hidden" name="id_reunion" value="<?php echo $_GET['id_reunion'];?>"></td>
				<td><input type="submit" name="update" value="Update"></td>
			</tr>
		</table>
	</form>
</body>
</html>
