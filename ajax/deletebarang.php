<?php
if($_SERVER['REQUEST_METHOD']=='POST'){
include('../db.php');
$id=$_REQUEST['id'];

echo $conn->query("delete from barang where id_barang = $id");


}
?>