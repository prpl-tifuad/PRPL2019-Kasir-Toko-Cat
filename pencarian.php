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
include "config.php";

$key = $_POST['cari'];
$QueryString = "SELECT * FROM karyawan WHERE id LIKE '%$key%' OR nama LIKE '%$key%' OR alamat LIKE '%$key%' OR no_hp LIKE '%$key%' ";
	$result = mysqli_query($mysqli,$QueryString); 
?>
<id="cari">
        <form method="post" action="pencarian.php">
          <input type="text" name="cari" />
          <input type="submit" name="kirim" value="Search" />
        </form>
<div class="center_content">
    <div class="left_content">
    <div class="title"><span class="title_icon"></span>Data Ditemukan . . .</div>

<table id="table_id" border="5" align="center" width="800px">
        <thead align="center">
            <tr>
      <th>ID KARYAWAN</th><th>NAMA</th><th>ALAMAT</th><th>NOMOR HANDPHONE</th>
    </tr>
        </thead>
        <tbody>
        <?php  
    while($user_data = mysqli_fetch_array($result)) {         
        echo "<tr>";
        echo "<td>".$user_data['id']."</td>";
        echo "<td>".$user_data['nama']."</td>";
        echo "<td>".$user_data['alamat']."</td>";
        echo "<td>".$user_data['no_hp']."</td>";
          
    }
    ?>
    </tbody>
    </table>
</div>
</body>
</html>

   