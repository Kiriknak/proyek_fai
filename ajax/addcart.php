    <?php
session_start();
if ($_SERVER['REQUEST_METHOD'] === "POST") {
	$id = (int) $_POST["id"];
	$jumlah = (int) $_POST["jumlah"];
	$status=0;
	if (isset($_SESSION["cart"])) {
		if (is_array($_SESSION['cart'])) {
			if (array_key_exists($id, $_SESSION['cart'])) {
				// Product exists in cart so just update the quanity
				$_SESSION['cart'][$id] += $jumlah;
				$status=0;
			} else {
				// Product is not in cart so add it
				$_SESSION['cart'][$id] = $jumlah;
				$status=1;
			}
		}
	} else {
		$_SESSION['cart'] = array($id => $jumlah);
		$status=1;
	}
	echo $status;

}
?>