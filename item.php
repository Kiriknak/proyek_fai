<?php

include "db.php";
mysqli_select_db($conn, "proyek") or die("gagal");


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


  <div class="ui four  cards">
    <?php
    $count = 0;
    while ($row = $result->fetch_array() and $count < 8) {
      //while ($row = $result->fetch_assoc()) {

      $id = $row["id_barang"];
      $nama = $row["nama_barang"];

      $foto = $row["foto"];
      $harga = $row["harga"];


      $stock = $row["stok"];
      //ngga pakai tapi diadd aja hehehe

      $deskripsi = $row["deskripsi"];
      $kategori = $row["kategori"];
      $img = $row["foto"];
      $mimeType = finfo_buffer(finfo_open(), $img, FILEINFO_MIME_TYPE);

      //
      $resz = imagecreatefromstring($foto);
      $width = imagesx($resz);
      $height = imagesy($resz);
      $newWidth = 260;
      $newHeight = ($height / $width) * $newWidth;
      $tmp = imagecreatetruecolor($newWidth, 280);
      imagealphablending($tmp, false);
      imagesavealpha($tmp, true);


      $trans_colour = imagecolorallocatealpha($tmp, 255, 255, 255, 127);
      imagefill($tmp, 0, 0, $trans_colour);



      $centreX = round($newWidth / 2);
      $centreY = round($newHeight / 2);

      imagecopyresampled($tmp, $resz, 0, $centreY / 2, 0, 0, $newWidth, $newHeight, $width, $height);



      ob_start();
      imagepng($tmp);

      $blob = ob_get_clean();
      //$foto= 'data:'.$mimeType.';'.'base64,'.base64_encode($blob);
      $foto = 'data:' . 'image/png;' . 'base64,' . base64_encode($blob);

      if (strlen($nama) > 60) {
        $nama = substr($nama, 0, 60) . "...";
      }

      echo '<a class="ui raised card link" href="item_detail.php?id=' . $id . ' ">';
      echo '<div class="image" >';
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
          <img class="ui avatar image" src="https://semantic-ui.com/images/avatar/small/matt.jpg"> Matt
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