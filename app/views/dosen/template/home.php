    <main class="main col-md-9 ms-sm-auto col-lg-10 px-md-4">
            <!-- Tampilan Dashboard  -->
            <div class="dashboard-box">
                <div class="box-title">
                    <div class="title-page">
                        <h1 class="h2"><img class="logo-dashboard-page" src="<?= BASEURL?>/img/dosen/dash_dosen.png" alt="">Dashboard</h1>
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
                            <h3 class="title-content">Selamat Datang, Kinata Dewa Ariandi St.Mt</h3>
                            <p class="desc-content">Selamat Datang di Website Tata Tertib Mahasiswa Jurusan</p>
                            <p class="jurusan">Teknologi Informasi</p>
                        </div>

                        <!-- Profile Dosen -->
                        <div class="card dosen-info";">
                        <img class="dosen-photo" src="<?= BASEURL?>/img/kinata.jpg" alt="">
                            <h3>Kinata Dewa Ariandi</h3>
                            <p class="dosen-id">2241720087</p>
                            <p class="dosen-status">Status : <span class="status-active">Dosen DPA</span></p>
                        </div>

                        <!-- Lapor -->
                        <div class="lapor-mahasiswa">
                            <!-- Kotak lapor -->
                                <div class="box-lapor">
                                    <div class="text-dosen-page">
                                        <h3 class="dosen-title">Lapor Mahasiswa</h3>                                    
                                    </div>
                                    <div class="button-kelola">
                                        <a href="<?=BASEURL?>/Dosen/pageLaporan" method="post" class="history">Lapor</a>
                                    </div>
                                </div>
                            
                            <!-- Kotak History -->
                                <div class="box-history">
                                    <div class="text-history-page">
                                        <h3 class="history-title">History</h3>
                                    </div>
                                    <div class="button-history">
                                        <a href="<?=BASEURL?>/Dosen/pageHistory" class="history">Lihat Disini</a>
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
