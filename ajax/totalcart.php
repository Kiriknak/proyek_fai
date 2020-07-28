<?php
session_start();
include_once "../db.php";
if($_SERVER['REQUEST_METHOD'] ==="POST")
{
    $jumlah=0;
    if(isset($_SESSION["cart"])){
        foreach($_SESSION["cart"] as $key=>$value)
        {
            $result=$conn->query("select harga from barang where id_barang =$key")->fetch_array();
            
            $harga = $result["harga"];
            $jumlah+= $value*$harga;
        }
}


    echo $jumlah;
}
?>