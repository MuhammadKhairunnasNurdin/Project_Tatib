<div class="container-page">
    <div class="row">
<aside class="sidebar">
    <div class="logo-container">
        <img src="<?=BASEURL?>/img/logo_polinema.png" class="polinema-logo" alt="Polinema Logo">
        <div class="logo-text">
            <b>POLITEKNIK NEGERI</b>
            <br>
            <b>MALANG</b>
        </div>
    </div>
    <nav class="navigation">
        <ul class="nav-list">
            <li class="nav-dashboard">
                <a href="<?=BASEURL?>/Mahasiswa/index" class="link-dashboard">
                    <img class="logo-dashboard" src="<?=BASEURL?>/img/dash.svg" alt="Dashboard Logo">
                    <p class="logo-text-menu">
                        Dashboard
                    </p>
                </a>
            </li>
            <li class="nav-history">
                <form action="<?= BASEURL ?>/HistoryPelanggaran/allHistory" method="post">
                    <input type="hidden" name="implementor" value="Mahasiswa">
                    <input type="hidden" name="pageName" value="History">
                    <button type="submit" class="link-history" name="data" value="<?=$data['mahasiswa']['NIM']?>">
                        <img class="logo-history" src="<?= BASEURL ?>/img/history.svg" alt="History Logo">
                        <p class="logo-text-menu">
                            History
                        </p>
                    </button>
                </form>
            </li>
            <li class="nav-sanksi">
                <form action="<?= BASEURL ?>/HistoryPelanggaran/allHistory" method="post">
                    <input type="hidden" name="implementor" value="Mahasiswa">
                    <input type="hidden" name="pageName" value="Sanksi">
                    <button type="submit" class="link-sanksi" name="data" value="<?=$data['mahasiswa']['NIM']?>">
                        <img class="logo-sanksi" src="<?= BASEURL ?>/img/sanksi.svg" alt="Sanksi Logo">
                        <p class="logo-text-menu">
                            Sanksi
                        </p>
                    </button>
                </form>
            </li>
            <li class="nav-jenis">
                <a href="<?=BASEURL?>/Mahasiswa/pageJenisTatib" class="link-jenis">
                    <img class="logo-jenis" src="<?=BASEURL?>/img/jenis.svg" alt="Jenis Logo">
                    <p class="logo-text-menu">
                        Jenis Tata Tertib
                    </p>
                </a>
            </li>
        </ul>
    </nav>
</aside>