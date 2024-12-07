<?php
    $included = true;
    include "../fungsi.php";
    
    if (isset($_GET['dst'])) {
        // Check destination
        if (!check_survey_dest($_GET['dst'])) {
            header("Location: landing_page.php");
            exit();
        }
        setcookie("dst", $_GET['dst']);
        $dst = $_GET['dst'];
    } else if (isset($_COOKIE['dst'])) {
        $dst = $_COOKIE['dst'];
    } else {
        header("Location: landing_page.php");
        exit();
    }

    
    
    $role_key = $_COOKIE['role_key'];
    $username = $_COOKIE['username'];
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
                <img src="..\resources\icons\user-stroke.svg" class="img-fluid border-circle" style="background-color: white;">
            </div>
            <div class="text-secondary" style="font-weight: bold;">
                <?php echo ucfirst($username); ?>
            </div>
        </div>
        <div class="container-fluid d-flex align-items-center justify-content-center text-secondary pb-2 nav-item active">
            <a href="../dashboard.php" class="nav-link d-flex align-items-center justify-content-center"><img src="..\resources\icons\navbar\home.svg" class="img-fluid px-2"> Dashboard</a>
        </div>
        <div class="container-fluid d-flex align-items-center justify-content-center text-secondary nav-item">
            <a href=<?php echo "/biodata/$role_key.php"; ?> class="nav-link d-flex align-items-center justify-content-center"><img src="..\resources\icons\navbar\biodata.svg" class="img-fluid px-2"> Biodata Diri</a>
        </div>
        <div style="bottom: 3rem; position: fixed;">
            <a href="../landing_page.php" class="btn-secondary d-flex align-items-center"><img src="..\resources\icons\navbar\logout.svg" class="img-fluid" style="padding-right: 0.25rem;">Keluar</a>
        </div>
    </nav>
    <!-- NAVBAR END -->
    <div class="container-fluid bg-secondary d-flex align-content-stretch flex-column" style="margin-left: 20%; width: 80%; height: 100%; position: absolute;">
        <!-- HEADER -->
        <div class="container-fluid h-auto bg-white" style="max-height: 5rem">
            <div class="d-flex align-items-center justify-content-between px-4 py-3">
                <div class="d-flex align-items-center">
                    <div class="text-primary" style="font-size: 1.5rem;">
                        <?php echo get_survey_label($dst); ?>
                    </div>
                </div>
                <div class="d-flex align-items-center">
                    <div class="text-primary py-2 px-4" style="background-color: #F2DEDE;">
                        <?php echo $registered_roles[$role_key]; ?>
                    </div>
                </div>
            </div>
        </div>
        <!-- HEADER END -->
        <!-- MAIN -->
        <div class="container-fluid d-flex align-items-center flex-column" style="height: 80%;">
            <div class="container-fluid text-start pb-1">
                <h1 class="px-3 text-head-primary">
                    Petunjuk Pengisian
                </h1>
            </div>
            <div class="d-flex flex-column bg-white px-5" style="width: 50rem; border-radius: 1rem;">
                <div>
                    <p class="text-primary-black" style="margin-bottom: 0;">
                        Halaman berikut berisi pernyataan-pernyataan mengenai yang kamu rasakan dan pikirkan sebagai mahasiswa aktif Politeknik Negeri Malang mengenai pendidikan yang disediakan oleh Politeknik Negeri Malang.<br><br>Pada bagian jawaban terdapat empat pilihan dengan keterangan berikut:
                        <ol class="py-0 text-primary-black" style="margin-top: 0;">
                            <li>Sangat Baik</li>
                            <li>Baik</li>
                            <li>Cukup</li>
                            <li>Buruk</li>
                        </ol>
                    </p>
                </div>
                <div class="d-flex justify-content-end pb-3">
                    <a href=<?php echo "quest.php"; ?>><img src="../..\resources\icons\arrow-right.svg" class="img-fluid"></a>
                </div>
            </div>
        </div>
        <!-- MAIN END -->
        <!-- FOOTER -->
        <div class="container-fluid h-auto bg-white" style="max-height: 5rem;position: absolute; bottom: 0px">
            <div class="d-flex align-items-center justify-content-between px-4 py-4">
                <div class="d-flex align-items-center">
                    <div class="text-head-primary" style="padding-left: 1rem">
                        Survey Kepuasan Pelanggan Polinema
                    </div>
                </div>
            </div>
        </div>
        <!-- FOOTER END -->
    </div>
</body>
</html>





//<?php
//     $included = true;
//     include "../fungsi.php";
//     if (isset($_GET['dst'])){
//         //check destination
//         if (!check_survey_dest($_GET['dst'])){
//             header("Location:landing_page.php");
//         }
//         setcookie("dst",$_GET['dst']);
//         $dst = $_GET['dst'];
//     } else if (isset($_COOKIE['dst'])){
//         $dst = $_COOKIE['dst'];
//     } else {
//         header("Location:landing_page.php");
//     }
//     $role_key = $_COOKIE['role_key'];
//     $username = $_COOKIE['username'];
// ?>
// <!DOCTYPE html>
// <html>
//     <head>
//         <link rel="stylesheet" href="../resources/style.css">
//     </head>
//     <body>
//         <!-- NAVBAR -->
//         <nav class="vh-100 d-flex flex-column align-items-center" style="position: fixed;width: 20%;background-color: var(--primary); padding-top: 5rem; padding-bottom: 2rem;">
//             <div class="d-flex flex-column align-items-center pb-5">
//                 <div>
//                     <img src="..\resources\icons\user-stroke.svg" class="img-fluid border-circle" style="background-color: white;">
//                 </div>
//                 <div class="text-secondary" style="font-weight: bold;">
//                     <?php echo ucfirst($username);?>
//                 </div>
//             </div>
//             <div class="container-fluid d-flex align-items-center justify-content-center text-secondary pb-2 nav-item active">
//                 <a href="../dashboard.php" class="nav-link d-flex align-items-center justify-content-center"><img src="..\resources\icons\navbar\home.svg" class="img-fluid px-2"> Dashboard</a>
//             </div>
//             <div class="container-fluid d-flex align-items-center justify-content-center text-secondary nav-item">
//                 <a href=<?php echo "/biodata/$role_key.php";?> class="nav-link d-flex align-items-center justify-content-center"><img src="..\resources\icons\navbar\biodata.svg" class="img-fluid px-2"> Biodata Diri</a>
//             </div>
//             <div style="bottom: 3rem; position: fixed;">
//                 <a href="../landing_page.php" class="btn-secondary d-flex align-items-center"><img src="..\resources\icons\navbar\logout.svg" class="img-fluid" style="padding-right: 0.25rem;">Keluar</a>
//             </div>
//         </nav>
//         <!-- NAVBAR END -->
//         <div class="container-fluid bg-secondary d-flex align-content-stretch flex-column" style="margin-left: 20%; width: 80%; height: 100%; position: absolute;">
//             <!-- HEADER -->
//             <div class="container-fluid h-auto bg-white" style="max-height: 5rem">
//                 <div class="d-flex align-items-center justify-content-between px-4 py-3">
//                     <div class="d-flex align-items-center">
//                         <div class="text-primary" style="font-size: 1.5rem;">
//                             <?php echo get_survey_label($dst) ?>
//                         </div>
//                     </div>
//                     <div class="d-flex align-items-center">
//                         <div class="text-primary py-2 px-4" style="background-color: #F2DEDE;">
//                             <?php echo $registered_roles[$role_key] ?>
//                         </div>
//                     </div>
//                 </div>
//             </div>
//             <!-- HEADER END -->
//             <!-- MAIN -->
//             <div class="container-fluid d-flex align-items-center flex-column" style="height: 80%;">
//                 <div class="container-fluid text-start pb-1">
//                     <h1 class="px-3 text-head-primary">
//                         Petunjuk Pengisian
//                     </h1>
//                 </div>
//                 <div class="d-flex flex-column bg-white px-5" style="width: 50rem; border-radius: 1rem;">
//                     <div>
//                         <p class="text-primary-black" style="margin-bottom: 0;">
//                             Halaman berikut berisi pernyataan-pernyataan mengenai yang kamu rasakan dan pikirkan sebagai mahasiswa aktif Politeknik Negeri Malang mengenai pendidikan yang disediakan oleh Politeknik Negeri Malang.<br><br>Pada bagian jawaban terdapat empat pilihan dengan keterangan berikut:
//                             <ol class="py-0 text-primary-black" style="margin-top: 0;">
//                                 <li>Sangat Baik</li>
//                                 <li>Baik</li>
//                                 <li>Cukup</li>
//                                 <li>Buruk</li>
//                             </ol>
//                         </p>
//                     </div>
//                     <div class="d-flex justify-content-end pb-3">
//                         <a href=<?php echo "quest.php"?>><img src="../..\resources\icons\arrow-right.svg" class="img-fluid"></a>
//                     </div>
//                 </div>
//             </div>
//             <!-- MAIN END -->
//             <!-- HEADER -->
//             <div class="container-fluid h-auto bg-white" style="max-height: 5rem;position: absolute; bottom: 0px">
//                 <div class="d-flex align-items-center justify-content-between px-4 py-4">
//                     <div class="d-flex align-items-center">
//                         <div class="text-head-primary" style="padding-left: 1rem">
//                             Survey Kepuasan Pelanggan Polinema
//                         </div>
//                     </div>
//                 </div>
//             </div>
//             <!-- HEADER END -->
//         </div>
//     </body>
// </html>