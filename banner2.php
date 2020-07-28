<link rel="stylesheet" type="text/css" href="src/semantic.min.css" />
  <link rel="stylesheet" type="text/css" href="src/hamburger.css">


<?php
if (isset($_POST['submit'])) {
  if (count($_FILES) > 0) {
    if (isset($_FILES['foto']['tmp_name'])) {
      include_once "db.php";
      mysqli_select_db($conn, "proyek") or die("gagal");

  
      $deskripsi = $_POST["deskripsi"];
      $foto = addslashes(file_get_contents($_FILES['foto']['tmp_name']));

      
      $query = mysqli_query($conn, "INSERT INTO banner (gambar_banner,deskripsi) VALUES('{$foto}','$deskripsi')");

      if ($query) {
        ?>
        <div class="ui column stackable center page grid">
  <div class="four wide column"></div><!-- empty div just padding -->
  <form class="ui six wide column form segment" style="height: 300px!important">
        <h1 class="ui header text container"><span class="ui green text">Add Banner Success</span></h1>
        <span class="ui  text">Redirecting in 5 seconds</span>
        <div class="ui active centered inline loader"></div>

        <script>
    window.setTimeout(function(){

// Move to a new location or you can do something else
window.location.href = "index.php";

}, 5000);
    </script>

<?php       
      } else { ?>
           <div class="ui column stackable center page grid">
  <div class="four wide column"></div><!-- empty div just padding -->
  <form class="ui six wide column form segment" style="height: 300px!important">
        <h1 class="ui header text container"><span class="ui green text">Add Banner Unsuccess</span></h1>
        <span class="ui  text">Redirecting in 3 seconds</span>
        <div class="ui active centered inline loader"></div>

</form>
</div>
</div>

<script>
    window.setTimeout(function(){

// Move to a new location or you can do something else
window.location.href = "banner1.php";

}, 3000);
    </script>

        
      <?php }
      
    $conn->close();
    }
  }
} ?>
  

 





