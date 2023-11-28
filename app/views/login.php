<!DOCTYPE html>
<html lang="en">

<head>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="style.css">
</head>

<body>
<nav class="navbar navbar-expand-lg" style="background-color: #0D366B;">
        <div class="container-fluid">
        <a style="color: white; font-family: 'Tiro Bangla', sans-serif; font-size: 20px;">
        <img src="../../public/img/logo_polinema.png" alt="Logo" style="width: 60px; height: 60px; margin-right: 1px; size: 5px"> Politeknik Negeri Malang</a>
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
    </nav>

    <section class="container-fluid text-center" style="height: 80vh;">
        <div class="row" style="height: 100%">
            <div class="col d-flex justify-content-center align-items-center" style="width:10%; height:100vh; background-color: #0D366B; opacity: 1; background-image: url(../../public/img/gedung_JTI.jpg); background-size:100% 100%;">
            <form id="loginForm" class="d-flex flex-column gap-2 w-10 px-1 py-1 bg-white rounded-3" style="height:50%; width:35%;" method="post">
                <div class="text-center logo-text-container">
                    <img src="../../public/img/logo_jti_baru.png" style="width: 15%;" class="logo">
                    <h1 class="h5 mb-3 fw-bolder">Sistem Tata Tertib JTI</h1>
                    <span class="small" style="margin-top: 5%; margin:auto; font-family: 'Tiro Bangla';">Selamat datang di sistem tata tertib Politeknik Negeri Malang untuk mahasiswa, civitas akademika</span>
                </div>
                <div class="form-floating" style="width:95%; margin:auto">
                    <input type="username" class="form-control form-default shadow bg-body-tetiary-rounded" id="floatingInput" placeholder="Username" name="username" required>
                    <label for="floatingInput" class="small label-hitam">Username</label>
                </div>
                <div class="form-floating" style="width:95%; margin:auto">
                    <input type="password" class="form-control form-default shadow bg-body-tetiary-rounded" id="floatingPassword" placeholder="Password" name="password" required>
                    <label for="floatingPassword" class="small label-hitam">Password</label>
                </div>
                <div class="d-flex justify-content-between">
                    <div class="form-check text-start">
                    </div>
                    <button id="loginBtn" class="btn btn-custom-blue pt-1" type="submit" style="width:25%;">Login</button>
                </div>
            </form>
            </div>
        </div>
    </section>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-e5jDEOfP6RVhK2VdDc3YOEBPQQJgMz1DQv5Lqfsh+rgD6oMmnZf+O1sbr7JSCK7F" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.2/dist/js/bootstrap.min.js"></script>
</body>
</html>
