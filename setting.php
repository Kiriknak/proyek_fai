<?php

session_start();
if(isset($_SESSION['username']))
{
    $username1=$_SESSION['username'];

    include("db.php");
        $query = mysqli_query($conn, "SELECT * from akun where username = '$username1'") or die("<b>Error:</b> Problem on call<br/>" . mysqli_error($conn));
            $row=mysqli_fetch_array($query);

            $email=$row['email'];
            $foto=$row['avatar'];
            $telepon=$row['telepon'];            
            $tgl_lahir=$row['tgl_lahir'];
            $alamat=$row['alamat'];
            $saldo=$row['saldo'];
            $level=$row['level'];
            $foto = 'data:' . 'image/png;' . 'base64,' . base64_encode($foto);

        
    ?>

<!DOCTYPE HTML>
<html>

<head>
    <meta charset="utf-8" />
    <title>Starting project</title>
    <link rel="stylesheet" type="text/css" href="src/semantic.min.css" />
    <link rel="stylesheet" type="text/css" href="src/hamburger.css">
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/semantic-ui/2.4.1/semantic.min.css" />

    <style>
        #reg {
            max-width: 300px !important;
            float:left;
        }
        #reg1 {
            max-width:800px !important;
            float:right;
        }
         #btn1 {
            float:center;
            width:120px;
            height:auto;
            margin-right: 5px;
            cursor: pointer;
        }
        .huruf{
            font-family:Arial;
            font-size: 20px;
        }
        #modal{
            padding: 15px;
            font-size: 16px;
            background: white;
            color: black;
            width: 700px;
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
        #ok {
            float:right;
            width:80px;
            height:auto;
            margin-right: 5px;
            cursor: pointer;
        }

        
    </style>
</head>

<body>
    <?php include("menubar.php"); ?>

    <div id="right" class="ui container">
        <div>
            <div id="reg" class="ui container  segment">
                <table>
                    <tbody>
                        <tr>
                            <td>
                                <img class="ui tiny image" src="<?php echo $foto;?>">            
                            </td>
                            <td>
                                <label><?php echo $username1 ?></label>                
                            </td>
                        </tr>
                    </tbody>
                </table>
                
                <center>
                <div>
                    Saldo : Rp.<?php echo $saldo ?>
                </div>
                <br>
                <a class="ui green button btn" id="btn1" href="topup.php">
                    Top Up
                 </a>                
                </center>
                
                <div class="ui divider"></div>
                <div>
                    <p style="text-align: center;">Ingin menjadi Merchant JualLaku??</p>
                </div>
                <div>
                    <br>
                    <center>
                    <a class="ui green button btn" id="btn1" href="uplevel.php?username=<?php echo $username1;?>">
                                    Merchant
                                </a>                
                                </center>
                </div>

            </div>

        </div>



        <div>

            <div id="reg1" class="ui container  segment">
                <h2 align="center">Data Diri</h2>
                    
<div class="ui grid">

    <div class="seven wide column">
        <div style="float: left;">
                        <div class="ui cards">
                        <div class="card">
                        <img class="ui large image" src="<?php echo $foto ?>">
                        <div class="content">
                            <div class="description">
                            </div>
                        </div>
                        <div class="ui bottom attached button bnn">
                        <i class="add icon btn"></i>
                            Add Picture
                        </div>
                        <div class="extra content">
                            <p>Mohon untuk max ukuran gambar adalah 10 MB </p>
                        </div>
                        </div>
                    </div>
                    </div>          

    </div>
    
    <div class="seven wide column">
        <div>
            <div class="ui relaxed grid">
                <div class="two column row">
                    <div class="column">
                        <p class="huruf">Nama</p>
                    </div>
                    <div class="column">
                        <p class="huruf"><?php echo $username1 ?></p>
                    </div>
                </div>
                <div class="two column row">
                    <div class="column">
                        <p class="huruf">Tanggal Lahir</p>
                    </div>
                    <div class="column"><p class="huruf"><?php echo $tgl_lahir ?></p></div>
                </div>
                <div class="two column row">
                    <div class="column">
                       <p class="huruf">Email</p> 
                    </div>
                    <div class="column"><p class="huruf"><?php echo $email ?></p></div>
                </div>
                <div class="two column row">
                    <div class="column">
                        <p class="huruf">Alamat</p>    
                    </div>
                    <div class="column"><p class="huruf"><?php echo $alamat ?></p></div>
                </div>
                
                <div class="two column row">
                    <div class="column">
                        <p class="huruf">Nomor Telepon</p>
                    </div>
                    <div class="column"><p class="huruf"><?php echo $telepon ?></p></div>
                </div>
                
                <div class="one column row">
                    <div class="column">
                        <a class="ui green inverted  button" href="ubahpassword.php">
                            Ganti password
                        </a>
                </div>
                </div>
            
            
            
            
            
            

            </div>
                

                </div>
    </div>
    


                    
                
                

            </div>
        </div>


    </div>

    <div class="ui modal" id="modal">
          <div class="header" id="modal-atas">Riwayat</div>
            <div class="content" id="modal-isi">
            <div>
                
                <form class="ui form " action="insert.php" method="POST" enctype="multipart/form-data">
                <div class="field">
                

                <div class="field">
                    <label>Input Gambar Avatar Anda :</label>
                    <input name="foto" type="file">
                    
                </div>
                <input type="submit" name="submit" class="ui green inverted button ok" id="ok">
                <div class="ui error message"></div>
            </div>
        </form>
            </div>
            </div>  
          
            
            
            
          
                      
      </div>
      </div>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="src/semantic.min.js"></script>
    <script src="src/hamburger.js"></script>
    <script src="src/sticky.js"></script>

    <script src="js/register.js"></script>
    <script type="text/javascript">
        $(document).ready(function() {       
        $('.bnn').on('click', function() {   
                       
            $('.ui.modal').modal('show')
         
        });
        $('.ok').on('click', function() {   
            $.ajax({
                    url: "insert.php",
                    method: "POST",
                    data: "foto="+foto,
                    success: function (data) {
                        $('.ui.modal').modal('hide');    
                        alert("Gambar berhasil disimpan");
                        window.setTimeout(function(){
                            window.location.href = "setting.php";
                        },300);
                    } 
            });
        });        

        $('.ui.form').form({
                fields: {
                    foto: {
                        identifier: 'foto',
                        rules: [{
                                type: 'empty',
                                prompt: 'mohon masukan gambar anda'
                            }]
                        }
                    }
            });



        });

    </script>
    

</body>

</html>
<?php } ?>