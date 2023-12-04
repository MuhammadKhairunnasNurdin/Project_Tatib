<div class="container-page">
    <div class="row">
<div class="sidebar border border-right col-md-3 col-lg-2 p-0 bg-white">
        <div class="offcanvas-lg offcanvas-end" tabindex="-1" id="sidebarAdmin" aria-labelledby="sidebarMenuLabel">
            <div class="offcanvas-header">
                <h4 class="logo" id="sidebarMenuLabel">POLITEKNIK NEGERI MALANG</h4>
                <button class="btn-close" type="button" data-bs-dismiss="offcanvas" data-bs-target="#sidebarAdmin" aria-label="Close"></button>
            </div>
            <div class="offcanvas-body d-md-flex flex-column p-0 pt-lg-3">
                <form action="<?= BASEURL?>/Admin/module" method="post">
                <ul class="ul nav flex-column" >
                    <li class="nav-dashboard nav-item" >
                        <a href="index.php" class="link-dashboard nav-link d-flex align-items-center gap2 active">
                            <img class="logo-dashboard" src="<?= BASEURL?>/img/dashboard_Logo.svg" alt="">
                            <p class="text-dashboard">Dashboard</p> 
                        </a>
                    </li>
                    <li class="nav-dosen nav-item">
                            <button class="link-dosen nav-link d-flex align-items-center gap2 active" type="submit"
                            name="page" value="dosen">
                                    <img class="logo-dosen" src="<?= BASEURL?>/img/dosen_logo.svg" alt="">
                                    <p class="text-dosen" >Dosen</p>
                            </button>
<!--                        <input type="hidden" name="page" value="dosen">-->
<!--                        <a href="index.php?post=dosen" class="link-dosen nav-link d-flex align-items-center gap2 active" type="submit">-->
<!--                            <img class="logo-dosen" src="--><?//= BASEURL?><!--/img/dosen_logo.svg" alt="">-->
<!--                            <p class="text-dosen" >Dosen</p>-->
<!--                        </a>-->
                    </li>
                    <li class="nav-mahasiswa nav-item">
                        <a href="index.php?post=mahasiswa" class="link-mahasiswa nav-link d-flex align-items-center gap2 active">
                            <img  class="logo-mahasiswa" src="<?= BASEURL?>/img/mahasiswa_logo.svg" alt="">
                            <p class="text-mahasiswa">Mahasiswa</p>
                        </a>
                    </li>
                    <li class="nav-validasi nav-item">
                        <a href="index.php?post=validasi" class="link-validasi nav-link d-flex align-items-center gap2 active">
                            <img class="logo-validasi" src="<?= BASEURL?>/img/validasi_logo.svg" alt="">    
                            <p class="text-validasi" >Validasi</p>
                        </a>
                    </li>    
                </ul>
                </form>
            </div>
        </div>
</div>
