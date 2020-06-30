<?php

    if(isset($_POST['username'])){
    include "db.php";
    $conn->select_db('proyek');
    $username = $_POST['username'];
    $password = $_POST['password'];
    $email = $_POST['email'];
    $alamat = $_POST['alamat'];
    //$date = $_POST['date'];
    $telepon = $_POST['telepon'];
    $input_date=$_POST['date'];
    $date=strtotime($_POST['date']);
    $date=date("Y-m-d",$date);
    //$password= $_POST['password'];
    $query=$conn->query("INSERT INTO `akun` ( `username`, `password`, `email`, `telepon`, `tgl_lahir`, `alamat`) VALUES('$username','$password','$email','$telepon','$date','$alamat')");

    if($query){
        ?>
        

<html>

<head>
  <meta charset="utf-8" />
  <title>Starting project</title>
  <link rel="stylesheet" type="text/css" href="src/semantic.min.css" />
  <link rel="stylesheet" type="text/css" href="src/hamburger.css">
  
  </style>

</head>
<body>
    
<div class="ui container">

<div class="ui column stackable center page grid">
  <div class="four wide column"></div><!-- empty div just padding -->
  <form class="ui six wide column form segment" style="height: 300px!important">
        <h1 class="ui header text container"><span class="ui green text">Register Success</span></h1>
        <span class="ui  text">Redirecting to login page in 5 seconds</span>
        <div class="ui active centered inline loader"></div>

</form>
</div>
</div>

<script>
    window.setTimeout(function(){

// Move to a new location or you can do something else
window.location.href = "login.php";

}, 5000);
    </script>
</body>


        <?php

    }
    else {
        echo "gagal";
        echo $date;
    }
    
    }

?>