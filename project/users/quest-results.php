<?php
    $included = true;
    session_start();
    include '../fungsi.php';

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
        <link rel="stylesheet" href="../resources/style.css">
    </head>
    <body>
        <!-- NAVBAR -->
        <nav class="vh-100 d-flex flex-column align-items-center" style="position: fixed;width: 20%;background-color: var(--primary); padding-top: 5rem; padding-bottom: 2rem;">
            <div class="d-flex flex-column align-items-center pb-5">
                <div>
                    <img src="../resources\icons\user-stroke.svg" class="img-fluid border-circle" style="background-color: white;">
                </div>
                <div class="text-secondary" style="font-weight: bold;">
                    <?php echo ucfirst($username);?>
                </div>
            </div>
            <div class="container-fluid d-flex align-items-center justify-content-center text-secondary pb-2 nav-item active">
                <a href="..\dashboard_admin.php" class="nav-link d-flex align-items-center justify-content-center"><img src="..\resources\icons\navbar\home.svg" class="img-fluid px-2"> Dashboard</a>
            </div>
            <div class="container-fluid d-flex align-items-center justify-content-center text-secondary nav-item">
                <!-- ..\biodata.php -->
                <a href="bio-view.php" class="nav-link d-flex align-items-center justify-content-center"><img src="..\resources\icons\navbar\biodata.svg" class="img-fluid px-2"> Biodata Diri</a>
            </div>
            <div style="bottom: 3rem; position: fixed;">
                <a href="..\landing_page.php" class="btn-secondary d-flex align-items-center"><img src="..\resources\icons\navbar\logout.svg" class="img-fluid" style="padding-right: 0.25rem;">Keluar</a>
            </div>
        </nav>
        <!-- NAVBAR END -->
        <div class="container-fluid bg-secondary d-flex align-content-stretch flex-column" style="margin-left: 20%; width: 80%; height: max-content; min-height: 100%; position: absolute;">
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
            <div class="container-fluid py-2 d-flex align-items-center justify-content-center flex-column" style="height: 100%;">
                <div class="text-center pb-2">
                    <h2 class="text-primary">
                        Riwayat Survey
                    </h2>
                </div>
                <!-- RESPONSES LIST -->
                <!-- QUEST NO 1-->
                <div class="container-fluid bg-white text-primary-black" style="border-radius: 1rem; width: 90%; margin-bottom: 2rem;">
                    <ol start="1"><li>Bagaimana penilaian anda terhadap kualitas pengajaran di Polinema?</li></1ol>
                    <div class="d-flex flex-column" style="padding-left: 1rem;">
                        <div class="d-flex align-items-center">
                            <input type="checkbox" name="answ[0]" value="sangatBaik" checked>
                            <label for="answ[0]" style="padding-left: 0.5rem;">Sangat Baik</label>
                        </div>
                        <div class="d-flex align-items-center">
                            <input type="checkbox" name="answ[0]" value="baik">
                            <label for="answ[0]" style="padding-left: 0.5rem;">Baik</label>
                        </div>
                        <div class="d-flex align-items-center">
                            <input type="checkbox" name="answ[0]" value="sangatBaik">
                            <label for="answ[0]" style="padding-left: 0.5rem;">Cukup</label>
                        </div>
                        <div class="d-flex align-items-center">
                            <input type="checkbox" name="answ[0]" value="sangatBaik">
                            <label for="answ[0]" style="padding-left: 0.5rem;">Sangat Buruk</label>
                        </div>
                    </div>
                </div>
                <!-- QUEST NO 1 END -->
                <div class="container-fluid bg-white text-primary-black" style="border-radius: 1rem; width: 90%;">
                    <ol start="2"><li>Seberapa puas Anda dengan pengalaman belajar Anda di Polinema?</li></1ol>
                    <div class="d-flex flex-column" style="padding-left: 1rem;">
                        <div class="d-flex align-items-center">
                            <input type="checkbox" name="answ[1]" value="sangatBaik">
                            <label for="answ[1]" style="padding-left: 0.5rem;">Sangat Baik</label>
                        </div>
                        <div class="d-flex align-items-center">
                            <input type="checkbox" name="answ[1]" value="baik" checked>
                            <label for="answ[1]" style="padding-left: 0.5rem;">Baik</label>
                        </div>
                        <div class="d-flex align-items-center">
                            <input type="checkbox" name="answ[1]" value="sangatBaik">
                            <label for="answ[1]" style="padding-left: 0.5rem;">Cukup</label>
                        </div>
                        <div class="d-flex align-items-center">
                            <input type="checkbox" name="answ[1]" value="sangatBaik">
                            <label for="answ[1]" style="padding-left: 0.5rem;">Sangat Buruk</label>
                        </div>
                    </div>
                </div>
                <!-- RESPONSES LIST END -->
                <!-- <div class="d-flex justify-content-end container-fluid" style="width: 90%;">
                    <div class="pt-5">
                        <a href="" class="btn-primary">
                            SUBMIT
                        </a>
                    </div>
                </div> -->
            </div>
            <!-- MAIN END -->
        </div>
    </body>
</html>