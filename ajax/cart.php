<?php
session_start();
include_once('../db.php');
if ($_SERVER['REQUEST_METHOD'] === "POST") {
    if ($_POST['action'] == "add") {
        $id = (int) $_POST["id"];
        $jumlah = (int) $_POST["jumlah"];
        $status = 0;
        $result = $conn->query("select stok from barang where id_barang =$id")->fetch_array();
        $stok = $result['stok'];
        if (isset($_SESSION["cart"])) {
            if (is_array($_SESSION['cart'])) {
                if (array_key_exists($id, $_SESSION['cart'])) {
                    // Product exists in cart so just update the quanity
                    if ($stok > $jumlah && $_SESSION['cart'][$id] < $stok) {
                        $_SESSION['cart'][$id] += $jumlah;
                        $status = 0;
                    } else {
                        $status = -1;
                    }
                } else {
                    // Product is not in cart so add it
                    $_SESSION['cart'][$id] = $jumlah;
                    $status = 1;
                }
            }
        } else {
            $_SESSION['cart'] = array($id => $jumlah);
            $status = 1;
        }
        echo $status;
    } elseif ($_POST['action'] == "delete") {
        $id = $_REQUEST['id'];

        if (isset($_SESSION["cart"])) {
            foreach ($_SESSION["cart"] as $key => $value) {
                if ($key == $id) {
                    unset($_SESSION["cart"][$key]);
                }
            }
        }
    } elseif ($_REQUEST['action'] == "total") {
        $jumlah = 0;
        if (isset($_SESSION["cart"])) {
            foreach ($_SESSION["cart"] as $key => $value) {
                $result = $conn->query("select harga from barang where id_barang =$key")->fetch_array();

                $harga = $result["harga"];
                $jumlah += $value * $harga;
            }
        }


        echo $jumlah;
    }
}
