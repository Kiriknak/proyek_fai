<?php
session_start();
if(isset($_SESSION['username']))
{
    $username=$_SESSION['username'];
//untuk ngambil jumlah saldo sebelumnya
    include("db.php");
    ?>

<!DOCTYPE html>
<html>
<head>
	<title>
		Starting Project
	</title>
	<head>
    <meta charset="utf-8" />
    <title>Starting project</title>
    <link rel="stylesheet" type="text/css" href="src/semantic.min.css" />
    <link rel="stylesheet" type="text/css" href="src/hamburger.css">
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/semantic-ui/2.4.1/semantic.min.css" />

    <style>
        #reg {
            max-width: 500px !important;
        }
    </style>
</head>
<body>

	 <?php include "menubar.php"; ?>

    <div id="right" class="ui container">
        <div id="reg" class="ui container center aligned segment">
            <form class="ui form" action = "ubah_pass.php" method = "POST" enctype="multipart/form-data">
                <input type="hidden" name="user" value="<?php echo $username; ?>">
                <div class="field">
                    <div class="field">
                        <label>Password Lama</label>
                        <input type="password" name="lama" placeholder="Minimal 6 karakter">
                    </div>

                    <div class="field">
                        <label>Password Baru</label>
                        <input type="password" name="baru" placeholder="">
                    </div>

                    <div class="field">
                        <label>Konfirmasi Password Baru</label>
                        <input type="password" name="konfirbaru" placeholder="">
                    </div>

                    
                    <div class="ui error message"></div>
                    <input type="submit" name="submit" class="ui green button hidden">
                    

            </form>



        </div>


    </div>

    </div>

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="src/semantic.min.js"></script>
    <script src="src/hamburger.js"></script>
<script src="src/components/sticky.js"></script>

<script type="text/javascript">$(document).ready(function(){    
    $("#menu").sticky({topSpacing:0});
</script>
<script>
            
                    $('.ui.form')
                        .form({
                            fields: {
                                lama : {
                                    identifier: 'lama',
                                    rules: [{
                                            type: 'empty',
                                            prompt: 'mohon masukan password lama anda'
                                        }
                                        
                                    ]
                                },
                                baru: {
                                    identifier: 'baru',
                                    rules: [{
                                        type: 'empty',
                                        prompt: 'Maaf, password baru tidak boleh kosong'

                                    }
                                    ]
                                },
                                konfirbaru: {
                                    identifier: 'konfirbaru',
                                    rules: [{
                                            type: 'empty',
                                            prompt: 'mohon masukan password'

                                        },
                                        {
                                            type: 'match[baru]',
                                            prompt: 'maaf, konfirmasi password tidak cocok'
                                        }
                                    ]
                                }


                        }
                    });
  

</script>
</body>
</html>
<?php } ?>