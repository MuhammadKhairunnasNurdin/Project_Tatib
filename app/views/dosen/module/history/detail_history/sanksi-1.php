<style>
    .container-contents {
        width: 928px;
        flex-shrink: 0;
        justify-content: center;
        align-items: flex-start;
        background: rgba(255, 255, 255, 0.80);
        box-shadow: 0 4px 4px rgba(0, 0, 0, 0.25);
        border-radius: 25px;
        margin: auto;
        margin-top: 7%;
        padding: 15px;
    }

    .bold {
        font-weight: bold;
        text-decoration-line: none;
	    color: black;
    }

    .bold:hover {
	    color: black;
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

    .bold {
        margin-top: 55px;
    }

    .box-isi {
        margin-bottom: 40px;

    }

    .box-pelanggaran {
        background-color: white;
        width: 405px;
        height: 45px;
        border-radius: 8px;
        box-shadow: 0 4px 4px rgba(0, 0, 0, 0.25);
        text-align: center;
        margin-left: 220px;
        margin-top: -30px;
        padding: 0.8%;
    }
</style>
	<div class="container-contents">
		<div class="box-isi">
			<p>
			<h1 class="text-sanksi" style="margin-bottom: 15px;">
				<b style="color: black">Pelanggaran <?=$data['history']['pelanggaran_id']?></b>
			</h1>
		</div>
		<div class="box-isi">
			<a class="bold" style="margin-right: 60px;">Jenis Pelanggaran</a>:
			<a><?=$data['history']['jenis']?></a>
		</div>
		<div class="box-isi">
			<a class="bold" style="margin-right: 40px;">Tingkat Pelanggaran</a>:
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
			<div class="box-pelanggaran" >
				<a href=<?=BASEURL?>/img/storeImgUser/<?=$data['history']['bukti_pelanggaran']?>>Bukti Pelanggaran</a>
			</div>
		</div>
	</div>