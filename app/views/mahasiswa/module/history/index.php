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
            <th>Validasi</th>
        </tr>
        <?php $id = 1;
        $data = [
	        "history" => [
		        [
			        'jenis_pelanggaran' => 'Bermain Game',
			        'tingkat_pelanggaran' => 'Tingkat 3',
			        'tgl_pelanggaran' => '2023-12-02',
			        'tgl_validasi' => '2023-12-05',
		        ],
		        [
			        'jenis_pelanggaran' => 'Menggunakan Narkoba',
			        'tingkat_pelanggaran' => 'Tingkat 1',
			        'tgl_pelanggaran' => '2023-12-12',
			        'tgl_validasi' => 'NULL',
		        ]
	        ]
        ];
        foreach ($data['history'] as $htry):
            if ($htry['tgl_validasi'] == 'NULL'){
                continue;
            }
            ?>
        <tr>
            <td><?=$id?></td>
            <td><?=$htry['jenis_pelanggaran']?></td>
            <td><?=$htry['tingkat_pelanggaran']?></td>
            <td><?=$htry['tgl_pelanggaran']?></td>
            <td><?=$htry['tgl_validasi']?></td>
            <td><a href="#"></a></td>
        </tr>
        <?php $id++; endforeach; ?>
    </table>
