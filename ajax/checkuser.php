<?php
if(isset($_POST['username'])){
    include('../db.php');
    $username = $_POST['username'];

    mysqli_select_db($conn,'proyek');
    $result = mysqli_query($conn, "SELECT * from akun where username='$username'");

    echo mysqli_num_rows($result);

    $conn->close(); 
}
?>