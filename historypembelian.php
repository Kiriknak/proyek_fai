<?php
session_start();
if (isset($_SESSION['username'])) {
    $username1 = $_SESSION['username'];
    //untuk ngambil jumlah saldo sebelumnya
    include("db.php");


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
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
        <style>
            .scroll {
                overflow: scroll;
                height: 460px;
            }

            #tableku tbody {
                height: 500px;
                width: 1129px;
            }

            footer {
                position: fixed;
                left: 0;
                bottom: 0px;
                height: 25px;
                width: 100%;
                background-color: #21ba45;

            }

            div.fott {
                padding-top: 3px;
            }

            a.fot {
                color: white;
            }

            h2.header {
                text-align: left;
            }

            html {
                height: 100%;
            }

            body {
                margin-bottom: 50px;
            }

            #tab {
                text-align: center;
            }

            #tampil {
                cursor: pointer;
            }

            #modal {
                padding: 15px;
                font-size: 16px;
                background: white;
                color: black;
                width: 700px;
                border-radius: 15px;
                margin: 0 auto;
                padding-bottom: 50px;
                border: 1px solid green;
            }

            #modal_atas {
                width: 100%;
                padding: 15px;
                margin-left: -15px;
                font-size: 18px;
                margin-top: -15px;
            }

            #ok {
                float: right;
                width: 80px;
                height: auto;
                margin-right: 5px;
                cursor: pointer;
            }
        </style>
    </head>

    <body>
        <?php include "menubar.php"; ?>
        <h1 class="ui header center aligned">Riwayat Pembelian</h1>

        <div class="ui container">
            <div class="ui divider"></div>
            <div class="ui big breadcrumb">
                <a class="section" href="index.php">Home</a>
                <div class="divider"> / </div>
                <div class="active section">Riwayat</div>
            </div>
            <br>
            <div class="scroll">
                <table class="ui celled table" id="tableku">
                    <thead>
                        <tr>
                            <th id="tab">Id Transaksi</th>
                            <th id="tab">Tanggal Pembelian</th>
                            <th id="tab">Jumlah Pembelian</th>
                            <th id="tab">Total Pembelian</th>
                            <th id="tab">Pilihan</th>
                        </tr>
                    </thead>

                    <tbody>

                        <?php
                        /*.date('l, d-M-Y / H:i:s a');?>                        */
                        $result = $conn->query("SELECT id_transaksi,tanggal,sum(jumlah)as 'jumlah',sum(harga) as 'harga'    
                        from detail_transaksi join transaksi using(id_transaksi) where id_customer='nicho' group by tanggal,id_transaksi");
                        

                        while ($row1 = $result->fetch_array()) {
                            $id = $row1["id_transaksi"];
                            $tanggal = date('l / d-m-Y / H:i:s a', strtotime($row1["tanggal"]));
                            $jumlah = $row1["jumlah"];
                            $total = $row1["harga"];
                            echo '<tr>
                            <td id="tab">' . $id . '</td>
                            
                            <td id="tab">' . $tanggal . '</td>
                            <td id="tab">' . $jumlah . '</td>
                            <td>' . $total . '</td>
                            <td width="100px">
                                
                                <div class="ui green button btn" >
                                    Show
                                </div>                
                                
                            </td>
                            </tr>';
                        }
                        ?>


                    </tbody>

                </table>
            </div>
        </div>
        </div>
        <footer claas="ui vertical footer segment form-page">
            <div class="fott">
                <center><a class="fot">Copyright © - JualLaku.com Company. All Rights Reserved.</a></center>
            </div>



        </footer>


        <div class="ui modal" id="modal">
            <div class="header" id="modal-atas">Riwayat</div>
            <div class="content" id="modal-isi">
                <div class="nampil"></div>
                <br>
                <br>
                <div class="action">
                    <div class="ui green cancel inverted button" id="ok">
                        Ok
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
                $('.btn').on('click', function() {

                    var id = $(this).closest('tr').find('td:eq(0)').text();
                    $.ajax({
                        url: "tampil.php",
                        type: "POST",
                        data: "id=" + id,
                        success: function(data) {
                            $('.nampil').html(data);
                            $('.ui.modal').modal('show');
                        }

                    });
                });

                $('#ok').on('click', function() {

                    $('.ui.modal').modal('hide')

                });
            });
        </script>
    </body>




    </html><?php
        }/*
create table history(
id int(11) AUTO_INCREMENT Primary key,  
username  varchar(16),
saldo_awal int(11),
saldo_transaksi int(11),
tanggal timestamp,     
deskripsi varchar(200),
CONSTRAINT username FOREIGN KEY (username) REFERENCES akun (username));*/
            ?>