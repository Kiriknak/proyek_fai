<?php
session_start();
if (isset($_SESSION['level'])) {
    if ($_SESSION['level'] >= 1) {
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
include 'menubar.php';
        ?>
            <div class="ui container">
                <div class="ui divider"></div>

                <h2 class="ui header">Hi , <?php echo $username; ?></h2>
                <table class="ui   table">
                    <thead>
                        <tr>
                            <th>Id Barang</th>
                            <th>Nama Barang</th>
                            <th>Stok Barang</th>
                            <th>Harga Barang</th>
                            <th></th>

                        </tr>
                    </thead>
                    <tbody>

                    <?php 
                    include 'db.php';
                    $result = $conn->query("SELECT * from barang where id_seller='$username'");

                    while($row = $result->fetch_array())
                    {
                        $id = $row["id_barang"];
                        $harga = $row["harga"];
                        $stok = $row["stok"];
                        $harga=$row["harga"];
                        $nama = $row["nama_barang"];
                        echo '<tr>
                            <td>'.$id.'</td>
                            <td>'.$harga.'</td>
                            <td>'.$nama.'</td>
                            <td>'.$stok.'</td>
                            <td width="100px">
                                <div class="ui two buttons">
                                    <div class="ui button primary" id="edit">
                                        edit
                                    </div>
                                    <div class="ui button red" id="delete">
                                        remove
                                    </div>
                                </div>
                            </td>
                        </tr>';
                    }
                    ?>
                        

                    </tbody>
                </table>
            </div>

            <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
            <script src="src/semantic.min.js"></script>
            <script src="src/hamburger.js"></script>
            <script src="src/sticky.js"></script>
            <script>
                $(document).ready(function(){
                    $('#delete').on('click', function(){
                        let id=$(this).closest('tr').find('td:first').text();
                        if(confirm("Are you sure you want to delete?")){
                            $.ajax(
                {
                url: "ajax/deletebarang.php",
                type: "POST",

                data: "id="+id,
                success: function (result) {
                        location.reload();
                    }});
                        }
                })});
            </script>
        </body>
<?php
} else {
        header("Location:index.php");
    }
} else {
    header('Location:index.php');
}
?>