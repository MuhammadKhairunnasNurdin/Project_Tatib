<style>
    body {
        font-family: Arial, sans-serif;
    }

    h1 {
        font-family: Arial, sans-serif;
        font-size: 24px;
        margin-top: 45px;
        margin-left: 40px;
        color: #363637;
    }

    .border-tatib {
        display: flex;
        flex-direction: column;
        align-items: center;
        width: 1029px;
        height: 628px;
        padding: 10px;
        margin: auto;
        border-radius: 25px;
        background: rgba(255, 255, 255, 0.80);
        box-shadow: 0px 4px 4px 0px rgba(0, 0, 0, 0.25);
    }

    .box-tatib {
        display: flex;
        width: 750px;
        height: 75px;
        flex-shrink: 0;
        background-color: white;
        padding: 10px;
        margin-top: 30px;
        justify-content: space-between;
        border-radius: 15px;
        background: #FFF;
        box-shadow: 0px 4px 4px 0px rgba(0, 0, 0, 0.25);
    }

    .text-tatib {
        text-align: left;
        color: #0C356A;
        font-size: 32px;
        font-family: Anek Telugu;
        font-weight: 600;
        word-wrap: break-;
        margin-top: 30px;
        top: 30px;
    }

    .pelanggaran {
        width: 90%;
        height: 100%;
        color: #494B4B;
        font-size: 20px;
        font-family: Anek Telugu;
        font-weight: 600;
        margin-top: 30px;
    }

    .logo-jenis-tatib {
        width: 30px;
        /* Sesuaikan ukuran logo sesuai kebutuhan */
        height: auto;
        margin-right: 40px;
        font-size: 24px;
        margin-left: 40px;
        color: #363637;
        /* Sesuaikan jarak antara logo dan teks */
    }

    .Text-judul {
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
</style>
<main class="main">
    <div class="logo-container">
        <img class="logo-jenis-tatib" src="<?= BASEURL ?>/img/jenis.svg" alt="Jenis Logo">
        <p class="Text-judul">Tata Tertib Mahasiswa</p>
    </div>
    <div class="border-tatib">
        <h1 class="text-tatib">
            <?=$data['tingkatan']?>
        </h1>
        </a>
        <div class="pelanggaran">
	        <?php $id = 1;
	        foreach ($data['jenis'] as $elm) :?>
            <li>
	            <?=$elm['jenis']?>
            </li>
	        <?php $id++; endforeach;?>
        </div>
    </div>
</main>
</div>
</div>