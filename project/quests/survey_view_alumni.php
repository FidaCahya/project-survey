<?php
session_start();
include '../fungsi.php';
include '../koneksi.php';
include 'crud_soal.php'; // pastikan file ini sudah benar

// Periksa apakah pengguna telah login dan peran telah diatur
if (isset($_SESSION['role'])) {
    $role = $_SESSION['role'];
    $username = $_SESSION['username'];
} else {
    header("Location: login.php");
    exit();
}

// Membuat instance dari crud_soal
$crud_soal = new crud_soal($conn);

// Mendapatkan soal berdasarkan kategori (kategori_id = 3 untuk layanan)
$kategori_id = 4;
$survey_id = 14;
$questions = $crud_soal->getSoalBySurveyIdAndCategory($survey_id, $kategori_id);

?>

<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" href="../resources/style.css">
    <style>
        .radio-group {
            display: flex;
            justify-content: space-between;
            margin-bottom: 10px; /* Add margin at the bottom of each group for better spacing */
        }
        .radio-item {
            margin-right: 40px; /* Increase the margin-right value */
        }
    </style>
</head>
<body>
    <!-- NAVBAR -->
    <nav class="vh-100 d-flex flex-column align-items-center" style="position: fixed;width: 20%;background-color: var(--primary); padding-top: 5rem; padding-bottom: 2rem;">
        <div class="d-flex flex-column align-items-center pb-5">
            <div>
                <img src="../resources/icons/user-stroke.svg" class="img-fluid border-circle" style="background-color: white;">
            </div>
            <div class="text-secondary" style="font-weight: bold;">
                <?php echo ucfirst($username); ?>
            </div>
        </div>
        <div class="container-fluid d-flex align-items-center justify-content-center text-secondary pb-2 nav-item active">
            <a href="../dashboard_admin.php" class="nav-link d-flex align-items-center justify-content-center"><img src="../resources/icons/navbar/home.svg" class="img-fluid px-2"> Dashboard</a>
        </div>
        <div style="bottom: 3rem; position: fixed;">
            <a href="../landing_page.php" class="btn-secondary d-flex align-items-center"><img src="../resources/icons/navbar/logout.svg" class="img-fluid" style="padding-right: 0.25rem;">Keluar</a>
        </div>
    </nav>
    <!-- NAVBAR END -->

    <div class="container-fluid bg-secondary d-flex align-content-stretch flex-column" style="margin-left: 20%; width: 80%; height: max-content; position: absolute;">
        <!-- HEADER -->
        <div class="container-fluid h-auto bg-white" style="max-height: 5rem">
            <!-- Your existing header code here -->
        </div>
        <!-- HEADER END -->
        <!-- MAIN -->
        <div class="container-fluid d-flex align-items-center flex-column" style="height: 80%;">
            <div class="pb-1">
                <h4 class="px-3 text-primary">
                    Kuesioner Survey Alumni
                </h4>
            </div>
            <form method="get" action="kritik.php" class="pb-5">
                <div class="d-flex flex-column bg-white px-5 py-3" style="width: 50rem; border-radius: 1rem;">
                    <div class="d-flex text-primary-black p-5">
                        <p>
                            <ol style='margin:0;padding:0;'>
                                <?php foreach ($questions as $question): ?>
                                    <li class='pb-3'><?php echo $question['soal_nama']; ?></li>
                                    <div class='pb-3 px-4'>
                                        <div class="radio-group">
                                            <?php
                                            // Define options and their labels
                                            $options = [
                                                'sangatBaik' => 'Sangat Baik',
                                                'baik' => 'Baik',
                                                'cukup' => 'Cukup',
                                                'buruk' => 'Buruk'
                                            ];
                                            
                                            // Generate radio inputs for each option
                                            foreach ($options as $key => $label) {
                                                $inputName = "answers[{$question['soal_id']}]"; // Unique name for each question
                                                echo "<div class='radio-item'>";
                                                echo "<input type='radio' id='{$key}_{$question['soal_id']}' name='$inputName' value='$key'>";
                                                echo "<label for='{$key}_{$question['soal_id']}'>$label</label>";
                                                echo "</div>";
                                            }
                                            ?>
                                        </div>
                                    </div>
                                <?php endforeach; ?>
                            </ol>
                        </p>
                    </div>
                </div>
                <div class="d-flex justify-content-end pt-3">
                    <a href="survey_edit_alumni.php" class="btn-primary">EDIT</a>
                </div>
            </form>
        </div>
        <!-- MAIN END -->
    </div>
    <script type="text/javascript" src="../resources/scripts.js"></script>
</body>
</html>
