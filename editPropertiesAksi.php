<?php
include './koneksi.php';

if (isset($_POST['submit'])) {
    $id = $_POST['id'];
    $nama = $_POST['nama'];
    $deskripsi = $_POST['deskripsi'];
    $harga = $_POST['harga'];
    $gambar = $_POST['gambar'];

    // cek apakah user pilih gambar baru atau tidak
    if ($_FILES['gambarBaru']['error'] === 4) {
        $namaGambarBaru = $gambar;
    } else {
        $namaFile = $_FILES['gambarBaru']['name'];
        $ukuranFile = $_FILES['gambarBaru']['size'];
        $error = $_FILES['gambarBaru']['error'];
        $tmpName = $_FILES['gambarBaru']['tmp_name'];
        // cek apakah yang diupload adalah book_cover_new
        $ekstensiGambarValid = ['jpg', 'jpeg', 'png'];
        $ekstensiGambar = explode('.', $namaFile);
        $ekstensiGambar = strtolower(end($ekstensiGambar));
        if (!in_array($ekstensiGambar, $ekstensiGambarValid)) {
            echo "
            <script>
                alert('Gambar yang di upload bukan format gambar!');
                document.location.href = './master-data.php';
            </script>
            ";
            return false;
        }
        // cek jika ukurannya terlalu besar
        if ($ukuranFile > 1000000) {
            echo "
            <script>
                alert('Ukuran gambar yang di upload terlalu besar!');
                document.location.href = './master-data.php';
            </script>
            ";
            return false;
        }
        // lolos pengecekan, gambar siap diupload

        //hapus gambar lama
        unlink("./assets/imgProperti/$gambar");

        // generate nama gambar baru
        $gambar_makanan = $nama . "." . $ekstensiGambar;
        move_uploaded_file($tmpName, './assets/imgProperti/' . $gambar_makanan);
        $namaGambarBaru = $gambar_makanan;
    }

    $query = "UPDATE makanan_properti SET nama = '$nama', deskripsi = '$deskripsi', harga = '$harga', gambar = '$namaGambarBaru' WHERE id_makanan_properti = '$id'";
    mysqli_query($kon, $query);

    echo "
    <script>
        alert('Properti Berhasil diubah');
        document.location.href = './master-data.php';
    </script>
    ";
} else {
    echo "
            <script>
                alert('Edit Properti Terlebih dahulu!');
                document.location.href = './master-data.php';
            </script>
        ";
}
