<?php
session_start();
include '../fungsi.php';
include '../koneksi.php'; // Sertakan file koneksi database
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

$kategori_id = 1;
$survey_id = 1;
$questions = $crud_soal->getSoalBySurveyIdAndCategory($survey_id, $kategori_id);

// Process form submission (update or delete)
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST['submit_edit_soal'])) {
        $nomorSoal = $_POST['nomor_soal'];
        $soal = $_POST['soal'];

        foreach ($nomorSoal as $id => $value) {
            $crud_soal->updateSoal($id, $kategori_id, $soal[$id]);
        }

        // Redirect back to the same page
        header("Location: survey_edit_pendidikan.php");
        exit();
    }

    if (isset($_POST['delete_soal'])) {
        $soal_id = $_POST['soal_id'];
        $crud_soal->delete_soal($soal_id);
    
        // Redirect to the same page after deleting
        header("Location: survey_edit_pendidikan.php");
        exit();
    }
    
}
?>

<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" href="../resources/style.css">
    <script type="text/javascript" src="../resources/jquery-3.7.1.min.js"></script>
    <script type="text/javascript">
        $(document).ready(function() {
            // Hide edit forms initially
            $(".edit-form").hide();

            // Handle click event on edit button
            $(".edit-btn").click(function() {
                var container = $(this).closest(".question-container");
                container.find(".question-text").hide();
                container.find(".edit-form").show();
            });

            $(".delete-btn").click(function() {
            var soal_id = $(this).data('soal-id'); // Pastikan ini mengambil data-soal-id yang benar
            var container = $(this).closest(".question-container");

            $.ajax({
                url: 'survey_edit_pendidikan.php',
                type: 'POST',
                data: { delete_soal: true, soal_id: soal_id },
                success: function(response) {
                    console.log(response); // Optional, for debugging
                    container.remove();
                },
                error: function() {
                    alert('Gagal menghapus soal.');
                }
            });
        });


            });
    </script>
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
    <div class="container-fluid bg-secondary d-flex align-content-stretch flex-column" style="margin-left: 20%; width: 80%; height: max-content; position: absolute;">
        <!-- HEADER -->
        <div class="container-fluid pt-2 pb-5 d-flex align-items-center justify-content-center flex-column" style="height: 100%;">
            <div class="text-center pb-2">
                <h2 class="text-primary">
                    Kuisioner Survey Pendidikan
                </h2>
            </div>
            <div class="container-fluid bg-white text-primary-black">
                <form method="POST" action="">
                    <?php foreach ($questions as $question): ?>
                        <div class="container-fluid bg-white text-primary-black question-container" style="padding: 20px; margin-bottom: 10px; border: 1px solid #ccc;">
                            <div class="question-text">
                                <p><?php echo $question['soal_nama']; ?></p>
                                <button type="button" class="edit-btn">Edit</button>
                            </div>
                            <div class="edit-form">
                                <input type="hidden" name="nomor_soal[<?php echo $question['soal_id']; ?>]" value="<?php echo $question['soal_id']; ?>">
                                <textarea name="soal[<?php echo $question['soal_id']; ?>]" style="width: 100%;" rows="4"><?php echo $question['soal_nama']; ?></textarea>
                                <div class="d-flex justify-content-end px-4">
                                <button type="button" class="delete-btn" data-soal-id="<?php echo $question['soal_id']; ?>" style="cursor:pointer;">
                                    <img src="../resources/icons/bin.svg" class="img-fluid px-3">
                                    </button>
                                    <button type="submit" class="btn-primary" name="submit_edit_soal">SIMPAN</button>
                                </div>
                            </div>
                        </div>
                    <?php endforeach; ?>
                </form>
                <div class="d-flex justify-content-between container-fluid" style="width: 90%;">
                    <div class="py-3">
                        <a href="tambah_soal_pendidikan.php" class="btn-primary">
                            TAMBAH SOAL
                        </a>
                    </div>
                </div>
            </div>
        </div>
        <!-- MAIN END -->
    </div>
    <script type="text/javascript" src="../resources/scripts.js"></script>
</body>
</html>
