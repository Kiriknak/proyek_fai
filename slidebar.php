<link rel="stylesheet" href="https://cdn.jsdelivr.net/bxslider/4.2.12/jquery.bxslider.css">


<?php
    include "db.php";
	mysqli_select_db($conn,"proyek") or die("gagal");
    $hasil = "SELECT * from barang";
    

        $result = $conn->query($hasil);
        
?>

<div class = "ui container">

<div class="slider">
          <?php
              echo '<div>';
              	
              	
              	while ($row = $result->fetch_array()) {
              		
                  $nama = $row["nama_barang"];
                  $img=$row["foto"];
                  $finfo    = new finfo(FILEINFO_MIME);
                  $mimeType = $finfo->buffer($img);
                  
                  //$foto = "data:$mimeType;base64,'.base64_encode($foto->load()) .'";
                  

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
               echo '</div>';
                }?>
              
        
</div>




</div>
<script  src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
<script src="https://cdn.jsdelivr.net/bxslider/4.2.12/jquery.bxslider.min.js"></script>
<script>
  $(document).ready(function(){
            $('.slider').bxSlider({
                autoControls: true,
                auto: true,
                pager: true,
                slideWidth: 1300,
                mode: 'fade',
                captions: true,
                speed: 100
            });
          });
</script>







