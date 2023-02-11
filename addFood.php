<?php
include './koneksi.php';
session_start();

if (!isset($_SESSION["login"])) {
    header("Location: ./home.php");
    exit;
} else {
    $id = $_SESSION['id_pengguna'];
    $query = "SELECT * FROM pengguna WHERE id_pengguna = $id";
    $result = mysqli_query($kon, $query);
    $row = mysqli_fetch_assoc($result);
    if ($row["role"] == 0) {
        header("Location: ./home.php");
        exit;
    } else {
        $user = $row['nama'];
    }
}
?>
<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="./assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="./assets/css/dataTables.min.css">


    <title>Tambah Makanan & Minuman - Pusat Kebutuhan Kucing Terlengkap!</title>
    <style>
        html {
            /* width: 100%;
            overflow: hidden; */
            scroll-behavior: smooth;
        }
    </style>
</head>

<body>
    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg py-3 navbar-dark" style="background-color: #eb4963;">
        <div class="container">
            <a class="navbar-brand" href="./home.php">
                <h2 style="font-family: Lobster,cursive;">PET<span style="color:#FFEE63;">CAT</span>SHOP</h2>
            </a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="./home.php" style="font: size 14px; font-weight: 700; color: #FAFAFA;">Home</span></a>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" style="font: size 14px; font-weight: 700; color: #FAFAFA;" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            Profil
                        </a>
                        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <span class="dropdown-item"><?= $user; ?></span>
                            <!-- <a class="dropdown-item" href="#">Profile</a> -->
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item" href="./logoutAksi.php">Logout</a>
                        </div>
                    </li>
                </ul>
                <!-- <form class="form-inline my-2 my-lg-0">
                    <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
                    <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
                </form> -->
            </div>
        </div>
    </nav>
    <!-- End Nav -->

    <div class="container my-5">
        <div class="card">
            <div class="card-body">
                <div class="row">
                    <div class="col-md-12">
                        <h2 class="text-center">Tambah Makanan & Minuman</h2>
                        <form method="POST" action="./addFoodAksi.php" enctype="multipart/form-data">
                            <div class="form-group">
                                <label for="nama">Nama</label>
                                <input type="text" class="form-control" id="nama" name="nama" placeholder="Masukkan Nama Makanan" required>
                            </div>
                            <div class="form-group">
                                <label for="deskripsi">Keterangan</label>
                                <textarea class="form-control" id="deskripsi" name="deskripsi" rows="3"></textarea>
                            </div>
                            <div class="form-group">
                                <label for="harga">Harga</label>
                                <input type="number" class="form-control" id="harga" name="harga" placeholder="Masukkan Harga Makanan" required>
                            </div>
                            <div class="form-group">
                                <label for="stok">Stok</label>
                                <input type="number" class="form-control" id="stok" name="stok" placeholder="Masukkan Stok Makanan" required>
                            </div>
                            <div class="form-group">
                                <label for="gambar">Gambar</label>
                                <input type="file" class="form-control-file" id="gambar" name="gambar" required>
                            </div>
                            <div class="form-group mt-4">
                                <a href="./master-data.php" class="btn btn-light">Kembali</a>
                                <input type="submit" class="btn btn-primary" name="submit" value="Simpan Makanan & Minuman">
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Footer -->
    <footer class="bg-dark text-light">
        <div class="container p-4">
            <div class="row">
                <div class="col-lg-8 col-md-12 mb-4 mb-md-0">
                    <h2 style="font-family: Lobster,cursive;">PET<span style="color:#FFEE63;">CAT</span>SHOP</h2>
                    <p>
                        Petcatshop adalah website yang menyediakan berbagai kebutuhan kucing anda.
                    </p>
                </div>
                <div class="col-lg-4 col-md-12 mb-4 mb-md-0">
                    <h5 class="text-uppercase">Contact Us</h5>
                    <ul class="list-unstyled mb-0">
                        <li>
                            <a href="https://wa.me/6282151021074" target="_blank" class="text-light">+62821-5102-1074 (Zabrina)</a>
                        </li>
                        <!-- <li>
                            <a href="#!" class="text-light">
                                <i class="fab fa-instagram"></i>
                                petcatshop
                            </a>
                        </li>
                        <li>
                            <a href="#!" class="text-light">
                                <i class="fab fa-facebook"></i>
                                petcatshop
                            </a>
                        </li> -->
                    </ul>
                </div>
            </div>
        </div>
        <div class="text-center p-3" style="background-color: rgba(0, 0, 0, 0.2);">
            Copyrights© 2022 Zabrina.
        </div>
    </footer>
    <!-- End Footer -->

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="./assets/js/jquery-3.2.1.slim.min.js"></script>
    <script src="./assets/js/popper.min.js"></script>
    <script src="./assets/js/bootstrap.min.js"></script>
    <script src="./assets/js/dataTables.js"></script>
    <script>
        $(document).ready(function() {
            // Function Datatable Foods
            $('#foods').DataTable();

            // Function Datatable Properties
            $('#properties').DataTable();

            // Function Datatable Transactions
            $('#transactions').DataTable();
        });
    </script>
</body>

</html>