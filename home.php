<?php
include './koneksi.php';
session_start();

if (isset($_SESSION["login"])) {
    $id = $_SESSION['id_pengguna'];
    $query = "SELECT * FROM pengguna WHERE id_pengguna = $id";
    $result = mysqli_query($kon, $query);
    $row = mysqli_fetch_assoc($result);
    $user = $row['nama'];
    $role = $row['role'];
} else {
    $user = 'User';
    $role = 3;
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
    <link rel='stylesheet' href='./assets/css/owl.carousel.min.css'>
    <!-- <link rel='stylesheet' href='./assets/css/font-awesome.min.css'> -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">


    <title>Home - Pusat Kebutuhan Kucing Terlengkap!</title>
    <style>
        html {
            /* width: 100%;
            overflow: hidden; */
            scroll-behavior: smooth;
        }

        #slider {
            height: 600px;
        }

        #innerTestimoni {
            height: 200px;
        }

        #innerTestimoni .carousel-control-next-icon {
            background: #ced4da !important;
        }

        #innerTestimoni .carousel-control-prev-icon {
            background: #ced4da !important;
        }

        #carouselOptions .carousel-caption {
            position: absolute;
            top: 50%;
            transform: translateY(-50%);
        }

        /* Css Foods Slider */
        #foods-slider {
            margin-top: 80px;
        }

        #foods-slider .post-slide {
            background: #fff;
            margin: 20px 15px 20px;
            border-radius: 15px;
            padding-top: 1px;
            box-shadow: 0px 14px 22px -9px #bbcbd8;
        }

        #foods-slider .post-slide .post-img {
            position: relative;
            overflow: hidden;
            border-top-left-radius: 10px;
            border-top-right-radius: 10px;
            margin: 12px 0px 8px 0px;
        }

        #foods-slider .post-slide .post-img img {
            width: 100%;
            height: auto;
            transform: scale(1, 1);
            transition: transform 0.2s linear;
        }

        #foods-slider .post-slide:hover .post-img img {
            transform: scale(1.1, 1.1);
        }

        #foods-slider .post-slide .over-layer {
            width: 100%;
            height: 100%;
            position: absolute;
            top: 0;
            left: 0;
            opacity: 0;
            background: linear-gradient(-45deg, rgb(245 164 177 / 69%) 0%, #f5a4b1 100%);
            transition: all 0.50s linear;
        }

        #foods-slider .post-slide:hover .over-layer {
            opacity: 1;
            text-decoration: none;
        }

        #foods-slider .post-slide .over-layer i {
            position: relative;
            top: 45%;
            text-align: center;
            display: block;
            color: #fff;
            font-size: 25px;
        }

        #foods-slider .post-slide .post-content {
            background: #fff;
            padding: 2px 20px 40px;
            border-radius: 15px;
        }

        #foods-slider .post-slide .post-title a {
            font-size: 15px;
            font-weight: bold;
            color: #333;
            display: inline-block;
            text-transform: uppercase;
            transition: all 0.3s ease 0s;
        }

        #foods-slider .post-slide .post-title a:hover {
            text-decoration: none;
            color: #3498db;
        }

        #foods-slider .post-slide .post-description {
            line-height: 24px;
            color: #808080;
            margin-bottom: 25px;
        }

        #foods-slider .post-slide .post-date {
            color: #a9a9a9;
            font-size: 14px;
        }

        #foods-slider .post-slide .post-date i {
            font-size: 20px;
            margin-right: 8px;
            color: #CFDACE;
        }

        #foods-slider .post-slide .read-more {
            padding: 7px 20px;
            float: right;
            font-size: 12px;
            background: #ffd0d7;
            color: #ffffff;
            box-shadow: 0px 10px 20px -10px #1376c5;
            border-radius: 25px;
            text-transform: uppercase;
        }

        #foods-slider .post-slide .read-more:hover {
            background: #eb4963;
            text-decoration: none;
            color: #fff;
        }

        #foods-slider .owl-controls .owl-buttons {
            text-align: center;
            margin-top: 20px;
        }

        #foods-slider .owl-controls .owl-buttons .owl-prev {
            background: #fff;
            position: absolute;
            top: -13%;
            left: 15px;
            padding: 0 18px 0 15px;
            border-radius: 50px;
            box-shadow: 3px 14px 25px -10px #92b4d0;
            transition: background 0.5s ease 0s;
        }

        #foods-slider .owl-controls .owl-buttons .owl-next {
            background: #fff;
            position: absolute;
            top: -13%;
            right: 15px;
            padding: 0 15px 0 18px;
            border-radius: 50px;
            box-shadow: -3px 14px 25px -10px #92b4d0;
            transition: background 0.5s ease 0s;
        }

        #foods-slider .owl-controls .owl-buttons .owl-prev:after,
        #foods-slider .owl-controls .owl-buttons .owl-next:after {
            content: "\f104";
            font-family: FontAwesome;
            color: #333;
            font-size: 30px;
        }

        #foods-slider .owl-controls .owl-buttons .owl-next:after {
            content: "\f105";
        }

        @media only screen and (max-width:1280px) {
            #foods-slider .post-slide .post-content {
                padding: 0px 15px 25px 15px;
            }
        }

        /* End Css Foods Slider */

        /* Css Properties Slider */
        #properties-slider {
            margin-top: 80px;
        }

        #properties-slider .post-slide {
            background: #fff;
            margin: 20px 15px 20px;
            border-radius: 15px;
            padding-top: 1px;
            box-shadow: 0px 14px 22px -9px #bbcbd8;
        }

        #properties-slider .post-slide .post-img {
            position: relative;
            overflow: hidden;
            border-top-left-radius: 10px;
            border-top-right-radius: 10px;
            margin: 12px 0px 8px 0px;
        }

        #properties-slider .post-slide .post-img img {
            width: 100%;
            height: auto;
            transform: scale(1, 1);
            transition: transform 0.2s linear;
        }

        #properties-slider .post-slide:hover .post-img img {
            transform: scale(1.1, 1.1);
        }

        #properties-slider .post-slide .over-layer {
            width: 100%;
            height: 100%;
            position: absolute;
            top: 0;
            left: 0;
            opacity: 0;
            background: linear-gradient(-45deg, rgb(245 164 177 / 69%) 0%, #f5a4b1 100%);
            transition: all 0.50s linear;
        }

        #properties-slider .post-slide:hover .over-layer {
            opacity: 1;
            text-decoration: none;
        }

        #properties-slider .post-slide .over-layer i {
            position: relative;
            top: 45%;
            text-align: center;
            display: block;
            color: #fff;
            font-size: 25px;
        }

        #properties-slider .post-slide .post-content {
            background: #fff;
            padding: 2px 20px 40px;
            border-radius: 15px;
        }

        #properties-slider .post-slide .post-title a {
            font-size: 15px;
            font-weight: bold;
            color: #333;
            display: inline-block;
            text-transform: uppercase;
            transition: all 0.3s ease 0s;
        }

        #properties-slider .post-slide .post-title a:hover {
            text-decoration: none;
            color: #3498db;
        }

        #properties-slider .post-slide .post-description {
            line-height: 24px;
            color: #808080;
            margin-bottom: 25px;
        }

        #properties-slider .post-slide .post-date {
            color: #a9a9a9;
            font-size: 14px;
        }

        #properties-slider .post-slide .post-date i {
            font-size: 20px;
            margin-right: 8px;
            color: #CFDACE;
        }

        #properties-slider .post-slide .read-more {
            padding: 7px 20px;
            float: right;
            font-size: 12px;
            background: #ffd0d7;
            color: #ffffff;
            box-shadow: 0px 10px 20px -10px #1376c5;
            border-radius: 25px;
            text-transform: uppercase;
        }

        #properties-slider .post-slide .read-more:hover {
            background: #eb4963;
            text-decoration: none;
            color: #fff;
        }

        #properties-slider .owl-controls .owl-buttons {
            text-align: center;
            margin-top: 20px;
        }

        #properties-slider .owl-controls .owl-buttons .owl-prev {
            background: #fff;
            position: absolute;
            top: -13%;
            left: 15px;
            padding: 0 18px 0 15px;
            border-radius: 50px;
            box-shadow: 3px 14px 25px -10px #92b4d0;
            transition: background 0.5s ease 0s;
        }

        #properties-slider .owl-controls .owl-buttons .owl-next {
            background: #fff;
            position: absolute;
            top: -13%;
            right: 15px;
            padding: 0 15px 0 18px;
            border-radius: 50px;
            box-shadow: -3px 14px 25px -10px #92b4d0;
            transition: background 0.5s ease 0s;
        }

        #properties-slider .owl-controls .owl-buttons .owl-prev:after,
        #properties-slider .owl-controls .owl-buttons .owl-next:after {
            content: "\f104";
            font-family: FontAwesome;
            color: #333;
            font-size: 30px;
        }

        #properties-slider .owl-controls .owl-buttons .owl-next:after {
            content: "\f105";
        }

        @media only screen and (max-width:1280px) {
            #properties-slider .post-slide .post-content {
                padding: 0px 15px 25px 15px;
            }
        }

        /* End Css Properties Slider */

        @media (min-width: 390px) and (max-width: 767px) {
            .carousel-inner {
                height: 100%;
            }
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
                    <li class="nav-item">
                        <a class="nav-link" href="#service" style="font: size 14px; font-weight: 700; color: #FAFAFA;">Service</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#testimoni" style="font: size 14px; font-weight: 700; color: #FAFAFA;">Testimoni</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#cat-foods" style="font: size 14px; font-weight: 700; color: #FAFAFA;">Cat Food</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#cat-properties" style="font: size 14px; font-weight: 700; color: #FAFAFA;">Property Cat</a>
                    </li>
                    <?php
                    if ($role == 0) {
                    ?>
                        <li class="nav-item">
                            <a class="nav-link" href="./userBuy.php" style="font: size 14px; font-weight: 700; color: #FAFAFA;">Transaksi</a>
                        </li>
                    <?php
                    }
                    ?>
                    <?php
                    if ($role == 1) {
                    ?>
                        <li class="nav-item">
                            <a class="nav-link" href="./master-data.php" style="font: size 14px; font-weight: 700; color: #FAFAFA;">Semua Data</a>
                        </li>
                    <?php
                    }
                    ?>
                    <?php
                    if (isset($_SESSION["login"])) {
                    ?>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" style="font: size 14px; font-weight: 700; color: #FAFAFA;" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                Profil
                            </a>
                            <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                                <span class="dropdown-item"><?= $user ?></span>
                                <!-- <a class="dropdown-item" href="#">Profile</a> -->
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="./logoutAksi.php">Logout</a>
                            </div>
                        </li>
                    <?php
                    } else {
                    ?>
                        <li class="nav-item">
                            <a class="nav-link" href="./login.php" style="font: size 14px; font-weight: 700; color: #FAFAFA;">Login</a>
                        </li>
                    <?php
                    }
                    ?>
                </ul>
                <!-- <form class="form-inline my-2 my-lg-0">
                    <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
                    <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
                </form> -->
            </div>
        </div>
    </nav>
    <!-- End Nav -->

    <!-- Slide -->
    <div id="carouselExampleIndicators" class="carousel slide" data-mdb-ride="carousel">
        <ol class="carousel-indicators">
            <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
            <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
            <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
        </ol>
        <div class="carousel-inner" id="slider">
            <div class="carousel-item active" style="height: 100%;">
                <img class="d-block w-100" src="./assets/img/slide1.jpg" alt="First slide">
                <div class="carousel-caption d-block">
                    <h5>George Carlin (comedian)</h5>
                    <p>“Meow” means “woof” in cat.”</p>
                </div>
            </div>
            <div class="carousel-item" style="height: 100%;">
                <img class="d-block w-100" src="./assets/img/slide2.jpg" alt="Second slide">
                <div class="carousel-caption d-block">
                    <h5>Kristin Cast (author)</h5>
                    <p>“Cats choose us; we don't own them.”</p>
                </div>
            </div>
            <div class="carousel-item" style="height: 100%;">
                <img class="d-block w-100" src="./assets/img/slide3.jpg" alt="Third slide">
                <div class="carousel-caption d-block">
                    <h5>Colette (author)</h5>
                    <p>“Time spent with a cat is never wasted.”</p>
                </div>
            </div>
        </div>
        <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="sr-only">Previous</span>
        </a>
        <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="sr-only">Next</span>
        </a>
    </div>
    <!-- End Slide -->

    <!-- Gunakan Program -->
    <div style="background-color: #ffd0d7;">
        <div class="container">
            <div class="row">
                <div class="col-md-8 p-5">
                    <h4 class="text-dark">Website yang menyediakan <span class="typed-text"></span><span class="cursor"> </span></h4>
                </div>
                <div class="col-md-4 p-5">
                    <a href="#testimoni" class="btn btn-light px-4 py-2" style="color: #eb4963; font-weight:700;">Coba Sekarang</a>
                </div>
            </div>
        </div>
    </div>

    <!-- Service -->
    <div class="container my-5" id="service">
        <h3 class="text-center">Layanan Yang Kami Berikan</h3>
        <!-- <hr style="width:10%; height: 3px; background-color: #FF5B00;"> -->
        <div class="row mt-5">
            <div class="col-12 d-md-flex flex-row align-items-center justify-content-center flex-grow-1">
                <div class="card mx-auto mb-3 mb-md-0" style="width: 18rem; box-shadow: 1px 1px 2px 2px #dee2e6;">
                    <img class="card-img-top" src="./assets/img/ecommerce.svg" alt="Card image cap">
                    <div class="card-body">
                        <h5 class="card-title text-primary text-center">Ecommerce</h5>
                        <p class="card-text text-center">Petcatshop menyediakan jual beli secara online.</p>
                    </div>
                </div>
                <div class="card mx-auto mb-3 mb-md-" style="width: 18rem; box-shadow: 1px 1px 2px 2px #dee2e6;">
                    <img class="card-img-top" src="./assets/img/foods.svg" alt="Card image cap">
                    <div class="card-body">
                        <h5 class="card-title text-primary text-center">Makanan & Minuman</h5>
                        <p class="card-text text-center">Petcatshop menyediakan berbagai makanan dan minuman kucing.</p>
                    </div>
                </div>
                <div class="card mx-auto mb-3 mb-md-" style="width: 18rem; box-shadow: 1px 1px 2px 2px #dee2e6;">
                    <img class="card-img-top" src="./assets/img/transaction.svg" alt="Card image cap">
                    <div class="card-body">
                        <h5 class="card-title text-primary text-center">Traksaksi Online</h5>
                        <p class="card-text text-center">Petcatshop juga menyediakan pembayaran online.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End Service -->

    <!-- Testimoni -->
    <div class="container my-5" id="testimoni">
        <h3 class="text-center mb-3">Pendapat Mitra Kami</h3>
        <div id="carouselOptions" class="carousel slide" data-mdb-ride="carousel">
            <div class="carousel-inner" id="innerTestimoni">
                <div class="carousel-item active">
                    <!-- <img class="d-block w-100" src="./assets/img/slide1.jpg" alt="First slide"> -->
                    <div class="carousel-caption d-block">
                        <img src="./assets/img/user1.jpg" class="rounded-circle mb-2" />
                        <h5 class="text-dark">Ardi Panggalih</h5>
                        <p class="font-italic text-dark">“Website ini sangat berperan penting dalam merawat kucing.”</p>
                    </div>
                </div>
                <div class="carousel-item">
                    <!-- <img class="d-block w-100" src="./assets/img/slide2.jpg" alt="Second slide"> -->
                    <div class="carousel-caption d-block">
                        <img src="./assets/img/user2.png" class="rounded-circle mb-2" />
                        <h5 class="text-dark">Bayu Pradana</h5>
                        <p class="font-italic text-dark">“Website ini sangat berperan penting dalam merawat kucing.”</p>
                    </div>
                </div>
            </div>
            <a class="carousel-control-prev" href="#carouselOptions" role="button" data-slide="prev" style="width: 40px; background-color: #eb4963;">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="sr-only">Previous</span>
            </a>
            <a class="carousel-control-next" href="#carouselOptions" role="button" data-slide="next" style="width: 40px; background-color: #eb4963;">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="sr-only">Next</span>
            </a>
        </div>
    </div>
    <!-- End Testimoni -->

    <!-- Food -->
    <div class="container mb-4" id="cat-foods">
        <div class="row">
            <div class="col-md-12">
                <h3 class="text-center mt-3">Makanan & Minuman Kucing</h3>
            </div>
            <div class="col-md-12">
                <div id="foods-slider" class="owl-carousel">

                    <?php
                    $i = 1;
                    $query = "SELECT * FROM makanan_properti WHERE jenis = 'Makanan' AND stok > 0";
                    $result = mysqli_query($kon, $query);
                    while ($row = mysqli_fetch_assoc($result)) {
                    ?>
                        <div class="post-slide">
                            <div class="post-img">
                                <?php
                                if ($row['gambar'] == '-') {
                                ?>
                                    <img src="./assets/img/food-cat.png" alt="Gambar Makanan Kucing">
                                <?php
                                } else {
                                ?>
                                    <img src="./assets/imgFood/<?= $row['gambar'] ?>" alt="Gambar Makanan Kucing">
                                <?php
                                }
                                ?>
                                <a href="#" class="over-layer"><i class="fa fa-link"></i></a>
                            </div>
                            <div class="post-content">
                                <h3 class="post-title">
                                    <a href="#"><?= $row['nama']; ?></a>
                                </h3>
                                <p class="post-description"><?= $row['deskripsi']; ?></p>
                                <span class="post-date"><i class="fa fa-money"></i>Rp. <?= $row['harga']; ?></span>
                                <a href="./checkBuyFood.php?id=<?= $row['id_makanan_properti'] ?>" class="read-more">Beli Sekarang</a>
                            </div>
                        </div>
                    <?php
                        $i++;
                    }
                    ?>

                </div>
            </div>
        </div>
    </div>
    <!-- End Food -->

    <!-- Properties -->
    <div class="container" id="cat-properties">
        <div class="row">
            <div class="col-md-12">
                <h3 class="text-center mt-3">Properti Kucing</h3>
            </div>
            <div class="col-md-12">
                <div id="properties-slider" class="owl-carousel">

                    <?php
                    $i = 1;
                    $query = "SELECT * FROM makanan_properti WHERE jenis = 'Properti' AND stok > 0";
                    $result = mysqli_query($kon, $query);
                    while ($row = mysqli_fetch_assoc($result)) {
                    ?>
                        <div class="post-slide">
                            <div class="post-img">
                                <?php
                                if ($row['gambar'] == '-') {
                                ?>
                                    <img src="./assets/img/house-cat.png" alt="Gambar Properti Kucing">
                                <?php
                                } else {
                                ?>
                                    <img src="./assets/imgProperti/<?= $row['gambar'] ?>" alt="Gambar Properti Kucing">
                                <?php
                                }
                                ?>
                                <a href="#" class="over-layer"><i class="fa fa-link"></i></a>
                            </div>
                            <div class="post-content">
                                <h3 class="post-title">
                                    <a href="#"><?= $row['nama']; ?></a>
                                </h3>
                                <p class="post-description"><?= $row['deskripsi']; ?></p>
                                <span class="post-date"><i class="fa fa-money"></i><?= $row['harga']; ?></span>
                                <a href="./checkBuyProperti.php?id=<?= $row['id_makanan_properti'] ?>" class="read-more">Beli Sekarang</a>
                            </div>
                        </div>
                    <?php
                        $i++;
                    }
                    ?>

                </div>
            </div>
        </div>
    </div>
    <!-- End Properties -->

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
    <script src='./assets/js/owl.carousel.min.js'></script>
    <script>
        const typedTextSpan = document.querySelector(".typed-text");
        const cursorSpan = document.querySelector(".cursor");

        const textArray = ["berbagai makanaan kucing", "berbagai produk kucing", "berbagai produk kecantikan kucing"];
        const typingDelay = 200;
        const erasingDelay = 100;
        const newTextDelay = 2000; // Delay between current and next text
        let textArrayIndex = 0;
        let charIndex = 0;

        function type() {
            if (charIndex < textArray[textArrayIndex].length) {
                if (!cursorSpan.classList.contains("typing"))
                    cursorSpan.classList.add("typing");
                typedTextSpan.textContent +=
                    textArray[textArrayIndex].charAt(charIndex);
                charIndex++;
                setTimeout(type, typingDelay);
            } else {
                cursorSpan.classList.remove("typing");
                setTimeout(erase, newTextDelay);
            }
        }

        function erase() {
            if (charIndex > 0) {
                if (!cursorSpan.classList.contains("typing"))
                    cursorSpan.classList.add("typing");
                typedTextSpan.textContent = textArray[textArrayIndex].substring(
                    0,
                    charIndex - 1
                );
                charIndex--;
                setTimeout(erase, erasingDelay);
            } else {
                cursorSpan.classList.remove("typing");
                textArrayIndex++;
                if (textArrayIndex >= textArray.length) textArrayIndex = 0;
                setTimeout(type, typingDelay + 1100);
            }
        }

        document.addEventListener("DOMContentLoaded", function() {
            // On DOM Load initiate the effect
            if (textArray.length) setTimeout(type, newTextDelay + 250);
        });

        $(document).ready(function() {
            // Function Datatable Foods
            $('#foods').DataTable();

            // Function Datatable Properties
            $('#properties').DataTable();

            // Function Owl Carousel Foods
            $("#foods-slider").owlCarousel({
                items: 3,
                itemsDesktop: [1199, 3],
                itemsDesktopSmall: [980, 2],
                itemsMobile: [600, 1],
                navigation: true,
                navigationText: ["", ""],
                pagination: true,
                autoPlay: true
            });

            // Function Owl Carousel Properties
            $("#properties-slider").owlCarousel({
                items: 3,
                itemsDesktop: [1199, 3],
                itemsDesktopSmall: [980, 2],
                itemsMobile: [600, 1],
                navigation: true,
                navigationText: ["", ""],
                pagination: true,
                autoPlay: false
            });
        });
    </script>
</body>

</html>