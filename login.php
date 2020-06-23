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
          <button class="ui green inverted button">Login</button>
          <div class="or"></div>
          <button class="ui  reverted green button">Register</button>
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

      <form class="ui form">
        <div class="field">
          <label>Username</label>
          <div class="ui left icon input">
            <input type="text" placeholder="Username">
            <i class="user icon"></i>
          </div>
        </div>
        <div class="field">
          <label>Password</label>
          <div class="ui left icon input">
            <input type="password" placeholder="Password">
            <i class="lock icon"></i>
          </div>
        </div>
        <div class="ui green button">Login</div>
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
</body>

</html>