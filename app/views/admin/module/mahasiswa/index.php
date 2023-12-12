    <main class="main col-md-9 ms-sm-auto col-lg-10 px-md-4">
        <div class="daftar-mhs-box">
            <div class="box-title-daftar-mhs">
                <div class="title-page-daftar-mhs">
                    <img src="<?= BASEURL?> /img/mahasiswa_logo.svg" class="logo-mhs-title" alt="">
                    <h1 class="h2">Daftar Mahasiswa</h1>
                </div>
	            <?php
                    if (isset($_SESSION["flashMessage"])) {
                        echo($_SESSION["flashMessage"]);
                        unset($_SESSION["flashMessage"]);
                    }
	            ?>
                <div class="button-add">
                        <a href="<?=BASEURL?>/Admin/pageAddMahasiswa" type="submit" name="page" value="mahasiswa/add" class="btn btn-success">
                            <i class="fa fa-plus"></i>ADD
                        </a>
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
                        <?php foreach ($data['mahasiswa'] as $mhs) :?>
                            <tr class="tbody">
                                <td><?= $mhs['NIM']?></td>
                                <td><?= $mhs['nama']?></td>
                                <td><?= $mhs['kelas']?></td>
                                <td><?= $mhs['no_telp']?></td>
                                <td><?= $mhs['jenis_kelamin']?></td>
                                <td>
                                    <div class="button-UD d-flex">
                                        <form action="<?= BASEURL ?>/Admin/editMahasiswaPage" method="POST">
                                            <button type="submit" name="NIM" value="<?= $mhs['NIM'] ?>"
                                                    class="btn edit-mahasiswa btn-dark-blue">EDIT
                                            </button>
                                        </form>
                                        <form action="<?= BASEURL ?>/Admin/pageMahasiswa" method="post">
                                            <button class="btn ms-1 delete-dosen bg-danger"
                                                    onclick="confirm('Hapus Data mahasiswa?');">DELETE
                                            </button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
        <br>
    </main>

