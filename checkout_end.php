<?php 
include_once('db.php');
session_start();
if ($_SERVER['REQUEST_METHOD']=='POST'){
        $nama=$_POST['nama'];
        $alamat = $_POST['alamat'];
        $kabupaten = $_POST['kabupaten'];
        $provinsi = $_POST['provinsi'];
        $kodepos = $_POST['kodepos'];
        $nohp = $_POST['hp'];
        $metode = $_POST['metode'];
        $username=$_SESSION['username'];
        $query = $conn->query("INSERT INTO alamat(nama,alamat,kabupaten,provinsi,kodepos,nohp) 
                            VALUES ('$nama', '$alamat', 
                            '$kabupaten', '$provinsi', '$kodepos','$nohp')");

           $idAlamat= $conn->insert_id;
        
        $transaksi=$conn->query("insert into transaksi(id_customer,id_alamat) values('$username',$idAlamat)");

        $idtx= mysqli_insert_id($conn);
        $total=0;
        foreach ($_SESSION['cart'] as $idbrg=>$jumlah){
            $query= $conn->query("SELECT harga,id_seller from barang where id_barang = $idbrg")->fetch_assoc();
            $harga=$query['harga'];
            $seller=$query['id_seller'];
            $subtotal=0;
            $subtotal=$harga*$jumlah;
            $total+=$subtotal;
            $query=$conn->query("INSERT INTO DETAIL_TRANSAKSI(id_transaksi,id_barang,jumlah,harga) values ($idtx,$idbrg,$jumlah,$harga)");
            $conn->query("update akun set saldo=saldo+$total where username='$seller'");
            $br=$conn->query("update barang set stok=stok-$jumlah where id_barang='$idbrg'");
        }
        if($metode=="saldo"){
            $query=$conn->query("update akun set saldo=saldo-$total where username='$username'");
        }
        
        $res=$conn->query("select saldo from akun where username='$username'")->fetch_assoc();

        unset($_SESSION['cart']);
        $_SESSION['saldo']=$res['saldo'];

        
        header("Location:thankyou.php?id=".$idtx);
    }
