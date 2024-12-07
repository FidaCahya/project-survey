<?php

include '../koneksi.php';

// Tangkap data dari formulir
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['answers'])) {
    // Capture the username from the cookie
    $username = $_COOKIE['username'];
    $role_key = $_COOKIE['role_key'];

    // Determine the respondent ID and table based on role_key
    switch ($role_key) {
        case 'mahasiswa':
            $responden_id_column = 'responden_mahasiswa_id';
            $responden_table = 't_responden_mahasiswa';
            $jawaban_table = 't_jawaban_mahasiswa';
            break;
        case 'ortu':
            $responden_id_column = 'responden_ortu_id';
            $responden_table = 't_responden_ortu';
            $jawaban_table = 't_jawaban_ortu';
            break;
        case 'alumni':
            $responden_id_column = 'responden_alumni_id';
            $responden_table = 't_responden_alumni';
            $jawaban_table = 't_jawaban_alumni';
            break;
        case 'tendik':
            $responden_id_column = 'responden_tendik_id';
            $responden_table = 't_responden_tendik';
            $jawaban_table = 't_jawaban_tendik';
            break;
        case 'industri':
            $responden_id_column = 'responden_industri_id';
            $responden_table = 't_responden_industri';
            $jawaban_table = 't_jawaban_industri';
            break;
        case 'dosen':
            $responden_id_column = 'responden_dosen_id';
            $responden_table = 't_responden_dosen';
            $jawaban_table = 't_jawaban_dosen';
            break;
        default:
            die("Role tidak valid.");
    }

    // Query to get the respondent ID from the appropriate table
    $sql_responden = "SELECT $responden_id_column FROM $responden_table WHERE responden_nama = (SELECT nama FROM m_user WHERE username = ? LIMIT 1)";
    $stmt_responden = $conn->prepare($sql_responden);

    if (!$stmt_responden) {
        die("Prepare failed: " . $conn->error);
    }

    $stmt_responden->bind_param("s", $username);
    $stmt_responden->execute();
    $result_responden = $stmt_responden->get_result();

    // Debug output for query execution
    if ($result_responden === false) {
        die("Execute failed: " . $stmt_responden->error);
    }

    if ($result_responden->num_rows > 0) {
        $row_responden = $result_responden->fetch_assoc();
        $responden_id = $row_responden[$responden_id_column];

        // Prepare the SQL statement to insert the responses
        $sql = "INSERT INTO $jawaban_table ($responden_id_column, soal_id, jawaban) VALUES (?, ?, ?)";
        $stmt = $conn->prepare($sql);

        if (!$stmt) {
            die("Prepare failed: " . $conn->error);
        }

        // For each answer, insert it into the database
        foreach ($_POST['answers'] as $soal_id => $jawaban) {
            // Ensure the response is not empty
            if (!empty($jawaban)) {
                $stmt->bind_param("iis", $responden_id, $soal_id, $jawaban);
                $stmt->execute();
            }
        }
        header("Location: kritik.php");
        exit();
        //echo "Data survei berhasil disimpan ke dalam tabel $jawaban_table.";
    } else {
        echo "Responden tidak ditemukan.";
    }

    $stmt_responden->close();
} else {
    echo "Metode pengiriman data tidak valid atau tidak ada data yang dikirimkan.";
}

// Tutup koneksi
$conn->close();
?>

?>

?>

// include '../koneksi.php';

// // Tangkap data dari formulir
// if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['answers'])) {
//     // Capture the username from the cookie
//     $username = $_COOKIE['username'];

//     // Query to get the responden_mahasiswa_id from the t_responden_mahasiswa table
//     $sql_responden = "SELECT responden_mahasiswa_id FROM t_responden_mahasiswa WHERE responden_nama = (SELECT nama FROM m_user WHERE username = ?)";
//     $stmt_responden = $conn->prepare($sql_responden);
//     $stmt_responden->bind_param("s", $username);
//     $stmt_responden->execute();
//     $result_responden = $stmt_responden->get_result();

//     if ($result_responden->num_rows > 0) {
//         $row_responden = $result_responden->fetch_assoc();
//         $responden_mahasiswa_id = $row_responden['responden_mahasiswa_id'];

//         // Prepare the SQL statement to insert the responses
//         $sql = "INSERT INTO t_jawaban_mahasiswa (responden_mahasiswa_id, soal_id, jawaban) VALUES (?, ?, ?)";
//         $stmt = $conn->prepare($sql);

//         if (!$stmt) {
//             die("Prepare failed: " . $conn->error);
//         }

//         // For each answer, insert it into the database
//         foreach ($_POST['answers'] as $soal_id => $jawaban) {
//             // Ensure the response is not empty
//             if (!empty($jawaban)) {
//                 $stmt->bind_param("iis", $responden_mahasiswa_id, $soal_id, $jawaban);
//                 $stmt->execute();
//             }
//         }
//         header("Location: kritik.php");
//         exit();
//         //echo "Data survei berhasil disimpan ke dalam tabel t_jawaban_mahasiswa.";
//     } else {
//         echo "Responden tidak ditemukan.";
//     }

//     $stmt_responden->close();
// } else {
//     echo "Metode pengiriman data tidak valid atau tidak ada data yang dikirimkan.";
// }

// // Tutup koneksi
// $conn->close();
?>
