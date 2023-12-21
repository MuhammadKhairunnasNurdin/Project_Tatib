
<!-- Tampilan Dashboard  -->
<main class="main">
    <div class="dashboard-box">
        <div class="box-title">
            <div class="title-page">
                <h1 class="h2"><img class="logo-dashboard-page" src="<?= BASEURL ?>/img/dash.svg" alt="">Dashboard</h1>
            </div>
            <?php if (isset($_SESSION['flashMessage']['upload'])) {
                echo $_SESSION['flashMessage']['upload'];
                unset($_SESSION['flashMessage']['upload']);
            } ?>
            <a href="<?=BASEURL?>/Mahasiswa/index" class="link-dashboard-2">
                <div class="refresh">
                    <img class="logo-refresh" src="<?= BASEURL ?>/img/reload_.svg" alt="Refresh">
                    <p>
                        Refresh
                    </p>
                </div>
            </a>
        </div>
    </div>
        <div class="welcome-box">
            <h1 class="welcome-title">Selamat Datang, <?=$data['mahasiswa']['nama']?></h1>
            <p class="welcome-subtitle">Selamat Datang di Website Tata Tertib Mahasiswa Jurusan</p>
            <p style="color: #3D55AB"><b>Teknologi Informasi</b></p>
        </div>
        <div class="content">
            <div class="card sanction-report">
                <h2>Laporan Sanksi</h2>
                <p>Silakan cek tingkatan jenis Pelanggaran di sini:</p>
                <br>
                <a href="<?=BASEURL?>/Mahasiswa/pageJenisTatib" class="rules-button">Tata Tertib</a>
            </div>
            <div class="card student-info">
<!--                <img src="--><?//= BASEURL ?><!--/img/Andy_Nugraha.jpeg" alt="User" class="student-photo">-->
                <h3><?=$data['mahasiswa']['nama']?></h3>
                <p class="student-id"><?=$data['mahasiswa']['NIM']?></p>
                <p class="student-location"><?=$data['mahasiswa']['alamat']?></p>
                <p class="student-status">Status Anda: <span class="status-active">Mahasiswa Aktif</span></p>
            </div>
        </div>
</main>
</div>
</div>