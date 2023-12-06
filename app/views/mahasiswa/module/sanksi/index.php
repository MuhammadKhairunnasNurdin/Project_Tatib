<style>
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
        font-style: normal;
        font-weight: 600;
        line-height: normal;
        margin-top: 30px;
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

    .box-sanksi {
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
    }

    .popup-container {
        display: none;
        position: fixed;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background: rgba(0, 0, 0, 0.5);
        justify-content: center;
        align-items: center;
        z-index: 1;
    }

    .popup-box {
        fill: rgba(255, 255, 255, 0.80);
        filter: drop-shadow(0px 4px 4px rgba(0, 0, 0, 0.25));
        padding: 20px;
        border-radius: 10px;
        width: 928px;
        height: 699px;
        text-align: center;
    }

    .close-popup {
        cursor: pointer;
        color: #FF2121;
        font-weight: bold;
        margin-left: 95%;
        font-size: 20px;
    }
</style>
</head>

<body>
    <div class="main">
        <div class="logo-container">
            <img class="logo-jenis-sanksi" src="<?= BASEURL ?>/img/sanksi.svg" alt="Jenis Logo">
            <p class="Text-judul-sanksi">Sanksi</p>
        </div>

        <table>

            <tr>
                <th>No</th>
                <th>Jenis Pelanggaran</th>
                <th>Tingkat Pelanggaran</th>
                <th>Tanggal Pelanggaran</th>
                <th>Rincian Pelanggaran</th>
            </tr>

            <tr>
                <td>1</td>
                <td>Bermain kartu, game online</td>
                <td>Tingkat 1</td>
                <td>18 / Okt / 2023</td>
                <td>
                    <button class="box-sanksi" onclick="openPopup(1)">
                        <p>
                            <a class="text-sanksi">
                                Cek Disini!
                            </a>
                        </p>
                    </button>
                </td>
            </tr>
            <tr>
                <td>2</td>
                <td>Bermain kartu, game online</td>
                <td>Tingkat 2</td>
                <td>18 / Okt / 2023</td>
                <td>
                    <button class="box-sanksi" onclick="openPopup(2)">
                        <p>
                            <a class="text-sanksi">
                                Cek Disini!
                            </a>
                        </p>
                    </button>
                </td>
            </tr>
            <tr>
                <td>3</td>
                <td>Bermain kartu, game online</td>
                <td>Tingkat 3</td>
                <td>18 / Okt / 2023</td>
                <td>
                    <button class="box-sanksi" onclick="openPopup(3)">
                        <p>
                            <a class="text-sanksi">
                                Cek Disini!
                            </a>
                        </p>
                    </button>
                </td>
            </tr>
            <tr>
                <td>4</td>
                <td>Bermain kartu, game online</td>
                <td>Tingkat 4</td>
                <td>18 / Okt / 2023</td>
                <td>
                    <button class="box-sanksi" onclick="openPopup(4)">
                        <p>
                            <a class="text-sanksi">
                                Cek Disini!
                            </a>
                        </p>
                    </button>
                </td>
            </tr>
            <tr>
                <td>5</td>
                <td>Bermain kartu, game online</td>
                <td>Tingkat 5</td>
                <td>18 / Okt / 2023</td>
                <td>
                    <button class="box-sanksi" onclick="openPopup(5)">
                        <p>
                            <a class="text-sanksi">
                                Cek Disini!
                            </a>
                        </p>
                    </button>
                </td>
            </tr>

        </table>
    </div>
    <div class="popup-container" id="popupContainer">
        <div class="popup-box">
            <span class="close-popup" onclick="closePopup()">X</span>
            <div class="text">
                <p id="popupContent"></p>
            </div>
        </div>
    </div>

    <script src="test.js"></script>
</body>