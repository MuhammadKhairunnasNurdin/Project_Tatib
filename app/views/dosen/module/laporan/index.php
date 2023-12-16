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
            <div class="content mt-5">
                <div class="box-content">
                    <form action="<?=BASEURL?>/Dosen/addLaporan" method="post">
                        <div class="mb-3 row">
                            <label for="id_kelas" class="form-label col-md-3 text-left">Kelas :</label>
                            <select name="id_kelas" class="kelas" id="id_kelas" onchange="loadMahasiswa()">
                                <option value="" selected>Pilih Kelas</option>
								<?php foreach ($data['kelas'] as $kls): ?>
                                    <option value="<?= $kls['id_kelas'] ?>"><?= $kls['nama'] ?></option>
								<?php endforeach; ?>
                            </select>
                        </div>
                        <div class="mb-3 row">
                            <label for="nama" class="form-label col-md-3 text-left">Nama :</label>
                            <select name="NIM" class="mahasiswa" id="mahasiswa">
                                <option value="" selected>Pilih Mahasiswa</option>
                            </select>
                        </div>
                        <div class="mb-3 row">
                            <label for="tingkat" class="form-label col-md-3 text-left">Pelanggaran :</label>
                            <select id="tingkat" name="pelanggaran_id" class="pelanggaran" onchange="loadPelanggaran()">
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
                                <input type="file" class="form-control" id="bukti" required style="width: 80%; text-align: center">
                            </div>
                        </div>
                        <div class="modal-footer">
                            <?php foreach ($data['dosen'] as $dosen): ?>
                                <input type="hidden" name="NIP" value="<?=$dosen['NIP']?>">
                            <?php endforeach; ?>
                            <button type="submit" class="btn btn-primary" id="button-save">Simpan</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
    function loadMahasiswa() {
        // Mendapatkan elemen dropdown kelas
        var kelasDropdown = document.getElementById("id_kelas");

        // Mendapatkan nilai yang dipilih dari dropdown kelas
        var selectedKelas = kelasDropdown.value;

        // Mendapatkan elemen dropdown mahasiswa
        var mahasiswaDropdown = document.getElementById("mahasiswa");

        // Menghapus opsi yang ada pada dropdown mahasiswa
        mahasiswaDropdown.innerHTML = "";

        // Simulasi data mahasiswa berdasarkan kelas (gantilah dengan data dinamis dari server)
        var mahasiswaData = getMahasiswaData();

        // Menambahkan opsi mahasiswa ke dropdown
        mahasiswaData.forEach(function(mahasiswa) {
            var option = document.createElement("option");
            if (mahasiswa.kelas === selectedKelas) {
                option.value = mahasiswa.NIM;
                option.text = mahasiswa.nama;
                mahasiswaDropdown.add(option);
            }
        });
    }

    function getMahasiswaData() {
        let data = [];

        data = [
        <?php
        foreach ($data['mahasiswa'] AS $mhs): ?>
            {NIM: <?=$mhs['NIM']?>, nama: "<?=$mhs['nama']?>", kelas: "<?=$mhs['kelas_id']?>"},
        <?php endforeach; ?>
        ];
        return data;
    }

    function loadPelanggaran() {
        // Mendapatkan elemen dropdown pelanggaran
        var tingkatDropdown = document.getElementById("tingkat");

        // Mendapatkan nilai yang dipilih dari dropdown pelanggaran
        var selectedTingkat = tingkatDropdown.value;
        console.log(selectedTingkat);

        // Mendapatkan elemen dropdown jenis
        var jenisDropdown = document.getElementById("jenis");

        // Menghapus opsi yang ada pada dropdown jenis
        jenisDropdown.innerHTML = "";

        // Simulasi data jenis berdasarkan pelanggaran (gantilah dengan data dinamis dari server)
        var jenisData = getJenisData();

        // Menambahkan opsi mahasiswa ke dropdown
        jenisData.forEach(function(jenis) {
            var option = document.createElement("option");
            if (jenis.tingkat === selectedTingkat) {
                option.value = jenis.no_jenis;
                option.text = jenis.jenis;
                jenisDropdown.add(option);
            }
        });

        var sanksiDropdown = document.getElementById("sanksi");

        sanksiDropdown.innerHTML = "";

        var sanksiData = getSanksiData();

        sanksiData.forEach(function(sanksi) {
            var option = document.createElement("option");
            if (sanksi.tingkat === selectedTingkat) {
                option.value = sanksi.no_sanksi;
                option.text = sanksi.sanksi;
                sanksiDropdown.add(option);
            }
        });
    }

    function getJenisData() {
        let data = [];

        data = [
        <?php
        foreach ($data['jenis'] AS $jenis): ?>
            {tingkat: "<?=$jenis['tingkatan']?>", no_jenis: <?=$jenis['no_jenis']?>, jenis: "<?=$jenis['jenis']?>"},
        <?php endforeach; ?>
        ];
        return data;
    }

    function getSanksiData() {
        let data = [];

        data = [
        <?php
        foreach ($data['sanksi'] AS $sanksi): ?>
            {tingkat: "<?=$sanksi['tingkatan']?>", no_sanksi: <?=$sanksi['no_sanksi']?>, sanksi: "<?=$sanksi['sanksi']?>"},
        <?php endforeach; ?>
        ];
        return data;
    }
</script>