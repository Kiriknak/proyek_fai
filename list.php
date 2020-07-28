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


        </head>

        <body>
            <?php
            include_once 'menubar.php';
            ?>
            <div class="ui container">
                <div class="ui breadcrumb">
                    <a class="section" href="index.php">Home</a>
                    <div class="divider"> / </div>

                    <p class="section">Seller</p>
                    <div class="divider"> / </div>

                    <p class="section">List Barang</p>
                </div>
                <div class="ui divider"></div>
                <div class="ui segment">
                    <h2 class="ui header">Hi , <?php echo $username; ?></h2>
                    <div class="ui icon input">
                        <input type="text" id="filter" placeholder="...type here...">
                        <i class="search icon"></i>
                    </div>
                    <table class="ui table sortable" id="#table">
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
                            include_once 'db.php';
                            $result = $conn->query("SELECT * from barang where id_seller='$username'");

                            while ($row = $result->fetch_array()) {
                                $id = $row["id_barang"];
                                $harga = $row["harga"];
                                $stok = $row["stok"];
                                $harga = $row["harga"];
                                $nama = $row["nama_barang"];
                                echo '<tr>
                            <td >' . $id . '</td>
                            <td class="filter-cell">' . $nama . '</td>
                            <td>' . $stok . '</td>
                            <td>' . $harga . '</td>
                            <td width="150px">
                                <div class=" ui  two buttons">
                                    <div class="ui  button  primary edit" >
                                    Edit
                                    </div>
                                    <div class="ui button red delete" >
                                        Remove
                                    </div>
                                </div>
                            </td>
                            
                        </tr>';
                            }
                            ?>

                        </tbody>

                    </table>
                </div>
            </div>
            <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.min.js"></script>
            <script src="src/semantic.min.js"></script>
            <script src="src/hamburger.js"></script>
            <script src="src/sticky.js"></script>

            <script src="src/jquery.tableFilter.min.js"></script>
            <script src="https://semantic-ui.com/javascript/library/tablesort.js"></script>

            <script>
                $(document).ready(function() {
                    // paginate an unordered list
                    $('table').tablesort();

                    $(document).tableFilter({
                        tableID: '#table',
                        noResults: 'no results found'

                    });




                    $('.edit').on('click', function() {
                        var id = $(this).closest('tr').find('td:first').text();

                        var idx = 'edit_barang.php?id=' + id
                        window.location.href = idx;
                    });

                    $('.delete').on('click', function() {
                        var id = $(this).closest('tr').find('td:first').text();
                        if (confirm("Are you sure you want to delete?")) {
                            $.ajax({
                                url: "ajax/deletebarang.php",
                                type: "POST",

                                data: "id=" + id,
                                success: function(result) {
                                    if (result == 1) {
                                        alert(" delete success");
                                        location.reload();
                                    } else {
                                        alert("Data Tidak Berhasil Di hapus");
                                    }
                                }
                            });
                        }
                    })
                });
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