<?php
if ($_SERVER['REQUEST_METHOD'] == 'GET') {
    if (isset($_GET['id'])) {
        $id = $_GET['id'];

        include_once('db.php');

        $exc = $conn->query("select id_barang,id_seller,nama_barang,foto,harga,stok,kategori,deskripsi,avatar from barang join akun on username=id_seller where id_barang=".$id);

        if ($exc->num_rows > 0) {
            $result = $exc->fetch_array();
            $nama = $result['nama_barang'];
            $deskripsi = $result['deskripsi'];
            $seller = $result['id_seller'];
            $harga = $result['harga'];
            $stok = $result['stok'];
            $kategori = $result['kategori'];
            $foto = $result['foto'];
            $avatar = $result['avatar'];
            $stok = $result['stok'];

            $foto = 'data:' . 'image/png;' . 'base64,' . base64_encode($foto);
            $avatar = 'data:' . 'image/png;' . 'base64,' . base64_encode($avatar);
        }
?>
        <!DOCTYPE HTML>
        <html>

        <head>
            <meta charset="utf-8" />
            <title>Starting project</title>
            <link rel="stylesheet" type="text/css" href="src/semantic.min.css" />
            <link rel="stylesheet" type="text/css" href="src/hamburger.css">

            </style>

        </head>

        <body>
            <?php
            include_once 'menubar.php';
            ?>

            <div class="ui container">
                <div class="ui breadcrumb">
                    <p class="section">Products</p>
                    <div class="divider"> / </div>

                    <a class="section" href="search.php?kategori=<?php echo $kategori;?>"><?php echo $kategori; ?></a>
                    <div class="divider"> / </div>

                    <div class=" section"><?php echo $nama; ?></div>

                </div>
                <div class="ui segment">
                    <div class="ui grid internally celled stackable container">

                        <div class=" eight wide column">
                            <div class="ui image">
                                <img src="<?php echo $foto; ?>">
                            </div>
                        </div>

                        <div class="eight wide column" style="padding-left: 1cm;">

                            <h1 class="ui header" style="padding-top: 1em;"><?php echo $nama; ?></h1>
                            <div class="ui container">
                                <span class="ui grey text">Dijual Oleh </span>
                                <div class="ui avatar image">
                                    <img src="<?php echo $avatar ?>">
                                </div>
                                <span class="ui grey text"> <?php echo $seller; ?></span>
                            </div>
                            <h5 class="ui header">Rp. <?php echo $harga; ?>,00 </h5>
                            <p class="ui  text" style="padding-top: 1em;"><?php echo $deskripsi; ?></p>
                            <div class="ui input one wide field">
                                <button class="ui icon button" id="minus">
                                    <i class="minus icon"></i>
                                </button>
                                <input type="text" readonly="" style="width: 50px;text-align:center" value="1" name="jumlah" id="jumlah">
                            </div>
                            <button class="ui icon button" id="plus">
                                <i class="plus icon"></i>
                            </button>

                            <?php
                            if ($stok <= 3) {
                                echo "<span class='ui red text'> Barang tinggal tersisa " . $stok . "</span>";
                            } else
                                echo "<span class='ui green text'> Barang  tersisa " . $stok . "</span>";

                            ?>

                            <div class="ui container" style="padding-top: 1em;">
                                <div class="ui vertical animated green button" tabindex="0" id="addcart">
                                    <div class="hidden content">Add to cart</div>
                                    <div class="visible content" style="width:5em">
                                        <i class="shop icon"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
            <script src="src/semantic.min.js"></script>
            <script src="src/hamburger.js"></script>
            <script src="src/sticky.js"></script>
            <script>
                $(document).ready(function() {


                    var jumlah = $('#jumlah').val();
                    var stok = <?php echo $stok; ?>;
                    var id = <?php echo $id; ?>;
                    $('#addcart').on('click', function() {
                        $.ajax({
                            method: "POST",
                            url: "ajax/cart.php",
                            data: {
                                id: id,
                                jumlah: jumlah,
                                action: "add"
                            },
                            success: function(data) {
                                data = parseInt(data);
                                if (data >= 0) {
                                    $('body')
                                        .toast({
                                            class: 'success',
                                            message: `Sukses menambah isi cart`
                                        });
                                    var num = parseInt($('.floating.ui.red.label').text()) + parseInt(data)
                                    $('.floating.red.label').text(num);
                                } else {
                                    $('body')
                                        .toast({
                                            class: 'error',
                                            position: 'top left',

                                            showIcon: 'exclamation',
                                            message: `Jumlah barang dicart melebihi stok`
                                        });
                                }

                            }
                        })
                    })


                    $('#minus').on('click', function() {
                        if (jumlah > 0) {
                            $('#jumlah').val(--jumlah)
                        }
                    })
                    $('#plus').on('click', function() {
                        if (jumlah < stok) {
                            $('#jumlah').val(++jumlah)
                        }
                    })
                })
            </script>
        </body>
<?php
    }
}
?>