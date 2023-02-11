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
    if ($row["role"] == 1) {
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


    <title>Transaksi - Pusat Kebutuhan Kucing Terlengkap!</title>
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

    <!-- Transaction -->
    <div class="container my-4">
        <div class="card">
            <div class="card-title">
                <h3 class="text-center mt-3">Transaksi Jual Beli</h3>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-striped" id="transactions">
                        <thead>
                            <tr class="table-success">
                                <th>No.</th>
                                <th>Nama</th>
                                <th>Jenis</th>
                                <th>Tanggal</th>
                                <th>Status</th>
                                <th>Bayar</th>
                                <th>Bukti</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $i = 1;
                            $query = "SELECT * FROM transaksi LEFT JOIN pengguna ON transaksi.id_pengguna = pengguna.id_pengguna JOIN makanan_properti ON transaksi.id_makanan_properti = makanan_properti.id_makanan_properti WHERE pengguna.id_pengguna = '$id'";
                            $result = mysqli_query($kon, $query);
                            while ($row = mysqli_fetch_assoc($result)) {
                            ?>
                                <tr>
                                    <td><?= $i; ?></td>
                                    <td><?= $row['nama']; ?></td>
                                    <td><?= $row['jenis']; ?></td>
                                    <td><?= $row['tanggal']; ?></td>
                                    <td>
                                        <?php
                                        if ($row['status_bayar'] == "Belum Bayar") {
                                        ?>
                                            <span class="text-warning"><?= $row['status_bayar']; ?></span>
                                        <?php
                                        } else {
                                        ?>
                                            <span class="text-success"><?= $row['status_bayar']; ?></span>
                                        <?php
                                        }
                                        ?>
                                    </td>
                                    <td><?= $row['bayar'] ?></td>
                                    <td>
                                        <?php
                                        if ($row['bukti'] == "-") {
                                        ?>
                                            <img src="./assets/img/not_found.png" alt="" width="100px">
                                        <?php
                                        } else {
                                        ?>
                                            <img src="./assets/imgBukti/<?= $row['bukti'] ?>" alt="" width="100px">
                                        <?php
                                        }
                                        ?>
                                    </td>
                                    <td>
                                        <?php
                                        if ($row['status_bayar'] == "Belum Bayar") {
                                        ?>
                                            <a href="./prosesBayar.php?id=<?= $row['id_transaksi'] ?>" class="btn btn-primary btn-sm mb-1">Bayar</a>
                                            <a href="./deleteTransaksi.php?id=<?= $row['id_transaksi'] ?>" class="btn btn-danger btn-sm">Hapus</a>
                                        <?php
                                        } else {
                                        ?>
                                            <span class="text-success">Done</span>
                                        <?php
                                        }
                                        ?>
                                    </td>
                                </tr>
                            <?php
                                $i++;
                            }
                            ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <!-- End Transaction -->

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

            // Function Datatable Transactions
            $('#transactions').DataTable();
        });
    </script>
</body>

</html>