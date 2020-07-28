<?php
session_start();
if (isset($_SESSION['level']) && $_SESSION['level'] >= 1) {
    if ($_SERVER['REQUEST_METHOD'] == 'GET' && isset($_REQUEST['id'])) {
        $id_barang = $_REQUEST['id'];

        include_once("db.php");
        $result = $conn->query("SELECT * from barang where id_barang =$id_barang");
        if ($result->num_rows > 0) {
            $row = $result->fetch_assoc();
            $nama = $row["nama_barang"];
            $harga = $row["harga"];
            $deskripsi = $row["deskripsi"];
            $kategori = $row["kategori"];
            $stok = $row["stok"];
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
                        max-width: 500px !important;
                    }
                </style>
            </head>

            <body>
                <?php include_once "menubar.php"; ?>
                <div class="ui container">
                    <div class="ui breadcrumb">
                        <a class="section" href="index.php">Home</a>
                        <div class="divider"> / </div>

                        <p class="section">Seller</p>
                        <div class="divider"> / </div>

                        <p class="section">Edit Barang</p>

                    </div>
                    <div id="reg" class="ui container  segment">
                        <h1 class="ui header center aligned">Edit Barang</h1>
                        <form class="ui form " action="act_edit_barang.php" method="POST" enctype="multipart/form-data">
                            <input type="hidden" value="<?php echo $id_barang; ?>" name="id">
                            <div class="field">
                                <div class="field">
                                    <label>Nama Barang</label>
                                    <input type="text" name="nama" placeholder="Minimal 6 karakter" value="<?php echo $nama; ?>">
                                </div>

                                <div class="field">
                                    <label>Harga Barang</label>
                                    <input type="text" name="harga" placeholder="Contoh : 100000" value="<?php echo $harga; ?>">
                                </div>

                                <div class="field">
                                    <label>Jumlah Barang</label>
                                    <input type="text" name="stok" placeholder="" value="<?php echo $stok; ?>">
                                </div>

                                <div class="field">
                                    <label>Deskripsi</label>
                                    <textarea name="deskripsi" placeholder="Deskripsi Barang"><?php echo $deskripsi; ?></textarea>
                            
                                </div>

                                <div class="field">
                                    <label>Kategori</label>
                                    <select class="ui search selection dropdown" id="kategori" name="kategori">
                                        <option value="">Select Kategori</option>
                                        <option value="Makanan">Makanan</option>
                                        <option value="Minuman">Minuman</option>
                                        <option value="Peralatan">Peralatan</option>
                                        <option value="Elektronik">Elektronik</option>
                                        <option value="Komputer">Komputer</option>
                                        <option value="Olahraga">Olahraga</option>
                                        <option value="Pakaian">Pakaian</option>
                                        <!-- Saving your scroll sanity !-->
                                    </select>
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
                <script src="src/sticky.js"></script>

                <script>
                    $(document).ready(function() {
                        $('.ui.form').ready(function() {

                            $('#kategori').dropdown('set selected', '<?php echo $kategori; ?>');

                        });
                    })
                </script>


            </body>


            </html><?php

                }
                    ?>
<?php
    }
} ?>