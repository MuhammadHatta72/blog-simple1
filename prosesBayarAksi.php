<?php
include './koneksi.php';

if (isset($_POST['submit'])) {
    $id = $_POST['id'];
    $harga = $_POST['harga'];

    $namaFile = $_FILES['bukti']['name'];
    $ukuranFile = $_FILES['bukti']['size'];
    $error = $_FILES['bukti']['error'];
    $tmpName = $_FILES['bukti']['tmp_name'];

    if ($error === 4) {
        echo "
            <script>
                alert('Pilih Bukti Pembayaran dulu');
                document.location.href = './prosesBayar.php';
            </script>
            ";
        return false;
    }
    // cek apakah yang diupload adalah gambar
    $ekstensiGambarValid = ['jpg', 'jpeg', 'png'];
    $ekstensiGambar = explode('.', $namaFile);
    $ekstensiGambar = strtolower(end($ekstensiGambar));
    if (!in_array($ekstensiGambar, $ekstensiGambarValid)) {
        echo "
            <script>
                alert('Gambar yang di upload bukan format gambar!');
                document.location.href = './prosesBayar.php';
            </script>
            ";
        return false;
    }

    if ($ukuranFile > 1000000) {
        echo "
            <script>
                alert('Ukuran gambar yang di upload terlalu besar!');
                document.location.href = './prosesBayar.php';
            </script>
            ";
        return false;
    }

    $query = "SELECT * FROM transaksi LEFT JOIN pengguna ON transaksi.id_pengguna = pengguna.id_pengguna JOIN makanan_properti ON transaksi.id_makanan_properti = makanan_properti.id_makanan_properti WHERE transaksi.id_transaksi = '$id'";
    $result = mysqli_query($kon, $query);
    $transaksi = mysqli_fetch_assoc($result);
    $stok_update = $transaksi['stok'] - 1;
    $id_item = $transaksi['id_makanan_properti'];

    $queryItem = "UPDATE makanan_properti SET stok = '$stok_update' WHERE id_makanan_properti = '$id_item'";
    mysqli_query($kon, $queryItem);

    $namaFileBaru =  "Bukti_Pembayaran_Transaksi_" . rand() . "." . $ekstensiGambar;
    move_uploaded_file($tmpName, './assets/imgBukti/' . $namaFileBaru);

    $query = "UPDATE transaksi SET bayar = '$harga', status_bayar = 'Sudah Bayar', bukti = '$namaFileBaru' WHERE id_transaksi = '$id'";
    mysqli_query($kon, $query);

    echo "
    <script>
        alert('Pembayaran Berhasil!');
        document.location.href = './userBuy.php';
    </script>
    ";
} else {
    echo "
            <script>
                alert('Lakukan Pembayaran Terlebih dahulu!');
                document.location.href = './userBuy.php';
            </script>
        ";
}
