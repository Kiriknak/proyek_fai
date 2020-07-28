<?php

if(isset($_POST['submit'])){
	
	include "db.php";	
	
	mysqli_select_db($conn,"proyek") or die("gagal");

	$username = $_POST['user'];
	$lama=$_POST['lama'];
	$baru=$_POST['baru'];
	
	$sql = "SELECT * from akun where username = '$username'";
	$query = mysqli_query($conn, $sql) or die("<b>Error:</b> Problem on UPDATE<br/>" . mysqli_error($conn));
    

	
        $result= mysqli_fetch_assoc($query);

		$db_pass = $result['password'];


	if(password_verify($lama,$db_pass)){
		
		$enckrips=password_hash($baru, PASSWORD_DEFAULT);

		$sql1 = "UPDATE akun set password = '$enckrips' where username = '$username'";
		$query1 = mysqli_query($conn, $sql1) or die("<b>Error:</b> Problem on UPDATE<br/>" . mysqli_error($conn));
		if($query1){
		echo "<script>alert('Password Telah Berhasil Diganti'); location.href='index.php';</script>";
		}
		else{
		echo "<script>alert('Maaf, Password gagal diganti'); location.href='ubahpassword.php';</script>";
		}
  }
	


}
?>