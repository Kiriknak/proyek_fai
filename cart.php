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

            <p class="section">Shopping Cart</p>
        </div>


        <div class="ui segment">
            <div class="ui grid internally celled stackable container">

                <div class=" twelve wide column">
                    <div class="ui items">
                        <!---- start of item list---->
                        <?php

                        if(isset($_SESSION['cart'])){
                        foreach ($_SESSION['cart'] as $id => $jumlah) {

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
                            }



                        ?>

                            <div class="item" style="margin-top:30px">
                                <div class="ui small image">
                                    <img src="<?php echo $foto; ?>">
                                </div>
                                <div class="middle aligned content">
                                    <div class="header">
                                        <?php echo $nama; ?>
                                    </div>
                                    <div class="description">
                                        <span class="ui grey small text">Dijual Oleh : <?php echo $seller; ?></span><br>
                                        Harga : Rp.<?php echo $harga; ?></span>
                                    </div>
                                    <div class="extra">
                                        <div class="ui right floated ">
                                            <div class="ui input one wide field">
                                                <button class="ui icon button" id="minus<?php echo $id; ?>">
                                                    <i class="minus icon"></i>
                                                </button>
                                                <input type="number" readonly="" style="width: 50px;text-align:center" value="<?php echo $jumlah; ?>" name="jumlah" id="jumlah<?php echo $id; ?>" max="<?php echo $stok; ?>">
                                            </div>
                                            <button class="ui icon button" id="plus<?php echo $id; ?>">
                                                <i class="plus icon"></i>
                                            </button>
                                        </div>
                                        <div class="ui right floated ">
                                            <div class="ui input one wide field">
                                                <button class="ui icon button" id="trash<?php echo $id; ?>">
                                                    <i class="trash icon"></i>
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                            </div>
                            <div class="ui divider" id="divider<?php echo $id; ?>"></div>


                        <?php
                        }
                    }
                    else{
                        echo "
                        <div class='item' style='margin-top:30px'>
                        <h2 class ='ui header'>Cart Kosong</h2>
                        </div>";
                    }

                        ?>
                        <!---end of items cart--->

                    </div>
                </div>

                <div class="four wide column" style="padding-left: 1cm;">
                    <h3 class="ui header">Ringkasan Belanja </h3>
                    <div class="ui aligned grid">
                        <?php

                        $jumlah = 0;
                        if (isset($_SESSION["cart"])) {
                            foreach ($_SESSION["cart"] as $key => $value) {
                                $result = $conn->query("select harga from barang where id_barang =$key")->fetch_array();

                                $harga = $result["harga"];
                                $jumlah += $value * $harga;
                            }
                        }


                        ?>
                        <div class="left floated  two wide column">
                            <span class="ui grey text">
                                Total:
                            </span>
                            <span class="ui green text" id="total">
                                Rp.<?php echo $jumlah; ?>
                            </span>
                        </div>



                    </div>

                    <button class="ui   labeled icon green button" id="checkout" style="margin-top: 1cm">
                        <i class="right arrow icon"></i>
                        Checkout
                    </button>

                </div>
            </div>
        </div>
    </div>




    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="src/semantic.min.js"></script>
    <script src="src/hamburger.js"></script>
    <script src="src/sticky.js"></script>
    <script>
        $('#checkout').click(function() {
            $(this).addClass('loading');

            if (document.cookie.indexOf('login') <0) {
                alert("harap login terlebih dahulu");
                window.location.href = 'login.php';
            }
            else{
                window.location.href = 'checkout.php';
            }
        })

        function update() {
            $.ajax({
                method: 'POST',
                url: 'ajax/cart.php',
                data: {
                    action: 'total'
                },
                success: function(data) {
                    $('#total').text('Rp.' + data);
                }
            })
        }


        <?php
        foreach ($_SESSION['cart'] as $id => $jumlah) {
            echo "

            

            var jumlah" . $id . " = $('#jumlah" . $id . "').val();
            var stok" . $id . " = $('#jumlah" . $id . "').attr('max');
            var id" . $id . " = " . $id . ";
            
            $('#plus" . $id . "').click( function() {
                if (jumlah" . $id . " <stok" . $id . ") {
                    $('#jumlah" . $id . "').val(++jumlah" . $id . ")
                    $.ajax({
                        method:'POST',
                        url:'ajax/cart.php',
                        data : {
                            action:'add',
                            id:" . $id . ",
                            jumlah:1
                        },
                        success: function(data) {
                            data=parseInt(data);
                            if(!data>=0){
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

                    update();
                    
                }
            })
            
            $('#minus" . $id . "').on('click', function() {
                if (jumlah" . $id . " > 1) {
                    $('#jumlah" . $id . "').val(--jumlah" . $id . ")
                    $.ajax({
                        method:'POST',
                        url:'ajax/cart.php',
                        data : {
                            action:'add',
                            id:" . $id . ",
                            jumlah:-1
                        }
                    })

                    update();
                }
            })

            $('#trash" . $id . "').click( function() {
                $.ajax({
                    method: 'POST',
                    url: 'ajax/cart.php',
                    data: {
                        id: " . $id . ",action:'delete'                    },
                    success: function(data) {
                        $('body')
                            .toast({
                                class: 'success',
                                message: `Sukses menghapus isi cart`
                            });
                            $('#trash" . $id . "').closest('.item').remove();
                            $('#divider" . $id . "').remove();
                            update();
                    }
                })
            })


            "
        ?>
        <?php
        }
        ?>
    </script>
</body>

</html>