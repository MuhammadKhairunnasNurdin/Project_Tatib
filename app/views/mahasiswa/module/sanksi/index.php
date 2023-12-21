<style>
    /* table {
        width: 80%;
        border-collapse: collapse;
        margin: auto;
    }

    table,
    th,
    td {
        border: 1px solid black;
        padding: 8px;
        text-align: left;
        background-color: white;
    }

    th {
        background-color: #0D366B;
        color: white;
    } */

    /* .box-sanksi {
        width: 125px;
        height: 39px;
        display: flex;
        justify-content: center;
        align-items: center;
        border-radius: 15px;
        background-color: #2059A2;
        box-shadow: 0px 4px 4px 0px rgba(0, 0, 0, 0.25);
        margin: auto;
        transition: background-color 0.3s;
    }

    .box-sanksi:hover {
        background-color: #0B2A53;
    } */

    /* tingkat 1,2,3,4,5 */
    body {
        font-family: Arial, sans-serif;
        margin: 0;
        padding: 0;
    }

    .logo-container {
        display: flex;
        align-items: center;
    }

    .logo-jenis-sanksi {
        width: 30px;
        height: auto;
        margin-right: 40px;
        font-size: 24px;
        margin-left: 40px;
        color: #363637;
    }

    .Text-judul-sanksi {
        color: #403737;
        text-align: center;
        font-family: Anek Telugu;
        font-size: 32px;
        font-weight: 600;
        margin-top: 30px;
    }

    .container-contents {
        width: 928px;
        flex-shrink: 0;
        justify-content: center;
        align-items: flex-start;
        border-radius: 15px;
        background: rgba(255, 255, 255, 0.80);
        box-shadow: 0px 4px 4px rgba(0, 0, 0, 0.25);
        border-radius: 25px;
        margin: auto;
        margin-top: 15px;
        padding: 15px;
    }

    .cards {
        display: flex;
        justify-content: space-between;
        align-items: center;
        width: 100%;
        padding: 10px;
        border: 1px solid #ccc;
        gap: 10px;
        height: 45px;
        margin-top: 15px;
    }

    .bold {
        font-weight: bold;
    }

    .jarak {
        margin-top: 15px;
    }

    .text {
        margin-right: 10px;
    }

    .box-pelanggaran {
        background-color: white;
        width: 405px;
        height: 45px;
        border-radius: 8px;
        box-shadow: 0px 4px 4px rgba(0, 0, 0, 0.25);


    }

    .text-sanksi {
        color: white;
        text-decoration: none;
        font-family: Anek Telugu;
        font-size: 20px;
        font-style: normal;
        font-weight: 600;
        line-height: normal;
        margin: auto;
        width: 928px;
    }

    .text,
    .bold {
        margin-top: 55px;
    }

    .box-sanksi {
        margin-bottom: 12px;
        color: white;
        font-size: 20px;
    }

    .box-sanksi:hover {
        cursor: pointer;
    }

    .box-isi {
        margin-bottom: 40px;

    }

    .box-pelanggaran {

        text-align: center;
        margin-left: 220px;
        margin-top: -30px;
    }

    /* Tingkat 2 */
    .kirim-bukti {
        width: 129px;
        height: 51px;
        flex-shrink: 0;
        display: flex;
        justify-content: center;
        align-items: center;
        border-radius: 15px;
        background-color: #2EA62C;
        box-shadow: 0px 4px 4px 0px rgba(0, 0, 0, 0.25);
        margin: auto;
        transition: background-color 0.3s;
    }

    .kirim-bukti:hover {
        background-color: #298527;
    }

    .text-bukti {
        width: 126px;
        height: 39px;
        flex-shrink: 0;
        color: #FFF;
        font-family: Poppins;
        font-size: 20px;
        font-style: normal;
        font-weight: 600;
        line-height: normal;
        cursor: pointer;
        margin-top: 25px;
    }

    .posisi-bukti {
        margin-left: 200px;
    }

    /* tingkat 5,4,3 */
    .bold-file {
        display: flex;
        width: 336px;
        height: 65px;
        flex-direction: column;
        justify-content: center;
        flex-shrink: 0;
        color: #000;

        font-family: Poppins;
        font-size: 24px;
        font-style: normal;
        font-weight: 700;
        line-height: normal;
    }

    .download-bukti {
        font-family: Poppins;
        font-style: normal;
        font-weight: 1000000000000000;
        line-height: normal;
        color: white;

    }

    .kirim-file {
        border-radius: 15px;
        background: #0D366B;
        box-shadow: 6px 6px 4px 0px rgba(0, 0, 0, 0.25);
        font-size: 10px;
        cursor: pointer;
        margin-left: 40px;
    }

    .kirim-file:hover {

        background: #0B2950;
        box-shadow: 6px 6px 4px 0px rgba(0, 0, 0, 0.25);
        cursor: pointer;
    }
</style>


<body>
    <div class="main">
        <div class="logo-container">
            <img class="logo-jenis-sanksi" src="<?= BASEURL ?>/img/sanksi.svg" alt="Jenis Logo">
                <p class="Text-judul-sanksi">Sanksi</p>
            <?php if (isset($_SESSION['flashMessage']['upload'])) {
                echo $_SESSION['flashMessage']['upload'];
                unset($_SESSION['flashMessage']['upload']);
            } ?>
        </div>
        <table>
            <tr>
                <th>No</th>
                <th>Jenis Pelanggaran</th>
                <th>Tingkat Pelanggaran</th>
                <th>Tanggal Pelanggaran</th>
                <th>Rincian Pelanggaran</th>
            </tr>
            <?php $id = 1;
            foreach ($data['history'] as $sanksi):
                if ($sanksi['status'] === "belum kompensasi" || $sanksi['status'] === 'ditolak') {?>
                    <tr>
                        <td><?=$id?></td>
                        <td><?=$sanksi['jenis']?></td>
                        <td><?=$sanksi['pelanggaran_id']?></td>
                        <td><?=$sanksi['tgl_pelanggaran']?></td>
                        <td>
                            <form action="<?= BASEURL ?>/HistoryPelanggaran/historyById" method="POST">
                                <input type="hidden" name="implementor" value="Mahasiswa">
                                <input type="hidden" name="pageName" value="Rincian">
                                <button name="data" type="submit" class="box-sanksi" value="<?=$sanksi['id_HP']?>">
                                    Cek Disini!
                                </button>
                            </form>
                        </td>
                    </tr>
            <?php $id++; } endforeach; ?>
        </table>
    </div>
</body>