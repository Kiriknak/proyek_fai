
 
<?php
	
	include "db.php";
	mysqli_select_db($conn,"proyek") or die("gagal");
    
    
    $hasil = "SELECT * from barang";
    
//pakai ini dan while dibawah yang dikomen juga bisa
    /*    $hasil1 = $conn->prepare($hasil);
        $hasil1->execute();
        $result = $hasil1->get_result();
*/
      
        $result = $conn->query($hasil);
        
        
          /*$deskripsi = $row["deskripsi"];
          if (strlen($deskripsi) > 100) {
            $deskripsi = substr($deskripsi, 0, 100) . "...";
          }*/

?>


<div class="ui container">
	
	
		<div class="ui four link cards">
			<?php while ($row = $result->fetch_array()) {
        //while ($row = $result->fetch_assoc()) {
          
          $id = $row["id_barang"];
          $nama = $row["nama_barang"];
          
          $foto = $row["foto"];
          $harga = $row["harga"];
          
          
          $stock = $row["stok"];
          //ngga pakai tapi diadd aja hehehe
          
          $deskripsi = $row["deskripsi"];
		  $kategori = $row["kategori"];
          //
          
          


          if (strlen($nama) > 60) {
            $nama = substr($nama, 0, 60) . "...";
          }
 			echo '<div class="card">';
				echo '<a class="ui image" href="#">';
 				echo '<img src ='.$foto; echo '>';
 				echo '</a>';
 echo '<div class="content">';
    echo '<h2 class="header" href="#">'.$nama; echo '</h2>';
   
 echo '<div class="description">';
   echo '<p class = "card-title">'.$stock; echo 'tersisa</p>';
   echo '<p class = "card-text"> Rp.'.$harga; echo'</p>';
 echo '</div>';
 
 echo'</div>';
echo '</div>';
} ?>
</div>

</div>





       
 




 


