<?php
session_start();
require_once __DIR__ . "/../../CRUD/CrudUserOrangtua.php";
//require_once __DIR__ . "/../../project/koneksi.php";

$conn = new mysqli($servername, $username, $password, $database);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$crud = new CrudUserOrangtua($conn);

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = $_POST['username'];
    $nama = $_POST['nama'];
    $password = $_POST['password'];
    $hp = $_POST['notelp'];
    $jk = $_POST['jenisKelamin'];
    $umur = $_POST['umur'];
    $pendidikan = $_POST['pendidikan'];
    $pekerjaan = $_POST['pekerjaan'];
    $penghasilan = $_POST['penghasilan'];
    $mahasiswa_nama = $_POST['namaMhs'];
    $mahasiswa_prodi = $_POST['prodiMhs'];
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

    $user_id = $crud->createAkun($username, $nama, $password, $role);

    if ($user_id) {
        $crud->createOrangtua($nama, $hp, $jk, $umur, $pendidikan, $pekerjaan, $penghasilan, $mahasiswa_nama, $mahasiswa_prodi, $survey_id);
        echo "Registrasi berhasil!";
        header("Location: ../../login.php");
        exit();
    } else {
        echo "Registrasi gagal!";
    }
}
?>
