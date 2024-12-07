<?php
session_start();
include '../fungsi.php'; // Include your function file

// Include necessary files and initialize database connection
require_once "../koneksi.php";
require_once "crud_soal.php"; // Assuming crud_soal.php contains your CRUD class

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

// Handle delete request
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['delete_soal'])) {
    $soal_id = $_POST['soal_id'];
    if ($crud_soal->delete_soal($soal_id)) {
        echo json_encode(['status' => 'success']);
    } else {
        echo json_encode(['status' => 'error', 'message' => 'Failed to delete the question']);
    }
    exit();
}

// Retrieve the 'dst' value from the GET request
if (isset($_GET['dst'])) {
    $dst = $_GET['dst'];
} else {
    // Handle the case where 'dst' is not provided
    $dst = null;
}

// Check if dst is valid (if needed)
if (!$dst || !check_survey_dest($dst)) {
    die("TIPE SURVEY TIDAK DITEMUKAN");
}

// Fetch survey questions from database based on survey_id and category
$survey_id = 1; // Replace with your actual survey_id
$category_id = 1; // Replace with your actual category_id

$questions = $crud_soal->getSoalByCategory($kategori_id);
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
            <a href="../dashboard.php" class="nav-link d-flex align-items-center justify-content-center"><img src="../resources/icons/navbar/home.svg" class="img-fluid px-2"> Dashboard</a>
        </div>
        <div class="container-fluid d-flex align-items-center justify-content-center text-secondary nav-item">
            <a href="../biodata.php" class="nav-link d-flex align-items-center justify-content-center"><img src="../resources/icons/navbar/biodata.svg" class="img-fluid px-2"> Biodata Diri</a>
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
                    Kuesioner <?php echo get_survey_label($dst) ?>
                </h4>
            </div>
            <form method="get" action="kritik.php" class="pb-5">
                <div class="d-flex flex-column bg-white px-5 py-3" style="width: 50rem; border-radius: 1rem;">
                    <div class="d-flex text-primary-black p-5">
                        <p>
                            <ol style='margin:0;padding:0;'>
                                <?php foreach ($questions as $question): ?>
                                    <li class='pb-3'><?php echo $question['soal_nama']; ?></li>
                                    <div class='pb-3 px-4 d-flex justify-content-between'>
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
                                            echo "<div>";
                                            echo "<input type='radio' id='{$key}_{$question['soal_id']}' name='$inputName' value='$key'>";
                                            echo "<label for='{$key}_{$question['soal_id']}'>$label</label>";
                                            echo "</div>";
                                        }
                                        ?>
                                    </div>
                                <?php endforeach; ?>
                            </ol>
                        </p>
                    </div>
                </div>
                <div class="d-flex justify-content-end pt-3">
                    <a href="survey_edit.php?dst=<?php echo $dst; ?>" class="btn-primary">EDIT</a>
                </div>
            </form>
        </div>
        <!-- MAIN END -->
    </div>
    <script type="text/javascript" src="../resources/scripts.js"></script>
</body>
</html>
