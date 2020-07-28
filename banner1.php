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
            max-width: 500px !important;
        }
    </style>
</head>

<body>
    <?php include_once "menubar.php"; ?>

    <div id="reg" class="ui container center aligned segment">
        <form class="ui form" action="banner2.php" method="POST" enctype="multipart/form-data">
            <div class="field">
                
                
                <div class="field">
                    <label>Input Gambar Banner :</label>
                    <input name="foto" type="file">
                </div>
                <div class="field">
                    <label>Deskripsi</label>
                    <textarea name="deskripsi" placeholder="deskripsi Banner"></textarea>
                </div>

                
                <div class="ui error message"></div>
                <input type="submit" name="submit" class="ui green button hidden">


        </form>



    </div>


    </div>


    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="src/semantic.min.js"></script>
    <script src="src/hamburger.js"></script>
    <script src="src/sticky.js"></script>

    <script>
        $(document).ready(function() {

            $('.ui.form').form({
                fields: {
                    
                    deskripsi: {
                        identifier: 'deskripsi',
                        rules: [{
                                type: 'empty',
                                prompt: 'mohon masukan deskripsi barang anda'

                            },
                            {
                                type: 'maxLength[50]',
                                prompt: 'maaf, deskripsi maximal 50 karakter'
                            }
                        ]
                    },
                    foto: {
                        identifier: 'foto',
                        rules: [{
                                type: 'empty',
                                prompt: 'mohon masukan gambar anda'

                            }

                        ]
                    }


                }
            });

        })
    </script>


</body>


</html>