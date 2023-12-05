
<main class="main col-md-9 ms-sm-auto col-lg-10 px-md-4">
    <div class="daftar-dosen-box">
        <div class="box-title-daftar-dosen">
            <div class="title-page-daftar-dosen">
                <img src="<?= BASEURL?>/img/dosen_logo.svg" class="logo-dosen-title" alt="">
                <h1 class="h2">Daftar Dosen</h1>
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
        <div class="box-content-daftar-dosen">
            <table class="table-dosen">
                <tbody>
                    <tr class="thead">
                        <th class="nip">NIP</th>
                        <th class="nama">NAMA</th>
                        <th class="alamat">ALAMAT</th>
                        <th class="notelp">NO. TELP</th>
                        <th class="dpa">DPA</th>
                        <th class="aksi">AKSI</th>
                    </tr>
                    <tr class="tbody">
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="exampleModalLabel">Form Dosen</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="close"></button>
                    </div>
                    <form action="" method="POST">
                        <div class="modal-body">
                            <div class="mb-3">
                                <label for="recipient-name" class="col-form-label">NIP:</label>
                                <input type="text" name="nip" class="form-control" id="recipient-name">
                            </div>
                            <div class="mb-3">
                                <label for="recipient-name" class="col-form-label">Nama:</label>
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
<!--        <br>-->
</main>
<link rel="stylesheet" href="//code.jquery.com/ui/1.13.2/themes/base/jquery-ui.css">
<script src="https://code.jquery.com/jquery-3.6.0.js"></script>
  <script src="https://code.jquery.com/ui/1.13.2/jquery-ui.js"></script>
<script>
    $( function() {
        $( "#datepicker").datepicker();
    } );
</script>