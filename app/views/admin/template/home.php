<div class="container-page">
    <div class="row">
    <?php
    include "menu.php";
    ?>
    <main class="main">
            <!-- Tampilan Dashboard  -->
            <div class="dashboard-box">
                <div class="box-title">
                    <div class="title-page">
                        <h1 class="h2"><img class="logo-dashboard-page" src="<?= BASEURL?>/img/dashboard_Logo.svg" alt="">Dashboard</h1>
                    </div>
                    <div class="button-refresh">
                        <a href="index.php">
                            <button class="refresh" data-bs-target="index.php">
                                <img class="refresh-logo" src="<?= BASEURL?>/img/refresh-logo.svg" alt="">
                            </button>
                        </a>
                    </div>
                </div>
            </div>
            <div class="content">
                <div class="box-content">
                    <div class="">
                        <div class="text-content">
                            <!-- Kalimat Selamat Datang Dashboard -->
                            <h3 class="title-content">Selamat Datang, Admin 1</h3>
                            <p class="desc-content">Selamat Datang di Website Tata Tertib Mahasiswa Jurusan</p>
                            <p class="jurusan">Teknologi Informasi</p>
                        </div>
                        
                        <div class="dosen-mahasiswa">
                            <!-- Kotak Dosen -->
                                <div class="box-dosen">
                                    <div class="text-dosen">
                                        <h3 class="dosen-title">Dosen</h3>
                                        <p class="dosen-count">Total Dosen : </p>
                                    </div>
                                    <div class="button-kelola">
                                        <a href="" class="kelola">Kelola</a>
                                    </div>
                                </div>
                            
                            <!-- Kotak Mahasiswa -->
                                <div class="box-mahasiswa">
                                    <div class="text-mahasiswa">
                                        <h3 class="mahasiswa-title">Mahasiswa</h3>
                                        <p class="mahasiswa-count">Total Mahasiswa : </p>
                                    </div>
                                    <div class="button-kelola">
                                        <a href="" class="kelola">Kelola</a>
                                    </div>
                                </div>
                        </div>
                    </div>
                </div>
            </div>
            <div>
                <br>
            </div>
        </main>
    </div>
</div>
