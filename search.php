<?php

include_once 'db.php';
$whereQuery = array();
$tampilanstr = array();
if (isset($_GET["kategori"])) {
    $kategori = strtolower($_GET["kategori"]);
    array_push($whereQuery, "kategori= '$kategori'");
    array_push($tampilanstr, "Kategori  : $kategori");
}
if (isset($_GET["nama"])) {

    $nama = strtolower($_GET["nama"]);
    if (count($whereQuery) > 0) {
        array_push($whereQuery, " or nama_barang like '%" . $nama . "%' or nama_barang like '%" . $nama . "' or nama_barang like '" . $nama . "%'");
        array_push($tampilanstr, ",Nama  : $nama");
    } else {
        array_push($whereQuery, " nama_barang like '%" . $nama . "%' or nama_barang like '%" . $nama . "' or nama_barang like '" . $nama . "%'");
        array_push($tampilanstr, "Nama  : $nama");
    }
}
$where = implode(" ", $whereQuery);
$strtp = implode(" ", $tampilanstr);
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
            <a class="section" href="index.php">Home</a>
            <div class="divider"> / </div>

            <p class="section">Search</p>

        </div>

        <div class="ui segment">
            <h4 class="ui header">Search based on <?php echo $strtp; ?></h4>

            <div class="ui divider">
            </div>
            <div class="ui four  cards">
                <!--- start of item print !-->
                <?php

                $halaman = 8; //batasan halaman
                $page = isset($_GET['halaman']) ? (int)$_GET["halaman"] : 1;
                $mulai = ($page > 1) ? ($page * $halaman) - $halaman : 0;
                $query = $conn->query("select id_barang,id_seller,nama_barang,foto,harga,stok,
                kategori,deskripsi,avatar from barang join akun on username=id_seller where $where  LIMIT $mulai, $halaman");
                $sql =   $conn->query("select id_barang,id_seller,nama_barang,foto,harga,stok,
                kategori,deskripsi from barang  where $where");
                $total = $sql->num_rows;
                $pages = ceil($total / $halaman);

                $count = 0;
                while ($row = mysqli_fetch_assoc($query)) {
                    $id = $row["id_barang"];
                    $seller = $row['id_seller'];
                    $nama = $row["nama_barang"];
                    $foto = $row["foto"];
                    $harga = $row["harga"];
                    $stock = $row["stok"];
                    $deskripsi = $row["deskripsi"];
                    $kategori = $row["kategori"];
                    $img = $row["foto"];
                    $imgAvatar = $row['avatar'];
                    $foto = 'data:' . 'image/png;' . 'base64,' . base64_encode($img);
                    $avatar = 'data:' . 'image/png;' . 'base64,' . base64_encode($imgAvatar);
                    echo '<a class="ui raised card link" href="item_detail.php?id=' . $id . ' ">';
                    echo '<div class="image" style="background-color:white">';
                    echo '<img src =' . $foto . '>';
                    echo '</div>';
                    echo '<div class="content">';
                    echo '<h2 class="header" href="#">' . $nama;
                    echo '</h2>';
                    echo '<div class="description">';
                    echo '<p class = "card-title">' . $stock;
                    echo ' tersisa</p>';
                    echo '<p class = "card-text"> Rp.' . $harga;
                    echo '</p>';
                    echo '</div>'; ?>
                    <div class="extra content bottom attached">
                        <div class="right floated author">
                            <img class="ui avatar image" src="<?php echo $avatar; ?>"> <?php echo $seller; ?>
                        </div>
                    </div>
                <?php

                    echo '</div>';
                    echo '</a>';
                    $count++;
                }
                ?>
            </div>
            <div class="ui pagination menu" style="margin-top:30px">
               
            <?php
            for ($i = 1; $i <= $pages; $i++) { 
                
                ?>
                <a class="item <?php
                if($i==$page)echo 'active';
                ?>" href="<?php 
                $strHalaman="search.php?halaman=".$i;
                
                if(isset($_GET['nama']))
                {
                    $strHalaman= $strHalaman. '&nama='.$_GET['nama'];
                }
                if(isset($_GET['kategori'])){
                    $strHalaman= $strHalaman.'&kategori='.$_GET['kategori'];
                }
                echo $strHalaman;
                ?>">
                
                <?php echo $i; ?></a>

            <?php }

            ?>
            
            </div>
        </div>
    </div>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="src/semantic.min.js"></script>
    <script src="src/hamburger.js"></script>
    <script src="src/sticky.js"></script>