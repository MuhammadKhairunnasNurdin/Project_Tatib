<div class="main">
    <div class="logo-container">
        <img class="logo-jenis-sanksi" src="<?=BASEURL?>/img/history.svg" alt="Jenis Logo">
        <p class="Text-judul-sanksi">History</p>
    </div>
    <table>
        <tr>
            <th>No</th>
            <th>Jenis Sanksi</th>
            <th>Tingkat Pelanggaran</th>
            <th>Tanggal Kejadian</th>
            <th>Tanggal Penyelesaian Sanksi</th>
            <th style="width: 13px">Validasi</th>
        </tr>
        <?php $id = 1;
        foreach ($data['history'] as $hstr):
            if ($hstr['status'] === "belum kompensasi" || $hstr['status'] === 'ditolak'){
                continue;
            }
            ?>
            <tr>
                <td><?=$id?></td>
                <td><?=$hstr['jenis']?></td>
                <td><?=$hstr['pelanggaran_id']?></td>
                <td><?=$hstr['tgl_pelanggaran']?></td>
                <td><?=$hstr['tgl_kompensasi']?></td>
                <td style="margin: 5rem">
                    <?php if (!isset($hstr['tgl_validasi'])) { ?>
                        <img src="<?=BASEURL?>/img/validate.png" style="width: 55%; height: 55%; margin: 0 2px 0 12px" alt="">
                    <?php } ?>
                </td>
            </tr>
        <?php $id++; endforeach; ?>
    </table>
