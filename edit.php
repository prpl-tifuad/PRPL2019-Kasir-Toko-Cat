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
        <li class ="selected"><a href="index.php">HOME</a></li>
      </ul></center>
    </div>
  </div>

<?php
// include database connection file
include_once("config.php");
 
// Check if form is submitted for user update, then redirect to homepage after update
if(isset($_POST['update']))
{	
	$id = $_POST['id'];
	$nama = $_POST['nama'];
	$alamat = $_POST['alamat'];
	$no_hp = $_POST['no_hp'];
		
	// update user data
	$result = mysqli_query($mysqli, "UPDATE karyawan SET id='$id',nama='$nama',alamat='$alamat',no_hp='$no_hp' WHERE id=$id");
	
	// Redirect to homepage to display updated user in list
	header("Location: index.php");
}
?>
<?php
// Display selected user data based on id
// Getting id from url
$id = $_GET['id'];
 
// Fetech user data based on id
$result = mysqli_query($mysqli, "SELECT * FROM karyawan WHERE id=$id");
 
while($user_data = mysqli_fetch_array($result))
{
	
	$id = $user_data['id'];
	$nama = $user_data['nama'];
	$alamat = $user_data['alamat'];
	$no_hp = $user_data['no_hp'];

}
?>
<html>
<head>
<div class="center_content">
 	<div class="left_content">
    <div class="title"><span class="title_icon"></span>Update Data Karyawan</div>
<br><br>
	<form action="edit.php" method="post" name="form1" id="data">
		<div class="feat_prod_box_details">
        <p class="details"> </p>
        <div class="contact_form">
        <div class="form_subtitle">Update Data Karyawan</div>
        <form name="Update" href="">
        <div class="form_row">
		<input type="hidden" name="id" value="<?php echo $id; ?>">
			
			
			<tr> 
				<div class="form_row">
				<td><label class="contact"> <strong>ID </strong></label></td>
				<td><input type="text" class="contact" name="id" value="<?php echo $id;?>"></td>
			</tr>
			<tr> 
				<div class="form_row">
				<td><label class="contact"> <strong>Nama </strong></label></td>
				<td><input type="text" class="contact" name="nama" value="<?php echo $nama;?>"></td>
			</tr>
			<tr> 
				<div class="form_row">
				<td><label class="contact"> <strong>Alamat </strong></label></td>
				<td><input type="text" class="contact" name="alamat" value="<?php echo $alamat;?>"></td>
			</tr>
			<tr> 
				<div class="form_row">
				<td><label class="contact"> <strong>Nomor Handphone </strong></label></td>
				<td><input type="text" class="contact" name="no_hp" value="<?php echo $no_hp;?>"></td>
			</tr>

			<tr>	
				<td><input type="hidden" name="id" value="<?php echo $_GET['id'];?>"></td>
				
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
