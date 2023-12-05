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
        <form action="<?= BASEURL ?>/Mahasiswa/module" method="POST">
        <ul class="nav-list">
            <li class="nav-dashboard">
                <button name="page" value=".." type="submit" class="link-dashboard">
                    <img class="logo-dashboard" src="<?=BASEURL?>/img/dash.svg" alt="Dashboard Logo">
                    <p class="logo-text-menu">
                        Dashboard
                    </p>
                </button>
            </li>
            <li class="nav-history">
                <button name="page" value="history" type="submit" class="link-history">
                    <img class="logo-history" src="<?=BASEURL?>/img/history.svg" alt="History Logo">
                    <p class="logo-text-menu">
                        History
                    </p>
                </button>
            </li>
            <li class="nav-sanksi">
                <button name="page" value="sanksi" type="submit" class="link-sanksi">
                    <img class="logo-sanksi" src="<?=BASEURL?>/img/sanksi.svg" alt="Sanksi Logo">
                    <p class="logo-text-menu">
                        Sanksi
                    </p>
                </button>
            </li>
            <li class="nav-jenis">
                <button name="page" value="jenistatib" type="submit" class="link-jenis">
                    <img class="logo-jenis" src="<?=BASEURL?>/img/jenis.svg" alt="Jenis Logo">
                    <p class="logo-text-menu">
                        Jenis Tata Tertib
                    </p>
                </button>
            </li>
        </ul>
        </form>
    </nav>
</aside>