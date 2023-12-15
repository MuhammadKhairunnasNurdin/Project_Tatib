
<main class="main col-md-9 ms-sm-auto col-lg-10 px-md-auto">

    <div class="daftar-dosen-box">
        <div class="box-title-daftar-dosen">
            <div class="title-page-daftar-dosen">
                <img src="<?= BASEURL?>/img/dosen_logo.svg" class="logo-dosen-title" alt="">
                <h1 class="h2">Daftar Dosen</h1>
            </div>
            <?php
                if (isset($_SESSION["flashMessage"]["dosen"])) {
                    echo($_SESSION["flashMessage"]["dosen"]);
                    unset($_SESSION["flashMessage"]["dosen"]);
                }
            ?>
            <div class="button-add">
                <a href="<?=BASEURL?>/Admin/pageAddDosen" type="submit" class="btn btn-success">
                    <i class="fa fa-plus"></i>ADD
                </a>
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

                <?php foreach ($data['dosen'] as $dosen) :?>
                    <tr class="tbody">
                        <td><?=$dosen['NIP']?></td>
                        <td><?=$dosen['nama']?></td>
                        <td><?=$dosen['alamat']?></td>
                        <td><?=$dosen['no_telp']?></td>
                        <td>
                            <?php if (!isset($dosen['kelas']))
                            {
                                echo "bukan DPA";
                            } else {
                            echo $dosen['kelas'];
                            }
                            ?>
                        </td>
                        <td>
                            <div class="button-UD d-flex">
                                <form action="<?= BASEURL ?>/Admin/editDosenPage" method="POST">
                                    <button type="submit" name="NIP" value="<?= $dosen['NIP'] ?>"
                                            class="btn edit-dosen btn-dark-blue">EDIT
                                    </button>
                                </form>
                                <button type="button" id="delete" class="btn ms-1 delete-dosen bg-danger"
                                        onclick="openPopup(event)" value="<?= $dosen['NIP']?>">DELETE
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
            <h2>HAPUS DOSEN</h2>
	        <?php if (isset($dosen['kelas'])) { ?>
                <p>Dosen ini merupakan DPA dari kelas <?=$dosen['kelas']?></p>
	        <?php } ?>
            <p>Apakah anda yakin ingin menghapus dosen ini dari daftar?</p>
            <div class="d-flex justify-content-end">
                <form action="<?=BASEURL?>/Admin/deleteUser" method="post">
                    <input type="hidden" name="userLevel" value="dosen">
                    <input type="hidden" name="idName" value="NIP">
                    <button type="submit" id="idData" name="idData" class="me-2 btn btn-success">Ya</button>
                </form>
                <button class="btn btn-danger">Batal</button>
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

