<?php
    if($_SERVER['REQUEST_METHOD']=='GET'){
        
    include_once('../db.php');
    $id=$_REQUEST['id'];
    $result =$conn->query("SELECT saldo from akun where id = $id");
    if($result->num_rows>0){
        $row=$result->fetch_assoc();
        $saldo=$row['saldo'];
        echo $saldo;
    }
    else echo 'error';
    }
?>