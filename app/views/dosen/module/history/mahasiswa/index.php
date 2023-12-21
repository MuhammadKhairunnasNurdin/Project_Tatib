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
        width: 80%;
        margin: auto;
        height: 100%;
        height: 500px;
        overflow-y: auto;
    }

    .box-content {
        display: flex;
    }

    .list-group-item {
        color: white;
        background-color: #0D366B;
        font-size: 17px;
    }

    .list-group-item {
        box-shadow: 0 0 0 0 rgba(0, 0, 0, 0.2);
        transition: box-shadow 0.3s ease-in-out;
    }

    .list-group-item:hover {
        box-shadow: 0 4px 6px rgba(0, 0, 0, 0.2);
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
                <div class="list-group list-group-light">
		            <?php foreach ($data['mahasiswa'] as $mhs):
		            if ($mhs['id_kelas'] == $data['dosen']['id_kelas']) {
		            ?>
                        <form action="<?= BASEURL ?>/HistoryPelanggaran/allHistory" method="post">
<!--                            <input type="hidden" name="dataMhs[id_HP]" value="--><?//= $mhs['id_HP'] ?><!--">-->
<!--                            <input type="hidden" name="dataMhs[NIM]" value="--><?//=$mhs['NIM']?><!--">-->
<!--                            <input type="hidden" name="dataMhs[nama]" value="--><?//= $mhs['nama'] ?><!--">-->
<!--                            <input type="hidden" name="dataMhs[pelanggaran_id]" value="--><?//= $mhs['pelanggaran_id'] ?><!--">-->
<!--                            <input type="hidden" name="dataMhs[no_jenis]" value="--><?//= $mhs['no_jenis'] ?><!--">-->
<!--                            <input type="hidden" name="dataMhs[no_sanksi]" value="--><?//= $mhs['no_sanksi'] ?><!--">-->
<!--                            <input type="hidden" name="dataMhs[tgl_pelanggaran]" value="--><?//= $mhs['tgl_pelanggaran'] ?><!--">-->
<!--                            <input type="hidden" name="dataMhs[tgl_kompensasi]" value="--><?//= $mhs['tgl_kompensasi'] ?><!--">-->
<!--                            <input type="hidden" name="dataMhs[tgl_validasi]" value="--><?//= $mhs['tgl_validasi'] ?><!--">-->
<!--                            <input type="hidden" name="dataMhs[kompensasi]" value="--><?//= $mhs['kompensasi'] ?><!--">-->
<!--                            <input type="hidden" name="dataMhs[status]" value="--><?//= $mhs['status'] ?><!--">-->
                            <input type="hidden" name="NIM" value="<?=$mhs['NIM']?>">
                            <input type="hidden" name="implementor" value="Dpa">
                            <input type="hidden" name="data" value="<?=$data['dosen']['NIP']?>">
                            <input type="hidden" name="pageName" value="Detail">

                            <button type="submit" class="list-group-item list-group-item-action px-3 border-0 rounded-3 mb-2">
                                <?=$mhs['kelas']?>/<?=$mhs['nama']?>
                            </button>
                        </form>
                    <?php } endforeach; ?>
                </div>
            </div>
        </div>
    </div>
</div>