<?php include 'dashboard_action.php'; ?>
<!DOCTYPE html>
<html>
    <head>
        <link rel="stylesheet" href="resources/style.css">
    </head>
    <body>
         
        <!-- NAVBAR -->
        <nav class="vh-100 d-flex flex-column align-items-center" style="position: fixed;width: 20%;background-color: var(--primary); padding-top: 5rem; padding-bottom: 2rem;">
            <div class="d-flex flex-column align-items-center pb-5">
                <div>
                    <img src="resources\icons\user-stroke.svg" class="img-fluid border-circle" style="background-color: white;">
                </div>
                <div class="text-secondary" style="font-weight: bold;">
                    <?php echo ucfirst($GLOBALS ['username'])?>
                </div>
            </div>
            <div class="container-fluid d-flex align-items-center justify-content-center text-secondary pb-2 nav-item active">
                <a class="nav-link d-flex align-items-center justify-content-center"><img src="resources\icons\navbar\home.svg" class="img-fluid px-2"> Dashboard</a>
            </div>
            <div class="container-fluid d-flex align-items-center justify-content-center text-secondary nav-item">
                <a href=<?php echo "sub-pages/biodata/$role_key.php";?> class="nav-link d-flex align-items-center justify-content-center"><img src="resources\icons\navbar\biodata.svg" class="img-fluid px-2"> Biodata Diri</a>
            </div>
            <div style="bottom: 3rem; position: fixed;">
                <a href="landing_page.php" class="btn-secondary d-flex align-items-center"><img src="resources\icons\navbar\logout.svg" class="img-fluid" style="padding-right: 0.25rem;">Keluar</a>
            </div>
        </nav>
        <!-- NAVBAR END -->
        <div class="container-fluid bg-secondary d-flex align-content-stretch flex-column" style="margin-left: 20%; width: 80%; height: 100%; position: absolute;">
            <!-- HEADER -->
            <div class="container-fluid h-auto bg-white" style="max-height: 5rem">
                <div class="d-flex align-items-center justify-content-between px-4 py-3">
                    <div class="d-flex align-items-center">
                        <div class="text-primary" style="font-size: 1.5rem;">
                            Dashboard
                        </div>
                    </div>
                    <div class="d-flex align-items-center">
                        <div class="text-primary py-2 px-4" style="background-color: #F2DEDE;">
                                industri
                            <!-- <?php echo get_role_label ($GLOBALS['role_key']) ?> -->
                        </div>
                    </div>
                </div>
            </div>
            <!-- HEADER END -->
            <!-- MAIN -->
            <div class="container-fluid d-flex align-items-center justify-content-center flex-column" style="height: 80%;">
                <div class="text-center pb-5">
                    <h1 class="text-head-primary">
                        Selamat Datang Mitra Polinema!
                    </h1>
                    <p class="text-primary" style="text-decoration-color: black;">
                        Silahkan memilih survey yang akan Anda isi.
                    </p>
                </div>
                <div style="width: 20rem;">
                    <div class="d-flex pb-3" style="width: 100%;"><a href="sub-pages\survey\guide.php?dst=pendidikan" class="btn-primary" style="width: 100%;border-radius: 0;">Survey Pendidikan</a></div>
                    <div class="d-flex pb-3" style="width: 100%;"><a href="sub-pages\survey\guide.php?dst=fasilitas" class="btn-primary" style="width: 100%;border-radius: 0;">Survey Fasilitas</a></div>
                    <div class="d-flex pb-3" style="width: 100%;"><a href="sub-pages\survey\guide.php?dst=layanan" class="btn-primary" style="width: 100%;border-radius: 0;">Survey Layanan</a></div>
                    <div class="d-flex pb-3" style="width: 100%;"><a href="sub-pages\survey\guide.php?dst=lulusan" class="btn-primary" style="width: 100%;border-radius: 0;">Survey Lulusan</a></div>
                </div>
            </div>
            <!-- MAIN END -->
            <!-- HEADER -->
            <div class="container-fluid h-auto bg-white" style="max-height: 5rem;position: absolute; bottom: 0px">
                <div class="d-flex align-items-center justify-content-between px-4 py-4">
                    <div class="d-flex align-items-center">
                        <div class="text-head-primary" style="padding-left: 1rem">
                            Survey Kepuasan Pelanggan Polinema
                        </div>
                    </div>
                </div>
            </div>
            <!-- HEADER END -->
        </div>
    </body>
</html>