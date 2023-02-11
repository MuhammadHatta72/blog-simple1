<?php

$kon = mysqli_connect("localhost", "root", "", "uas_zabrina");

if (mysqli_connect_error()) {
    echo "Koneksi database gagal : " . mysqli_connect_error();
}
