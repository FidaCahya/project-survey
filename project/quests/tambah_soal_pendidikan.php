<?php
session_start();
include '../fungsi.php';
include '../koneksi.php'; 
include 'crud_soal.php';

// Initialize CRUD class
$crud_soal = new crud_soal($conn);

// Periksa apakah pengguna telah login dan peran telah diatur
if (isset($_SESSION['role'])) {
    $role = $_SESSION['role'];
    $username = $_SESSION['username'];
} else {
    header("Location: login.php");
    exit();
}

// Handle form submission
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $survey_id = 1; // Replace with your actual survey_id
    $kategori_id = 1; // Replace with your actual kategori_id
    $no_urut = $_POST['no_urut'];
    $soal_jenis = $_POST['soal_jenis'];
    $soal_nama = $_POST['soal_nama'];

    // Call the createSoal method
    $crud_soal->createSoal($survey_id, $kategori_id, $no_urut, $soal_jenis, $soal_nama);

    // Define the JavaScript function to show confirmation and redirect
    echo '<script>
            function showConfirmation() {
                alert("Soal sudah tersimpan.");
                window.location.href = "survey_edit_pendidikan.php";
            }
            showConfirmation();
          </script>';
    exit();
}

// Set $dst for the form
$dst = 1; // or another appropriate value for the type of survey
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
                <img src="../resources/icons/user-stroke.svg" class="img-fluid border-circle" style="background-color: white;">
            </div>
            <div class="text-secondary" style="font-weight: bold;">
                <?php echo ucfirst($username);?>
            </div>
        </div>
        <div class="container-fluid d-flex align-items-center justify-content-center text-secondary pb-2 nav-item active">
            <a href="../dashboard_admin.php" class="nav-link d-flex align-items-center justify-content-center"><img src="../resources/icons/navbar/home.svg" class="img-fluid px-2"> Dashboard</a>
        </div>
        <!-- <div class="container-fluid d-flex align-items-center justify-content-center text-secondary nav-item">
            <a href="../biodata.php" class="nav-link d-flex align-items-center justify-content-center"><img src="../resources/icons/navbar/biodata.svg" class="img-fluid px-2"> Biodata Diri</a>
        </div> -->
        <div style="bottom: 3rem; position: fixed;">
            <a href="../landing_page.php" class="btn-secondary d-flex align-items-center"><img src="../resources/icons/navbar/logout.svg" class="img-fluid" style="padding-right: 0.25rem;">Keluar</a>
        </div>
    </nav>
    <!-- NAVBAR END -->
    
    <div class="container-fluid bg-secondary d-flex align-content-stretch flex-column" style="margin-left: 20%; width: 80%; height: max-content; min-height: 100%; position: absolute;">
        <!-- HEADER -->
        <div class="container-fluid pt-2 pb-5 d-flex align-items-center justify-content-center flex-column" style="height: 100%;">
            <div class="text-center pb-2">
                <h2 class="text-primary">
                    Tambah Soal Kuisioner
                </h2>
            </div>
            <div class="container-fluid bg-white text-primary-black">
                <form method="POST" action="" onsubmit="showConfirmation()">
                    <div class="container-fluid bg-white text-primary-black" style="padding: 20px; margin-bottom: 10px; border: 1px solid #ccc;">
                        <div>
                            <label for="no_urut">Nomor Urut:</label>
                            <input type="number" name="no_urut" required>
                        </div>
                        <div>
                            <label for="soal_jenis">Jenis Soal:</label>
                            <input type="text" name="soal_jenis" required>
                        </div>
                        <div>
                            <label for="soal_nama">Nama Soal:</label>
                            <textarea name="soal_nama" style="width: 100%;" rows="4" required></textarea>
                        </div>
                        <div class="d-flex justify-content-end px-4">
                            <button type="submit" class="btn-primary">SIMPAN</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
        <!-- MAIN END -->
    </div>
    <script type="text/javascript" src="../resources/scripts.js"></script>
</body>
</html>
