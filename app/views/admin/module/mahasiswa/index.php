    <main class="main col-md-9 ms-sm-auto col-lg-10 px-md-4">
        <div class="daftar-mhs-box">
            <div class="box-title-daftar-mhs">
                <div class="title-page-daftar-mhs">
                    <img src="<?= BASEURL?> /img/mahasiswa_logo.svg" class="logo-mhs-title" alt="">
                    <h1 class="h2">Daftar Mahasiswa</h1>
                </div>
                <div class="button-add">
                    <form action="<?= BASEURL?>/Admin/module" method="POST">
                        <button type="submit" name="page" value="mahasiswa/add" class="btn btn-success">
                            <i class="fa fa-plus"></i>ADD
                        </button>
                    </form>
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
                        <?php foreach ($data['user'] as $mhs) :?>
                            <tr class="tbody">
                                <td><?= $mhs['NIM']?></td>
                                <td><?= $mhs['nama']?></td>
                                <td><?= $mhs['kelas']?></td>
                                <td><?= $mhs['no_telp']?></td>
                                <td><?= $mhs['jenis_kelamin']?></td>
                                <td>
                                    <div class="button-UD d-flex">
                                        <form action="<?= BASEURL?>/Admin/module" method="POST">
                                            <button name="page" value="mahasiswa/edit" class="btn edit-mahasiswa btn-dark-blue">EDIT</button>
                                        </form>
                                        <button class="btn ms-1 delete-dosen bg-danger" onclick="javascript:return confirm('Hapus Data mahasiswa?');">DELETE</button>
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

