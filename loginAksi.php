<?php
include './koneksi.php';

if (isset($_POST['submit'])) {
    $username = htmlspecialchars($_POST["username"]);
    $password = htmlspecialchars($_POST["password"]);

    $query = "SELECT * FROM pengguna WHERE username = '$username'";
    $result = mysqli_query($kon, $query);

    if (mysqli_num_rows($result) === 1) {
        $row = mysqli_fetch_assoc($result);
        if (password_verify($password, $row["password"])) {

            session_start();
            $_SESSION["login"] = true;
            $_SESSION["id_pengguna"] = $row["id_pengguna"];

            echo "<script>
                        alert('Login Berhasil!');
                        document.location.href = './home.php';
                    </script>
                ";
        } else {
            echo "<script>
                        alert('Login Gagal, Silahkan Coba Lagi!');
                        document.location.href = './login.php';
                    </script>
                ";
        }
    } else {
        //Cek User
        echo "<script>
                    alert('Login Gagal, Silahkan Coba Lagi!');
                    document.location.href = './login.php';
                    </script>
                ";
    }
}
