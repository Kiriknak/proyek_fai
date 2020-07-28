<?php 
include_once('db.php');
if ($_SERVER['REQUEST_METHOD']=='POST'){
        $nama=$_POST['nama'];
        $alamat = $_POST['alamat'];
        $kabupaten = $_POST['kabupaten'];
        $provinsi = $_POST['provinsi'];
        $kodepos = $_POST['kodepos'];
        $nohp = $_POST['hp'];

        $query = $conn->query("INSERT INTO alamat(nama,alamat,kabupaten,provinsi,kodepos,nohp) 
                            VALUES ('$nama', '$alamat', 
                            '$kabupaten', '$provinsi', '$kodepos','$nohp')");

        if($query==TRUE){
           $idAlamat= mysqli_insert_id($conn);
        }


        
    }
?>