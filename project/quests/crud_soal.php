<?php
require_once "../koneksi.php";

class crud_soal {
    private $conn;

    public function __construct($conn) {
        $this->conn = $conn;
    }

    // Method untuk menambahkan soal baru
    public function createSoal($survey_id, $kategori_id, $no_urut, $soal_jenis, $soal_nama) {
        $stmt = $this->conn->prepare("INSERT INTO m_survey_soal (survey_id, kategori_id, no_urut, soal_jenis, soal_nama) VALUES (?, ?, ?, ?, ?)");
        if ($stmt === false) {
            die("Error preparing statement: " . $this->conn->error);
        }
        $stmt->bind_param("iiiss", $survey_id, $kategori_id, $no_urut, $soal_jenis, $soal_nama);
        if (!$stmt->execute()) {
            die("Error executing statement: " . $stmt->error);
        }
        $stmt->close();

        return $this->conn->insert_id;
    }

    // Method untuk mengupdate soal yang ada
    public function updateSoal($soal_id, $kategori_id, $soal_nama) {
        $stmt = $this->conn->prepare("UPDATE m_survey_soal SET soal_nama = ? WHERE soal_id = ? AND kategori_id = ?");
        if ($stmt === false) {
            die("Error preparing statement: " . $this->conn->error);
        }
        $stmt->bind_param("sii", $soal_nama, $soal_id, $kategori_id);
        if (!$stmt->execute()) {
            die("Error executing statement: " . $stmt->error);
        }
        $stmt->close();
    }

    // Method untuk menghapus soal berdasarkan ID
    public function delete_soal($soal_id) {
        $stmt = $this->conn->prepare("DELETE FROM m_survey_soal WHERE soal_id = ?");
        if ($stmt === false) {
            die("Error preparing statement: " . $this->conn->error);
        }
        $stmt->bind_param("i", $soal_id);
        if (!$stmt->execute()) {
            die("Error executing statement: " . $stmt->error);
        }
        $stmt->close();
    }

     public function getSoalBySurveyIdAndCategory($survey_id, $kategori_id) {
        $sql = "SELECT * FROM m_survey_soal WHERE survey_id = ? AND kategori_id = ?";
        $stmt = $this->conn->prepare($sql);

        if ($stmt === false) {
            die("Error preparing statement: " . $this->conn->error);
        }

        $stmt->bind_param("ii", $survey_id, $kategori_id);
        if (!$stmt->execute()) {
            die("Error executing statement: " . $stmt->error);
        }

        $result = $stmt->get_result();
        $soal = [];
        while ($row = $result->fetch_assoc()) {
            $soal[] = $row;
        }
        $stmt->close();
        return $soal;
    }
    // // Method untuk mengambil semua soal berdasarkan kategori_id
    // public function getSoalByCategory($kategori_id) {
    //     $sql = "SELECT * FROM m_survey_soal WHERE kategori_id = ?";
    //     $stmt = $this->conn->prepare($sql);

    //     if ($stmt === false) {
    //         die("Error preparing statement: " . $this->conn->error);
    //     }

    //     $stmt->bind_param("i", $kategori_id);
    //     if (!$stmt->execute()) {
    //         die("Error executing statement: " . $stmt->error);
    //     }

    //     $result = $stmt->get_result();
    //     $soal = [];
    //     while ($row = $result->fetch_assoc()) {
    //         $soal[] = $row;
    //     }

    //     $stmt->close();
    //     return $soal;
    }

?>
