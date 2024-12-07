<?php
session_start();
include 'fungsi.php';

// Periksa apakah pengguna telah login dan peran telah diatur
if (isset($_SESSION['role'])) {
    $role = $_SESSION['role'];
    $username = $_SESSION['username'];
} else {
    header("Location: login.php");
    exit();
}
?>

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
                    <?php echo ucfirst($username);?>
                </div>
            </div>
            <div class="container-fluid d-flex align-items-center justify-content-center text-secondary pb-2 nav-item active">
                <a href="dashboard_admin.php" class="nav-link d-flex align-items-center justify-content-center"><img src="resources\icons\navbar\home.svg" class="img-fluid px-2"> Dashboard</a>
            </div>
            <!-- <div class="container-fluid d-flex align-items-center justify-content-center text-secondary nav-item">
                <a href="biodata.php" class="nav-link d-flex align-items-center justify-content-center"><img src="..\resources\icons\navbar\biodata.svg" class="img-fluid px-2"> Biodata Diri</a>
            </div> -->
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
                            <?php echo ucfirst($role);?>
                        </div>
                    </div>
                </div>
            </div>
            <!-- HEADER END -->
            <!-- MAIN -->
            <div class="container-fluid d-flex align-items-center justify-content-center flex-column" style="height: 80%;">
                <!-- FORM -->
                <div class="container-fluid pb-5 d-flex flex-column justify-content-center align-items-center">
                    <div class="px-5 py-3" style="width: 40rem;">
                        <div class="d-flex justify-content-center">
                            <h2 class="text-head-primary">
                                Hasil Jawaban Responden
                            </h2>
                        </div>
                        <div class="d-flex justify-content-between flex-wrap px-5 py-3 align-items-center" style="border-radius: 2rem;background-color: #F3F3F3;">
                            <div class="d-flex flex-column align-items-center" style="width: 150px;">
                                <div>
                                    <img src="resources\icons\user-stroke.svg" class="bg-white border-circle" style="border-width: 0;">
                                </div>
                                <div class="py-3 d-flex" style="width: 100%;">
                                    <a href="jawaban_survey.php?role=mahasiswa" class="btn-primary" style="width: 100%; padding: 0.25rem 0;">Mahasiswa</a>
                                </div>
                            </div>
                            <div class="d-flex flex-column align-items-center" style="width: 150px;">
                                <div>
                                    <img src="resources\icons\user-stroke.svg" class="bg-white border-circle" style="border-width: 0;">
                                </div>
                                <div class="py-3 d-flex" style="width: 100%;">
                                    <a href="jawaban_survey.php?role=dosen" class="btn-primary" style="width: 100%; padding: 0.25rem 0;">Dosen</a>
                                </div>
                            </div>
                            <div class="d-flex flex-column align-items-center" style="width: 150px;">
                                <div>
                                    <img src="resources\icons\user-stroke.svg" class="bg-white border-circle" style="border-width: 0;">
                                </div>
                                <div class="py-3 d-flex" style="width: 100%;">
                                    <a href="jawaban_survey.php?role=tendik" class="btn-primary" style="width: 100%; padding: 0.25rem 0;">Tendik</a>
                                </div>
                            </div>
                            <div class="d-flex flex-column align-items-center" style="width: 150px;">
                                <div>
                                    <img src="resources\icons\user-stroke.svg" class="bg-white border-circle" style="border-width: 0;">
                                </div>
                                <div class="py-3 d-flex" style="width: 100%;">
                                    <a href="jawaban_survey.php?role=ortu" class="btn-primary" style="width: 100%; padding: 0.25rem 0;">Orang Tua</a>
                                </div>
                            </div>
                            <div class="d-flex flex-column align-items-center" style="width: 150px;">
                                <div>
                                    <img src="resources\icons\user-stroke.svg" class="bg-white border-circle" style="border-width: 0;">
                                </div>
                                <div class="py-3 d-flex" style="width: 100%;">
                                    <a href="jawaban_survey.php?role=alumni" class="btn-primary" style="width: 100%; padding: 0.25rem 0;">Alumni</a>
                                </div>
                            </div>
                            <div class="d-flex flex-column align-items-center" style="width: 150px;">
                                <div>
                                    <img src="resources\icons\user-stroke.svg" class="bg-white border-circle" style="border-width: 0;">
                                </div>
                                <div class="py-3 d-flex" style="width: 100%;">
                                    <a href="jawaban_survey.php?role=industri" class="btn-primary" style="width: 100%; padding: 0.25rem 0;">Industri</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- FROM END -->
            </div>
            <!-- MAIN END -->
        </div>
    </body>
</html>