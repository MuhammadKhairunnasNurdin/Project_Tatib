
            <main  class="col-md-9 ms-sm-auto col-lg-10 px-md-4" style="background-image: url(<?= BASEURL?>/img/gedung-jti.jpg); background-repeat: no-repeat; background-size: cover; ">
                <div class="validasi-box d-flex bg-white rounded my-2">
                        <img class="ms-2 ps-2" src="<?= BASEURL?>/img/validasi_logo.svg" alt="">    
                        <h1 class="h3 mx-3 my-3" style="color:#0D366B">Validasi</h1>
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
                            $no = 1;
                            // query....
                            // connection database
                            // $query = "SELECT * FROM jabatan order by id desc";
                            // $result = mysqli_query($koneksi, $query);
                            // while ($row = mysqli_fetch_assoc($result)) {
                            ?>
                            <tr class="p-1 inline align-middle" >
                                <td class="col-1"><?= $no++;?></td>
                                <!-- nama -->
                                <td class="col-3" >Halur Muhammad Abiyyu 
                                    <!-- <?=$row ['nama']?> -->
                                </td>
                                <!-- kelas -->
                                <td class="col-1" >TI 2E
                                    <!-- <?=$row ['kelas']?> -->
                                </td>
                                <td class="col-3" >Tingkat 5
                                    <!-- <?=$row ['tingkat_pelanggaran']?> -->
                                </td>
                                <td class="col-2" >2023-12-01
                                    <!-- <?=$row ['tanggal']?> -->
                                </td>
                                <td class="col-2">
                                    <form action="<?= BASEURL?>/Admin/module" method="POST">
                                    <button class="btn btn-dark-blue" name="page" value="validasi/detail-validasi">CEK DETAIL</button>
                                    </form>
<!--                                    <a href="detail-validasi/detail-validasi.php" class=" m-auto btn btn-dark-blue text-white">-->
<!--                                        CEK DETAIL-->
<!--                                    </a>-->
                                </td>
                            </tr>
                            <!-- <?
                            // }
                            ?> -->
                        </tbody>
                    </table>
                </div>
            </main>
       