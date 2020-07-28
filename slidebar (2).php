<link rel="stylesheet" href="https://cdn.jsdelivr.net/bxslider/4.2.12/jquery.bxslider.css">


<?php
    include_once "db.php";
	mysqli_select_db($conn,"proyek") or die("gagal");
    $hasil = "SELECT * from banner where id_banner between 1 and 3";
    

        $result = $conn->query($hasil);
        
?>

<div class = "ui container">


          <?php
              
              	$i=0;
              	
              	while ($row = $result->fetch_array()) {
                  	$gambar [ $i ] = $row ;
                    
                    $i ++;
                    $img=$row["gambar_banner"];
                  $finfo    = new finfo(FILEINFO_MIME);
                  $mimeType = $finfo->buffer($img);
                  }
                    $jumlah = count($gambar);
                    
                  
                  
                  //$foto = "data:$mimeType;base64,'.base64_encode($foto->load()) .'";
                  $deskripsi = $row["deskripsi"];
                
          
          if (strlen($deskripsi) > 30) {
            $deskripsi = substr($deskripsi, 0, 30) . "...";
          }
          echo '<div class="bxslider">';
          for ( $i = 0 ; $i <$jumlah ; $i ++ ) {
            echo '<div>';
            

               ?>
               
                <img class= "slides" src="data:$mimeType;base64,<?php echo base64_encode( $img ); ?>" width = "1127" height = "252" />
               
               
               <?php
               echo '</div>';
               
                }?>
              </div>;
              
        
</div>




</div>
<script  src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
<script src="https://cdn.jsdelivr.net/bxslider/4.2.12/jquery.bxslider.min.js"></script>
<script>
  (function(){
            $('.slider').bxSlider({
                autoControls: true,
                auto: true,
                pager: true,
                slideWidth: 600,
                mode: 'fade',
                captions: true,
                speed: 100
            });
          });
</script>







