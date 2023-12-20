            <main  class="col-md-9 ms-sm-auto col-lg-10 px-md-4" style="background-image: url(<?= BASEURL?>/img/gedung-jti.jpg); background-repeat: no-repeat; background-size: cover; ">
                <div class="validasi-box d-flex bg-white rounded my-2">
                        <img class="ms-2 ps-2" src="<?= BASEURL?>/img/validasi_logo.svg" alt="">    
                        <h1 class="h3 mx-3 my-3" style="color:#0D366B">Validasi</h1>
                    <?php if (isset($_SESSION['flashMessage']['validate'])) {
                        echo $_SESSION['flashMessage']['validate'];
                        unset($_SESSION['flashMessage']['validate']);
                    }?>
                </div>
                <br>
                <div class="daftar-validasi table-responsive medium bdr-dark-blue rounded border-top border-bottom border-3 mb-1">
                    <table class="table m-0">
                        <thead class="bdr-dark-blue border-bottom border-3 border-0">
                            <tr class="p-1 inline align-middle">
                                <th class="col-1">NO.</th>
                                <th class="col-3">NAMA</th>
                                <th class="col-1">KELAS</th>
                                <th class="col-3">TINGKAT PELANGGARAN</th>
                                <th class="col-2">TANGGAL</th>
                                <th class="col-2" >RINCIAN PELANGGARAN</th>
                            </tr>
                        </thead>
                        <tbody class="" >
                            <?php
                                $id = 1;
                                foreach ($data['validasi'] AS $vld):
                                if ($vld['status'] === "proses validasi") {
                            ?>
                            <tr class="p-1 inline align-middle" >
                                <td class="col-1"><?=$id?></td>
                                <!-- nama -->
                                <td class="col-3" >
                                     <?=$vld['nama']?>
                                </td>
                                <!-- kelas -->
                                <td class="col-1" >
                                     <?=$vld['kelas']?>
                                </td>
                                <td class="col-3" >
                                     <?=$vld['pelanggaran_id']?>
                                </td>
                                <td class="col-2" >
                                     <?=$vld['tgl_penyelesaian']?>
                                </td>
                                <td class="col-2">
                                    <form action="<?=BASEURL?>/Admin/pageDetailValidasi" method="post">
                                        <button class="btn btn-dark-blue" name="id_hp" value="<?=$vld['id_hp']?>">CEK DETAIL</button>
                                    </form>
                                </td>
                            </tr>
                            <?php $id++; } endforeach; ?>
                        </tbody>
                    </table>
                </div>
            </main>
       