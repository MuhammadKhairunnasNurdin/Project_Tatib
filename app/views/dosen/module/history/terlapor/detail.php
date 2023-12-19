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

    .box-mhs {
        width: 50%;
        /* Mengurangi lebar agar tidak memenuhi 100% layar */
        max-width: 400px;
        /* Menetapkan lebar maksimum agar tidak terlalu lebar pada layar besar */
        margin-left: 0 auto;
        /* Agar kotak berada di tengah */
        display: flex;
        background-color: #0D3278;
        color: white;
        border-radius: 15px;
        padding: 10px;
        /* Mengurangi padding untuk memberikan ruang di sekitar isi */
        transition: all 0.3s ease-in-out;
    }

    .mhs-title {
        font-family: 'tirobangla';
        font-size: 20px;
        /* Mengurangi ukuran font agar sesuai dengan box-mhs */
    }
    .table-container {
        max-height: 400px; /* Set the desired height for the scrollable area */
        overflow-y: auto;
    }

    .no {
        width: 3%;
    }
    .jenis {
        width: 45%;
    }
    .tingkat {
        width: 7%;
    }
    .tanggal {
        width: 8%;
    }
    .rincian {
        width: 5%;
    }

    #example thead th {
        background-color: #0D3278;
        color: white;
        font-family: 'tirobangla';
        width: fit-content;
    }

    table {
        font-family: 'tirobangla';
    }

</style>

<div class="main col-md-6 ms-sm-auto col-lg-10 px-md-4">
    <div class="content-laporan">
        <div class="dashboard-box">
            <div class="box-title">
                <div class="title-page">
                    <h1 class="h2"><img class="logo-dashboard-page" src="<?= BASEURL ?>/img/dosen/history_dosen.png"
                                        alt="">History</h1>
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
                    <div class="box-pilihan">
                        <div class="container-flex">
                            <div class="box-mhs">
                                <div class="text-mhs">
                                    <h3 class="mhs-title">Kinata Dewa Ariandi</h3>
                                </div>
                            </div>
                        </div>
                        <br>
                        <div class="table-container">
                            <table id="example" class="table table-striped table-bordered">
                                <thead>
                                <tr>
                                    <th class="no">No.</th>
                                    <th class="jenis">Jenis Pelanggaran</th>
                                    <th class="tingkat">Tingkat</th>
                                    <th class="tanggal">Tanggal</th>
                                    <th class="rincian">Rincian</th>
                                </tr>
                                </thead>
                                <tbody>
                                <?php $id=1; foreach ($data['mahasiswa'] as $mhs): ?>
                                <tr>
                                    <td class="no"><?=$id?></td>
                                    <td class="jenis"><?=$mhs['jenis']?></td>
                                    <td class="tingkat"><?=$mhs['pelanggaran_id']?></td>
                                    <td class="tanggal"><?=$mhs['tgl_pelanggaran']?></td>
                                    <td class="rincian">
		                                <?php if (isset($mhs['tgl_validasi'])) { ?>
                                            <input type="checkbox" checked disabled>
		                                <?php } else { ?>
                                            <input type="checkbox" disabled>
		                                <?php } ?>
                                    </td>
                                </tr>
                                <?php $id++; endforeach; ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>