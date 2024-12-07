<?php
//include 'login_action.php';
$role_key = ''; // Definisikan nilai default untuk $role_key

if (isset($_GET['role'])){
    //check role
    $included = true;
    include_once 'fungsi.php';
    if (!check_role($_GET['role'])){
        header("Location:landing_page.php");
        exit(); // Keluar dari skrip untuk menghentikan eksekusi lebih lanjut
    }
    $role_key = $_GET['role'];
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
            <div class="p-3 d-flex flex-column justify-content-center align-items-center">
                <div class="d-flex pb-3 justify-content-center">
                    <h1 class="text-head-primary">
                        Survey Kepuasan Pelanggan Polinema
                    </h1>
                </div>
                <div class="d-flex pt-5 flex-column justify-content-center">
                    <div class="text-head-primary py-3 px-4" style="text-decoration-color: black;background-color: #F2DEDE">
                        Masukkan Username dan Password
                    </div>
                    <form action="login_action.php" method="POST" class="pt-5">
                        <!-- HIDDEN VALUE : ROLE KEY -->
                        <input type="hidden" name="role_key" value=<?php echo "$role_key"; ?>>
                        <div class="d-flex pb-3">
                            <input class="form-control" type="text" name="username" placeholder="Username" required>
                        </div>
                        <div class="d-flex pb-3">
                            <input class="form-control" type="password" name="password" placeholder="Password" required>
                        </div>
                        <div class="d-flex pb-3">
                            <input class="btn-primary" type="submit" value="Masuk" style="width: 100%;">
                        </div>
                        <div class="d-flex">
                            <a class="btn-secondary" href="#" style="width: 100%;">Lupa Password</a>
                        </div>
                    </form>
                </div>
            </div>
            <!-- FROM END -->
        </div>
    </body>
</html>