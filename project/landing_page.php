<?php
if (isset($_COOKIE['role_key'])){
    unset($_COOKIE['role_key']);
    setcookie('role_key','',-1,'/');
}
if (isset($_COOKIE['username'])){
    unset($_COOKIE['username']);
    setcookie('username','',-1,'/');
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
                            <img src="resources/icons/poltek-logoo.png" class="img-fluid" alt="logo-uni">
                        </div>
                        <div class="text-head-primary" style="padding-left: 1rem; width: 11rem;">
                            POLITEKNIK NEGERI MALANG
                        </div>
                    </div>
                    <div class="d-flex align-items-center">
                        <div style="width: 50px;">
                            <img src="resources/icons/a279b488c581b0ecf88b189fddfc16ab.png" class="img-fluid">
                        </div>
                    </div>
                </div>
            </div>
            <!-- HEADER END -->
            <!-- BANNER 1 -->
            <div class="container-fluid">
                <div class="p-5 d-flex justify-content-between text-primary">
                    <div>
                        <h1 class="text-head-extra-primary" style="max-width: 400px;">
                            Survey Kepuasan Pelanggan Polinema
                        </h1>
                        <p style="max-width: 480px;">
                            Sistem Survey Kepuasan Pelanggan Polinema merupakan sarana penting untuk mengukur tingkat kepuasan seluruh pemangku kepentingan polinema, mulai dari mahasiswa, orang tua/wali mahasiswa, alumni, mitra kerjasama, hingga pengguna lulusan polinema. Survey ini dapat memberikan gambaran menyeluruh tentang kinerja polinema dalam berbagai aspek yang harus di evaluasi
                        </p>
                        <div>
                            <a class="btn-primary" href="login.php">Masuk</a>
                            <a class="btn-secondary" href="rolepick.php?act=register">Daftar</a>
                        </div>
                    </div>
                    <div class="d-flex" style="max-width: 350px;">
                        <img src="resources/gambar/cover1.png" class="img-fluid">
                    </div>
                </div>
            </div>
            <!-- BANNER 1 END -->
            <!-- BANNER 2 -->
            <div class="container-fluid bg-secondary">
                <div class="text-head-primary text-center px-5 py-4">
                    <h2>
                        Jenis Survey
                    </h2>
                </div>
                <div class="d-flex px-5 justify-content-between text-primary text-center">
                    <div class="d-flex flex-column align-items-center" style="width: 250px;">
                        <div class="border-circle p-4" style="width: 80px;">
                        <img src="resources/icons/jenis survey/teach_4696488.png" class="img-fluid">
                        </div>
                        <div class="p-0">
                            <h2>
                                Survey Kualitas Pendidikan
                            </h2>
                        </div>
                        <div class="p-0">
                            <p>
                                Mengukur kepuasan pada kualitas pendidikan di Polinema
                            </p>
                        </div>
                    </div>
                    <div class="d-flex flex-column align-items-center" style="width: 200px;">
                        <div class="border-circle p-4" style="width: 80px;">
                        <img src="resources/icons/jenis survey/city_1095519.png" class="img-fluid">
                        </div>
                        <div class="p-0">
                            <h2>
                                Survey Kualitas Fasilitas
                            </h2>
                        </div>
                        <div class="p-0">
                            <p>
                                Mengukur kepuasan pada kualitas fasilitas di Polinema
                            </p>
                        </div>
                    </div>
                    <div class="d-flex flex-column align-items-center" style="width: 200px;">
                        <div class="border-circle p-4" style="width: 80px;">
                        <img src="resources/icons/jenis survey/support_1067566.png" class="img-fluid">
                        </div>
                        <div class="p-0">
                            <h2>
                                Survey Kualitas Layanan
                            </h2>
                        </div>
                        <div class="p-0">
                            <p>
                                Mengukur kepuasan pada kualitas layanan di Polinema
                            </p>
                        </div>
                    </div>
                    <div class="d-flex flex-column align-items-center" style="width: 200px;">
                        <div class="border-circle p-4" style="width: 80px;">
                        <img src="resources/icons/jenis survey/mortarboard_251027.png" class="img-fluid">
                        </div>
                        <div class="p-0">
                            <h2>
                                Survey Kualitas Lulusan
                            </h2>
                        </div>
                        <div class="p-0">
                            <p>
                                Mengukur kepuasan pada kualitas lulusan di Polinema
                            </p>
                        </div>
                    </div>
                </div>
            </div>
            <!-- BANNER 2 END -->
            <!-- BANNER 3 -->
            <div class="container-fluid text-center">
                <div class="d-flex flex-column p-5">
                    <div class="d-flex justify-content-center">
                        <h3 class="d-flex align-items-center text-primary-lighter">
                            Kami siap melayani anda sepenuh hati<img src="resources/icons/favorite.svg" class="img-fluid px-1"> 
                        </h3>
                    </div>
                    <div>
                        <p class="text-primary">
                            Berharap Anda dapat menyampaikan kendala yang Anda alami saat menggunakan layanan yang kami berikan. Kami sangat berharap Anda tidak segan-segan untuk mengirim pesan, pertanyaan atau kritik.
                        </p>
                    </div>
                </div>
            </div>
            <!-- BANNER 3 END -->
            <!-- BANNER 4 -->
            <div class="container-fluid" style="background-color: var(--primary);">
                <div class="d-flex p-5 pb-3 align-items-center justify-content-between">
                    <div class="d-flex">
                        <img src="resources/gambar/map.png" class="img-fluid">
                    </div>
                    <div class="container-fluid flex-column align-items-between" style="padding-left: 3rem;">
                        <h2 class="text-head-secondary" style="margin: 0;">
                            Kampus Polinema
                        </h2>
                        <div style="max-width: 280px;padding-bottom: 3rem;">
                            <p class="text-secondary">
                                Jl. Seokarno Hatta No.9, Jatimulyo, Kec. Lowokwaru, Kota Malang, Jawa Timur 65141, Indonesia
                            </p>
                        </div>
                        <div class="d-flex justify-content-between text-secondary">
                            <div class="d-flex align-items-center">
                                <img src="resources/icons/envelope.svg" class="img-fluid" style="padding-right: 0.5rem;">@polinema.ac.id
                            </div>
                            <div class="d-flex align-items-center">
                                <img src="resources/icons/phone.svg" class="img-fluid" style="padding-right: 0.5rem;">+62341404424
                            </div>
                        </div>
                    </div>
                </div>
                <div class="container-fluid">
                    <div class="container-fluid d-flex flex-row-reverse">
                        <div class="d-flex px-5 pb-5" style="margin: 0;">
                            <div style="max-width: 25px; max-height: 25px; padding-left: 0.5rem;">
                                <img src="resources/icons/social media/fb.png" class="img-fluid">
                            </div>
                            <div style="max-width: 25px; max-height: 25px; padding-left: 0.5rem;">
                                <img src="resources/icons/social media/ig.png" class="img-fluid">
                            </div>
                            <div style="max-width: 25px; max-height: 25px; padding-left: 0.5rem;">
                                <img src="resources/icons/social media/yt.png" class="img-fluid">
                            </div>
                            <div style="max-width: 25px; max-height: 25px; padding-left: 0.5rem;">
                                <img src="resources/icons/social media/x.png" class
