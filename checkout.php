<!DOCTYPE HTML>
<html>

<head>
    <meta charset="utf-8" />
    <title>Starting project</title>
    <link rel="stylesheet" type="text/css" href="src/semantic.min.css" />
    <link rel="stylesheet" type="text/css" href="src/hamburger.css">
    <style>
        /* Chrome, Safari, Edge, Opera */
        input::-webkit-outer-spin-button,
        input::-webkit-inner-spin-button {
            -webkit-appearance: none;
            margin: 0;
        }

        /* Firefox */
        input[type=number] {
            -moz-appearance: textfield;
        }
    </style>

</head>

<body>
    <?php include_once "menubar.php";
    include_once "db.php";
    ?>


    <div class="ui hidden divider"></div>

    <div class="ui container">
        <!-- <?php //include_once "slidebar.php";
                ?> -->
        <div class="ui breadcrumb">
            <a class="section" href="index.php">Home</a>
            <div class="divider"> / </div>
            <p class="section">Checkout</p>
        </div>

        <form class="ui form" action="checkout_end.php" method="POST" enctype="multipart/form-data">

            <div class="ui segment">
                <h1 class="ui header">Pengiriman</h1>
                <div class="ui stackable grid">
                    <div class="eight wide column" style="margin-top: 2em">

                        <div class="ui segment">
                            <div class="field">
                                <div class="field">
                                    <label>Nama Penerima</label>
                                    <input type="text" name="nama" placeholder="">
                                </div>
                                <div class="field">
                                    <label>Alamat </label>
                                    <input type="text" name="alamat" placeholder="">
                                </div>
                                <div class="field">
                                    <label>Kabupaten </label>
                                    <input type="text" name="kabupaten" placeholder="">
                                </div>
                                <div class="field">
                                    <label>Provinsi </label>
                                    <input type="text" name="provinsi" placeholder="">
                                </div>
                                <div class="field">
                                    <label>Kodepos </label>
                                    <input type="text" name="kodepos" placeholder="">
                                </div>
                                <div class="field">
                                    <label>No HP </label>
                                    <input type="text" name="hp" placeholder="">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="eight wide column">

                        <h4 class="ui header">Detail Barang</h4>
                        <table class="ui  table">
                            <thead>
                                <tr>
                                    <th>Nama Barang</th>
                                    <th>harga</th>
                                    <th>jumlah</th>
                                    <th>subtotal</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                foreach ($_SESSION['cart'] as $id => $jumlah) {
                                    $berisi = false;
                                    $total = 0;
                                    $exc = $conn->query("select * from barang where id_barang=" . $id);
                                    if ($exc->num_rows > 0) {
                                        $result = $exc->fetch_array();
                                        $nama = $result['nama_barang'];
                                        $deskripsi = $result['deskripsi'];
                                        $seller = $result['id_seller'];
                                        $harga = $result['harga'];
                                        $stok = $result['stok'];
                                        $kategori = $result['kategori'];
                                        $foto = $result['foto'];
                                        $foto = 'data:' . 'image/png;' . 'base64,' . base64_encode($foto);
                                        $total += $jumlah * $harga;
                                ?>
                                        <tr>
                                            <td><img class="ui avatar image" src="<?php echo $foto ?>">
                                                <?php echo $nama; ?></td>
                                            <td><?php echo $harga; ?></td>
                                            <td><?php echo $jumlah; ?></td>
                                            <td><?php echo $jumlah * $harga; ?>
                                        </tr>
                                <?php
                                    }
                                }
                                ?>

                            </tbody>

                            <tfoot class="full-width" style="text-align: right">
                                <tr>
                                    <th></th>
                                    <th colspan="4">
                                        Total : Rp.<?php echo $total; ?>
                                    </th>
                                </tr>
                            </tfoot>
                        </table>


                        <div class="field">
                            <h4 class="ui header">Pembayaran</h4>
                            <div class="ui radio checkbox">
                                <input type="radio" name="metode" value="cod">
                                <label>Cash On Delivery</label>
                            </div>

                            <div class="field">
                                <div class="ui radio checkbox">
                                    <input type="radio" name="metode" id="saldo" value="saldo" >
                                    <label>Saldo : (Rp.<?php echo $saldo; ?>)</label>
                                </div>
                            </div>
                            
                        </div>
                            <button class="ui right labeled icon green inverted button" type="submit">
                                <i class="right arrow icon"></i>
                                Checkout
                            </button>
        </form>
    </div>
    </div>



    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="src/semantic.min.js"></script>
    <script src="src/hamburger.js"></script>
    <script src="src/sticky.js"></script>
    <script>
        $('.ui.form')
            .form({
                fields: {
                    nama: 'empty',
                    alamat: 'empty',
                    Kabupaten: 'empty',
                    provinsi: 'empty',
                    nohp: ['empty', 'number'],
                    kodepos: ['empty', 'number']
                }
            });

        if(<?php echo $saldo-$total;?><0){
            $('#saldo').attr("disabled","disabled");
            $("<span class=\"ui red text\">Saldo kurang harap topup atau gunakan CoD</span>").insertAfter('#saldo');
        }
    </script>