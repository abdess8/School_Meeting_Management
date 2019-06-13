<?php
// including the database connection file
include_once("cxn.php");

if(isset($_POST['update']))
{	

	$id_res = mysqli_real_escape_string($db, $_POST['id_res']);
	
	$email = mysqli_real_escape_string($db, $_POST['email']);
	$motif = mysqli_real_escape_string($db, $_POST['motif']);
	$date_res = mysqli_real_escape_string($db, $_POST['date_res']);	
	
	// checking empty fields
	if(empty($email) || empty($motif) || empty($date_res)) {	
			
		if(empty($email)) {
			echo "<font color='red'>email vide.</font><br/>";
		}
		
		if(empty($motif)) {
			echo "<font color='red'>motif vide.</font><br/>";
		}
		
		if(empty($date_res)) {
			echo "<font color='red'>date de reservation vide.</font><br/>";
		}		
	} else {	
		//updating the table
		$result = mysqli_query($db, "UPDATE reservation SET email='$email',motif='$motif',date_res='$date_res' WHERE id_res=$id_res;");
		if (!$result) {
            printf("Error: %s\n", mysqli_error($db));
            exit();}
		//redirectig to the display page. In our case, it is index.php
		header("Location: reservation.php");
	}
}
?>
<?php
//getting id from url
$id_res = $_GET['id_res'];

//selecting data associated with this particular id
$result = mysqli_query($db, "SELECT * FROM reservation WHERE id_res=$id_res");

while($res = mysqli_fetch_array($result))
{
	$email = $res['email'];
	$motif = $res['motif'];
	$date_res = $res['date_res'];
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
				<td>Email</td>
				<td><input type="text" name="email" value="<?php echo $email;?>"></td>
			</tr>
			<tr> 
				<td>motif</td>
				<td><input type="text" name="motif" value="<?php echo $motif;?>"></td>
			</tr>
			<tr> 
				<td>date_res</td>
				<td><input type="text" name="date_res" value="<?php echo $date_res;?>"></td>
			</tr>
			<tr>
				<td><input type="hidden" name="id_res" value="<?php echo $_GET['id_res'];?>"></td>
				<td><input type="submit" name="update" value="Update"></td>
			</tr>
		</table>
	</form>
</body>
</html>
