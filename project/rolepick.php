<?php
session_start();
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Simpan peran yang dipilih ke dalam session
    $_SESSION['selected_role'] = $_POST['role'];
}

    // Menentukan jalur login/register
    if (isset($_GET["act"])){
        if ($_GET["act"] == "login"){
            // Jika login pergi ke login.php
            $redirect = "login.php?role=";
        } else if ($_GET["act"] == "register") {
            // Jika register pergi ke /sub-pages/role-register/{role}.php
            $redirect = "register/user/";
        }
    } else {
        //header("Location:landing_page.php");
    }
?>
<!DOCTYPE html>
<html>
    <head>
        <link rel="stylesheet" href="resources/style.css">
    </head>
    <body>
        <div class="container-fluid">
            <!-- HEADER -->
            <div class="container-fluid bottom-bar h-auto" style="max-height: 5rem">
                <div class="d-flex align-items-center justify-content-between px-3 py-1">
                    <div class="d-flex align-items-center">
                        <div style="width: 50px;">
                            <img src="resources\icons\poltek-logoo.png" class="img-fluid" alt="logo-uni">
                        </div>
                        <div class="text-head-primary" style="padding-left: 1rem; width: 11rem;">
                            POLITEKNIK NEGERI MALANG
                        </div>
                    </div>
                    <div class="d-flex align-items-center">
                        <div style="width: 50px;">
                            <img src="resources\icons\a279b488c581b0ecf88b189fddfc16ab.png" class="img-fluid">
                        </div>
                    </div>
                </div>
            </div>
            <!-- HEADER END -->
            <!-- FORM -->
            <div class="d-flex align-items-center justify-content-center py-5">
                <h1 class="text-head-primary">
                    Survey Kepuasan Pelanggan Polinema
                </h1>
            </div>
            <div class="container-fluid pb-5 d-flex flex-column justify-content-center align-items-center">
                <div class="px-5 py-3 bg-secondary" style="border-radius: 2rem; width: 40rem;">
                    <div class="d-flex justify-content-center">
                        <h2 class="text-head-primary">
                            <?php echo $redirect == "login.php?role=" ? "Masuk" : "Daftar"; ?> Sebagai
                        </h2>
                    </div>
                    <div class="d-flex justify-content-between flex-wrap px-5 py-3 align-items-center">
                        <div class="d-flex flex-column align-items-center" style="width: 150px;">
                            <div>
                                <img src="resources\icons\user-stroke.svg" class="bg-white border-circle" style="border-width: 0;">
                            </div>
                            <div class="py-3 d-flex" style="width: 100%;">
                                <a href=<?php echo $redirect == "register/user/" ? $redirect . "mahasiswa.php" : $redirect . "mahasiswa"; ?> class="btn-primary" style="width: 100%; padding: 0.25rem 0;">Mahasiswa</a>
                            </div>
                        </div>
                        <div class="d-flex flex-column align-items-center" style="width: 150px;">
                            <div>
                                <img src="resources\icons\user-stroke.svg" class="bg-white border-circle" style="border-width: 0;">
                            </div>
                            <div class="py-3 d-flex" style="width: 100%;">
                                <a href=<?php echo $redirect == "register/user/" ? $redirect . "dosen.php" : $redirect . "dosen"; ?> class="btn-primary" style="width: 100%; padding: 0.25rem 0;">Dosen</a>
                            </div>
                        </div>
                        <div class="d-flex flex-column align-items-center" style="width: 150px;">
                            <div>
                                <img src="resources\icons\user-stroke.svg" class="bg-white border-circle" style="border-width: 0;">
                            </div>
                            <div class="py-3 d-flex" style="width: 100%;">
                                <a href=<?php echo $redirect == "register/user/" ? $redirect . "tendik.php" : $redirect . "tendik"; ?> class="btn-primary" style="width: 100%; padding: 0.25rem 0;">Tendik</a>
                            </div>
                        </div>
                        <div class="d-flex flex-column align-items-center" style="width: 150px;">
                            <div>
                                <img src="resources\icons\user-stroke.svg" class="bg-white border-circle" style="border-width: 0;">
                            </div>
                            <div class="py-3 d-flex" style="width: 100%;">
                                <a href=<?php echo $redirect == "register/user/" ? $redirect . "ortu.php" : $redirect . "ortu"; ?> class="btn-primary" style="width: 100%; padding: 0.25rem 0;">Orang Tua</a>
                            </div>
                        </div>
                        <div class="d-flex flex-column align-items-center" style="width: 150px;">
                            <div>
                                <img src="resources\icons\user-stroke.svg" class="bg-white border-circle" style="border-width: 0;">
                            </div>
                            <div class="py-3 d-flex" style="width: 100%;">
                                <a href=<?php echo $redirect == "register/user/" ? $redirect . "alumni.php" : $redirect . "alumni"; ?> class="btn-primary" style="width: 100%; padding: 0.25rem 0;">Alumni</a>
                            </div>
                        </div>
                        <div class="d-flex flex-column align-items-center" style="width: 150px;">
                            <div>
                                <img src="resources\icons\user-stroke.svg" class="bg-white border-circle" style="border-width: 0;">
                            </div>
                            <div class="py-3 d-flex" style="width: 100%;">
                                <a href=<?php echo $redirect == "register/user/" ? $redirect . "industri.php" : $redirect . "industri"; ?> class="btn-primary" style="width: 100%; padding: 0.25rem 0;">Industri</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- FROM END -->
        </div>
    </body>
</html>