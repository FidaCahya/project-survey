<?php
include '../koneksi.php'; // Include your database connection

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $questionId = $_POST['id'];
    $newQuestionText = $_POST['question_text'];

    // Prepare and execute the SQL update statement
    $sql = "UPDATE m_survey_soal SET soal_nama = ? WHERE soal_id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("si", $newQuestionText, $questionId);

    if ($stmt->execute()) {
        echo 'success';
    } else {
        echo 'error';
    }

    $stmt->close();
    $conn->close();
} else {
    echo 'Invalid request method';
}
