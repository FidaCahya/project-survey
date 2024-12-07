<?php

include 'koneksi.php';

if (!isset($included)){
    // header("Location:landing_page.php");
}

// Mendapatkan daftar peran dari basis data
function get_registered_roles_from_db() {
    global $conn;
    $roles = [];

    $sql = "SELECT DISTINCT role FROM m_user";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        while($row = $result->fetch_assoc()) {
            $roles[$row['role']] = ucfirst($row['role']);
        }
    }

    return $roles;
}

function check_role($to_check){
    $registered_roles = get_registered_roles_from_db();
    return array_key_exists($to_check, $registered_roles);
}

$registered_roles = get_registered_roles_from_db();

$registered_survey_types = [
    "pendidikan" => "Survey Pendidikan",
    "fasilitas" => "Survey Fasilitas",
    "layanan" => "Survey Layanan",
    "lulusan" => "Survey Lulusan"
];

function get_role_label($key){
    global $conn;
    $sql = "SELECT role FROM m_user WHERE role = '$key' LIMIT 1";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        return ucfirst($row['role']);
    } else {
        return "Peran Tidak Ditemukan";
    }
}

function check_survey_dest($to_check){
    GLOBAL $registered_survey_types;
    return $registered_survey_types[$to_check] ?? false;
}



function get_questions_from_survey($survey_id, $kategori_id) {
    global $conn;
    $questions = [];

    // Query SQL untuk mengambil soal dari tabel m_survey_soal berdasarkan survey_id dan kategori_id
    $sql = "SELECT * FROM m_survey_soal WHERE survey_id = ? AND kategori_id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ii", $survey_id, $kategori_id);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            $questions[] = $row;
        }
    }

    $stmt->close();
    return $questions;
}




function get_survey_label($key){
    GLOBAL $registered_survey_types;
    return $registered_survey_types[$key] ?? "TIPE SURVEY TIDAK DITEMUKAN";
}

function file_to_array($filename){
    return file($filename, FILE_IGNORE_NEW_LINES);
}
?>
