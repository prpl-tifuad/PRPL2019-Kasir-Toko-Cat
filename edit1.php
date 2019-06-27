<!DOCTYPE html>
<html lang="en">
<head>
<title>DRAFT STORE</title>
<meta http-equiv="Content-Type" content="text/html; charset=windows-1252" />
<link rel="stylesheet" type="text/css" href="style.css" />
</head>
<body>
<div id="wrap" align="center">
  <div class="header" align="center">
    <div></a></div>
    <div id="menu">
      <ul><center>
        <li class ="selected"><a href="index1.php">HOME</a></li>
      </ul></center>
    </div>
  </div>

<?php
// include database connection file
include_once("config.php");
 
// Check if form is submitted for user update, then redirect to homepage after update
if(isset($_POST['update']))
{	
	$kode_produk = $_POST['kode_produk'];
	$nama = $_POST['nama'];
	$harga = $_POST['harga'];
	$stock = $_POST['stock'];
		
	// update user data
	$result = mysqli_query($mysqli, "UPDATE produk SET kode_produk='$kode_produk',nama='$nama',harga='$harga',stock='$stock' WHERE kode_produk=$kode_produk");
	
	// Redirect to homepage to display updated user in list
	header("Location: index1.php");
}
?>
<?php
// Display selected user data based on id
// Getting id from url
$kode_produk = $_GET['kode_produk'];
 
// Fetech user data based on id
$result = mysqli_query($mysqli, "SELECT * FROM produk WHERE kode_produk=$kode_produk");
 
while($user_data = mysqli_fetch_array($result))
{
	
	$kode_produk = $user_data['kode_produk'];
	$nama = $user_data['nama'];
	$harga = $user_data['harga'];
	$stock = $user_data['stock'];

}
?>
<html>
<head>
<div class="center_content">
 	<div class="left_content">
    <div class="title"><span class="title_icon"></span>Update Data Produk</div>
<br><br>
	<form action="edit1.php" method="post" name="form1" id="data">
		<div class="feat_prod_box_details">
        <p class="details"> </p>
        <div class="contact_form">
        <div class="form_subtitle">Update Data Produk</div>
        <form name="Update" href="">
        <div class="form_row">
		<input type="hidden" name="kode_produk" value="<?php echo $kode_produk; ?>">
			
			
			<tr> 
				<div class="form_row">
				<td><label class="contact"> <strong>Kode Produk </strong></label></td>
				<td><input type="text" class="contact" name="kode_produk" value="<?php echo $kode_produk;?>"></td>
			</tr>
			<tr> 
				<div class="form_row">
				<td><label class="contact"> <strong>Nama </strong></label></td>
				<td><input type="text" class="contact" name="nama" value="<?php echo $nama;?>"></td>
			</tr>
			<tr> 
				<div class="form_row">
				<td><label class="contact"> <strong>Harga </strong></label></td>
				<td><input type="text" class="contact" name="harga" value="<?php echo $harga;?>"></td>
			</tr>
			<tr> 
				<div class="form_row">
				<td><label class="contact"> <strong>Jumlah Stock </strong></label></td>
				<td><input type="text" class="contact" name="stock" value="<?php echo $stock;?>"></td>
			</tr>

			<tr>	
				<td><input type="hidden" name="kode_produk" value="<?php echo $_GET['kode_produk'];?>"></td>
				
			</tr>
			<td>&nbsp;</td>
			<td></td>
			<div class="form_row"><br>
			<td><center><input type="submit" name="update" value="Update"></td></center>
		</div>
	</div>
</form>
	</form>
</div></div></div></section>


</body>
</html>
