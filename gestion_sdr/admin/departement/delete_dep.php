<?php
//including the database connection file
include_once("../../cxn.php");

//getting id of the data from url
$id_dep = $_GET['id_dep'];

//deleting the row from table
$result = mysqli_query($db, "DELETE FROM departement WHERE id_dep=$id_dep");

//redirecting to the display page (index.php in our case)
header("Location:departement.php");
?>

