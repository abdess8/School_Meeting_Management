<?php
//including the database connection file
include_once("../../cxn.php");

//getting id of the data from url
$id = $_GET['id'];

//deleting the row from table
$result = mysqli_query($db, "DELETE FROM inscrire_prof WHERE id=$id");

//redirecting to the display page (index.php in our case)
header("Location:professeur.php");
?>

