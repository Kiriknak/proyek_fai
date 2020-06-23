<?php 
  session_start();
  if(isset($_SESSION['id']))
  {
    header('location:index.php');
  }
?>

<!DOCTYPE HTML>
<html>

<head>
  <meta charset="utf-8" />
  <title>Starting project</title>
  <link rel="stylesheet" type="text/css" href="src/semantic.min.css" />
  <link rel="stylesheet" type="text/css" href="src/hamburger.css">
  <style>
    #reg {
      max-width: 500px;
    }
  </style>

</head>

<body>


  <div class="ui pointing borderless menu  stackable">
    <a class="item header">
      NutupLapak.com
    </a>
    <a class="item">
      Home
    </a>
    <a class="item">
      Kategori
    </a>
    <div class="item">
      <div class="ui transparent icon input">
        <input type="text" placeholder="Search...">
        <i class="search link icon"></i>
      </div>
    </div>
    <div class="right menu">
      <div class="item">
        <div class="ui buttons">
          <a class="ui green inverted button" href="login.php">Login</a>
          <div class="or"></div>
          <a class="ui  reverted green button" href="register.php">Register</a>
        </div>


      </div>

    </div>
    <div class="hamburger ">
      <span class="hamburger-bun"></span>
      <span class="hamburger-patty"></span>
      <span class="hamburger-bun"></span>
    </div>
  </div>

  <div class="ui container">
    <div id="reg" class="ui container center aligned segment">

      <form class="ui form" action="log_act.php" method="post">
        <div class="field">
          <label>Username</label>
          <div class="ui left icon input">
            <input type="text" placeholder="Username" name="username">
            <i class="user icon"></i>
          </div>
        </div>
        <div class="field">
          <label>Password</label>
          <div class="ui left icon input">
            <input type="password" placeholder="Password" name="password">
            <i class="lock icon"></i>
          </div>
        </div>
        <button class="ui green button" type="submit" >Login</button>
        <div class="ui error message"></div>
      </form>

      <div class="ui horizontal divider">
        Or
      </div>
      <div class="middle aligned column">

        <span>Belum Punya Akun?</span>

        <a href="daftar.php"><span class="ui green text">Sign Up</span></a>

      </div>



    </div>


  </div>

  </div>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="src/semantic.min.js"></script>
  <script src="src/hamburger.js"></script>
  <script>$(document).ready(function(){

 $('.ui.form')
  .form({
    
    username: {
      identifier : 'username',
      rules: [
        {
          type   : 'empty',
          prompt : 'Please enter a username'
        }
      ]
    },
    password: {
      identifier : 'password',
      rules: [
        {
          type   : 'empty',
          prompt : 'Please enter a password'
        },
        {
          type   : 'length[6]',
          prompt : 'Your password must be at least 6 characters'
        }
      ]
    }
  });
  });
    
  </script>
</body>

</html>