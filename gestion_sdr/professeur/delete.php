<?php
//including the database connection file
include("cxn.php");

//getting id of the data from url
$id_res = $_GET['id_res'];

//deleting the row from table
$result = mysqli_query($db, "DELETE FROM reservation WHERE id_res=$id_res");

//redirecting to the display page (index.php in our case)
header("Location:reservation.php");
?>

