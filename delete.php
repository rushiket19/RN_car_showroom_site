<?php
session_start();
$host = "localhost"; /* Host name */
$user = "root"; /* User */
$password = ""; /* Password */
$dbname = "car showroom"; /* Database name */

$con = mysqli_connect($host, $user, $password,$dbname);

// sql to delete a record
$sql = "DELETE FROM vehicle WHERE veh_id='$_SESSION[id]'";

if ($con->query($sql) === TRUE) {
  echo "Record deleted successfully";
  header('location:dealervehicles.php');
} else {
  echo "Error deleting record: " . $con->error;
}

$con->close();
?>