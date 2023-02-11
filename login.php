<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="./assets/css/bootstrap.min.css" rel="stylesheet">
    <title>Login - Pusat Kebutuhan Kucing Terlengkap</title>
    <style>
        body {
            background-image: url('./assets/img/bg-login.jpg');
            background-repeat: no-repeat;
            background-attachment: fixed;
            background-size: cover;
        }
    </style>
</head>

<body>
    <div class="container">
        <div class="row">
            <div class="col-md-4 mt-5 mx-auto">
                <div class="card">
                    <div class="card-body">
                        <h3 class="text-center"><a href="./home.php">Login</a></h3>
                        <form method="POST" action="./loginAksi.php">
                            <div class="form-group">
                                <label for="username">Username</label>
                                <input type="text" class="form-control" id="username" name="username" aria-describedby="emailHelp" placeholder="Masukkan email" required>
                            </div>
                            <div class="form-group">
                                <label for="password">Password</label>
                                <input type="password" class="form-control" id="password" name="password" placeholder="Masukkan Password" required>
                            </div>
                            <div class="form-group mb-3">
                                Belum punya akun? <a href="./register.php">Daftar</a>
                            </div>
                            <div class="form-group mb-2">
                                <input type="submit" name="submit" value="Masuk" class="btn btn-info" />
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

</html>