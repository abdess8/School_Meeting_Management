<?php
//including the database connection file
include_once("../../cxn.php");

//getting id of the data from url
$id_salle = $_GET['id_salle'];

//deleting the row from table
$result = mysqli_query($db, "DELETE FROM salle WHERE id_salle=$id_salle");

//redirecting to the display page (index.php in our case)
header("Location:salle.php");
?>

