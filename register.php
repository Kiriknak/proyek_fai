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
    <?php include("menubar.php"); ?>

    <div id="right" class="ui container">
        <div id="reg" class="ui container  segment">

            <form class="ui form" method="post" action="reg_act.php">
                <div class="field">
                    <div class="field success">
                        <label>Username</label>
                        <input type="text" name="username" placeholder="4-10 Character">
                        <div class="ui  message hidden msg">
                            <i class="close icon msg"></i>
                            <div class="header msg">
                            </div>
                            <p class="msg">
                            </p>
                        </div>
                    </div>

                    <div class="field">
                        <label>Email</label>
                        <input type="email" name="email" placeholder="Contoh : name@gmail.com">
                    </div>


                    <div class="field">
                        <label>Alamat</label>
                        <textarea name="alamat" rows="4" placeholder="Alamat" style="resize:none;"></textarea>
                    </div>

                    <div class="field">
                        <label>Tanggal Lahir</label>
                        <div class="ui calendar" id="date_calendar">
                            <div class="ui input left icon">
                                <i class="calendar icon"></i>
                                <input type="text" placeholder="Date" name="date">
                            </div>
                        </div>
                    </div>


                    <div class="field">
                        <label>Kota :</label>
                        <input type="text" name="kota" placeholder="">
                    </div>

                    <div class="field">
                        <label>Kode Pos :</label>
                        <input type="text" name="kode" pattern="^\d{5,6}(?:[-\s]\d{4})?$" placeholder="Contoh : 603482">
                    </div>

                    <div class="field">
                        <label>Nomor Telepon :</label>
                        <input type="text" name="telepon" placeholder="contoh : +6283156789234">
                    </div>

                    <div class="field">
                        <label>Password :</label>
                        <input type="password" name="password" placeholder="">
                    </div>

                    <div class="field">
                        <label>Confirm Password :</label>
                        <input type="password" name="password1" placeholder="">
                    </div>

                    <div class="field">
                        <div class="ui checkbox">
                            <input type="checkbox" name="checkbox">
                            <label>saya menyetujui Syarat dan Ketentuan </label>
                        </div>
                    </div>
                    <div class="ui error message"></div>

                    <input type="submit" class="ui green  disabled button " name="submit">

            </form>



        </div>


    </div>

    </div>








    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="src/semantic.min.js"></script>
    <script src="src/hamburger.js"></script>
    <script src="src/sticky.js"></script>

    <script src="js/register.js"></script>
    </script>

</body>

</html>