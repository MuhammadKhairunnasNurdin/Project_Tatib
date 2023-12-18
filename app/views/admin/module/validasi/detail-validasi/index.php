            <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4" style="background-image: url(<?=BASEURL?>/img/gedung-jti.jpg); background-repeat: no-repeat; background-size: cover; ">
                <div class="d-flex bg-white rounded my-2">
                    <img src="" alt="">
                    <h1 class="h3 m-3" style="color:#0D366B">Validasi</h1>
                </div>
                <div class="bg-white rounded p-3 border-top border-3 border-biru-tua mb-1">
                    <h1 class="h4">Rincian Pelanggaran</h1>
                    <div class="row">
                        <div class="col-3">
                            <h1 class="h6">NAMA</h1>
                            <h1 class="h6">NIM</h1>
                            <h1 class="h6">KELAS</h1>
                            <h1 class="h6">TINGKAT PELANGGARAN</h1>
                            <h1 class="h6">JENIS PELANGGARAN</h1>
                            <h1 class="h6">SANKSI</h1>
                            <h1 class="h6">TANGGAL</h1>
                            <h1 class="h6">KOMPENSASI</h1>
                        </div>
                        <div class="col-1 p-0 sm">
                            <h1 class="h6">:</h1>
                            <h1 class="h6">:</h1>
                            <h1 class="h6">:</h1>
                            <h1 class="h6">:</h1>
                            <h1 class="h6">:</h1>
                            <h1 class="h6">:</h1>
                            <h1 class="h6">:</h1>
                            <h1 class="h6">:</h1>
                        </div>
                        <div class="col-8 text-align-start">
                            <h1 class="h6"><?=$data['validasi']['nama']?></h1>
                            <h1 class="h6"><?=$data['validasi']['NIM']?></h1>
                            <h1 class="h6"><?=$data['validasi']['kelas']?></h1>
                            <h1 class="h6"><?=$data['validasi']['pelanggaran_id']?></h1>
                            <h1 class="h6"><?=$data['validasi']['jenis']?></h1>
                            <h1 class="h6"><?=$data['validasi']['sanksi']?></h1>
                            <h1 class="h6"><?=$data['validasi']['tgl_pelanggaran']?></h1>
                            <a href="">Bukti Kompen</a>
                            <div class="" style="display: flex; gap: 10px">
                                <form action="<?=BASEURL?>/Admin/validate" method="post">
                                    <button type="submit" name="id_hp" value="<?=$data['validasi']['id_hp']?>" class="btn btn-success">Validasi</button>
                                </form>
                                <form action="<?=BASEURL?>/Admin/rejectValidation" method="post">
                                    <button type="submit" name="id_hp" value="<?=$data['validasi']['id_hp']?>" class="btn btn-danger">Tolak</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                
            </main>
        </div>
    </div>