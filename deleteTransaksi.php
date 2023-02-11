<?php
include './koneksi.php';

if ($_GET["id"]) {
    $id = $_GET["id"];

    //hapus data
    $query = "DELETE FROM transaksi WHERE id_transaksi = $id";
    mysqli_query($kon, $query);

    echo "
    <script>
        alert('Transaksi Dibatalkan');
        document.location.href = './userBuy.php';
    </script>
    ";
} else {
    echo "
    <script>
        alert('Hapus Transaksi Terlebih dahulu!');
        document.location.href = './userBuy.php';
    </script>
";
}
