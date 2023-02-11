<?php
include './koneksi.php';
session_start();

if (isset($_SESSION['login'])) {
    $id_properti = $_GET['id'];
    $id = $_SESSION['id_pengguna'];
    $query = "SELECT * FROM pengguna WHERE id_pengguna = $id";
    $result = mysqli_query($kon, $query);
    $row = mysqli_fetch_assoc($result);
    $tanggal = date('d-m-Y');
    if ($row["role"] == 1) {
        header("Location: ./home.php");
        exit;
    } else {
        $query = "INSERT INTO transaksi VALUES (NULL, '$id', '$id_properti', '$tanggal', '-', 'Belum Bayar', '-')";
        mysqli_query($kon, $query);
        echo "<script>
                alert('Berhasil checkout, Silahkan membayar!');
                document.location.href = './userBuy.php';
            </script>";
    }
} else {
    echo "<script>
            alert('Login Terlebih dahulu untuk membeli!');
            document.location.href = './home.php';
        </script>";
}
