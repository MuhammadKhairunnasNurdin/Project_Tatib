<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="Kinata" content="Tatib">
    <title>Sistem Tata Tertib Polinema</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="assets/css/custom_color.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        @font-face {
            font-family: 'Tiro Bangla';
            src: url('assets/font/TiroBangla-Regular.ttf') format('truetype');
        }
        body, html {
            height: 100%;
            margin: 0;
            overflow: hidden;
            align-items:
        }

        .custom-label {
            background-color: #0D366B;
        }

        .btn-custom-blue {
            background-color: #0D366B;
            color: #ffffff;
        }

        .btn-custom-blue.clicked {
            background-color: #ffffff;
            color: #0D366B;
        }

        h2, h1, .e2_28, .label-hitam {
            font-family: 'Tiro Bangla', sans-serif;
        }

        img.logo {
            margin-bottom: 20px;
        }

        .navbar-biru {
            background-color: #0D366B;
            border-bottom: 5px solid white;
        }

        #loginForm {
            position: fixed;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            z-index: 50;
        }
        </style>
</head>
<body>
<nav class="navbar navbar-expand-lg navbar-biru bg-biru">
    <div class="container-fluid">
        <a class="navbar-brand" href="#" style="color: white; font-family: 'Tiro Bangla', sans-serif;">
            <img src="assets/img/logo_polinema.png" alt="Logo" style="width: 50px; height: 50px; margin-right: 1px; size: 10px"> Politeknik Negeri Malang
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ms-auto">
                <li class="nav-item">
                    <a class="nav-link" href="https://www.polinema.ac.id/" style="color: white; font-family: 'Tiro Bangla', sans-serif;">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="https://spmb.polinema.ac.id/info/hubungi" style="color: white; font-family: 'Tiro Bangla', sans-serif;">Contact</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="http://siakad.polinema.ac.id/login/index/err/6" style="color: white; font-family: 'Tiro Bangla', sans-serif;">Siakad</a>
                </li>
            </ul>
        </div>
    </div>
</nav>


    <section class="container-fluid text-center" style="height: 80vh;">
        <div class="row" style="height: 80%">
            <div class="col d-flex justify-content-center align-items-center" style="width:80%; height:vh; background-color: #0D366B; opacity: 1; background-image: url(assets/img/login3.jpeg); background-size:100% 100%;">
            </div>
            <div class="col d-flex justify-content-center align-items-center" style="width:10%; height:100vh; background-color: #0D366B; opacity: 1; background-image: url(assets/img/jti3.jpg); background-size:100% 100%;">
            <form id="loginForm" class="d-flex flex-column gap-2 w-10 px-1 py-1 bg-white rounded-3" method="post">
                <div class="text-center logo-text-container">
                    <img src="assets/img/logo_jti_baru.png" style="width: 15%;" class="logo">
                    <h1 class="h5 mb-3 fw-bolder">Sistem Tata Tertib JTI</h1>
                    <span class="small" style="margin-top: 5px; font-family: 'Tiro Bangla';">Selamat datang di sistem tata tertib Politeknik Negeri Malang untuk mahasiswa, civitas akademika</span>
                </div>
                <div class="form-floating">
                    <input type="username" class="form-control form-default shadow bg-body-tetiary-rounded" id="floatingInput" placeholder="Username" name="username" required>
                    <label for="floatingInput" class="small label-hitam">Username</label>
                </div>
                <div class="form-floating">
                    <input type="password" class="form-control form-default shadow bg-body-tetiary-rounded" id="floatingPassword" placeholder="Password" name="password" required>
                    <label for="floatingPassword" class="small label-hitam">Password</label>
                </div>
                <div class="d-flex justify-content-between">
                    <div class="form-check text-start">
                        <a href="forgot_password.php" class="small label-hitam" style="color: #0D366B">Lupa Password?</a>
                    </div>
                    <button id="loginBtn" class="btn btn-custom-blue pt-1" type="submit" style="width: 35%;">Login</button>
                </div>
            </form>

            </div>
        </div>
    </section>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-e5jDEOfP6RVhK2VdDc3YOEBPQQJgMz1DQv5Lqfsh+rgD6oMmnZf+O1sbr7JSCK7F" crossorigin="anonymous"></script>
    <script>
        <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.2/dist/js/bootstrap.min.js"></script>
    </script>
</body>
</html>
