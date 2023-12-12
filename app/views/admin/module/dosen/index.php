
<main class="main col-md-9 ms-sm-auto col-lg-10 px-md-4">
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
                <a href="<?=BASEURL?>/Admin/pageAddDosen" name="page" value="dosen/add" type="submit" class="btn btn-success">
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
                            <?php
                                if (!isset($dosen['kelas']))
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
                                <form action="<?= BASEURL ?>/Admin/pageDosen" method="post">
                                    <button class="btn ms-1 delete-dosen bg-danger"
                                            onclick="confirm('Hapus Data Dosen?');">DELETE
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
</main>

