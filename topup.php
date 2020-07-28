 

<?php
session_start();
if(isset($_SESSION['username']))
{
    $username1=$_SESSION['username'];
//untuk ngambil jumlah saldo sebelumnya
    include("db.php");
        $query = mysqli_query($conn, "SELECT saldo from akun where username = '$username1'") or die("<b>Error:</b> Problem on call<br/>" . mysqli_error($conn));
            $row=mysqli_fetch_array($query);
        
    ?>
    <!DOCTYPE HTML>
<html>

<head>
    <meta charset="utf-8" />
    <title>Starting project</title>
    <link rel="stylesheet" type="text/css" href="src/semantic.min.css" />
    <link rel="stylesheet" type="text/css" href="src/hamburger.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.7.1/dropzone.min.css" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.7.1/dropzone.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.1.1.min.js" integrity="sha256-hVVnYaiADRTO2PzUGmuLJr8BLUSjGIZsDYGmIJLv2b8="
      crossorigin="anonymous"></script>
    <script src="src/semantic.min.js"></script>
    <style>
        #reg {
            
            max-width: 800px !important;
            margin: 0 auto;

        }
        label > input{ /* Menyembunyikan radio button */
          visibility: hidden; 
          position: absolute; 
        }
        label > input + img{ /* style gambar */
          cursor:pointer;
          border:2px solid transparent;
        }
        footer {
          position: fixed;
          left: 0;
          bottom: 0px;
          height: 25px;
          width: 100%;
          background-color: green;

        }

        div.fott{
          padding-top: 3px;
        }
        a.fot{
          color : white;      
        }
        #modal{
            padding: 15px;
            font-size: 16px;
            background: white;
            color: black;
            width: 480px;
            border-radius: 15px;
            margin: 0 auto; 
            padding-bottom: 50px;
            border: 1px solid green;
        }
        #modal_atas{
            width: 100%;
            padding: 15px;
            margin-left: -15px;
            font-size: 18px;
            margin-top: -15px;

        }
        #tombol {
            float:right;
            width:80px;
            height:auto;
            margin-right: 5px;
            cursor: pointer;
        }
    </style>
</head>
<body>
    <?php include "menubar.php"; ?>
<div  class="ui container">       
    <h1 class="ui header center aligned">Top Up Saldo</h1>
    <div class="ui divider"></div>            
    <div class="ui big breadcrumb">
        <a class="section" href="index.php">Home</a>
        <div class="divider"> / </div>
        <div class="active section">Top Up</div>
    </div>
    <br>
    <div id="reg" class="ui segment">   
        <form class="ui form " action="" method="POST" enctype="multipart/form-data">
            <input type="hidden" name="user" value="<?php echo $username1; ?>">
            <input type="hidden" name="saldo" value="<?php echo $row['saldo']; ?>">
            <div class="field">
                <div class="field">
                    <h3>Jumlah Nominal : </h3>
                    <input type="text" name="harga" id="harga" placeholder="Min. Rp.50.000">
                </div>
                <h3>Melalui : </h3>
                <div class="grouped fields">
                            <label>
                            <input type="radio" name="pembayaran" id="pul1" value="ovo">
                            <img src="ovo.png" width="60" height="40"/>
                            </label>
                        <div class="field">
                            <h5 id ="s1" hidden>Nomor Telepon</h5>
                            <input type="text" name="ovo" id="ovo" placeholder="" disabled="" hidden maxlength="12">
                        </div>
                            <label>
                            <input type="radio" name="pembayaran" id="pul2" value="gopay">
                            <img src="gopay.png" width="60" height="30"/>
                            </label>
                        <div class="field">
                            <h5 id ="s2" hidden>Nomor Telepon</h5>
                            <input type="text" name="gopay" id="gopay" placeholder="" disabled="" hidden maxlength="12">
                        </div>                    
                            <label>
                            <input type="radio" name="pembayaran" id="pul3" value="transfer">
                            <img src="bank1.png" width="60" height="30"/>
                            <img src="bca.png" width="60" height="30"/>
                            </label>
                        <div class="field">
                            <h5 id ="s3" hidden>Nomor Rekening</h5>
                            <left>
                            <h3 id="rekening1" hidden>1034-2372-1853</h3>
                            </left>
                        </div>
                        <div class="field">
                        <h5 id="rekening2" hidden>Mohon transfer senilai :  <span id="hasil"></span></h5>      
                        </div>
                </div>
                <div class="ui error message"></div>
                <input type="submit" name="submit" class="ui green button hidden">
            </div>
        </form>
    </div>

<footer claas="ui vertical footer segment form-page">
<div class="fott">
      <center><a class="fot">Copyright © - JualLaku.com Company. All Rights Reserved.</a></center>
</div>
</footer>

    


</body>
</html>
<?php
}?>

<?php
if (isset($_POST['submit'])){
  if (!count($_FILES) > 0) {
    if (!isset($_FILES['foto']['tmp_name'])) {
      
      include "db.php";
      mysqli_select_db($conn, "proyek") or die("gagal");
      $username= $_POST['user'];
      //$uploadedfile = $_FILES['foto']['tmp_name'];

      $jumlah=$_POST["harga"];
      $jumlah1=$_POST["saldo"];
      $total=$jumlah+$jumlah1;
      $media = $_POST["pembayaran"];
      $tanggal = date("Y-m-d");
      $tanggal = date("Y-m-d",strtotime($tanggal));

      $sql = "UPDATE akun set saldo='$total'where username='$username'";        
      $sql1 = "INSERT INTO history (username,saldo_awal,saldo_transaksi,tanggal,deskripsi) values('$username','$jumlah1','$total',NOW(),'Melakukan Top Up sebesar $jumlah dengan menggunakan $media')";

      $query = mysqli_query($conn, $sql) or die("<b>Error:</b> Problem on UPDATE<br/>" . mysqli_error($conn));
      $query1 = mysqli_query($conn, $sql1) or die("<b>Error:</b> Problem on INSERT<br/>" . mysqli_error($conn));
      if ($query&&$query1) {
        echo
         '<div class="ui modal" id="modal">
          <div class="header" id="modal-atas">!!Selamat!!</div>
            <div class="content">
            <p>Anda berhasil melakukan Top Up</p>
            <a href="index.php"><button class="ui green basic button" id="tombol">Ok</button></a>
          </div>';
        /*echo "<script>
        window.setTimeout(function(){
        // Move to a new location or you can do something else
        window.location.href = 'index.php';
        },2000);
      </script>";*/
      } else {
        echo'<div class="ui modal" id="modal">
          <div class="header" id="modal-atas">Maaf!</div>
            <div class="content">
            <p>Anda gagal melakukan Top Up</p>
            <a href="top_up.php"><button clas="ui green basic button" id="tombol">Ok</button></a>
          </div>';
        /*echo "<script>
        window.setTimeout(function(){
        // Move to a new location or you can do something else
        window.location.href = 'top_up.php';
        },2000);   
      </script>";*/
        //header("Location:masukgambar.php");
      }
    $conn->close();
    }
  }
 }

 ?>
<script>
$('.ui.modal').modal('show');
 </script>

 <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="src/semantic.min.js"></script>
    <script src="src/hamburger.js"></script>
    <script src="src/sticky.js"></script>

    <script>
        $.fn.form.settings.rules.myCustomRule = function(harga) {
    // Your validation condition goes here
           if(harga >= 50000 ){
                return true;
           }
           
        }

        $(document).ready(function() {
        $("#harga").focus();
        $("#pul1").click(function() {
            $("#ovo").attr("disabled", false);
            $("#ovo").prop("hidden", false);
            $("#s1").prop("hidden", false);
            $("#gopay").attr("disabled", true);
            $("#gopay").prop("hidden", true);
            $("#s2").prop("hidden", true);
            $('#rekening1').prop('hidden', true);
            $('#rekening2').prop('hidden', true);
            
            $("#s3").prop("hidden", true);
            $("#isipul").focus();
        });

        $("#pul2").click(function() {
            $("#gopay").attr("disabled", false);
            $("#gopay").prop("hidden", false);
            $("#s2").prop("hidden", false);
            $("#ovo").attr("disabled", true);
            $("#ovo").prop("hidden", true);
            $("#s1").prop("hidden", true);
            $('#rekening1').prop('hidden', true);
            $('#rekening2').prop('hidden', true);
            
            $("#s3").prop("hidden", true);
            $("#rek").focus();
        });
        
        $("#pul3").click(function() {
            $("#gopay").attr("disabled", true);
            $("#ovo").attr("disabled", true);
            $("#gopay").prop("hidden", true);
            $("#ovo").prop("hidden", true);
            $("#s1").prop("hidden", true);
            $("#s2").prop("hidden", true);
            $('#rekening1').prop('hidden', false);
            $('#rekening2').prop('hidden', false);
            
            $("#s3").prop("hidden", false);        
            var input = $("#harga").val();
            document.getElementById("hasil").innerHTML=input;

        }); 

        

            $('.ui.form').form({
                fields:{
                    harga: {
                        identifier: 'harga',
                        rules: [{
                                type: 'empty',
                                prompt: 'mohon masukan jumlah top up anda'
                            },
                            {
                                type: 'number',
                                prompt: 'Maaf, Salah format data'
                            },
                            {
                                type: 'myCustomRule[harga]',
                                prompt: 'Maaf, minimal top up Rp.50.000'
                            }
                        ]
                    },
                    pembayaran: {
                        identifier: 'pembayaran',
                        rules: [{
                                type: 'checked',
                                prompt: 'mohon memilih tipe pembayaran'
                            }
                        ]
                    },
                    ovo: {
                        identifier: 'ovo',
                        rules: [{
                                type: 'empty',
                                prompt: 'mohon masukan nomor telepon anda'
                            },
                            {
                                type: 'number',
                                prompt: 'Maaf, Salah format data'
                            },
                            {
                                type: 'minLength[12]',
                                prompt: 'Maaf, harap masukan nomor telepon dengan benar'
                            }
                        ]
                    },
                    gopay: {
                        identifier: 'gopay',
                        rules: [{
                                type: 'empty',
                                prompt: 'mohon masukan nomor telepon anda'

                            },
                            {
                                type: 'number',
                                prompt: 'maaf, salah format data'                                
                            },
                            {
                                type: 'minLength[12]',
                                prompt: 'Maaf, harap masukan nomor telepon dengan benar'
                            }
                        ]
                    }
                    
                }
            });

        });
    </script>