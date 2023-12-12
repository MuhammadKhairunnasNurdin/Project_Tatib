<?php

?>
<main class="col-md-9 ms-sm-auto col-lg-10 px-md-4" style="background-image: url(<?= BASEURL?>/img/gedung-jti.jpg); background-repeat: no-repeat; background-size:cover;">
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3">
        <h1 class="h2">Dosen</h1>
    </div>                
    <form action="<?=BASEURL?>/Admin/editDosen" method="POST">
        <?php foreach ($data['dosen'] AS $dosen): ?>
        <div class="row">
            <div class="col-sm-6">
                <div class="card" style="border: none;">
                    <div class="card-header bg-white title-form-dosen">
                        Form Edit Dosen
                    </div>
                <div class="card-body">
                    <div class="mb-2">
                        <label for="nip" class="form-label">NIP:</label>
                        <input type="text" name="nip" class="form-control" value="<?=$dosen['NIP']?>" required>
                    </div>
                    <div class="mb-2">
                        <label for="nama" class="form-label">Nama:</label>
                        <input type="text" name="nama" class="form-control" value="<?=$dosen['nama']?>" required>
                    </div>
                    <div class="mb-2">
                        <label for="tgl_lahir" class="form-label">Tanggal Lahir:</label>
                        <input type="date" name="ttl" class="form-control" value="<?=$dosen['tgl_lahir']?>" required>
                    </div>
                    <div class="mb-2">
                        <label for="jenis_kelamin" class="col-form-label">Jenis Kelamin:</label>
                        <br>
                        <div class="form-check form-check-inline">
                            <input type="radio" class="form-check-input" name="jenis_kelamin" value="L" required>
                            <label for="inlineRadio1" class="form-check-label">Laki-laki</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input type="radio" class="form-check-input" name="jenis_kelamin" value="P">
                            <label for="inlineRadio2" class="form-check-label">Perempuan</label>
                        </div>
                    </div>
                    <div class="mb-2">
                        <label for="alamat" class="form-label">Alamat</label>
                        <textarea type="text" name="alamat" class="form-control"></textarea>
                    </div>
                    <div class="mb-2">
                        <label for="no_telp" class="form-label">No Telepon</label>
                        <input type="number" name="no_telp" class="form-control" value="<?=$dosen['no_telp']?>">
                    </div>
                </div>
            </div>
        </div>
            <div class="col-sm-6">
                <div class="card" style="border: none;">
                    <div class="card-header bg-white title-form-dosen">
                        Form Edit Login Dosen
                    </div>
                    <div class="card-body ">
                        <div class="mb-2">
                            <label for="username" class="form-label">Username:</label>
                            <input type="text" name="username" class="form-control" value="<?=$dosen['username']?>">
                        </div>
                        <div class="mb-2">
                            <label for="password" class="form-label">Password</label>
                            <input type="password" name="password" class="form-control">
                            <div class="form-text">
                                Kosongi password, jika tidak ingin menggantinya
                            </div>
                        </div>
                        <div class="mb-2" style="text-align: center;">
                            <button class="btn btn-dark-blue" type="submit"><i class="fa fa-floppy-o" aria-hidden= 'true'></i>
                                Ubah
                            </button>
                            <a href="index.php?page=anggota" class="btn btn-danger"><i class="fa fa-times"></i>
                                Batal
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <?php endforeach; ?>
    </form>
</main>
