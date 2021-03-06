<?php
session_start();
if(isset($_SESSION['level'])&&$_SESSION['level']>=1)
{
    ?>
    <!DOCTYPE HTML>
<html>

<head>
    <meta charset="utf-8" />
    <title>Starting project</title>
    <link rel="stylesheet" type="text/css" href="src/semantic.min.css" />
    <link rel="stylesheet" type="text/css" href="src/hamburger.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.7.1/dropzone.min.css" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.7.1/dropzone.min.js"></script>
    <style>
        #reg {
            max-width: 500px !important;
        }
    </style>
</head>

<body>
    <?php include_once "menubar.php"; ?>

    <div id="reg" class="ui container  segment">
        <h1 class="ui header center aligned">Tambah Barang</h1>
        <form class="ui form " action="act_add_barang.php" method="POST" enctype="multipart/form-data">
            <div class="field">
                <div class="field">
                    <label>Nama Barang</label>
                    <input type="text" name="nama" placeholder="Minimal 6 karakter">
                </div>

                <div class="field">
                    <label>Harga Barang</label>
                    <input type="text" name="harga" placeholder="Contoh : 100000">
                </div>

                <div class="field">
                    <label>Jumlah Barang</label>
                    <input type="text" name="stok" placeholder="">
                </div>

                <div class="field">
                    <label>Deskripsi</label>
                    <textarea name="deskripsi" placeholder="deskripsi Barang"></textarea>
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

                <div class="field">
                    <label>Input Gambar Barang :</label>
                    <input name="foto" type="file">
                    
                </div>
                <div class="ui error message"></div>
                <input type="submit" name="submit" class="ui green button hidden">


        </form>



    </div>


    </div>


    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="src/semantic.min.js"></script>
    <script src="src/hamburger.js"></script>
    <script src="src/sticky.js"></script>

    <script>
        $(document).ready(function() {
            $('#kategori').dropdown();

            $('.ui.form').form({
                fields: {
                    nama: {
                        identifier: 'nama',
                        rules: [{
                                type: 'empty',
                                prompt: 'mohon masukan nama barang anda'
                            },
                            {
                                type: 'minLength[6]',
                                prompt: 'Maaf, nama barang minimal 6 karakter'
                            }
                        ]
                    },
                    stok: {
                        identifier: 'stok',
                        rules: [{
                                type: 'empty',
                                prompt: 'mohon masukan jumlah barang anda'

                            },
                            {
                                type: 'number',
                                prompt: 'maaf, jumlah barang haruslah angka'
                            }
                        ]
                    },
                    deskripsi: {
                        identifier: 'deskripsi',
                        rules: [{
                                type: 'empty',
                                prompt: 'mohon masukan deskripsi barang anda'

                            },
                            {
                                type: 'minLength[10]',
                                prompt: 'maaf, deskripsi minimal 10 karakter'
                            }
                        ]
                    },
                    kategori: {
                        identifier: 'kategori',
                        rules: [{
                                type: 'empty',
                                prompt: 'mohon masukan barang ada'

                            },
                            {
                                type: 'minLength[4]',
                                prompt: 'maaf, kategori minimal 4 karakter'
                            }
                        ]
                    },
                    harga: {
                        identifier: 'harga',
                        rules: [{
                                type: 'empty',
                                prompt: 'mohon masukan harga barang'
                            },
                            {
                                type: 'number',
                                prompt: 'Maaf, data harga tidak sesuai format'
                            }
                        ]
                    },
                    foto: {
                        identifier: 'foto',
                        rules: [{
                                type: 'empty',
                                prompt: 'mohon masukan gambar anda'

                            }

                        ]
                    }


                }
            });

        })
    </script>


</body>


</html><?php
}
