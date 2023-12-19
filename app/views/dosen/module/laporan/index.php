<style>
    .content-laporan {
        font-family: 'tirobangla';
        width: auto;
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

    #button-save {
        /*background-color: #007bff;*/
        /*color: #fff;*/
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
        width: 15rem;
    }

    .pelanggaran {
        margin-left: 13px;
        width: 15rem;
    }

    .jenis {
        margin-left: 13px;
        width: 30rem;
    }

    .sanksi {
        margin-left: 13px;
        width: 30rem;
    }

    .box-content {
        margin: auto;
        border-radius: 12px;
        width: 928px;
        height: 386px;
        flex-shrink: 0;
        background: rgba(255, 255, 255, 0.80);
        box-shadow: 0px 4px 4px rgba(0, 0, 0, 0.25);
        border-radius: 25px"
    }
    .modal-footer{
        margin-right: 130px;
    }
</style>

<div class="main col-md-9 ms-sm-auto col-lg-10 px-md-4">
    <div class="content-laporan">
        <div class="dashboard-box">
            <div class="box-title">
                <div class="title-page">
                    <h1 class="h2"><img class="logo-dashboard-page" src="<?= BASEURL ?>/img/dosen/lapor_dosen.png"
                                        alt="">Laporan</h1>
                </div>
                <div class="button-refresh">
                    <a href="<?= BASEURL ?>/Dosen/pageLaporan">
                        <button class="refresh" data-bs-target="laporan">
                            <img class="refresh-logo" src="<?= BASEURL ?>/img/refresh-logo.svg" alt="">
                        </button>
                    </a>
                </div>
            </div>
        </div>
        <div>
            <div class="content mt-5" style="background-color: rgba(0, 0, 0, 0)">
                <div class="box-content">
                    <form action="<?=BASEURL?>/Dosen/addLaporan" method="post" enctype="multipart/form-data">
                        <div class="mb-3 row">
                            <label class="form-label col-md-3 text-left">Kelas :</label>
                            <select class="kelas" id="id_kelas" onchange='loadMahasiswa(<?=json_encode($data['mahasiswa'])?>)'>
                                <option value="" selected>Pilih Kelas</option>
								<?php foreach ($data['kelas'] as $kls): ?>
                                    <option value="<?= $kls['id_kelas'] ?>"><?= $kls['nama'] ?></option>
								<?php endforeach; ?>
                            </select>
                        </div>
                        <div class="mb-3 row">
                            <label for="nama" class="form-label col-md-3 text-left">Nama :</label>
                            <select name="NIM" class="mahasiswa" id="mahasiswa">
                                <option selected>Pilih Mahasiswa</option>
                            </select>
                        </div>
                        <div class="mb-3 row">
                            <label for="tingkat" class="form-label col-md-3 text-left">Pelanggaran :</label>
                            <select id="tingkat" name="pelanggaran_id" class="pelanggaran"
                                    onchange='loadPelanggaran(<?=json_encode($data['jenis'])?>, <?=json_encode($data['sanksi'])?>)'>
                                <option value="" selected>Pilih Tingkat Pelanggaran</option>
								<?php foreach ($data['tingkat'] as $tingkat): ?>
                                    <option value="<?= $tingkat['tingkatan'] ?>"><?= $tingkat['tingkatan'] ?></option>
								<?php endforeach; ?>
                            </select>
                        </div>
                        <div class="mb-3 row">
                            <label for="jenis" class="form-label col-md-3 text-left">Jenis :</label>
                            <select class="jenis" id="jenis" name="no_jenis">
                                <option value="" selected>Pilih Jenis Pelanggaran</option>
                            </select>
                        </div>
                        <div class="mb-3 row">
                            <label for="sanksi" class="form-label col-md-3 text-left">Sanksi :</label>
                            <select class="sanksi" id="sanksi" name="no_sanksi">
                                <option value="" selected>Pilih Sanksi Pelanggaran</option>
                            </select>
                        </div>
                        <div class="mb-3 row">
                            <label for="bukti" class="form-label col-md-3 text-left">Bukti :</label>
                            <div class="col-md-9">
                                <input name="bukti_pelanggaran" type="file" accept=".jpeg, .jpg, .png, .gif" class="form-control" id="bukti" style="width: 80%; text-align: center">
                            </div>
                        </div>
                        <div class="modal-footer">
                            <input type="hidden" name="NIP" value="<?=$data['dosen']['NIP']?>">
                            <button type="submit" class="btn btn-primary" id="button-save">Simpan</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>