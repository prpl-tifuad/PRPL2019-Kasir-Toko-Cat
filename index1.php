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
$result = mysqli_query($mysqli, "SELECT * FROM produk");
?>

<id="cari">
        <form method="post" action="pencarian.php">
          <input type="text" name="cari" />
          <input type="submit" name="kirim" value="Search" />
        </form>
 
    <table id="table_id" border="2" align="center" width="850px">
        <thead align="center">
            <tr>
       <th>KODE PRODUK</th><th>NAMA</th><th>HARGA</th><th>JUMLAH STOCK</th><th>OPTION</th>
    </tr>
        </thead>
        <tbody>

        <?php  
    while ($user_data = mysqli_fetch_array($result)) {                 
         echo "<td>".$user_data['kode_produk']."</td>";
         echo "<td>".$user_data['nama']."</td>";
         echo "<td>".$user_data['harga']."</td>";
         echo "<td>".$user_data['stock']."</td>";

         echo "<td><a href='edit1.php?kode_produk=$user_data[kode_produk]'>Edit</a> | <a href='delete1.php?kode_produk=$user_data[kode_produk]'>Delete</a> </td></tr>";        
    }
    ?>
    </tbody>
    </table>
    
  <form action="index1.php" method="post" name="form1" id="data">
      <div class="feat_prod_box_details">
        <div class="contact_form">
          <div class="form_subtitle">Tambah Data Produk</div>
          <form name="Add" href="">


      <tr> 
        <div class="form_row">
        <td><label class="contact"> <strong>Kode Produk </strong></label></td>
        <td><input type="text" class="contact_input" name="kode_produk"></td>
      </tr>
      <tr> 
        <div class="form_row">
        <td><label class="contact"> <strong>Nama </strong></label></td>
        <td><input type="text" class="contact_input" name="nama"></td>
      </tr>
      <tr> 
        <div class="form_row">
        <td><label class="contact"> <strong>Harga </strong></label></td>
        <td><input type="text" class="contact_input" name="harga"></td>
      </tr>
      <tr> 
        <div class="form_row">
        <td><label class="contact"> <strong>Jumlah Stock </strong></label></td>
        <td><input type="text" class="contact_input" name="stock"></td>
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
    
    $kode_produk = $_POST['kode_produk'];
    $nama = $_POST['nama'];
    $harga = $_POST['harga'];
    $stock = $_POST['stock'];

    include_once("config.php");

    $result = mysqli_query($mysqli, "INSERT INTO produk(kode_produk, nama, harga, stock) VALUES('$kode_produk','$nama','$harga','$stock')");
    
    echo "<a href='index1.php'>Tampilkan Produk</a>";
  }
  ?>
</center>

  </body>



</html>
