<style>
    .dashboard-box {
        width: 70%;
        padding: 20px;
        height: 15%;
        display: flex;
        justify-content: center;
    }

    .content {
        padding: 5px;
        width: 70%;
        margin: auto;
        height: 70%;
    }

    .mhs-mhskelas {
        width: 100%;
        margin-top: 10px;
        display: flex;
        justify-content: space-between;
        margin-bottom: 10px;
        font-family: 'tirobangla';
    }

    .box-mhskelas,
    .box-mhs {
        width: 100%;
        display: flex;
        flex-direction: column;
        background-color: #0D3278;
        color: white;
        border-radius: 20px;
        padding: 30px;
        padding-top: 10px;
        align-items: flex-start;
        font-size: 15px;
        justify-content: left;
    }

    .mhs-title,
    .mhskelas-title {
        font-size: 25px;
    }

    .text-mhs-page,
    .text-mhskelas-page {
        margin-top: 5%;
        font-size: 20px;
    }

    .button-history {
        margin-top: 10%;
        color: #0D366B;
    }

    .box-content {
        display: flex;
    }

    .text-mhs,
    .text-mhskelas,
    h3 {
        font-family: 'tirobangla';
        font-size: 15px;
    }
</style>

<div class="container-page">
    <div class="row">
        <main class="main col-md-9 ms-sm-auto col-lg-10 px-md-4" style="align-items: center">
            <div class="dashboard-box">
                <div class="box-title">
                    <div class="title-page">
                        <h1 class="h2"><img class="logo-dashboard-page" src="<?= BASEURL ?>/img/dosen/lapor_dosen.png"
                                alt="">Laporan</h1>
                    </div>
                    <div class="button-refresh">
                        <a href="index.php">
                            <button class="refresh" data-bs-target="index.php">
                                <img class="refresh-logo" src="<?= BASEURL ?>/img/refresh-logo.svg" alt="">
                            </button>
                        </a>
                    </div>
                </div>
            </div>

            <div class="content">
                <div class="box-content">
                    <div class="card dosen-info" style="text-align: center; margin-right: auto; margin-left: 0;">
                        <img class="dosen-photo" src="<?= BASEURL ?>/img/kinata.jpg" alt="">
                        <h3>Kinata Dewa Ariandi</h3>
                        <p class="dosen-id">2241720087</p>
                        <p class="dosen-status">Status : <span class="status-active">Dosen DPA</span></p>
                    </div>

                    <div class="container-flex justify-content-center">
                        <div class="box-mhs">
                            <div class="text-mhs">
                                <h3 class="mhs-title">Mahasiswa Terlapor</h3>
                            </div>
                            <div class="button-mhs">
                                <a href="post?modul=index" method="post" class="history">Lihat</a>
                            </div>
                        </div>

                            <div class="box-mhskelas">
                                <div class="text-mhskelas">
                                    <h3 class="mhskelas-title">Mahasiswa Kelas</h3>
                                </div>
                                <div class="button-mhskelas">
                                    <a href="index.php?page=index" class="history">Lihat</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>