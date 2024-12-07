<?php
    $included = true;
    include "../../fungsi.php";
    if (isset($_GET['dst'])){
        //check destination
        if (!check_survey_dest($_GET['dst'])){
            header("Location:landing_page.php");
        }
        setcookie("dst",$_GET['dst']);
        $dst = $_GET['dst'];
    } else if (isset($_COOKIE['dst'])){
        $dst = $_COOKIE['dst'];
    } else {
        header("Location:landing_page.php");
    }
    $role_key = $_COOKIE['role_key'];
    $username = $_COOKIE['username'];
?>
<!DOCTYPE html>
<html>
    <head>
        <link rel="stylesheet" href="../../resources/style.css">
    </head>
    <script type="text/javascript" src="../../resources/jquery-3.7.1.min.js"></script>
    <body>
        <!-- NAVBAR -->
        <nav class="vh-100 d-flex flex-column align-items-center" style="position: fixed;width: 20%;background-color: var(--primary); padding-top: 5rem; padding-bottom: 2rem;">
            <div class="d-flex flex-column align-items-center pb-5">
                <div>
                    <img src="../..\resources\icons\user-stroke.svg" class="img-fluid border-circle" style="background-color: white;">
                </div>
                <div class="text-secondary" style="font-weight: bold;">
                    <?php echo ucfirst($username);?>
                </div>
            </div>
            <div class="container-fluid d-flex align-items-center justify-content-center text-secondary pb-2 nav-item active">
                <a href="../../dashboard.php" class="nav-link d-flex align-items-center justify-content-center"><img src="../..\resources\icons\navbar\home.svg" class="img-fluid px-2"> Dashboard</a>
            </div>
            <div class="container-fluid d-flex align-items-center justify-content-center text-secondary nav-item">
                <a href=<?php echo "../../sub-pages/biodata/$role_key.php";?> class="nav-link d-flex align-items-center justify-content-center"><img src="../..\resources\icons\navbar\biodata.svg" class="img-fluid px-2"> Biodata Diri</a>
            </div>
            <div style="bottom: 3rem; position: fixed;">
                <a href="../../landing_page.php" class="btn-secondary d-flex align-items-center"><img src="../..\resources\icons\navbar\logout.svg" class="img-fluid" style="padding-right: 0.25rem;">Keluar</a>
            </div>
        </nav>
        <!-- NAVBAR END -->
        <div class="container-fluid bg-secondary d-flex align-content-stretch flex-column" style="margin-left: 20%; width: 80%; height: 100%; position: absolute;">
            <!-- HEADER -->
            <div class="container-fluid h-auto bg-white" style="max-height: 5rem">
                <div class="d-flex align-items-center justify-content-between px-4 py-3">
                    <div class="d-flex align-items-center">
                        <div class="text-primary" style="font-size: 1.5rem;">
                            <?php echo get_survey_label($dst) ?>
                        </div>
                    </div>
                    <div class="d-flex align-items-center">
                        <div class="text-primary py-2 px-4" style="background-color: #F2DEDE;">
                            <?php echo $registered_roles[$role_key] ?>
                        </div>
                    </div>
                </div>
            </div>
            <!-- HEADER END -->
            <!-- MAIN -->
            <div class="container-fluid d-flex align-items-center justify-content-center flex-column" style="height: 100%;">
                <div class="d-flex flex-column align-items-center justify-content-center bg-white border-circle" style="border: none; width: 30rem; height: 30rem;">
                    <div class="d-flex p-0">
                        <img src="../..\resources\gambar\quest-end.png" class="img-fluid" width="200rem">
                    </div>
                    <div class="d-flex flex-column align-items-center justify-content-center p-0">
                        <h1 class="text-head-primary" style="margin: 0;">
                            TERIMA KASIH!
                        </h1>
                        <p class="text-primary" style="margin: 0;">
                            Semua jawaban anda telah tersimpan
                        </p>
                    </div>
                </div>
            </div>
            <!-- MAIN END -->
        </div>
        <script type="text/javascript" src="../../resources/scripts.js"></script>
    </body>
</html>