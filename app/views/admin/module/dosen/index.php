
<main class="main col-md-9 ms-sm-auto col-lg-10 px-md-4">
    <div class="daftar-dosen-box">
        <div class="box-title-daftar-dosen">
            <div class="title-page-daftar-dosen">
                <img src="<?= BASEURL?>/img/dosen_logo.svg" class="logo-dosen-title" alt="">
                <h1 class="h2">Daftar Dosen</h1>
            </div>
            <div class="button-add">
                <form action="<?= BASEURL?>/Admin/Module" method="POST">
                    <button name="page" value="dosen/add" type="submit" class="btn btn-success">
                        <i class="fa fa-plus"></i>ADD
                    </button>
                </form>
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
                        <td>10303459234534</td>
                        <td>Elok Nur Hamdana, S.T., M.T.</td>
                        <td>Lowokwaru, Malang</td>
                        <td>085655104757</td>
                        <td>TI - 3F</td>
                        <td>
                            <div class="button-UD d-flex">
                                <form action="<?= BASEURL?>/Admin/module" method="POST">
                                    <button name="page" value="dosen/edit" class="btn edit-dosen btn-dark-blue">EDIT</button>
                                </form>
                                <button class="btn ms-1 delete-dosen bg-danger" onclick="javascript:return confirm('Hapus Data Jabatan ?');">DELETE</button>
                            </div>
                        </td>
                    </tr>
                </tbody>
            </table>
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