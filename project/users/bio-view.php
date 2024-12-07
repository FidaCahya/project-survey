<?php
    $included = true;
    include_once '../../fungsi.php';
    if (isset($_GET['username'])){
        setcookie("username",$_GET['username']);
        setcookie("role",$_GET['role']);
        $username = $_GET['username'];
        $role = $_GET['role'];
    } else if (isset($_COOKIE['username'])){
        $username = $_COOKIE['username'];
        $role = $_COOKIE['role'];
    } else {
        header("Location:../../landing_page.php");
    }
?>
<!DOCTYPE html>
<html>
    <head>
        <link rel="stylesheet" href="../../resources/style.css">
    </head>
    <body>
        <!-- NAVBAR -->
        <nav class="vh-100 d-flex flex-column align-items-center" style="position: fixed;width: 20%;background-color: var(--primary); padding-top: 5rem; padding-bottom: 2rem;">
            <div class="d-flex flex-column align-items-center pb-5">
                <div>
                    <img src="..\..\resources\icons\user-stroke.svg" class="img-fluid border-circle" style="background-color: white;">
                </div>
                <div class="text-secondary" style="font-weight: bold;">
                    <?php echo ucfirst($username);?>
                </div>
            </div>
            <div class="container-fluid d-flex align-items-center justify-content-center text-secondary pb-2 nav-item">
                <a href="..\dashboard.php" class="nav-link d-flex align-items-center justify-content-center"><img src="..\..\resources\icons\navbar\home.svg" class="img-fluid px-2"> Dashboard</a>
            </div>
            <div class="container-fluid d-flex align-items-center justify-content-center text-secondary nav-item active">
                <a href="..\biodata.php" class="nav-link d-flex align-items-center justify-content-center"><img src="..\..\resources\icons\navbar\biodata.svg" class="img-fluid px-2"> Biodata Diri</a>
            </div>
            <div style="bottom: 3rem; position: fixed;">
                <a href="..\..\landing_page.php" class="btn-secondary d-flex align-items-center"><img src="..\..\resources\icons\navbar\logout.svg" class="img-fluid" style="padding-right: 0.25rem;">Keluar</a>
            </div>
        </nav>
        <!-- NAVBAR END -->
        <div class="container-fluid bg-secondary d-flex align-content-stretch flex-column" style="margin-left: 20%; width: 80%; height: max-content; position: absolute;">
            <!-- HEADER -->
            <div class="container-fluid h-auto bg-white" style="max-height: 5rem">
                <div class="d-flex align-items-center justify-content-between px-4 py-3">
                    <div class="d-flex align-items-center">
                        <div class="text-primary" style="font-size: 1.5rem;">
                            Jawaban Mahasiswa
                        </div>
                    </div>
                    <div class="d-flex align-items-center">
                        <div class="text-primary py-2 px-4" style="background-color: #F2DEDE;">
                            <?php echo ucfirst($role);?>
                        </div>
                    </div>
                </div>
            </div>
            <!-- HEADER END -->
            <!-- MAIN -->
            <div class="container-fluid py-5 d-flex align-items-center justify-content-center flex-column" style="height: 100%;">
                <div class="text-center pb-5">
                    <h1 class="text-head-primary">
                        Tentang Responden
                    </h1>
                </div>
                <!-- FORM -->
                <div class="bg-white p-5" style="border-radius: 2rem; width: 30rem;">
                    <form>
                        <div class="d-flex" style="width: 100%;padding-bottom: 1.5rem">
                            <input class="form-control" type="text" name="nama" placeholder="Nama">
                        </div>
                        <div class="d-flex" style="width: 100%;padding-bottom: 1.5rem">
                            <input class="form-control" type="text" name="notelp" placeholder="Nomor Telepon">
                        </div>
                        <div class="d-flex" style="width: 100%;padding-bottom: 1.5rem">
                            <input class="form-control" type="email" name="email" placeholder="Email">
                        </div>
                        <div class="d-flex" style="width: 100%;padding-bottom: 1.5rem">
                            <input class="form-control" type="text" name="prodi" placeholder="Prodi">
                        </div>
                        <div class="d-flex" style="width: 100%;padding-bottom: 1.5rem">
                            <input class="form-control" type="text" name="nim" placeholder="Nomor Induk Mahasiswa">
                        </div>
                        <div class="d-flex" style="width: 100%;">
                            <input class="form-control" type="text" name="tahunMasuk" placeholder="Tahun Masuk">
                        </div>
                    </form>
                </div>
                <!-- FORM END -->
                <div class="d-flex justify-content-end container-fluid" style="width: 80%;">
                    <div class="px-5 pt-4">
                        <!-- quest-results.php -->
                        <a href="list.php">
                            <img src="..\..\resources\icons\arrow-right.svg">
                        </a>
                    </div>
                </div>
            </div>
            <!-- MAIN END -->
        </div>
    </body>
</html>