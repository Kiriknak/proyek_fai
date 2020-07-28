<?php
session_start();
if(isset($_SESSION['level']))
{
    if($_SESSION['level']>1){
        ?>
        <!DOCTYPE HTML>
        <html>

        <head>
            <meta charset="utf-8" />
            <title>Starting project</title>
            <link rel="stylesheet" type="text/css" href="src/semantic.min.css" />
            <link rel="stylesheet" type="text/css" href="src/hamburger.css">

            </style>

        </head><body>
<?php
        include_once 'menubar.php';
        ?>
        <div class="ui container">
        <div class="ui divider"></div>

            <h2 class="ui header">Hi , <?php echo $username;?></h2>
    </div>

  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="src/semantic.min.js"></script>
  <script src="src/hamburger.js"></script>
  <script src="src/sticky.js"></script>
  </body>
  <?php
    }
}
?>