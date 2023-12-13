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

    .title-page h1 {
        margin-bottom: 0;
    }

    .button-refresh {
        float: right;
    }

    .refresh {
        border: none;
        border-radius: 4px;
        padding: 5px 10px;
        cursor: pointer;
    }

    .box-content {
        font-family: 'tirobangla';
        border: 1px solid #ddd;
        border-radius: 4px;
        padding: 10px;
        margin: 0 auto;
        font-size: 18px;
        width: 90%;
        height: 0 auto;
    }

    form {
        margin: 0;
    }


    .form-control {
        width: 100%;
        margin-bottom: 15px;
    }

    .modal-footer {
        text-align: right;
    }

    #button-buku {
        background-color: #007bff;
        color: #fff;
        border: none;
        border-radius: 4px;
        padding: 5px 10px;
        cursor: pointer;
    }

    .kelas {
        margin-left: 13px;
        width: auto;
    }

    .mahasiswa {
        margin-left: 13px;
        width: auto;
    }
</style>

<div class="main col-md-9 ms-sm-auto col-lg-10 px-md-4">
    <div class="content-laporan">
        <div class="dashboard-box">
            <div class="box-title">
                <div class="title-page">
                    <h1 class="h2"><img class="logo-dashboard-page" src="<?= BASEURL ?>/img/dosen/lapor_dosen.png" alt="">Laporan</h1>
                </div>
                <div class="button-refresh">
                    <a href="index.php">
                        <button class="refresh" data-bs-target="laporan">
                            <img class="refresh-logo" src="<?= BASEURL ?>/img/refresh-logo.svg" alt="">
                        </button>
                    </a>
                </div>
            </div>
        </div>
        <div>
            <div class="content mt-5">
                <div class="box-content" style="width: 800px">
                    <form action="">
                        <div class="mb-3 row">
                            <label for="kelas" class="form-label col-md-3 text-left">Kelas  :</label>
                            <select name="id_kelas" class="kelas">
                            <option value="" selected>Pilih Kelas</option>
                            <?php foreach ($data['kelas'] AS $kls): ?>
                                <option value="<?=$kls['id_kelas']?>"><?=$kls['nama']?></option>
                            <?php endforeach; ?>
                            </select>
                        </div>
                        <div class="mb-3 row">
                            <label for="nama" class="form-label col-md-3 text-left">Nama  :</label>
                            <select name="NIM" class="mahasiswa">
                                <option value="" selected>Pilih Mahasiswa</option>
		                        <?php foreach ($data['mahasiswa'] AS $mhs): ?>
                                        <option value="<?=$mhs['NIM']?>"><?=$mhs['NIM']?>/<?=$mhs['nama']?></option>
		                        <?php endforeach; ?>
                            </select>
                        </div>
                        <div class="mb-3 row">
                            <label for="kelas" class="form-label col-md-3 text-left">Pelanggaran  :</label>
                            <select name="NIM" class="mahasiswa">
                                <option value="" selected>Pilih Tingkat Pelanggaran</option>
		                        <?php foreach ($data['tingkat'] AS $tingkat): ?>
                                    <option value="<?=$tingkat['tingkatan']?>"><?=$tingkat['tingkatan']?></option>
		                        <?php endforeach; ?>
                            </select>
                        </div>

                        <div class="mb-3 row">
                            <label for="kelas" class="form-label col-md-3 text-left">Sanksi  :</label>
                            <select name="NIM" class="mahasiswa">
                                <option value="" selected>Pilih Tingkat Pelanggaran</option>
		                        <?php foreach ($data['tingkat'] AS $tingkat): ?>
                                    <option value="<?=$tingkat['tingkatan']?>"><?=$tingkat['tingkatan']?></option>
		                        <?php endforeach; ?>
                            </select>
                        </div>
                        <div class="mb-3 row">
                            <label for="bukti" class="form-label col-md-3 text-left">Bukti  :</label>
                            <div class="col-md-9">
                                <input type="file" class="form-control" id="bukti" required style="width: 100%;">
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="submit" class="btn btn-primary" id="button-buku">Simpan</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>