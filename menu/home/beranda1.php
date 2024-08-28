<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Beranda Karyawan Bawaslu</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background-color: #f8f9fa;
            margin: 0;
            padding: 0;
        }

        .navbar {
            background-color: #003366;
        }

        .navbar-brand {
            color: #ffffff;
            font-weight: bold;
            font-size: 1.5rem;
            display: flex;
            align-items: center;
        }

        .navbar-brand img {
            margin-right: 10px;
            max-width: 100%; /* Ensures image scales with container */
            height: auto;    /* Maintains aspect ratio */
        }

        .navbar-nav .nav-link {
            color: #ffffff;
            font-size: 1rem;
        }

        .navbar-nav .nav-link:hover {
            color: #cccccc;
        }

        .main-content {
            padding: 40px 20px;
        }

        .card {
            border: none;
            box-shadow: 0px 6px 20px rgba(0, 0, 0, 0.15);
            border-left: 5px solid #003366;
            background-color: #ffffff;
            border-radius: 8px;
        }

        .card-body {
            padding: 30px;
            text-align: center;
        }

        .card-title {
            color: #003366;
            font-weight: bold;
            margin-bottom: 20px;
        }

        .btn-primary {
            background-color: #003366;
            border: none;
            padding: 10px 20px;
            font-weight: bold;
            border-radius: 5px;
            text-transform: uppercase;
        }

        .btn-primary:hover {
            background-color: #ffcc00;
            color: #003366;
        }

        .footer {
            background-color: #003366;
            color: #ffffff;
            text-align: center;
            padding: 15px 0;
            position: fixed;
            bottom: 0;
            width: 100%;
            box-shadow: 0px -4px 10px rgba(0, 0, 0, 0.1);
        }

        .footer p {
            margin: 0;
        }

        h2 {
            color: #003366;
            font-weight: bold;
            margin-bottom: 30px;
        }

        i.fas {
            color: #ffcc00;
        }

        @media (max-width: 767.98px) {
            .main-content {
                padding: 20px;
            }

            .card {
                margin: 10px;
            }
        }
    </style>
</head>
<body>
        <nav class="navbar navbar-expand-lg navbar-dark">
            <a class="navbar-brand" href="#">
                <img src="../asset/img/logo-bawaslu.png" alt="Logo" width="70"> 
                Bawaslu Logistik
            </a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item">
                        <a class="nav-link" onclick="document.location.href='../koneksi/signout.php'"><i class="fas fa-sign-out-alt"></i> Keluar</a>
                    </li>
                </ul>
            </div>
        </nav>

        <div class="container main-content">
            <div class="row">
                <div class="col-md-12">
                    <h2 class="text-center">Selamat Datang di Beranda Karyawan Bawaslu</h2>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6 mx-auto">
                    <div class="card">
                        <div class="card-body">
                            <i class="fas fa-shipping-fast fa-3x mb-3"></i>
                            <h5 class="card-title">Buat Pengiriman</h5>
                            <a href="?menu=transaksi/inputtransaksi" class="btn btn-primary">Masuk</a>
                            <p class="mt-3">Belum mendaftar? <a href="?menu=data-pelanggan/inputpelanggan" style="color: #003366; font-weight: bold;">Daftar</a></p>
                        </div>
                    </div>
                </div>
            </div>

        <div class="footer">
            <p>&copy; 2024 Bawaslu Logistik. All rights reserved.</p>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
