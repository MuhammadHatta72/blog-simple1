<?php
include './koneksi.php';

if ($_GET["id"]) {
    $id = $_GET["id"];
    $makanan = "SELECT * FROM makanan_properti WHERE id_makanan_properti = $id";
    $result = mysqli_query($kon, $makanan);
    $row = mysqli_fetch_assoc($result);
    $gambar = $row["gambar"];

    unlink("./assets/imgProperti/$gambar");

    //hapus data
    $query = "DELETE FROM makanan_properti WHERE id_makanan_properti = $id";
    mysqli_query($kon, $query);

    echo "
    <script>
        alert('Properti Berhasil dihapus');
        document.location.href = './master-data.php';
    </script>
    ";
} else {
    echo "
    <script>
        alert('Hapus Properti Terlebih dahulu!');
        document.location.href = './master-data.php';
    </script>
";
}
