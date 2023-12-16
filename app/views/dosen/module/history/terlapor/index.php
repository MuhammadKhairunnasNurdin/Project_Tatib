<style>
    .content-laporan {
        font-family: 'tirobangla';
    }

    .box-title {
        font-size: 12px;
        width: 80%;
        /* Adjust width */
        height: 70px;
        /* Adjust height */
        margin: 0 auto;
        /* Center horizontally */
        font-family: 'tirobangla';
    }

    .dashboard-box {
        padding: 10px;
    }

    .content {
        padding: 5px;
        width: 70%;
        margin: auto;
        height: 70%;
    }

    .box-content {
        display: flex;
    }

    .box-pilihan {
        padding: 20px;
        margin-right: 20px;
        width: 60%;
    }

    .card.dosen-info {
        width: 30%;
        background-color: #0D3278;
        color: white;
        border-radius: 10px;
        box-shadow: 0 2px 4px rgba(0, 0, 0, 0.2);
        font-family: 'Tiro Bangla';
        font-size: 14px;
        text-align: center;
        /* Untuk menengahkan teks di dalam kartu */
    }

    .dosen-photo {
        width: 10%;
        /* Ukuran gambar dengan lebar 50% dari container */
        height: auto;
        object-fit: cover;
        display: block;
        /* Membuat gambar menjadi blok untuk mengatur margin secara vertikal */
        margin: 0 auto;
        /* Menengahkan gambar secara horizontal */
        border-radius: 10%;
    }

    .box-mhs {
        width: 500px;
        display: flex;
        background-color: #0D3278;
        color: white;
        border-radius: 20px;
        padding: 30px;
        padding-top: 5px;
        align-items: flex-start;
        transition: all 0.3s ease-in-out;
    }

    .box-mhs:hover {
        background-color: #20479C;
        /* Add shadow on hover */
        box-shadow: 0px 4px 8px rgba(0, 0, 0, 0.2);
        /* Add scale effect on hover */
        transform: scale(1.05);
    }

    .mhs-title,
    .mhskelas-title {
        font-family: 'tirobangla';
        font-size: 25px;
        justify-content: center;

        /* Add new style to align text left */
        text-align: left;
        padding-left: 15px;
        /* Adjust padding for desired spacing */
    }

    .text-pilihan,
    h1 {
        font-size: 20px;
    }
</style>

<div class="main col-md-9 ms-sm-auto col-lg-10 px-md-4">
    <div class="content-laporan">
        <div class="dashboard-box">
            <div class="box-title">
                <div class="title-page">
                    <h1 class="h2"><img class="logo-dashboard-page" src="<?= BASEURL ?>/img/dosen/history_dosen.png"
                                        alt="">Mahasiswa Kelas</h1>
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
        <div>
            <div class="content">
                <div class="box-content">
                    <div class="card dosen-info">
                        <img class="card-img-top" src="<?= BASEURL ?>/img/kinata.jpg" alt="">
                        <div class="card-body">
                            <h3 class="card-title"><?=$data['dosen']['nama']?></h3>
                            <p class="card-text"><?=$data['dosen']['NIP']?></p>
	                        <?php if (isset($data['dosen']['DPA'])) { ?>
                                <p class="card-text">Status : <span class="status-active">Dosen DPA <?=$data['dosen']['kelas']?></span></p>
	                        <?php } else { ?>
                                <p class="card-text">Status : <span class="status-active">Dosen non DPA</span></p>
	                        <?php } ?>
                        </div>
                    </div>
                    <div class="box-pilihan">
                        <div class="container-flex">
                            <h3 class="mhs-title">Daftar Mahasiswa Terlapor</h3>
                        </div>
                        <br>
                        <?php foreach ($data['lapor'] as $lapor) : ?>
                        <a href="<?= BASEURL ?>/Dosen/pageDetailTerlapor" class="box-mhs">
                            <div class="text-mhs">
                                <h3 class="mhs-title">TI 3E/Kinata Dewa Ariandi</h3>
                            </div>
                        </a>
                        <br>
                        <?php endforeach; ?>
<!--                        <a href="--><?//= BASEURL ?><!--/Dosen/pageMahasiswa" class="box-mhs">-->
<!--                            <div class="text-mhs">-->
<!--                                <h3 class="mhs-title">TI 1E/Aunnur Rofig</h3>-->
<!--                            </div>-->
<!--                        </a>-->
<!--                        <br>-->
<!--                        <a href="--><?//= BASEURL ?><!--/Dosen/pageTerlapor" class="box-mhs">-->
<!--                            <div class="text-mhs">-->
<!--                                <h3 class="mhs-title">TI 2A/Andy Nugraha Putra</h3>-->
<!--                            </div>-->
<!--                        </a>-->
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</div>