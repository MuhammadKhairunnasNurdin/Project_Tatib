<main class="col-md-9 ms-sm-auto col-lg-10 px-md-4" style="background-image: url(<?= BASEURL?>/img/gedung-jti.jpg); background-repeat: no-repeat; background-size:cover;">
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3">
        <h1 class="h2">Mahasiswa</h1>
    </div>                
    <form action="fungsi/edit.php?anggota=edit" class="form-mahasiswa" method="POST">
        <div class="row">
            <div class="col-sm-6" style="overflow: auto;">
                <div class="card" style="border:none">
                    <div class="card-header bg-white title-form-mahasiswa">
                        Form Add Mahasiswa
                    </div>
                <div class="card-body">
                    <div class="mb-2">
                        <label for="nip" class="form-label">NIM:</label>
                        <input type="text" name="nip" class="form-control">
                    </div>
                    <div class="mb-2">
                        <label for="nama" class="form-label">Nama:</label>
                        <input type="text" name="nama" class="form-control">
                    </div>
                    <div class="mb-2">
                        <label for="nama" class="form-label">Kelas:</label>
                        <input type="text" name="nama" class="form-control">
                    </div>
                    <div class="mb-2">
                        <label for="ttl" class="form-label">Tanggal Lahir:</label>
                        <input type="date" name="ttl" class="form-control">
                    </div>
                    <div class="mb-2">
                        <label for="recipient-name" class="col-form-label">Jenis Kelamin:</label>
                        <div class="form-check form-check-inline">
                            <input type="radio" class="form-check-input" name="jenis_kelamin">
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
                        <label for="recipient-name" class="form-label">No Telepon</label>
                        <input type="number" name="no_telp" class="form-control">
                    </div>
                </div>
            </div>
        </div>
            <div class="col-sm-6">
                <div class="card" style="border:none">
                    <div class="card-header title-form-mahasiswa">
                        Form Login Mahasiswa
                    </div>
                    <div class="card-body">
                        <div class="mb-2">
                            <label for="username" class="form-label">Username:</label>
                            <input type="text" name="username" class="form-control">
                        </div>
                        <div class="mb-2">
                            <label for="password" class="form-label">Password</label>
                            <input type="password" name="password" class="form-control">
                        </div>
                        <div class="mb-2" style="text-align: center;">
                            <button class="btn btn-dark-blue" type="submit"><i class="fa fa-floppy-o" aria-hidden= 'true'></i>
                                Submit
                            </button>
                            <button class="btn btn-danger"><i class="fa fa-times"></i>
                                Batal
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </form>
</main>
