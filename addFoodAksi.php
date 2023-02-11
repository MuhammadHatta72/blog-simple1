<?php
include './koneksi.php';

if (isset($_POST['submit'])) {
    $nama = $_POST['nama'];
    $deskripsi = $_POST['deskripsi'];
    $harga = $_POST['harga'];
    $stok = $_POST['stok'];

    $namaFile = $_FILES['gambar']['name'];
    $ukuranFile = $_FILES['gambar']['size'];
    $error = $_FILES['gambar']['error'];
    $tmpName = $_FILES['gambar']['tmp_name'];

    if ($error === 4) {
        echo "
            <script>
                alert('Pilih gambar makanan atau minuman dulu');
                document.location.href = './addFood.php';
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
                document.location.href = './addFood.php';
            </script>
            ";
        return false;
    }

    if ($ukuranFile > 1000000) {
        echo "
            <script>
                alert('Ukuran gambar yang di upload terlalu besar!');
                document.location.href = './addFood.php';
            </script>
            ";
        return false;
    }

    $namaFileBaru = $nama . "." . $ekstensiGambar;
    move_uploaded_file($tmpName, './assets/imgFood/' . $namaFileBaru);

    $sql = "INSERT INTO makanan_properti VALUES (NULL, '$nama', '$deskripsi', '$harga', '$stok', 'Makanan', '$namaFileBaru')";
    mysqli_query($kon, $sql);

    echo "
    <script>
        alert('Makanan Berhasil ditambahkan');
        document.location.href = './master-data.php';
    </script>
    ";
} else {
    echo "
            <script>
                alert('Tambah Makanan Terlebih dahulu!');
                document.location.href = './addFood.php';
            </script>
        ";
}
