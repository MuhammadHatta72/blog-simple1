<?php
include './koneksi.php';

if (isset($_POST['submit'])) {
    $nama = htmlspecialchars($_POST["nama"]);
    $username =  htmlspecialchars($_POST["username"]);
    $password = htmlspecialchars($_POST["password"]);
    $password_new = password_hash($password, PASSWORD_DEFAULT);

    $query_pengguna = "SELECT * FROM pengguna WHERE username = '$username'";
    $result = mysqli_query($kon, $query_pengguna);

    if (mysqli_fetch_assoc($result)) {
        echo "
                <script>
                    alert('Register Gagal, User Sudah Terdaftar!');
                    document.location.href = './register.php';
                </script>
            ";
    } else {
        $query = "INSERT INTO pengguna VALUES (NULL, '$nama', '$username', '$password_new', 0)";
        mysqli_query($kon, $query);
        echo "
                <script>
                    alert('Register Sukses!');
                    document.location.href = './login.php';
                </script>
            ";
    }
} else {
    echo "
            <script>
                alert('Register Gagal');
                document.location.href = './register.php';
            </script>
        ";
}
