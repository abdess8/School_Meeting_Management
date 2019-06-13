<?php
//including the database connection file
include_once("../../cxn.php");

//getting id of the data from url
$id_reunion = $_GET['id_reunion'];

//deleting the row from table
$result = mysqli_query($db, "DELETE FROM reunion WHERE id_reunion=$id_reunion");

//redirecting to the display page (index.php in our case)
header("Location:reunion.php");
?>

