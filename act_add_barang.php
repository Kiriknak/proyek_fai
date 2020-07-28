
<?php
include_once 'action/funct.php';

if (isset($_POST['submit'])) {
    if (count($_FILES) > 0) {
        if (isset($_FILES['foto']['tmp_name'])) {
            include_once "db.php";
            mysqli_select_db($conn, "proyek") or die("gagal");

            $uploadedfile = $_FILES['foto']['tmp_name'];
            $nama = $_POST["nama"];
            $harga = $_POST["harga"];
            $stock = $_POST["stok"];
            $deskripsi = $_POST["deskripsi"];
            $kategori = $_POST["kategori"];

            $foto = funct::resize($uploadedfile);
            session_start();
            $seller = $_SESSION['username'];

            $query = mysqli_query($conn, "INSERT INTO barang (nama_barang,foto,harga,stok,kategori,deskripsi,id_seller) VALUES('$nama','$foto','$harga','$stock','$kategori','$deskripsi','$seller')");

            if ($query) {
                echo "<script>alert('sukses');window.location.href ='add_barang.php'</script>";
            } else {
                echo "<script>
                alert('GAGAL MENAMBAH BARANG');
                window.location.href='add_barang.php'</script>";
                //header("Location:masukgambar.php");
            }

            $conn->close();
        }
    }
}?>








