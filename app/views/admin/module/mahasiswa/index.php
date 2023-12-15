    <main class="main col-md-9 ms-sm-auto col-lg-10 px-md-4">
        <div class="daftar-mhs-box">
            <div class="box-title-daftar-mhs">
                <div class="title-page-daftar-mhs">
                    <img src="<?= BASEURL?> /img/mahasiswa_logo.svg" class="logo-mhs-title" alt="">
                    <h1 class="h2">Daftar Mahasiswa</h1>
                </div>
                <?php
                    if (isset($_SESSION["flashMessage"]["mahasiswa"])) {
                        echo($_SESSION["flashMessage"]["mahasiswa"]);
                        unset($_SESSION["flashMessage"]["mahasiswa"]);
                    }
                ?>
                <div class="button-add">
                        <a href="<?=BASEURL?>/Admin/pageAddMahasiswa" type="submit" class="btn btn-success">
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
                                            <button type="submit" name="NIM" value="<?= $mhs['NIM']?>"
                                                    class="btn edit-mahasiswa btn-dark-blue">EDIT
                                            </button>
                                        </form>
                                        <button type="button" id="delete" class="btn ms-1 delete-dosen bg-danger"
                                                onclick="openPopup(event)" value="<?= $mhs['NIM']?>">DELETE
                                        </button>
                                    </div>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
            <div class="overlay" id="overlay"></div>
            <div class="popup" id="popup">
                <span class="popup-close" onclick="closePopup()">×</span>
                <h2>HAPUS MAHASISWA</h2>
                <p>Apakah anda yakin ingin menghapus mahasiswa ini dari daftar?</p>
                <div class="d-flex justify-content-end">
                    <form action="<?=BASEURL?>/Admin/deleteUser" method="post">
                        <input type="hidden" name="userLevel" value="mahasiswa">
                        <input type="hidden" name="idName" value="NIM">
                        <button type="submit" id="idData" name="idData" class="me-2 btn btn-success">Ya</button>
                    </form>
                    <button class="btn btn-danger">Batal</button>
                </div>
            </div>
        </div>

        <script>
            var valueNIM = "";

            function saveValue(button) {
                valueNIM = button.value;
                console.log(valueNIM);

                var deleteButton = document.getElementById("idData");
                deleteButton.value = valueNIM;
            }

            function openPopup(event) {
                saveValue(event.target);
                document.getElementById('overlay').classList.add('active');
                document.getElementById('popup').classList.add('active');
            }

            function closePopup() {
                document.getElementById('overlay').classList.remove('active');
                document.getElementById('popup').classList.remove('active');
            }
        </script>
    </main>

