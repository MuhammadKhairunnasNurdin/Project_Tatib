/
    <main class="main col-md-9 ms-sm-auto col-lg-10 px-md-4">
        <div class="daftar-mhs-box">
            <div class="box-title-daftar-mhs">
                <div class="title-page-daftar-mhs">
                    <img src="<?= BASEURL?> /img/mahasiswa_logo.svg" class="logo-mhs-title" alt="">
                    <h1 class="h2">Daftar Mahasiswa</h1>
                </div>
                <div class="button-add">
                    <button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#exampleModal" data-bs-whatever="@mdo">
                        <i class="fa fa-plus"></i>ADD
                    </button>
                </div>
            </div>
        </div>
        <br>
        <div class="content">
            <div class="box-content-daftar-mhs">
                <table class="table-mhs">
                    <tbody>
                        <tr class="thead">
                            <th class="nip">NIM</th>
                            <th class="nama">NAMA</th>
                            <th class="alamat">KELAS</th>
                            <th class="notelp">NO. TELP</th>
                            <th class="dpa" >JENIS KELAMIN</th>
                            <th class="aksi" >AKSI</th>
                        </tr>
                        <tr class="tbody">
                            <td>2341720072</td>
                            <td>Halur Muhammad Abiyyu</td>
                            <td>TI 2E</td>
                            <td>0892345212</td>
                            <td>Laki-laki</td>
                            <td>
                            <div class="button-UD">
                                <form action="<?= BASEURL?>/Admin/module" method="POST">
                                    <button name="page" value="mahasiswa/edit" class="btn edit-mahasiswa btn-dark-blue">EDIT</button>
                                    <button class="btn delete-mahasiswa bg-danger">DELETE</button>
                                </form>
                            </div>
                        </td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <div class="modal" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="exampleModalLabel">Tambah Mahasiswa</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="close"></button>
                    </div>
                    <form action="" method="POST">
                        <div class="modal-body">
                            <div class="mb-3">
                                <label for="recipient-name" class="col-form-label">NIM:</label>
                                <input type="text" name="nip" class="form-control" id="recipient-name">
                            </div>
                            <div class="mb-3">
                                <label for="recipient-name" class="col-form-label">Nama:</label>
                                <input type="text" name="nama" class="form-control" id="recipient-name">
                            </div>
                            <div class="mb-3">
                                <label for="recipient-name" class="col-form-label">Kelas:</label>
                                <input type="text" name="nama" class="form-control" id="recipient-name">
                            </div>
                            <div class="mb-3">
                                <label for="recipient-name" class="col-form-label">Tanggal Lahir:</label>
                                <input type="text" class="form-control" id="datepicker">
                            </div>
                            <div class="mb-3">
                                <label for="recipient-name" class="col-form-label">Jenis Kelamin:</label>
                                <br>
                                <div class="form-check form-check-inline">
                                    <input type="radio" class="form-check-input" name="jenis_kelamin" value="L" checked>
                                    <label for="inlineRadio1" class="form-check-label">Laki-laki</label>;
                                </div>
                                <div class="form-check form-check-inline">
                                    <input type="radio" class="form-check-input" name="jenis_kelamin" value="P" >
                                    <label for="inlineRadio2" class="form-check-label">Perempuan</label>;
                                </div>
                            </div>
                            <div class="mb-3">
                                <label for="alamat" class="form-label">Alamat</label>
                                <textarea type="text" name="alamat" class="form-control"></textarea>
                            </div>
                            <div class="mb-3">
                                <label for="recipient-name" class="form-label">No Telepon</label>
                                <input type="number" name="no_telp" class="form-control" id="recipient-name">
                            </div>
                            <hr class="border border-primary border-3 opacity-75">
                            <div class="mb-3">
                                <label for="recipient-name" class="form-label">Username:</label>
                                <input type="text" name="username" class="form-control" id="recipient-name">
                            </div>
                            <div class="mb-3">
                                <label for="recipient-name" class="form-label">Password</label>
                                <input type="password" name="password" class="form-control" id="recipient-name">
                            </div>
                            <div class="mb-3">
                                <label for="recipient-name" class="col-form-label">Level:</label>
                                <select name="level" name aria-label="Default select example" class="form-select">
                                    <option selected>Pilih Level</option>
                                    <option value="user">User</option>
                                    <option value="admin">Admin</option>
                                </select>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal"><i class="fa fa-times" aria-hidden="true"></i> Close</button>
                            <button type="submit" class="btn btn-primary"><i class="fa fa-floppy-o" aria-hidden="true"></i> Simpan</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        </div>
        <br>
    </main>

