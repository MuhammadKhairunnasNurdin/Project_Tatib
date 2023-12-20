<style>
    .logo-container {
        display: flex;
        align-items: center;

    }

    .logo-jenis-sanksi {
        width: 30px;
        /* Sesuaikan ukuran logo sesuai kebutuhan */
        height: auto;
        margin-right: 40px;
        font-size: 24px;
        margin-left: 40px;
        color: #363637;
        /* Sesuaikan jarak antara logo dan teks */
    }

    .Text-judul-sanksi {
        color: #403737;
        text-align: center;
        font-family: Anek Telugu;
        font-size: 32px;
        font-style: normal;
        font-weight: 600;
        line-height: normal;
        margin-top: 30px;
        /* Sesuaikan ukuran font sesuai kebutuhan */
    }

    table {

        width: 80%;

        border-collapse: collapse;
        margin: auto;
    }


    table,
    th,
    td {

        border: 1px solid black;

        padding: 8px;

        text-align: left;
        background-color: white;
    }


    th {

        background-color: #0D366B;
        color: white;
    }
    .container-contents {
        width: 928px;
        flex-shrink: 0;
        justify-content: center;
        align-items: flex-start;
        border-radius: 15px;
        background: rgba(255, 255, 255, 0.80);
        box-shadow: 0px 4px 4px rgba(0, 0, 0, 0.25);
        border-radius: 25px;
        margin: auto;
        margin-top: 15px;
        padding: 15px;
    }

    .cards {
        display: flex;
        justify-content: space-between;
        align-items: center;
        width: 100%;
        padding: 10px;
        border: 1px solid #ccc;
        gap: 10px;
        height: 45px;
        margin-top: 15px;
    }

    .bold {
        font-weight: bold;
    }

    .jarak {
        margin-top: 15px;
    }

    .text {
        margin-right: 10px;
    }

    .box-pelanggaran {
        background-color: white;
        width: 405px;
        height: 45px;
        border-radius: 8px;
        box-shadow: 0px 4px 4px rgba(0, 0, 0, 0.25);


    }

    .text-sanksi {
        color: white;
        text-decoration: none;
        font-family: Anek Telugu;
        font-size: 20px;
        font-style: normal;
        font-weight: 600;
        line-height: normal;
        margin: auto;
        width: 928px;
    }

    .text,
    .bold {
        margin-top: 55px;
    }

    .box-sanksi {
        margin-bottom: 12px;
    }

    .box-sanksi:hover {
        cursor: pointer;
    }

    .box-isi {
        margin-bottom: 40px;

    }

    .box-pelanggaran {

        text-align: center;
        margin-left: 220px;
        margin-top: -30px;
    }

    /* Tingkat 2 */
    .kirim-bukti {
        width: 129px;
        height: 51px;
        flex-shrink: 0;
        display: flex;
        justify-content: center;
        align-items: center;
        border-radius: 15px;
        background-color: #2EA62C;
        box-shadow: 0px 4px 4px 0px rgba(0, 0, 0, 0.25);
        margin: auto;
        transition: background-color 0.3s;
    }

    .kirim-bukti:hover {
        background-color: #298527;
    }

    .text-bukti {
        width: 126px;
        height: 39px;
        flex-shrink: 0;
        color: #FFF;
        font-family: Poppins;
        font-size: 20px;
        font-style: normal;
        font-weight: 600;
        line-height: normal;
        cursor: pointer;
        margin-top: 25px;
    }

    .posisi-bukti {
        margin-left: 200px;
    }

    /* tingkat 5,4,3 */
    .bold-file {
        display: flex;
        width: 336px;
        height: 65px;
        flex-direction: column;
        justify-content: center;
        flex-shrink: 0;
        color: #000;

        font-family: Poppins;
        font-size: 24px;
        font-style: normal;
        font-weight: 700;
        line-height: normal;
    }

    .download-bukti {
        font-family: Poppins;
        font-style: normal;
        font-weight: 1000000000000000;
        line-height: normal;
        color: white;

    }

    .kirim-file {
        border-radius: 15px;
        background: #0D366B;
        box-shadow: 6px 6px 4px 0px rgba(0, 0, 0, 0.25);
        font-size: 10px;
        cursor: pointer;
        margin-left: 40px;
    }

    .kirim-file:hover {

        background: #0B2950;
        box-shadow: 6px 6px 4px 0px rgba(0, 0, 0, 0.25);
        cursor: pointer;
    }
</style>

<div class="main">
    <div class="logo-container">
        <img class="logo-jenis-sanksi" src="<?=BASEURL?> /img/sanksi.svg" alt="Jenis Logo">
        <p class="Text-judul-sanksi">Sanksi</p>
    </div>


    <!-- Tingkat 2 -->
    <div class="container-contents">
        <div class="box-isi">
            <p>
            <h1 class="text-sanksi" style="margin-bottom: 15px;">
                <b style="color: black">Pelanggaran <?=$data['history']['pelanggaran_id']?></b>
            </h1>
        </div>
        <div class="box-isi">
            <a class="bold" style="margin-right: 60px;">Jenis Pelanggaran</a>:
            <a class="text"><?=$data['history']['jenis']?></a>

        </div>
        <div class="box-isi">
            <a class="bold" style="margin-right: 40px;">Tingkat Pelanggaran </a>:
            <a><?=$data['history']['pelanggaran_id']?></a>

        </div>
        <div class="box-isi">
            <a class="bold" style="margin-right: 49px;">Sanksi Pelanggaran</a>:
            <a><?=$data['history']['sanksi']?></a>
        </div>

        <div class="box-isi">
            <a class="bold" style="margin-right: 40px;">Tanggal Pelanggaran</a>:
            <a><?=$data['history']['tgl_pelanggaran']?></a>
        </div>

        <div class="box-isi">
            <a class="bold" style="margin-right: 45px; ">Bukti Pelanggaran * </a>:
            <div class="box-pelanggaran">
                <a href="<?=BASEURL?>/img/logo_jti_baru.png">Bukti Pelanggaran</a>
            </div>
        </div>

        <form action="<?=BASEURL?>/Mahasiswa/uploadKompensasi" method="post" enctype="multipart/form-data">
            <div class="box-isi">
                <a class="bold" style="margin-right: 45px; ">Bukti Kompensasi * </a>:
                <div class="box-pelanggaran">
                    <input type="file" name="kompensasi" accept=".jpg, .jpeg, .png, .gif" required>
                </div>
            </div>

            <div class="posisi-bukti">
                <button type="submit" class="kirim-bukti" name="id_hp" value="<?=$data['history']['id_hp']?>">
                    <h1 class="text-bukti">
                        Kirim Bukti
                    </h1>
                </button>
            </div>
        </form>

        </a>
    </div>
    </p>
</div>

