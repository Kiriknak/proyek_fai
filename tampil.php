<?php
    
    if($_POST['id']) {
        include("db.php");
        $id = $_POST['id'];
        
        $qr=$conn->query("SELECT tanggal,concat(alamat,',',kabupaten,',',provinsi)  from transaksi natural join alamat where id_transaksi = $id")->fetch_array();
        $tanggal = date('l / d-m-Y / H:i:s a', strtotime($qr["tanggal"]));
        $alamat = $qr[1];
        $result = $conn->query("select id_transaksi,id_barang,nama_barang,tanggal,jumlah,detail_transaksi.harga,alamat from detail_transaksi join transaksi using (id_transaksi) join barang using(id_barang) join alamat using(id_alamat) where id_transaksi='$id';");
        $total=0;
        echo'<table >';
        echo "<tr>
                    <td><h4 class='ui header'>Data ID Pembelian $id</h4></td>
                    
                </tr>
                <tr>
                <td>Tanggal Pembelian</td>
                <td>:</td>
                <td>$tanggal </td>
            </tr>
            <tr>
                    <td>Alamat Pengiriman</td>
                    <td>:</td>
                    <td>$alamat</td>
                </tr>";
        while ($row = $result->fetch_array()) {
            $id_transaksi = $row["id_transaksi"];
            $id_barang = $row["id_barang"];
            $tanggal = date('l / d-m-Y / H:i:s a', strtotime($row["tanggal"]));
            $harga = $row["harga"];
            $nama = $row["nama_barang"];
            $jumlah = $row["jumlah"];
            $subtotal=$harga*$jumlah;
            $total+=$subtotal;
        ?>
                
                <tr>
                    <td>Nama Barang</td>
                    <td>:</td>
                    <td><?php echo $nama; ?></td>
                </tr>
               
                
                <tr>
                    <td>Jumlah Barang</td>
                    <td>:</td>
                    <td><?php echo $jumlah ?></td>
                </tr>
                <tr>
                    <td>Harga Barang</td>
                    <td>:</td>
                    <td><?php echo $harga ?></td>
                </tr>
                <tr>
                    <td>Subtotal</td>
                    <td>:</td>
                    <td><?php echo $subtotal ?></td>
                </tr>
            
        <?php 

        }
        echo '</table>
        <h3 class="ui header">Total : Rp. '.$total.'</h3>';
    $conn->close();
    }
    
?>