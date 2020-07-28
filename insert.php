
<?php
session_start();
include 'action/funct.php';

if (isset($_POST['submit'])) {
  if(isset($_SESSION['username'])){
  if (count($_FILES) > 0) {
    if (isset($_FILES['foto']['tmp_name'])) {
      include "db.php";
      mysqli_select_db($conn, "proyek") or die("gagal");
      $username=$_SESSION['username'];
      
      $uploadedfile = $_FILES['foto']['tmp_name'];
      
      $foto=funct::resize($uploadedfile);


      $query = mysqli_query($conn, "UPDATE akun set avatar='$foto' where username='$username'");

      if ($query) {
        echo "<script>alert('sukses');history.go(-1)</script>";
      } else {
        echo "<script>alert('gagal');history.go(-1)</script>";
        //header("Location:masukgambar.php");     
      }
      
    $conn->close();
    }
  }}
} ?>
  

 





