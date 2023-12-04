<div class="container-page">
    <div class="row">
        <style>
            .logo-container {
                display: flex;
                align-items: center;

            }

            .logo-jenis-sanksi {
                width: 30px;
                /* Sesuaikan ukuran logo sesuai kebutuhan */
                height: auto;
                margin-right: 40px;
                font-size: 24px;
                margin-left: 40px;
                color: #363637;
                /* Sesuaikan jarak antara logo dan teks */
            }

            .Text-judul-sanksi {
                color: #403737;
                text-align: center;
                font-family: Anek Telugu;
                font-size: 32px;
                font-style: normal;
                font-weight: 600;
                line-height: normal;
                margin-top: 30px;
                /* Sesuaikan ukuran font sesuai kebutuhan */
            }

            table {

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
            }
        </style>
        <?php
        include 'mahasiswa\mahasiswa\template\menu.php';
        ?>
        <div class="main">
            <div class="logo-container">
                <img class="logo-jenis-sanksi" src="img\history.svg" alt="Jenis Logo">
                <p class="Text-judul-sanksi">History</p>
            </div>

            <body>

                <table>

                    <tr>
                        <th>No</th>
                        <th>Jenis Sanksi</th>
                        <th>Tingkat Pelanggaran</th>
                        <th>Tanggal Kejadian</th>
                        <th>Tanggal Penyelesaian Sanksi</th>
                        <th>Validasi</th>
                    </tr>

                    <tr>
                        <td>1</td>
                        <td>Bermain kartu, game online</td>
                        <td>Tingkat 3</td>
                        <td>18 / Okt / 2023</td>
                        <td>20 / Okt / 2023</td>
                        <td><a href="#"></a></td>
                    </tr>
                </table>