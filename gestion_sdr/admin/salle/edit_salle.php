<?php
// including the database connection file
include_once("../../cxn.php");

if(isset($_POST['update']))
{	

	$id_salle = mysqli_real_escape_string($db, $_POST['id_salle']);
	
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
		//updating the table
		$result = mysqli_query($db, "UPDATE salle SET intitule='$intitule',statut='$statut' WHERE id_salle=$id_salle;");
		if (!$result) {
            printf("Error: %s\n", mysqli_error($db));
            exit();}
		//redirectig to the display page. In our case, it is index.php
		header("Location: salle.php");
	}
}
?>
<?php
//getting id from url
$id_salle = $_GET['id_salle'];

//selecting data associated with this particular id
$result = mysqli_query($db, "SELECT * FROM salle WHERE id_salle=$id_salle");

while($res = mysqli_fetch_array($result))
{
	$intitule = $res['intitule'];
	$statut = $res['statut'];
}
?>
<html>
<head>	
	<title>Edit Salle</title>
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
	
	<form name="form1" method="post" action="edit_salle.php">
		<table border="0">
			<tr> 
				<td>Intitulé</td>
				<td><input type="text" name="intitule" value="<?php echo $intitule;?>"></td>
			</tr>
			<tr> 
				<td>statut</td>
				<td><input type="text" name="statut" value="<?php echo $statut;?>"></td>
			</tr>
			
			<tr> 
				<td><input type="hidden" name="id_salle" value="<?php echo $_GET['id_salle'];?>"></td>
				<td><input type="submit" name="update" value="Edit"></td>
			</tr>
			
		</table>
	</form>
</body>
</html>
