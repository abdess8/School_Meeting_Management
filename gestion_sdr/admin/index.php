<?php
session_start();
$_SESSION['message']="";
include("../cxn.php");
global $db;


?>
<html>
<head>	
	<meta charset="utf-8">
    <title>Espace Admin</title>
    <link rel="stylesheet" href="../css/style2.css">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.1/css/all.css">
</head>

<body>
<div class="header">
    <h2 class="logo">Gestion Reunion - Espace Admin</h2>
    <input type="checkbox" id="chk">
    <label for="chk" class="show-menu-btn">
      <i class="fas fa-ellipsis-h"></i>
    </label>

    <ul class="menu">
        <a href="professeur/professeur.php">Professeur</a>
        <a href="reservation/reservation.php">Reservation</a>
        <a href="reunion/reunion.php">Reunion</a>
        <a href="salle/salle.php">Salles</a>
        <a href="departement/departement.php">Département</a>
        <a href="../login_admin.php">Déconnexion</a>
      <label for="chk" class="hide-menu-btn">
        <i class="fas fa-times"></i>
      </label>
    </ul>
  </div>
<div class="content">
    <center>
      <img src="../img/ENSAT%C3%A9.jpg" alt="">
    </center>
    
    <h3>A propos de l’ENSA de Tétouan</h3><br>
    
<p>
L’ENSA de Tétouan est un établissement Public affiliée à l’Université Abdelmalek Essaâdi. Elle fait partie du réseau des ENSA MAROC, spécialisé dans la formation et la recherche scientifique, spécialement la formation des Ingénieurs. Elle a pour objectif de :<br><br>1. Former des ingénieurs d’état qualifiés en les dotant  d’une formation théorique et pratique permettant de répondre aux besoins du développement économique et social au niveau national et régional
<br><br>2. Créer des partenariats avec les opérateurs industriels, économiques, sociaux et scientifiques au niveau régional, national et international
<br><br>3. Développer la recherche scientifique et technologique
La formation à L’ENSA de Tétouan se caractérise par :
<br><br>       •	l’application d’un système pédagogique basé sur les modules organisé pendant des semestres d’études. 
<br>       •	l’ouverture sur le milieu industriel et économique à travers des stages et l’incubation.

    </p>
    </div>

</body>
</html>
