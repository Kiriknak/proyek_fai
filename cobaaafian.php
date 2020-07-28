<?php
session_start();
if(isset($_SESSION['username']))
{
    $username1=$_SESSION['username'];

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
    <style>
        #reg {
            max-width: 800px !important;
        }
        
        label > input{ /* Menyembunyikan radio button */
          visibility: hidden; 
          position: absolute; 
        }
        label > input + img{ /* style gambar */
          cursor:pointer;
          border:2px solid transparent;
        }
    </style>
</head>

<body>
    <?php include "menubar.php"; ?>
    <h1 class="ui header center aligned">Top Up Saldo</h1>
    
    

    <div id="reg" class="ui container segment">   
        
        <form class="ui form " action="act_top_up.php" method="POST" enctype="multipart/form-data">
            <input type="hidden" name="user" value="<?php echo $username1; ?>">
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
                            <input type="text" name="ovo" id="ovo" placeholder="" disabled="" hidden>
                        </div>
                        
                        
                        
                            <label>
                            <input type="radio" name="pembayaran" id="pul2" value="gopay">
                            <img src="gopay.png" width="60" height="30"/>
                            </label>
                        
                        
                        <div class="field">
                            <h5 id ="s2" hidden>Nomor Telepon</h5>
                            <input type="text" name="gopay" id="gopay" placeholder="" disabled="" hidden>
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


    


    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="src/semantic.min.js"></script>
    <script src="src/hamburger.js"></script>
    <script src="src/sticky.js"></script>

    <script>
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
                fields: {
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
                                type: 'minLength[5]',
                                prompt: 'Maaf, minimal top up 50.000'
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
                            }
                        ]
                    },
                    gopay: {
                        identifier: 'gopay',
                        rules: [{
                                type: 'empty',
                                prompt: 'mohon masukan nomor rekening anda'

                            },
                            {
                                type: 'number',
                                prompt: 'maaf, salah format data'                                
                            }
                        ]
                    },
                    foto: {
                        identifier: 'foto',
                        rules: [{
                                type: 'empty',
                                prompt: 'mohon masukan bukti transfer'

                            }
                            
                        ]
                    }
                    
                }
            });

        });
        
        

    </script>


</body>


</html><?php
}
?>










<?php
if (isset($_POST['submit'])){
  if (!count($_FILES) > 0) {
    if (!isset($_FILES['foto']['tmp_name'])) {
      
      include "db.php";
      mysqli_select_db($conn, "proyek") or die("gagal");
      session_start();

      $username= $_POST['user'];

      //$uploadedfile = $_FILES['foto']['tmp_name'];
      $jumlah=$_POST["harga"];
      $media = $_POST["pembayaran"];
      
      
      $sql = "UPDATE akun set saldo='$jumlah'where username='$username'";        
      
      $sql1 = "INSERT INTO Pembayaran ('username','saldo','media') values('$username','$jumlah','$media')";
      
      
      
      
      
      

      
      //$foto=funct::resize($uploadedfile);
      

/*"INSERT INTO barang (nama_barang,foto,harga,stok,kategori,deskripsi,id_seller) VALUES('$nama','$foto','$harga','$stock','$kategori','$deskripsi','$seller')"*/

      $query = mysqli_query($conn, $sql) or die("<b>Error:</b> Problem on UPDATE<br/>" . mysqli_error($conn));
      if (isset($query)&&ISSET($sql1)) {
        /*echo "<script>alert('<?php echo $username ?>  <?php echo $jumlah ?>');history.go(-1)</script>";*/
      } else {
        /*echo "<script>alert('gagal');history.go(-1)</script>";
        //header("Location:masukgambar.php");     */
      }
      
    $conn->close();
    }
  }
 }?>