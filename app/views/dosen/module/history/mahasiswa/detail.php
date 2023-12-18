<style>
    .content {
        width: 100%;
        margin: auto;
        height: auto;
        margin-left: 100px;

    }

    .box-content {
        display: flex;
        width: 950px;
    }

    .box-pilihan {
        width: 100%;
        /* Menggunakan 100% untuk mengisi seluruh lebar box-content */
        padding: 20px;
        margin-right: 20px;
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

    #example thead th {
        background-color: #0D3278;
        color: white;
    }
</style>

<div class="main col-md-9 ms-sm-auto col-lg-10 px-md-4">
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
					<div class="card dosen-info">
						<div class="card-body">
							<h3 class="card-title">Kinata Dewa Ariandi</h3>
							<p class="card-text">2241720087</p>
							<p class="card-text">Status : <span class="status-active">Dosen DPA</span></p>
						</div>
					</div>
					<div class="box-pilihan">
						<div class="container-flex">
							<div class="box-mhs">
								<div class="text-mhs">
									<h3 class="mhs-title">Kinata Dewa Ariandi</h3>
								</div>
							</div>
						</div>
						<table id="example" class="table table-striped table-bordered"
						       style="width:100%; font-family:tirobangla">
							<thead>
							<tr>
								<th>No</th>
								<th>Jenis Pelanggaran</th>
								<th>Tingkat</th>
								<th>Tanggal</th>
								<th>Dosen Pelapor</th>
								<th>Rincian</th>
							</tr>
							</thead>
							<tbody>
							<tr>
								<td>1</td>
								<td>Mengotori atau mencoret-coret meja, kursi, tembok, dan lain-lain di lingkungan
									Polinema</td>
								<td>4</td>
								<td>25 Oktober 2024</td>
								<td>Sri Rahayu St.Mt</td>
								<td class="verifikasi-button">Verifikasi</td>
							</tr>
							<tr>
								<td>2</td>
								<td>Bermain kartu, game online di area kampus</td>
								<td>3</td>
								<td>Joko st.Mt</td>
								<td>02 November 2024</td>
								<td>Sanksi</td>
							</tr>
							</tbody>
						</table>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>