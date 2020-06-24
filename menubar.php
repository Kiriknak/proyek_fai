
  <div class="ui pointing borderless menu  stackable">
    <a class="item header">
      NutupLapak.com
    </a>
    <a class="item" href="index.php">
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
      <?php
        if(!isset($_COOKIE['login'])){
          ?>
          <div class="ui buttons">
          <a class="ui green inverted button" href="login.php">Login</a>
          <div class="or"></div>
          <a class="ui  reverted green button" href="register.php">Register</a>
        </div>
        <?php
        
        }
      ?>
      </div>

    </div>
    <div class="hamburger ">
      <span class="hamburger-bun"></span>
      <span class="hamburger-patty"></span>
      <span class="hamburger-bun"></span>
    </div>
  </div>