<?php
include_once("../../cxn.php");
$select = "SELECT * FROM reunion ORDER BY id_reunion DESC";
$result = mysqli_query($db, $select);
if (!$result) {
    printf("Error: %s\n", mysqli_error($db));
    exit();
}


?>

<html>
<head>	
	<title>Espace Administrateur - Réunion</title>
    
<link rel="stylesheet" href="../../css/style2.css">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.1/css/all.css">
</head>

<body>
<div class="header">
    <h2 class="logo">Gestion Reunion - Espace Réunion</h2>
    <input type="checkbox" id="chk">
    <label for="chk" class="show-menu-btn">
      <i class="fas fa-ellipsis-h"></i>
    </label>

    <ul class="menu">
                <a href="../index.php">Menu</a>
                <a href="add.html">Nouvelle Réunion</a>
                <a href="../../login_admin.php">Déconnexion</a>

      <label for="chk" class="hide-menu-btn">
        <i class="fas fa-times"></i>
      </label>
    </ul>
  </div>



<table align="center" width='100%' border=0>

    <tr>
        <td align="center" colspan="4"><h2>Liste des Réunions</h2></td>
    </tr>        
	<tr bgcolor='#CCCCCC'>
		<td>Date de réunion</td>
        <td>Heure début</td>
		<td>Heure Fin</td>
		<td>Update</td>
	</tr>
<?php 
            while($res = mysqli_fetch_array($result)) { 		
                echo "<tr>";
                echo "<td>".$res['date_reunion']."</td>";
                echo "<td>".$res['heure_debut']."</td>";
                echo "<td>".$res['heure_fin']."</td>";	
                echo "<td><a href=\"edit_reunion.php?id_reunion=$res[id_reunion]\">Edit</a> | <a href=\"delete_reunion.php?id_reunion=$res[id_reunion]\" onClick=\"return confirm('Are you sure you want to delete?')\">Delete</a></td>";		
            }
        
	?>
	</table>

</body>
</html>
