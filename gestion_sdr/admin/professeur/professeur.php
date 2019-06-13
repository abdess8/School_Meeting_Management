<?php
include_once("../../cxn.php");
$select = "SELECT * FROM inscrire_prof ORDER BY id DESC";
$result = mysqli_query($db, $select);
if (!$result) {
    printf("Error: %s\n", mysqli_error($db));
    exit();
}


?>

<html>
<head>	
	<title>Espace Administrateur - Professeur</title>
<link rel="stylesheet" href="../../css/style2.css">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.1/css/all.css">
</head>

<body>
<div class="header">
    <h2 class="logo">Gestion Reunion - Espace Professeur</h2>
    <input type="checkbox" id="chk">
    <label for="chk" class="show-menu-btn">
      <i class="fas fa-ellipsis-h"></i>
    </label>

    <ul class="menu">
        <a href="../index.php">Menu</a> 
        <a href="add.html">Nouveau Professeur</a>      
        <a href="../../login_admin.php">Déconnexion</a>      
        <label for="chk" class="hide-menu-btn">
        <i class="fas fa-times"></i>
      </label>
    </ul>
  </div>
    
    
<table align="center" width='100%' border=0>

    <tr>
        <td align="center" colspan="9"><h2>Liste des Professeurs</h2></td>
    </tr>

	<tr bgcolor='#CCCCCC'>
		<td>Nom</td>
        <td>Prénom</td>
		<td>Email</td>
		<td>Département</td>
		<td>Phone</td>
		<td>Password</td>
		<td>Ajouté le</td>
		<td>Modifié le</td>
		<td>Update</td>
	</tr>
<?php 
            while($res = mysqli_fetch_array($result)) { 		
                echo "<tr>";
                echo "<td>".$res['nom']."</td>";
                echo "<td>".$res['prenom']."</td>";
                echo "<td>".$res['email']."</td>";
                echo "<td>".$res['departement']."</td>";
                echo "<td>".$res['phone']."</td>";
                echo "<td>".$res['pwd']."</td>";
                echo "<td>".$res['date_ajout']."</td>";	
                echo "<td>".$res['date_m']."</td>";	
                echo "<td><a href=\"edit.php?id=$res[id]\">Edit</a> | <a href=\"delete.php?id=$res[id]\" onClick=\"return confirm('Are you sure you want to delete?')\">Delete</a></td>";		
            }
        
	?>
	</table>
   <br/><br/>

</body>
</html>
