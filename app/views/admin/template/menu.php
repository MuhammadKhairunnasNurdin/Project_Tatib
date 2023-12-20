<div class="container-page">
    <div class="row">
        <div class="sidebar col-md-3 col-lg-2 p-0 bg-white">
            <div class="offcanvas-lg offcanvas-end" tabindex="-1" id="sidebarAdmin" aria-labelledby="sidebarMenuLabel">
                <div class="offcanvas-header">
                    <h4 class="logo" id="sidebarMenuLabel">POLITEKNIK NEGERI MALANG</h4>
                    <button class="btn-close" type="button" data-bs-dismiss="offcanvas" data-bs-target="#sidebarAdmin" aria-label="Close"></button>
                </div>
                <div class="offcanvas-body d-md-flex flex-column p-0 pt-lg-3">
                    <ul class="ul nav flex-column" >
                        <li class="nav-dashboard nav-item" >
                            <a href="<?=BASEURL?>/Admin/index" class="link-dosen nav-link d-flex align-items-center gap2 active" name="page" value=".." type="submit">
                                <img class="logo-dosen" src="<?= BASEURL?>/img/dashboard_logo.svg" alt="">
                                <p class="text-dosen" >Dashboard</p>
                            </a>
                        </li>
                        <li class="nav-dosen nav-item">
                            <a href="<?=BASEURL?>/Admin/pageDosen" class="link-dosen nav-link d-flex align-items-center gap2 active" name="page" value="dosen" type="submit">
                                <img class="logo-dosen" src="<?= BASEURL?>/img/dosen_logo.svg" alt="">
                                <p class="text-dosen" >Dosen</p>
                            </a>
                        </li>
                        <li class="nav-mahasiswa nav-item">
                            <a href="<?=BASEURL?>/Admin/pageMahasiswa" class="link-mahasiswa nav-link d-flex align-items-center gap2 active" name="page" value="mahasiswa" type="submit">
                                <img  class="logo-mahasiswa" src="<?= BASEURL?>/img/mahasiswa_logo.svg" alt="">
                                <p class="text-mahasiswa">Mahasiswa</p>
                            </a>
                        </li>
                        <li class="nav-validasi nav-item">
                            <form action="<?= BASEURL ?>/HistoryPelanggaran/allHistory" method="post">
                                <input type="hidden" name="implementor" value="Admin">
                                <input type="hidden" name="pageName" value="Validasi">
                                <button type="submit" class="link-validasi nav-link d-flex align-items-center gap2 active">
                                    <img class="logo-validasi" src="<?= BASEURL?>/img/validasi_logo.svg" alt="">
                                    <p class="text-validasi" >Validasi</p>
                                </button>
                            </form>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
