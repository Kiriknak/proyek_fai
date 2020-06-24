<?php
include "db.php";
if(isset($_POST['username']))
{
    $username = $_POST['username'];
    $password = $_POST['password'];

    mysqli_select_db($conn,"proyek") or die("gagal");
    $usr=mysqli_query($conn,"SELECT * from akun where username='$username' and password='$password'");

    if(mysqli_num_rows($usr)>0)
    {
        //session_start();
        $result= mysqli_fetch_assoc($usr);
        //PAKAI COOKIE SAJA
        //$_SESSION['id']=$result['id'];
        //$_SESSION['login']=true;
        setcookie("id",$result['id'],time()+3600);
        setcookie("login",true,time()+3600);


        $conn->close();
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
        <h1 class="ui header text container"><span class="ui green text">Login Success</span></h1>
        <span class="ui  text">Redirecting in 5 seconds</span>
        <div class="ui active centered inline loader"></div>

</form>
</div>
</div>

<script>
    window.setTimeout(function(){

// Move to a new location or you can do something else
window.location.href = "index.php";

}, 5000);
    </script>
</body>


<?php
    }

    else{
        header('Location:login.php');
    }


}

?>