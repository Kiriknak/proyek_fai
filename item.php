<?php

include_once "db.php";
mysqli_select_db($conn, "proyek") or die("gagal");


$hasil = "SELECT id_barang,id_seller,nama_barang,foto,harga,stok,kategori,deskripsi,avatar from barang join akun on id_seller=username";

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


  <div class="ui container">


    <div class="ui four  cards">
      <?php
      $count = 0;
      while ($row = $result->fetch_array() and $count < 8) {
      
        $id = $row["id_barang"];
        $seller = $row['id_seller'];
        $nama = $row["nama_barang"];
        $foto = $row["foto"];
        $harga = $row["harga"];
        $stock = $row["stok"];
        $deskripsi = $row["deskripsi"];
        $kategori = $row["kategori"];
        $img = $row["foto"];
        $imgAvatar = $row['avatar'];
        $foto = 'data:' . 'image/png;' . 'base64,' . base64_encode($img);
        $avatar = 'data:' . 'image/png;' . 'base64,' . base64_encode($imgAvatar);
        

        echo '<a class="ui raised card link" href="item_detail.php?id=' . $id . ' ">';
        echo '<div class="image" style="background-color:white">';
        echo '<img src =' . $foto . '>';
        echo '</div>';
        echo '<div class="content">';
        echo '<h2 class="header" href="#">' . $nama;
        echo '</h2>';

        echo '<div class="description">';
        echo '<p class = "card-title">' . $stock;
        echo ' tersisa</p>';
        echo '<p class = "card-text"> Rp.' . $harga;
        echo '</p>';
        echo '</div>';
      ?>
        <div class="extra content bottom attached">
          <div class="right floated author">
            <img class="ui avatar image" src="<?php echo $avatar; ?>"> <?php echo $seller; ?>
          </div>
        </div>
      <?php

        echo '</div>';
        echo '</a>';
        $count++;
      }
      ?>
    </div>

  </div>

</div>