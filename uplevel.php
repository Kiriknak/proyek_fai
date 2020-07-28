<?php
include("db.php");
    if(isset($_GET['username'])){
        $username = $_GET['username'];
        $query =$conn->query("UPDATE SET level='1' WHERE username='$username'");

        echo "<script>alert(\"sukses menjadi seller\");
            window.location.href='index.php';    
        </script>";
    }
?>