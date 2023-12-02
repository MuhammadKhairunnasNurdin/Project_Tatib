
<div class="container-page">
    <div class="row">
    <?php
    require "../../template/menu.php"
    ?>
    <main class="main col-md-9 ms-sm-auto col-lg-10 px-md-4">
        <div class="daftar-dosen-box">
            <div class="box-title-daftar-dosen">
                <div class="title-page-daftar-dosen">
                    <img src="<?= BASEURL?>/img/dosen_logo.svg" class="logo-dosen-title" alt="">
                    <h1 class="h2"><img class="logo-dosen-page">Daftar Dosen</h1>
                </div>
                <div class="button-add">
                     <a href="" class="add">ADD</a>
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
        <br>
    </main>
    </div>
</div>

