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
                <!--- start of item print !-->
                <?php

                $halaman = 8; //batasan halaman
                $page = isset($_GET['halaman']) ? (int)$_GET["halaman"] : 1;
                $mulai = ($page > 1) ? ($page * $halaman) - $halaman : 0;
                $query = $conn->query("select id_barang,id_seller,nama_barang,foto,harga,stok,
                kategori,deskripsi,avatar from barang join akun on username=id_seller   LIMIT $mulai, $halaman");
                $sql =   $conn->query("select id_barang,id_seller,nama_barang,foto,harga,stok,
                kategori,deskripsi from barang ");
                $total = $sql->num_rows;
                $pages = ceil($total / $halaman);

                $count = 0;
                while ($row = mysqli_fetch_assoc($query)) {
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
                    echo '</div>'; ?>
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
            <div class="ui pagination menu" style="margin-top:30px">
               
            <?php
            for ($i = 1; $i <= $pages; $i++) { 
                
                ?>
                <a class="item <?php
                if($i==$page)echo 'active';
                ?>" href="<?php 
                $strHalaman="index.php?halaman=".$i;
                
                
                echo $strHalaman;
                ?>">
                
                <?php echo $i; ?></a>

            <?php }

            ?>
            
            </div>

  </div>

</div>