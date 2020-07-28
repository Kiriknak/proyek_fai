
<?php
include_once 'action/funct.php';



if (isset($_POST['submit'])) {
  if (!count($_FILES) > 0) {
    if (!isset($_FILES['foto']['tmp_name'])) {
      include_once "db.php";
      mysqli_select_db($conn, "proyek") or die("gagal");
      
      //$uploadedfile = $_FILES['foto']['tmp_name'];
      $id=$_POST["id"];
      $nama = $_POST["nama"];
      $harga = $_POST["harga"];
      $stock = $_POST["stok"];
      $deskripsi = $_POST["deskripsi"];
      $kategori = $_POST["kategori"];
     
      //$foto=funct::resize($uploadedfile);
      session_start();
      $seller= $_SESSION['username'];


      $sql="update barang set nama_barang='$nama',stok=$stock,deskripsi='$deskripsi',kategori='$kategori',harga=$harga where id_barang='$id'";
      $query = mysqli_query($conn, $sql);

      if ($query) {
        echo "<script>alert('sukses');window.location.href='list.php';</script>";
      } else {
        echo "<script>alert('gagal');window.location.href='list.php';</script>";
        header("Location:masukgambar.php");     
      }
      
    $conn->close();
    }
  }
} ?>
  

 





