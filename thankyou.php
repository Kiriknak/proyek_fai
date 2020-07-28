<?php
session_start();
$id=$_GET['id'];
?>
        <!DOCTYPE HTML>
        <html>

        <head>
            <meta charset="utf-8" />
            <title>Starting project</title>
            <link rel="stylesheet" type="text/css" href="src/semantic.min.css" />
            <link rel="stylesheet" type="text/css" href="src/hamburger.css">


        </head>

        <body>
            <?php
            include_once 'menubar.php';
            ?>
            <div class="ui container">
                <div class="ui breadcrumb">
                    <a class="section" href="index.php">Home</a>
                    <div class="divider"> / </div>

                    <p class="section">Order</p>

                </div>
                <div class="ui divider"></div>
                <div class="ui segment">
                    <div class="ui  column centered grid">
                        <div class=" ten wide column center aligned ">
                            <h1 class="ui header"><span class="ui green text">Terimakasih Sudah Berbelanja</span></h1>
                            <h4 class="ui header"><span class="ui grey text">Pesanan Anda Akan segera diproses</span></h4>
                            <h4 class="ui header"><span class="ui grey text">Nomor Order Anda : </span><span class="ui orange text"> <?php echo $id; ?></span></h4>
                            <a class="ui icon button" href="index.php">
                                Kembali Ke halaman utama
                                <i class="arrow alternate circle left outline icon"></i>
                            </a>
                        </div>

                    </div>
                </div>
            </div>
                <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.min.js"></script>
                <script src="src/semantic.min.js"></script>
                <script src="src/hamburger.js"></script>
                <script src="src/sticky.js"></script>


        </body>
<?php
    

?>