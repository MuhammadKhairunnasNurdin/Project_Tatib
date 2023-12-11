<div class="container-page">
    <div class="row">
<div class="sidebar border border-right col-md-3 col-lg-2 p-0 bg-white">    
        <div class="offcanvas-lg offcanvas-end" tabindex="-1" id="sidebardosen" aria-labelledby="sidebarMenuLabel">
            <div class="offcanvas-header">
                <h4 class="logo" id="sidebarMenuLabel">POLITEKNIK NEGERI MALANG</h4>
                <button class="btn-close" type="button" data-bs-dismiss="offcanvas" data-bs-target="#sidebardosen" aria-label="Close"></button>
            </div>
            <div class="offcanvas-body d-md-flex flex-column p-0 pt-lg-3">
            <form action="<?= BASEURL?>/Dosen/module" method="POST">
                <ul class="ul nav flex-column" >
                    <li class="nav-dashboard nav-item" >
                        <button name="page" value=".." type="submit" class="link-dashboard nav-link d-flex align-items-center gap2 active">
                            <img class="logo-dashboard" src="<?= BASEURL?>/img/dosen/dash_dosen.png" alt="">
                            <p class="text-dashboard">Dashboard</p> 
                        </button>
                    </li>
                    <li class="nav-tatib nav-item">
                        <button class="link-tatib nav-link d-flex align-items-center gap2 active" name="page" value="tatib" type="submit">
                        <img class="logo-tatib" src="<?= BASEURL?>/img/dosen/tata_dosen.png" alt="">
                        <p class="text-tatib">Tata Tertib</p>
                        </button>
                    </li>
                    <li class="nav-laporan nav-item">
                        <button class="link-laporan nav-link d-flex align-items-center gap2 active" name="page" value="laporan" type="submit">
                            <img class="logo-laporan" src="<?= BASEURL?>/img/dosen/lapor_dosen.png" alt="">
                            <p class="text-laporan">Laporan</p>
                        </button>
                    </li>
                    <li class="nav-history nav-item">
                        <button name="page" value="history" type="submit" class="link-history nav-link d-flex align-items-center gap2 active">
                            <img class="logo-history" src="<?= BASEURL?>/img/dosen/history_dosen.png" alt="">
                            <p class="text-history" >History</p>
                        </button>
                    </li>    
                </ul>
            </form>
            </div>
        </div>
    </div>
