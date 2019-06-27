<!DOCTYPE html>
<html lang="en">

<head>
 <title>DRAFT STORE</title>
<link rel="stylesheet" type="text/css" href="style.css" />
</head>
<body>
<div id="wrap" align="center">
  <div class="header" align="center">

    <div id="menu">
      <ul><center>
        <li class ="selected"><a href="index.php">KARYAWAN</a></li>
        <li class ="selected"><a href="index1.php">PRODUK</a></li>
        <li class ="selected"><a href="index2.php">ACCESORIES</a></li>
        <li class ="selected"><a href="pemesanan.php">PEMESANAN</a></li>
      </ul></center>
    </div>
  </div>
  <div class="center_content">
    <div class="left_content">

<?php
include_once("config.php");
$result = mysqli_query($mysqli, "SELECT * FROM karyawan");
?>

<id="cari">
        <form method="post" action="pencarian.php">
          <input type="text" name="cari" />
          <input type="submit" name="kirim" value="Search" />
        </form>
 
    <table id="table_id" border="2" align="center" width="850px">
        <thead align="center">
            <tr>
       <th>ID KARYAWAN</th><th>NAMA</th><th>ALAMAT</th><th>NOMOR HANDPHONE</th><th>OPTION</th>
    </tr>
        </thead>
        <tbody>

        <?php  
    while ($user_data = mysqli_fetch_array($result)) {                 
         echo "<td>".$user_data['id']."</td>";
         echo "<td>".$user_data['nama']."</td>";
         echo "<td>".$user_data['alamat']."</td>";
         echo "<td>".$user_data['no_hp']."</td>";

         echo "<td><a href='edit.php?id=$user_data[id]'>Edit</a> | <a href='delete.php?id=$user_data[id]'>Delete</a></td></tr>";        
    }
    ?>
    </tbody>
    </table>
    
  <form action="index.php" method="post" name="form1" id="data">
      <div class="feat_prod_box_details">
        <div class="contact_form">
          <div class="form_subtitle">Tambah Data Customer</div>
          <form name="Add" href="">

      <tr> 
        <div class="form_row">
        <td><label class="contact"> <strong>ID </strong></label></td>
        <td><input type="text" class="contact_input" name="id"></td>
      </tr>
      <tr> 
        <div class="form_row">
        <td><label class="contact"> <strong>Nama </strong></label></td>
        <td><input type="text" class="contact_input" name="nama"></td>
      </tr>
      <tr> 
        <div class="form_row">
        <td><label class="contact"> <strong>Alamat </strong></label></td>
        <td><input type="text" class="contact_input" name="alamat"></td>
      </tr>
      <tr> 
        <div class="form_row">
        <td><label class="contact"> <strong>Nomor Handphone </strong></label></td>
        <td><input type="text" class="contact_input" name="no_hp"></td>
      </tr>

      <tr> 
        <div class="form_row">
        <center><input type="submit" name="Submit" value="Tambahkan"></center>
      </div>
      </tr>
    </table>
  </form>

<center>
  <?php
  if(isset($_POST['Submit'])) {
    
    $id = $_POST['id'];
    $nama = $_POST['nama'];
    $alamat = $_POST['alamat'];
    $no_hp = $_POST['no_hp'];

    include_once("config.php");

    $result = mysqli_query($mysqli, "INSERT INTO karyawan(id, nama, alamat, no_hp) VALUES('$id','$nama','$alamat','$no_hp')");
    
    echo "<a href='index.php'>Tampilkan Pembeli</a>";
  }
  ?>
</center>

  </body>



</html>
