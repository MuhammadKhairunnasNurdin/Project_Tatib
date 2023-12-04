<aside class="sidebar">
    <div class="logo-container">
        <img src="img/Logo_Politeknik_Negeri_Malang.png" class="polinema-logo" alt="Polinema Logo">
        <div class="logo-text">
            <b>POLITEKNIK NEGERI</b>
            <br>
            <b>MALANG</b>
        </div>
    </div>
    <nav class="navigation">
        <form action="<?= BASEURL ?>/Mahasiswa/module" method="POST"></form>
        <ul class="nav-list">
            <li class="nav-dashboard">
                <button href="index.php" class="link-dashboard">
                    <img class="logo-dashboard" src="img\dash.svg" alt="Dashboard Logo">
                    <p class="logo-text-menu">
                        Dashboard
                    </p>
                </button>
            </li>
            <li class="nav-history">
                <button href="index.php?page=history" class="link-history">
                    <img class="logo-history" src="img\history.svg" alt="History Logo">
                    <p class="logo-text-menu">
                        History
                    </p>
                </button>
            </li>
            <li class="nav-sanksi">
                <button href="index.php?page=sanksi" class="link-sanksi">
                    <img class="logo-sanksi" src="img\sanksi.svg" alt="Sanksi Logo">
                    <p class="logo-text-menu">
                        Sanksi
                    </p>
                </button>
            </li>
            <li class="nav-jenis">
                <button href="index.php?page=jenistatib" class="link-jenis">
                    <img class="logo-jenis" src="img\jenis.svg" alt="Jenis Logo">
                    <p class="logo-text-menu">
                        Jenis Tata Tertib
                    </p>
                </button>
            </li>
        </ul>
    </nav>
</aside>