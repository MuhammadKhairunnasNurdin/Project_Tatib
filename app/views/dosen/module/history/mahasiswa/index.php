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
                    <form action="<?= BASEURL ?>/Dosen/pageDetailMahasiswa" method="post">
                        <button class="list-group-item list-group-item-action px-3 border-0 rounded-3 mb-2">
	                        <?=$mhs['kelas']?>/<?=$mhs['nama']?>
                        </button>
			            <?php } endforeach; ?>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>