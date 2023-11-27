    <link rel="stylesheet" href="<?= BASEURL;?>\css\custom_color">
    <style>
        @font-face {
            font-family: 'Tiro Bangla';
        }
        body, html {
            height: 100%;
            margin: 0;
            overflow: hidden;
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
    </style>
</head>
<body>
<nav class="navbar navbar-expand-lg navbar-biru bg-biru">
    <div class="container-fluid">
        <a class="navbar-brand" href="#" style="color: white; font-family: 'Tiro Bangla', sans-serif;">
            <img src="<?=BASEURL?>/img/logo_polinema.png" alt="Logo" style="width: 50px; height: 50px; margin-right: 1px; size: 10px"> Politeknik Negeri Malang
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
        <div class="col d-flex justify-content-center align-items-center" style="width:80%; height:vh; background-color: #0D366B; opacity: 1; background-image: url(<?=BASEURL?>/img/jti3.jpg);  background-size:100% 100%;">
        </div>
        <div class="col d-flex justify-content-center align-items-center" style="width:10%; height:100vh; background-color: #0D366B; opacity: 1;">
            <form id="loginForm" class="d-flex flex-column gap-3 w-75 px-3 py-2 bg-white rounded-4" method="post">
                <div class="w-80 justify-content-center logo-text-container">
                    <img src="<?=BASEURL?>/img/logo_jti_baru.png" style="width: 25%;" class="logo">
                    <h1 class="h3 mb-5 fw-bolder">Sistem Tata Tertib JTI</h1>
                    <span class="e2_28" style="margin-top: 5px;">Selamat datang di sistem tata tertib Politeknik Negeri Malang untuk mahasiswa, civitas akademika </span>
                </div>
                <div class="form-floating">
                    <input type="username" class="form-control form-default shadow bg-body-tetiary-rounded" id="floatingInput" placeholder="Username" name="username" required>
                    <label for="floatingInput" class="label-hitam">Username</label>
                </div>
                <div class="form-floating">
                    <input type="password" class="form-control form-default shadow bg-body-tetiary-rounded" id="floatingPassword" placeholder="Password" name="password" required>
                    <label for="floatingPassword" class="label-hitam">Password</label>
                </div>
                <div class="d-flex justify-content-center">
                    <button id="loginBtn" class="btn btn-custom-blue pt-2" type="submit" style="width: 35%;">Login</button>
                </div>
            </form>
        </div>
    </div>
</section>
<script>
    document.addEventListener('DOMContentLoaded', function () {
        document.getElementById('loginBtn').addEventListener('click', function () {
            this.classList.toggle('clicked');
        });
    });
</script>
