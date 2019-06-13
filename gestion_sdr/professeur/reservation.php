<?php
include_once("cxn.php");
$select = "SELECT * FROM reservation ORDER BY id_res DESC";
$result = mysqli_query($db, $select);
if (!$result) {
    printf("Error: %s\n", mysqli_error($db));
    exit();
}



?>

<html>
<head>	
	<title>Espace Professeur - Reservation</title>
<link rel="stylesheet" href="../css/style2.css">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.1/css/all.css">
</head>

<body>
<div class="header">
    <h2 class="logo">Gestion Reunion - Espace Réservation</h2>
    <input type="checkbox" id="chk">
    <label for="chk" class="show-menu-btn">
      <i class="fas fa-ellipsis-h"></i>
    </label>

    <ul class="menu">
                <a href="add.html">Nouvelle Reservation</a>
                <a href="../login_prof.php">Déconnexion</a>

      <label for="chk" class="hide-menu-btn">
        <i class="fas fa-times"></i>
      </label>
    </ul>
  </div>



<table align="center" width='100%' border=0>

    <tr>
        <td align="center" colspan="5"><h2>Liste des Réservations</h2></td>
    </tr>        

	<tr bgcolor='#CCCCCC'>
		<th>Réservé Par</th>
        <th>Motif</th>
		<th>Date de Reservation</th>
		<th>Confirmation</th>
		<th>Update</th>
	</tr>
<?php 
            while($res = mysqli_fetch_array($result)) { 		
                echo "<tr>";
                echo "<td>".$res['email']."</td>";
                echo "<td>".$res['motif']."</td>";
                echo "<td>".$res['date_res']."</td>";	
                echo "<td>".$res['conf']."</td>";	
                echo "<td><a href=\"edit.php?id_res=$res[id_res]\">Edit</a> | <a href=\"delete.php?id_res=$res[id_res]\" onClick=\"return confirm('Are you sure you want to delete?')\">Delete</a></td>";		
            }
        
	?>
	</table>

</body>
</html>
