<main class="main col-md-9 ms-sm-auto col-lg-10 px-md-4">
    <!-- Tampilan Dashboard  -->
    <div class="content-home">
        <div class="dashboard-box">
            <div class="box-title">
                <div class="title-page">
                    <h1 class="h2"><img class="logo-dashboard-page" src="<?= BASEURL ?>/img/dosen/dash_dosen.png" alt="">Dashboard</h1>
                </div>
                <?php

                if (isset($_SESSION['flashMessage']['history_pelanggaran'])) {
                    echo $_SESSION['flashMessage']['history_pelanggaran'];
                    unset ($_SESSION['flashMessage']['history_pelanggaran']);
                }

                ?>
                <div class="button-refresh">
                    <a href="<?=BASEURL?>/Dosen/index">
                        <button class="refresh" data-bs-target="laporan">
                            <img class="refresh-logo" src="<?= BASEURL ?>/img/refresh-logo.svg" alt="">
                        </button>
                    </a>
                </div>
            </div>
        </div>
        <div class="content">
            <div class="box-content">
                <div class="">
                    <?php foreach ($data['dosen'] as $dosen) : ?>
                    <div class="text-content">
                        <!-- Kalimat Selamat Datang Dashboard -->
                        <h3 class="title-content">Selamat Datang, <?=$dosen['nama']?></h3>
                        <p class="desc-content">Selamat Datang di Website Tata Tertib Mahasiswa Jurusan</p>
                        <p class="jurusan">Teknologi Informasi</p>
                    </div>

                    <!-- Profile Dosen -->
                    <div class="card dosen-info">
                    <img class="dosen-photo" src="<?= BASEURL?>/img/kinata.jpg" alt="">
                    <h3><?=$dosen['nama']?></h3>
                    <p class="dosen-id"><?=$dosen['NIP']?></p>
                            <?php if (isset($dosen['DPA'])) { ?>
                    <p class="dosen-status">Status : <span class="status-active">Dosen DPA <?=$dosen['kelas']?></span></p>
                        <?php } else { ?>
                    <p class="dosen-status">Status : <span class="status-active">Dosen non DPA</span></p>
	                    <?php  }?>

                    </div>

                <!-- Lapor -->
                <div class="lapor-mahasiswa">
                    <!-- Kotak lapor -->
                    <div class="box-lapor">
                        <div class="text-dosen-page">
                            <h3 class="dosen-title">Lapor Mahasiswa</h3>
                        </div>
                        <div class="button-kelola">
                            <a href="<?=BASEURL?>/Dosen/pageLaporan" class="history">Lapor</a>
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
	            <?php endforeach; ?>
            </div>
        </div>
    </div>
    <br>
    </div>
</main>
