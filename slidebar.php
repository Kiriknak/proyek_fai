

<?php
    include_once "db.php";
	mysqli_select_db($conn,"proyek") or die("gagal");
    $hasil = "SELECT * from barang";
    

        $result = $conn->query($hasil);
        
?>
<div class = "ui container">

<div class="slider" width="80%">
          <?php
              echo '<div class="slides">';
              	
              	$count=1;
              	while ($row = $result->fetch_array()) {
              		
                  $nama = $row["nama_barang"];
                  $img=$row["foto"];
                  $finfo    = new finfo(FILEINFO_MIME);
                  $mimeType = $finfo->buffer($img);
                  echo "<div class='slide-item item$count'>";
                  //$foto = "data:$mimeType;base64,'.base64_encode($foto->load()) .'";
                  $count+=1;

                  $harga = $row["harga"];
                  //ngga pakai tapi diadd aja hehehe
                  $id = $row["id_barang"];
                  $stock = $row["stok"];
                  $deskripsi = $row["deskripsi"];
                  $kategori = $row["kategori"];

          if (strlen($nama) > 60) {
            $nama = substr($nama, 0, 60) . "...";
          }
          
          if (strlen($deskripsi) > 100) {
            $deskripsi = substr($deskripsi, 0, 100) . "...";
          }
          
            
               ?> <img src="data:$mimeType;base64,<?php echo base64_encode( $img ); ?>" />
               <?php
                                 echo "</div>";
          
                }?>
              
        
</div>




</div>






