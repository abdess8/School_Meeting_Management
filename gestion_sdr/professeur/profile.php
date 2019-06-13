<?php
include_once("cxn.php");


?>

<html>
<head>	
    <meta charset="utf-8">
	<title>Espace Porfesseur - Profile</title>
    <link rel="stylesheet" href="../css/style2.css">
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
        <a href="reservation.php">Reservation</a>
        <a href="../login_prof.php">Déconnexion</a>
      <label for="chk" class="hide-menu-btn">
        <i class="fas fa-times"></i>
      </label>
    </ul>
  </div>
    
<table align="center" width='100%' border=0 >

    <tr>
        <td align="center" colspan="7"><h2>Votre Profile</h2></td>
    </tr>

    <tr bgcolor='#CCCCCC'>
		<th>Nom</th>
        <th>Prénom</th>
		<th>Email</th>
		<th>Département</th>
		<th>Phone</th>
		<th>Password</th>
		<th>Date D'ajoute</th>
		<th>Update</th>
	</tr>
    
<?php
    


$email = $_REQUEST['email'];
//selecting data associated with this particular id
    $result = mysqli_query($db, "SELECT * FROM inscrire_prof WHERE email='$email' LIMIT 1");

        if($result){
            while($res = mysqli_fetch_assoc($result)) { 		
                echo "<tr>";
                echo "<td>".$res['nom']."</td>";
                echo "<td>".$res['prenom']."</td>";
                echo "<td>".$res['email']."</td>";
                echo "<td>".$res['departement']."</td>";
                echo "<td>".$res['phone']."</td>";
                echo "<td>".$res['pwd']."</td>";
                echo "<td>".$res['date_ajout']."</td>";	
                echo "<td><a href=\"profile_edit.php?id=$res[id]\">Edit</a></td>";		
            }
        }
?>

	</table>


</body>
</html>
