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

// Query to fetch data from m_kategori table
$categories = [];
$conn = new mysqli('localhost', 'root', '', 'surveykepuasan'); // Update with your database connection details

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$sql = "SELECT kategori_id, kategori_nama FROM m_kategori";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
        $categories[] = $row;
    }
}

// Query to fetch data from kriteria table
$criteria = [];

$sql = "SELECT id_criteria, code, criteria, weight, attribute FROM kriteria";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
        $criteria[] = $row;
    }
}

// Query to fetch data from evaluasi table
$evaluations = [];

$sql = "SELECT id_alternative, id_criteria, value FROM evaluasi";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
        $evaluations[] = $row;
    }
}

$conn->close();
?>
<!DOCTYPE html>
<html>
    <head>
        <link rel="stylesheet" href="resources/style.css">
        <script type="text/javascript" src="resources/jquery-3.7.1.min.js"></script>
        <script>$(function(){$('#sub-frame').load('summary.php')});</script>
    </head>
    <body>
        <!-- NAVBAR -->
        <nav class="vh-100 d-flex flex-column align-items-center" style="position: fixed;width: 20%;background-color: var(--primary); padding-top: 5rem; padding-bottom: 2rem;">
            <div class="d-flex flex-column align-items-center pb-5">
                <div>
                    <img src="resources/icons/user-stroke.svg" class="img-fluid border-circle" style="background-color: white;">
                </div>
                <div class="text-secondary" style="font-weight: bold;">
                    <?php echo ucfirst($username);?>
                </div>
            </div>
            <div class="container-fluid d-flex align-items-center justify-content-center text-secondary pb-2 nav-item active">
                <a href="dashboard_admin.php" class="nav-link d-flex align-items-center justify-content-center"><img src="resources/icons/navbar/home.svg" class="img-fluid px-2"> Dashboard</a>
            </div>
            <!-- <div class="container-fluid d-flex align-items-center justify-content-center text-secondary nav-item">
                <a href="biodata.php" class="nav-link d-flex align-items-center justify-content-center"><img src="resources/icons/navbar/biodata.svg" class="img-fluid px-2"> Biodata Diri</a>
            </div> -->
            <div style="bottom: 3rem; position: fixed;">
                <a href="landing_page.php" class="btn-secondary d-flex align-items-center"><img src="resources/icons/navbar/logout.svg" class="img-fluid" style="padding-right: 0.25rem;">Keluar</a>
            </div>
        </nav>
        <!-- NAVBAR END -->
        <div class="container-fluid bg-secondary d-flex align-content-stretch flex-column" style="margin-left: 20%; width: 80%; min-height: 100%; height: max-content;">
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
                            <!-- admin -->
                            <?php echo ucfirst($role);?>  
                        </div>
                    </div>
                </div>
            </div>
            <!-- HEADER END -->
            <!-- MAIN -->
            <div class="container-fluid d-flex align-items-center justify-content-center flex-column" style="height: 100%;">
                <div class="text-center py-2">
                    <h1 class="text-head-primary">
                        Selamat Datang Admin!
                    </h1>
                </div>
                <div class="d-flex" style="width: 40rem; height: 10rem;">
                    <div class="d-flex px-3" style="width: 100%;">
                        <a href="quests/survey_type.php" class="btn-primary d-flex align-items-center justify-content-center" style="width: 100%;border-radius: 0;">Soal Survey</a>
                    </div>
                    <div class="d-flex px-3" style="width: 100%;">
                        <a href="role_pick.php" class="btn-primary d-flex align-items-center justify-content-center" style="width: 100%;border-radius: 0;">Jawaban Survey</a>
                    </div>
                </div>
            </div>
            <!-- MAIN END -->
            <!-- DATA ALTERNATIF -->
            <div class="container-fluid d-flex align-items-center justify-content-center flex-column" style="margin-top: 2rem;">
                <div class="text-center py-2">
                    <h2 class="text-head-primary">
                        Data Alternatif
                    </h2>
                </div>
                <table class="table table-striped" style="width: 80%;">
                    <thead>
                        <tr>
                            <th scope="col">Nomor</th>
                            <th scope="col">Nama Alternatif</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach($categories as $category): ?>
                        <tr>
                            <th scope="row"><?php echo $category['kategori_id']; ?></th>
                            <td><?php echo $category['kategori_nama']; ?></td>
                        </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
            <!-- DATA ALTERNATIF END -->
            <!-- DATA KRITERIA -->
            <div class="container-fluid d-flex align-items-center justify-content-center flex-column" style="margin-top: 2rem;">
                <div class="text-center py-2">
                    <h2 class="text-head-primary">
                        Daftar Data Kriteria
                    </h2>
                </div>
                <table class="table table-striped" style="width: 80%;">
                    <thead>
                        <tr>
                            <th scope="col">Nomor</th>
                            <th scope="col">Kode</th>
                            <th scope="col">Kriteria</th>
                            <th scope="col">Bobot</th>
                            <th scope="col">Atribut</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach($criteria as $criterion): ?>
                        <tr>
                            <th scope="row"><?php echo $criterion['id_criteria']; ?></th>
                            <td><?php echo $criterion['code']; ?></td>
                            <td><?php echo $criterion['criteria']; ?></td>
                            <td><?php echo $criterion['weight']; ?></td>
                            <td><?php echo $criterion['attribute']; ?></td>
                        </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
            <!-- DATA KRITERIA END -->
             <!-- MATRIKS KEPUTUSAN -->
<div class="container-fluid d-flex align-items-center justify-content-center flex-column" style="margin-top: 2rem;">
    <div class="text-center py-2">
        <h2 class="text-head-primary">
            Matriks Keputusan
        </h2>
    </div>
    <table class="table table-striped" style="width: 80%;">
        <thead>
            <tr>
                <th scope="col">Alternatif</th>
                <?php foreach($criteria as $criterion): ?>
                <th scope="col"><?php echo $criterion['criteria']; ?></th>
                <?php endforeach; ?>
            </tr>
        </thead>
        <tbody>
            <?php foreach($categories as $category): ?>
            <tr>
                <td><?php echo $category['kategori_nama']; ?></td>
                <?php foreach($criteria as $criterion): ?>
                <td>
                    <?php
                        // Cari nilai evaluasi untuk alternatif dan kriteria tertentu
                        $nilai_evaluasi = ""; // Default nilai kosong
                        foreach($evaluations as $evaluation) {
                            if ($evaluation['id_alternative'] == $category['kategori_id'] && $evaluation['id_criteria'] == $criterion['id_criteria']) {
                                $nilai_evaluasi = $evaluation['value'];
                                break;
                            }
                        }
                        echo $nilai_evaluasi;
                    ?>
                </td>
                <?php endforeach; ?>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>
<!-- MATRIKS KEPUTUSAN END -->

            <!-- FOOTER -->
            <div class="container-fluid h-auto bg-white" style="max-height: 5rem; margin-top: 4rem;">
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

tambahkan dibawahnya kolom bobot kriteria dengan kolom per Criteria