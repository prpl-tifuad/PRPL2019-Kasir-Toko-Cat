<?php
// include database connection file
include_once("config.php");
 
// Get id from URL to delete that user
$kode_produk = $_GET['kode_produk'];
 
// Delete user row from table based on given id
$result = mysqli_query($mysqli, "DELETE FROM produk WHERE kode_produk=$kode_produk");
 
// After delete redirect to Home, so that latest user list will be displayed.
header("Location:index1.php");
?>
