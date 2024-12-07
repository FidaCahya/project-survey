<?php
require_once __DIR__ . "/../../project/koneksi.php";

class CrudUserDosen {
    private $conn;

    public function __construct($conn) {
        $this->conn = $conn;
    }

    public function createAkun($username, $name, $password, $role) {
        //$hashedPassword = password_hash($password, PASSWORD_BCRYPT);
        $stmt = $this->conn->prepare("INSERT INTO m_user (username, nama, password, role) VALUES (?, ?, ?, ?)");
        if ($stmt === false) {
            die("Error preparing statement: " . $this->conn->error);
        }
        $stmt->bind_param("ssss", $username, $name, $password, $role);
        if (!$stmt->execute()) {
            die("Error executing statement: " . $stmt->error);
        }

        $selectStmt = $this->conn->prepare("SELECT user_id FROM m_user WHERE username = ?");
        if ($selectStmt === false) {
            die("Error preparing statement: " . $this->conn->error);
        }
        $selectStmt->bind_param("s", $username);
        $selectStmt->execute();
        $result = $selectStmt->get_result();
        if ($row = $result->fetch_assoc()) {
            $stmt->close();
            $selectStmt->close();
            return $row['user_id'];
        } else {
            $stmt->close();
            $selectStmt->close();
            return null;
        }
    }

    public function createDosen($nama, $nip, $unit, $survey_id) {
        $stmt = $this->conn->prepare("INSERT INTO t_responden_dosen (responden_nama, responden_nip, responden_unit, survey_id, responden_tanggal) VALUES (?, ?, ?, ?, NOW())");
        if ($stmt === false) {
            die("Error preparing statement: " . $this->conn->error);
        }
        $stmt->bind_param("sisi", $nama, $nip, $unit, $survey_id);
        if (!$stmt->execute()) {
            die("Error executing statement: " . $stmt->error);
        }
        $stmt->close();

        return $this->conn->insert_id;
    }
}
?>
