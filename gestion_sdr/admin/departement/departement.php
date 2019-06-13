<?php
include_once("../../cxn.php");
$select = "SELECT * FROM departement ORDER BY id_dep DESC";
$result = mysqli_query($db, $select);
if (!$result) {
    printf("Error: %s\n", mysqli_error($db));
    exit();
}


?>

<html>
<head>	
	<title>Espace Administrateur - Département</title>
<link rel="stylesheet" href="../../css/style2.css">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.1/css/all.css">
</head>

<body>
<div class="header">
    <h2 class="logo">Gestion Réunion - Espace Département</h2>
    <input type="checkbox" id="chk">
    <label for="chk" class="show-menu-btn">
      <i class="fas fa-ellipsis-h"></i>
    </label>

    <ul class="menu">  
        <a href="../index.php">Menu</a>
        <a href="add.html">Nouvelle Département</a>
        <a href="../../login_admin.php">Déconnexion</a>

      <label for="chk" class="hide-menu-btn">
        <i class="fas fa-times"></i>
      </label>
    </ul>
  </div>



	<table align="center" width='100%' border=0>

    <tr>
        <td align="center" colspan="7"><h2>Liste des Départements</h2></td>
    </tr>

	<tr bgcolor='#CCCCCC'>
		<td>Nom du département</td>
        <td>Sigle</td>
		<td>Date de Création</td>
		<td>Date de Modification</td>
		<td>Update</td>
	</tr>
<?php 
            while($res = mysqli_fetch_array($result)) { 		
                echo "<tr>";
                echo "<td>".$res['nom']."</td>";
                echo "<td>".$res['sigle']."</td>";
                echo "<td>".$res['date_c']."</td>";	
                echo "<td>".$res['date_m']."</td>";	
                echo "<td><a href=\"edit_dep.php?id_dep=$res[id_dep]\">Edit</a> | <a href=\"delete_dep.php?id_dep=$res[id_dep]\" onClick=\"return confirm('Are you sure you want to delete?')\">Delete</a></td>";		
            }
        
	?>
	</table>

</body>
</html>
