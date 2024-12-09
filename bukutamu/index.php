<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Halaman Login | Buku Kunjungan Perpustakaan</title>

    <link rel="icon" href="assets/img/logo.png" type="image/x-icon">

    <!-- Custom fonts for this template-->
    <link href="assets/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,300,400,600,700,900" rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="assets/css/sb-admin-2.min.css" rel="stylesheet">

    <style>
        /* Warna Background Utama */
        body {
            background-color: #87CEEB; /* Warna biru terang */
            position: relative;
            overflow: hidden;
        }

        /* Efek Dekorasi di Background */
        .background-decor {
            position: absolute;
            border-radius: 50%;
            background-color: rgba(0, 191, 255, 0.2); /* Warna biru dengan transparansi */
            animation: move 10s infinite alternate;
        }

        .decor1 {
            width: 300px;
            height: 300px;
            top: 5%;
            left: 10%;
        }

        .decor2 {
            width: 400px;
            height: 400px;
            bottom: 10%;
            right: 5%;
        }

        /* Animasi Gerakan Dekorasi */
        @keyframes move {
            0% {
                transform: translateY(0px);
            }
            100% {
                transform: translateY(-20px);
            }
        }

        /* Card Style */
        .bg-custom {
            background-color: #ffffff; /* Warna putih untuk card */
            border: 2px solid #00bfff; /* Warna biru terang untuk border */
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1); /* Efek bayangan */
        }

        /* Background Logo */
        .bg-logo {
            background-color: #e6f7ff; /* Warna biru terang */
            box-shadow: inset 0 0 10px rgba(0, 0, 0, 0.2); /* Bayangan dalam */
        }

        h3 {
            color: #004080; /* Warna teks biru gelap */
        }

        .btn-primary {
            background-color: #00bfff; /* Tombol biru terang */
            border: none;
        }

        .btn-primary:hover {
            background-color: #007acc; /* Biru lebih gelap saat hover */
        }
    </style>
</head>

<body>

    <!-- Dekorasi Background -->
    <div class="background-decor decor1"></div>
    <div class="background-decor decor2"></div>

    <div class="container">

        <!-- Outer Row -->
        <div class="row justify-content-center">

            <div class="col-xl-10 col-lg-12 col-md-9">

                <div class="card o-hidden border-0 shadow-lg my-5 bg-custom">
                    <div class="card-body p-0">
                        <!-- Nested Row within Card Body -->
                        <div class="row">
                            <div class="col-lg-6 d-lg-block bg-logo shadow-lg p-5 text-center">
                                <img src="assets/img/logo.png" width="300" style="box-shadow: 0 4px 8px rgba(0, 0, 0, 0.3);">
                                <h3><b>BUKU KUNJUNGAN PERPUSTAKAAN</b></h3>
                                <small>Sistem Informasi Perpustakaan</small>
                            </div>
                            <div class="col-lg-6">
                                <div class="p-5">
                                    <div class="text-center">
                                        <h1 class="h4 text-gray-900 mb-4">Selamat Datang di SmartGuestBook</h1>
                                    </div>
                                    <form class="user" action="cek_login.php" method="POST">
                                        <div class="form-group">
                                            <input type="text" name="username" class="form-control form-control-user"
                                                placeholder="Enter Username...">
                                        </div>
                                        <div class="form-group">
                                            <input type="password" name="password" class="form-control form-control-user"
                                                placeholder="Password">
                                        </div>
                                        <div class="form-group">
                                            <div class="custom-control custom-checkbox small">
                                                <input type="checkbox" class="custom-control-input" id="customCheck">
                                                <label class="custom-control-label" for="customCheck">Remember Me</label>
                                            </div>
                                        </div>
                                        <button class="btn btn-primary btn-user btn-block">Login</button>
                                    </form>
                                    <hr>
                                    <div class="text-center">
                                        <a class="small" href="forgot-password.html">By Neni Andriana | 2024 - <?= date('Y') ?></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>

        </div>

    </div>

    <!-- Bootstrap core JavaScript-->
    <script src="assets/vendor/jquery/jquery.min.js"></script>
    <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="assets/vendor/jquery-easing/jquery.easing.min.js"></script>
    <script src="assets/js/sb-admin-2.min.js"></script>

</body>

</html>