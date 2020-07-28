<?php
if (session_status() == PHP_SESSION_NONE) {
  session_start();
}
$p = 0;
if ((isset($_COOKIE['login'])) && $_COOKIE['login'] == true) {
  $level = $_SESSION['level'];
  $username = $_SESSION['username'];
} else {
  $level = -1;
}

if (isset($_SESSION['cart'])) {
  $p = count($_SESSION['cart']);
}


?>
<div class="ui fluid container" style="margin-bottom:50px">
  <div class="ui pointing borderless menu sticky stackable" ">
    <a class=" item header">
    NutupLapak.com
    </a>
    <a class="item" href="index.php">
      Home
    </a>
      <div class="ui dropdown item">
    Categories
    <i class="dropdown icon"></i>
    <div class="menu">
      <!--
        Makanan</option>
                            <option value="Minuman">Minuman</option>
                            <option value="Peralatan">Peralatan</option>
                            <option value="Elektronik">Elektronik</option>
                            <option value="Komputer">Komputer</option>
                            <option value="Olahraga">Olahraga</option>
                            <option value="Pakaian">Pakaian</option>
-->
      <a class="item" href="search.php?kategori=makanan">Makanan</a>
      <a class="item" href="search.php?kategori=Minuman">Minuman</a>
      <a class="item" href="search.php?kategori=Peralatan">Peralatan</a>
      <a class="item" href="search.php?kategori=Elektronik">Elektronik</a>
      <a class="item" href="search.php?kategori=Komputer">Komputer</a>
      <a class="item" href="search.php?kategori=olahraga">Olahraga</a>
      <a class="item" href="search.php?kategori=pakaian">Pakaian</a>
    </div>
      </div>
    <div class="item">        <form action="search.php" method="get">

      <div class="ui transparent icon input">
        <input type="text" placeholder="Search..." name="nama">
        <button type="submit"class="ui basic button"><i class="search link icon"></i></button>
</form>
      </div>
    </div>
    <div class="right menu">
      <div class="item">
        <a class="ui basic black button" href="cart.php"><i class="shopping cart icon"></i>
          <div class="floating ui red label"><?php echo $p; ?></div>
        </a>

      </div>

      <?php
      if (!isset($_COOKIE['login'])) {
      ?>
        <div class="item">
          <div class="ui buttons">
            <a class="ui green inverted button" href="login.php">Login</a>
            <div class="or"></div>
            <a class="ui  reverted green button" href="register.php">Register</a>
          </div>
          <?php
        } else {
          if ($level >= 1) {
          ?>
            <div class="ui  dropdown item">
              <span class="ui green text">Seller</span>
              <div class="menu">
                <a class="item" href="add_barang.php">Tambah Barang</a>
                <a class="item" href="list.php">List Barang</a>
                <a class="item" href="history.php">Riwayat Penjualan</a>
              </div>
            </div>
            <?php
            if ($level > 1) {
            ?>
              <div class="ui  dropdown item">
                <span class="ui red text">Admin</span>
                <div class="menu">
                  <a class="item" href="setting.php">Tambah Banner</a>
                  <a class="item" href="history.php">List Barang </a>
                </div>
              </div>
            <?php
            }
          }
          if ($level >= 0) {
            ?>
            <div class="ui  dropdown item" style="min-width: 130px">
              <span class="ui grey text"><?php echo $username . "  "; ?></span>
              <br>
              <i class=" settings icon" style="padding-left: 1em;"></i>
              <div class="menu">
                <div class="header">
                  Saldo : Rp.100000
                </div>
                <a class="item" href="setting.php">Settings</a>
                <a class="item" href="history.php">Riwayat</a>
                <a class="item" href="logout.php">Logout</a>
              </div>
          <?php
          }
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
  </div>