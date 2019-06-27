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
$result = mysqli_query($mysqli, "SELECT * FROM pemesanan");
?>

<id="cari">
        <form method="post" action="pencarian3.php">
          <input type="text" name="cari" />
          <input type="submit" name="kirim" value="Search" />
        </form>
 
    <table id="table_id" border="2" align="center" width="850px">
        <thead align="center">
            <tr>
       <th>ID PEMESAN</th><th>NAMA</th><th>ALAMAT</th><th>BARANG PESANAN</th><th>JUMLAH BARANG</th><th>TOTAL HARGA</th>
    </tr>
        </thead>
        <tbody>

        <?php  
    while ($user_data = mysqli_fetch_array($result)) {                 
         echo "<td>".$user_data['id']."</td>";
         echo "<td>".$user_data['nama']."</td>";
         echo "<td>".$user_data['alamat']."</td>";
         echo "<td>".$user_data['pesanan']."</td>";
         echo "<td>".$user_data['jumlah']."</td>";
         echo "<td>".$user_data['total']."</td>";

    }
    ?>
    </tbody>
    </table>
    
  <form action="pemesanan.php" method="post" name="form1" id="data">
      <div class="feat_prod_box_details">
        <div class="contact_form">
          <div class="form_subtitle">Masukkan Data Pesanan</div>
          <form name="Add" href="">

      <tr> 
        <div class="form_row">
        <td><label class="contact"> <strong>ID Pemesan </strong></label></td>
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
        <td><label class="contact"> <strong>Barang Pesanan </strong></label></td>
        <td><input type="text" class="contact_input" name="pesanan"></td>
      </tr>
      <tr> 
        <div class="form_row">
        <td><label class="contact"> <strong>Jumlah </strong></label></td>
        <td><input type="text" class="contact_input" name="jumlah"></td>
      </tr>
      <tr> 
        <div class="form_row">
        <td><label class="contact"> <strong>Total Harga</strong></label></td>
        <td><input type="text" class="contact_input" name="total"></td>
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
    $pesanan = $_POST['pesanan'];
    $jumlah = $_POST['jumlah'];
    $total = $_POST['total'];

    include_once("config.php");

    $result = mysqli_query($mysqli, "INSERT INTO pemesanan(id, nama, alamat, pesanan, jumlah, total) VALUES('$id','$nama','$alamat','$pesanan','$jumlah','$total')");
    
    echo "<a href='pemesanan.php'>Tampilkan Data Pemesanan</a>";
  }
  ?>
</center>

  </body>



</html>
