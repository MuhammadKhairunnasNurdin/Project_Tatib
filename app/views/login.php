
<nav class="navbar navbar-expand-lg" style="background-color: #0D366B;">
        <div class="container-fluid">
        <a style="color: white; font-family: 'Tiro Bangla'; font-size: 20px;">
        <img src="<?= BASEURL; ?>/img/logo_polinema.png" alt="Logo" style="width: 60px; height: 60px; margin-right: 1px; size: 5px"> Politeknik Negeri Malang</a>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ms-auto">
                <li class="nav-item">
                    <a class="nav-link" href="https://www.polinema.ac.id/" style="color: white; font-family: 'Tiro Bangla';">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="https://spmb.polinema.ac.id/info/hubungi" style="color: white; font-family: 'Tiro Bangla';">Contact</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="https://siakad.polinema.ac.id/login/index/err/6" style="color: white; font-family: 'Tiro Bangla';">Siakad</a>
                </li>
            </ul>
        </div>
    </nav>

    <section class="container-fluid text-center">
        <div class="row">
            <div class="col d-flex justify-content-center align-items-center" style="width:10%; height:100vh; background-color: #0D366B; opacity: 20; background-image: url(<?= BASEURL;?>/img/gedung_JTI.jpg); background-size:100% 100%; ">
                <form action="<?= BASEURL?>/Authorization/loginVerify" id="loginForm" class="d-flex flex-column gap-2 w-10 px-1 py-1 bg-white rounded-3" style="height:60%; width:35%;" method="post">
                    <div class="text-center logo-text-container">
                        <img src="<?= BASEURL?>/img/logo_jti_baru.png" style="width: 20%;" class="logo" alt="">
                        <h1 class="h5 mb-3 fw-bolder" style="font-family: 'Tiro Bangla'; font-size: 25px;">Sistem Tata Tertib JTI</h1>
                        <h5 class="small" style="margin-top: 5%; margin:auto; font-family: 'Tiro Bangla'; font-size: 15px;">Selamat datang di sistem tata tertib Politeknik<br> Negeri Malang untuk mahasiswa, civitas akademika</h5>
                    </div>
			        <?php
			        if (isset($_SESSION['_flashData'])) {
				        setcookie("isiSession", $_SESSION['_flashData'], time() + 10, "/");
				        echo $_GET['data'];
				        setcookie("cek", "masuk", time() + 10, "/");
			        }

			        ?>
                    <div class="form-floating" style="width:95%; margin: auto; font-family: 'Tiro Bangla';">
                        <input type="username" class="form-control form-default shadow bg-body-tetiary-rounded" id="floatingInput" placeholder="Username" name="username" required>
                        <label for="floatingInput" class="small font-family: 'Tiro Bangla';">Username</label>
                    </div>
                    <div class="form-floating" style="width:95%; margin: auto; font-family: 'Tiro Bangla';">
                        <input type="password" class="form-control form-default shadow bg-body-tetiary-rounded" id="floatingPassword" placeholder="Password" name="password" required>
                        <label for="floatingPassword" class="small font-family: 'Tiro Bangla';">Password</label>
                    </div>
                    <div class="text-center">
                        <div class="d-flex justify-content">
                            <div class="form-check">
                                <label>
                                    <input type="checkbox" name="remember" value="1">
                                </label>Remember Me
                            </div>
                        </div>
                        <button id="loginBtn" class="btn btn-primary" type="submit" style="width:25%;">Login</button>
                    </div>
                </form>
            </div>
        </div>
    </section>
