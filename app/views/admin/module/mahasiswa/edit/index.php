<?php
?>
<main class="col-md-9 ms-sm-auto col-lg-10 px-md-4" style="background-image: url(<?= BASEURL?>/img/gedung-jti.jpg); background-repeat: no-repeat; background-size:cover;">
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3">
        <h1 class="h2">Mahasiswa</h1>
    </div>                
    <form action="<?=BASEURL?>/Admin/editMahasiswa" method="POST">
	    <?php foreach ($data['mahasiswa'] AS $mhs): ?>
        <div class="row">
            <div class="col-sm-6">
                <div class="card" style="border: none;">
                    <div class="card-header bg-white title-form-mahasiswa">
                        Form Edit Mahasiswa
                    </div>
                <div class="card-body">
                    <div class="mb-2">
                        <label for="nip" class="form-label">NIM:</label>
                        <input type="text" name="nip" class="form-control" value="<?=$mhs['NIM']?>">
                    </div>
                    <div class="mb-2">
                        <label for="nama" class="form-label">Nama:</label>
                        <input type="text" name="nama" class="form-control" value="<?=$mhs['nama']?>">
                    </div>
                    <div class="mb-2">
                        <label for="kelas" class="form-label">Kelas:</label>
                        <select name="kelas_id" id="kelas" required>
                            <option value=<?=$mhs['kelas_id']?> selected><?=$mhs['kelas']?></option>
		                    <?php foreach ($data['kelas'] as $kls) :?>
                                <?php if ($kls['id_kelas'] == $mhs['kelas_id']) {
                                    continue;
                                } else { ?>
                                <option value="<?=$kls['id_kelas']?>"><?=$kls['nama']?></option>
                                <?php } ?>
		                    <?php endforeach; ?>
                        </select>
                    </div>
                    <div class="mb-2">
                        <label for="tgl_lahir" class="form-label">Tanggal Lahir:</label>
                        <input type="date" name="tgl_lahir" class="form-control" value="<?=$mhs['tgl_lahir']?>">
                    </div>
                    <div class="mb-2">
                        <label for="jenis_kelamin" class="col-form-label">Jenis Kelamin:</label>
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
                        <textarea type="text" name="alamat" class="form-control" value="<?=$mhs['alamat']?>"></textarea>
                    </div>
                    <div class="mb-2">
                        <label for="no_telp" class="form-label">No Telepon</label>
                        <input type="number" name="no_telp" class="form-control" value="<?=$mhs['no_telp']?>">
                    </div>
                </div>
            </div>
        </div>
            <div class="col-sm-6">
                <div class="card" style="border: none;">
                    <div class="card-header bg-white  title-form-mahasiswa">
                        Form Edit Login Mahasiswa
                    </div>
                    <div class="card-body">
                        <div class="mb-3">
                            <label for="username" class="form-label">Username:</label>
                            <input type="text" name="username" class="form-control" value="<?=$mhs['username']?>">
                        </div>
                        <div class="mb-3">
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
                            <a href="<?=BASEURL?>/Admin/pageMahasiswa" class="btn btn-danger"><i class="fa fa-times"></i>
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