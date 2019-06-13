<?php
// including the database connection file
include_once("../../cxn.php");

if(isset($_POST['update']))
{	

	$id = mysqli_real_escape_string($db, $_POST['id']);
	
	$nom = mysqli_real_escape_string($db, $_POST['nom']);
    $prenom = mysqli_real_escape_string($db, $_POST['prenom']);
    $email = mysqli_real_escape_string($db, $_POST['email']);
    $departement = mysqli_real_escape_string($db, $_POST['departement']);
    $phone = mysqli_real_escape_string($db, $_POST['phone']);
    $pwd = mysqli_real_escape_string($db, $_POST['pwd']);
	    $date_m = date("d/m/Y h:i:s");

	// checking empty fields
	if(empty($nom) || empty($prenom)|| empty($email) || empty($departement)|| empty($pwd)) {
				
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
		//updating the table
		$result = mysqli_query($db, "UPDATE inscrire_prof SET nom='$nom',prenom='$prenom',email='$email',departement='$departement',phone='$phone',pwd='$pwd',conf_pwd='$pwd',date_m='$date_m' WHERE id=$id;");
		if (!$result) {
            printf("Error: %s\n", mysqli_error($db));
            exit();}
		//redirectig to the display page. In our case, it is index.php
		header("Location: professeur.php");
	}
    if (!$result) {
            printf("Error: %s\n", mysqli_error($db));
            exit();}
}
?>
<?php
//getting id from url
$id = $_GET['id'];

//selecting data associated with this particular id
$result = mysqli_query($db, "SELECT * FROM inscrire_prof WHERE id=$id");
if (!$result) {
            printf("Error: %s\n", mysqli_error($db));
            exit();}

while($res = mysqli_fetch_array($result))
{
    $nom = $res['nom'];
    $prenom = $res['prenom'];
	$email = $res['email'];
    $departement = $res['departement'];
    $phone = $res['phone'];
    $pwd = $res['pwd'];
}
?>
<html>
<head>	
	<title>Edit Professeur</title>
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
	
	<form name="form1" method="post" action="edit.php">
		<table border="0">
			<tr> 
				<td>Nom du Professeur</td>
				<td><input type="text" name="nom" value="<?php echo $nom;?>"></td>
			</tr>
            <tr> 
				<td>Prénom du Professeur</td>
				<td><input type="text" name="prenom" value="<?php echo $prenom;?>"></td>
			</tr>
            <tr> 
				<td>Email du Professeur</td>
				<td><input type="email" name="email" value="<?php echo $email;?>"></td>
			</tr>
			<tr> 
				<td>Département</td>
				<td><input type="text" name="departement" value="<?php echo $departement;?>"></td>
			</tr>
            <tr> 
				<td>Téléphone du Professeur</td>
				<td><input type="text" name="phone" value="<?php echo $phone;?>"></td>
			</tr>
            <tr> 
				<td>Password</td>
				<td><input type="password" name="pwd" value="<?php echo $pwd;?>"></td>
			</tr>
			
			<tr> 
                <td><input type="hidden" name="id" value="<?php echo $_GET['id'];?>"></td>				
                <td><input type="submit" name="update" value="Edit"></td>
			</tr>
		</table>
	</form>
</body>
</html>
