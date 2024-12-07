<?php
//session_start();
require_once __DIR__ . "/../../CRUD/CrudUserMahasiswa.php";
//require_once __DIR__ . "/../../project/koneksi.php";


$conn = new mysqli($servername, $username, $password, $database);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$crud = new CrudUserMahasiswa($conn);

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = $_POST['username'];
    $name = $_POST['nama'];
    $password = $_POST['password'];
    $nim = $_POST['nim'];
    $prodi = $_POST['prodi'];
    $email = $_POST['email'];
    $hp = $_POST['notelp'];
    $tahun_masuk = $_POST['tahunMasuk'];
    $role = $_POST['role'];

    $survey_id = null;
    $surveyStmt = $conn->prepare("SELECT survey_id FROM m_survey LIMIT 1");
    if ($surveyStmt === false) {
        die("Error preparing statement: " . $conn->error);
    }
    $surveyStmt->execute();
    $surveyResult = $surveyStmt->get_result();
    if ($surveyRow = $surveyResult->fetch_assoc()) {
        $survey_id = $surveyRow['survey_id'];
    } else {
        die("No valid survey_id found.");
    }
    $surveyStmt->close();

    $user_id = $crud->createAkun($username, $name, $password, $role);

    if ($user_id) {
        $crud->createMahasiswa($nim, $name, $prodi, $email, $hp, $tahun_masuk, $survey_id);
        echo "Registrasi berhasil!";
        header("Location: ../../login.php");
        exit();
    } else {
        echo "Registrasi gagal!";
    }
}
?>
