<?php
// including the database connection file
include_once("../../cxn.php");

if(isset($_POST['update']))
{	

	$id_dep = mysqli_real_escape_string($db, $_POST['id_dep']);
	
	$nom = mysqli_real_escape_string($db, $_POST['nom']);
    $sigle = mysqli_real_escape_string($db, $_POST['sigle']);
    $date_m = date("d/m/Y h:i:s");

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
		//updating the table
		$result = mysqli_query($db, "UPDATE departement SET nom='$nom',sigle='$sigle',date_m='$date_m' WHERE id_dep=$id_dep;");
		if (!$result) {
            printf("Error: %s\n", mysqli_error($db));
            exit();}
		//redirectig to the display page. In our case, it is index.php
		header("Location: departement.php");
	}
}
?>
<?php
//getting id from url
$id_dep = $_GET['id_dep'];

//selecting data associated with this particular id
$result = mysqli_query($db, "SELECT * FROM departement WHERE id_dep=$id_dep");

while($res = mysqli_fetch_array($result))
{
	$nom = $res['nom'];
	$sigle = $res['sigle'];
}
?>
<html>
<head>	
	<title>Edit Département</title>
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
	<a href="index.php">Accueil</a>
	<br/><br/>
	
	<form name="form1" method="post" action="edit_dep.php">
		<table border="0">
			<tr> 
				<td>Nom du département</td>
				<td><input type="text" name="nom" value="<?php echo $nom;?>"></td>
			</tr>
			<tr> 
				<td>Sigle</td>
				<td><input type="text" name="sigle" value="<?php echo $sigle;?>"></td>
			</tr>
			<tr>
				<td><input type="hidden" name="id_dep" value="<?php echo $_GET['id_dep'];?>"></td>
				<td><input type="submit" name="update" value="Edit"></td>
			</tr>
		</table>
	</form>
</body>
</html>
