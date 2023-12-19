<style>
    .content-laporan {
        font-family: 'tirobangla';
    }

    .box-title {
        font-size: 12px;
        width: 80%; /* Adjust width */
        height: 70px; /* Adjust height */
        margin: 0 auto; /* Center horizontally */
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


    .box-pilihan {
        width: 80%;
        margin: 0 auto; /* This line centers the box horizontally */
        align-items: center;
        justify-content: center;
    }


    .box-mhskelas,
    .box-mhs {
        width: 100%;
        display: flex;
        background-color: #0D3278;
        color: white;
        border-radius: 20px;
        padding-top: 5px;
        justify-content: center;
        transition: all 0.3s ease-in-out;
    }

    .box-mhskelas:hover,
    .box-mhs:hover {
        background-color: #20479C;
        /* Add shadow on hover */
        box-shadow: 0px 4px 8px rgba(0, 0, 0, 0.2);
        /* Add scale effect on hover */
        transform: scale(1.05);
    }

    .mhs-title, .mhskelas-title {
        font-family: 'tirobangla';
        font-size: 30px;
        justify-content: center;
    }

    .box-content {
        height: 100%;
        width: 100%;
        display: flex;
        flex-direction: column;
    }

</style>

<div class="main col-md-9 ms-sm-auto col-lg-10 px-md-4">
    <div class="content-laporan">
        <div class="dashboard-box">
            <div class="box-title">
                <div class="title-page">
                    <h1 class="h2"><img class="logo-dashboard-page" src="<?= BASEURL ?>/img/dosen/history_dosen.png" alt="">History</h1>
                </div>
                <div class="button-refresh">
                    <a href="<?=BASEURL?>/Dosen/pageHistory">
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
                    <div class="text-content">
                        <!-- Kalimat Selamat Datang Dashboard -->
                        <h3 class="title-content">Selamat Datang, <?= $data['dosen']['nama'] ?>
                        </h3>
                        <p class="desc-content">Silahkan Pilih Daftar Mahasiswa</p>
                        <p class="jurusan">Teknologi Informasi</p>
                    </div>
                    <div class="box-pilihan">
                        <br>
                        <div class="container-flex">
                            <form action="<?=BASEURL?>/HistoryPelanggaran/allHistory" method="post">
                                <input type="hidden" name="implementor" value="Dosen">
                                <input type="hidden" name="pageNama" value="History">
                                <button type="submit" class="box-mhs" name="data" value="<?=$data['dosen']['NIP']?>" style="text-decoration-line: none">
                                    <div class="text-mhs">
                                        <h3 class="mhs-title">Mahasiswa Terlapor</h3>
                                    </div>
                                </button>
                            </form>
                            <br>
                            <?php if ($data['dosen']['DPA'] == $data['dosen']['NIP']) {?>
                            <a href="<?=BASEURL?>/Dosen/pageMahasiswa" class="box-mhskelas" style="text-decoration-line: none">
                                <div class="text-mhskelas">
                                    <h3 class="mhskelas-title">Mahasiswa Kelas</h3>
                                </div>
                            </a>
                            <?php } ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>