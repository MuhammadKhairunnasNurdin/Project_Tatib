<main class="main col-md-9 ms-sm-auto col-lg-10 px-md-4">
    <!-- Tampilan Dashboard  -->
    <div class="content-home">
        <div class="dashboard-box">
            <div class="box-title">
                <div class="title-page">
                    <h1 class="h2"><img class="logo-dashboard-page" src="<?= BASEURL ?>/img/dosen/dash_dosen.png" alt="">Dashboard</h1>
                </div>
                <div class="button-refresh">
                    <a href="history/index.php">
                        <button class="refresh" data-bs-target="laporan">
                            <img class="refresh-logo" src="<?= BASEURL ?>/img/refresh-logo.svg" alt="">
                        </button>
                    </a>
                </div>
            </div>
        </div>
        <div class="content">
            <div class="box-content" style="display:flex">
                <div class="card dosen-info">
                    <img class="card-img-top" src="<?= BASEURL ?>/img/kinata.jpg" alt="">
                    <div class="card-body">
                        <h3 class="card-title">Kinata Dewa Ariandi</h3>
                        <p class="card-text">2241720087</p>
                        <p class="card-text">Status : <span class="status-active">Dosen DPA</span></p>
                    </div>
                </div>
                <div class="box-pilihan">
                    <div class="text-content">
                        <!-- Kalimat Selamat Datang Dashboard -->
                        <h3 class="title-content">Selamat Datang, Kinata Dewa Ariandi St.Mt</h3>
                        <p class="desc-content">Selamat Datang di Website Tata Tertib Mahasiswa Jurusan</p>
                        <p class="jurusan">Teknologi Informasi</p>
                    </div>
                    <br>
                    <div class="container-flex">
                        <button class="box-lapor">
                            <div class="lapor-mhs">
                                <h3 class="lapor-title">Lapor</h3>
                            </div>
                        </button>
                        <br>
                        <button class="box-history">
                            <h3 class="history-title">History</h3>
                        </button>
                    </div>
                </div>
            </div>
        </div>
        <br>
    </div>
</main>
