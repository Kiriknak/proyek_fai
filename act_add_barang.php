
<?php
if (isset($_POST['submit'])) {
  if (count($_FILES) > 0) {
    if (isset($_FILES['foto']['tmp_name'])) {
      include "db.php";
      mysqli_select_db($conn, "proyek") or die("gagal");

      $nama = $_POST["nama"];
      $harga = $_POST["harga"];
      $stock = $_POST["stok"];
      $deskripsi = $_POST["deskripsi"];
      $kategori = $_POST["kategori"];
      /*create table barang(
id_barang int not NULL AUTO_INCREMENT primary key,
nama_barang varchar(100) not null,
foto longblob not null,
harga int not null,
stok int not null,
kategori varchar(30) not null,
deskripsi varchar (1000) not null
); nitip tipe data database disini */

      $foto = addslashes(file_get_contents($_FILES['foto']['tmp_name']));




      $query = mysqli_query($conn, "INSERT INTO barang (nama_barang,foto,harga,stok,kategori,deskripsi,seller) VALUES('$nama','{$foto}','$harga','$stock','$kategori','$deskripsi','$seller')");

      if ($query) {
        echo "tes";
      } else {
        echo "tessssss gagal";
        //header("Location:masukgambar.php");     
      }
      
    $conn->close();
    }
  }
} ?>
  

 





