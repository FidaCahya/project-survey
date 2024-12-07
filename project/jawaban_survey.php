<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "surveykepuasan";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if (isset($_GET['role'])) {
    $role = $_GET['role'];

    $table = "";
    $id_column = "";
    $answer_column = "jawaban";

    if ($role == 'mahasiswa') {
        $table = "t_jawaban_mahasiswa";
        $id_column = "responden_mahasiswa_id";
    } else if ($role == 'ortu') {
        $table = "t_jawaban_ortu";
        $id_column = "responden_ortu_id";
    } else if ($role == 'dosen') {
        $table = "t_jawaban_dosen";
        $id_column = "responden_dosen_id";
    } else if ($role == 'alumni') {
        $table = "t_jawaban_alumni";
        $id_column = "responden_alumni_id";
    } else if ($role == 'tendik') {
        $table = "t_jawaban_tendik";
        $id_column = "responden_tendik_id";
    } else if ($role == 'industri') {
        $table = "t_jawaban_industri";
        $id_column = "responden_industri_id";
    } else {
        die("Role tidak dikenali.");
    }
} else {
    die("Parameter role tidak ditemukan.");
}
?>

<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" href="resources/style.css">
    <script type="text/javascript" src="resources/jquery-3.7.1.min.js"></script>
    <style>
        .table th, .table td {
            width: 150px; 
            word-wrap: break-word;
        }
    </style>
</head>
<body>
    <nav class="vh-100 d-flex flex-column align-items-center" style="position: fixed;width: 20%;background-color: var(--primary); padding-top: 5rem; padding-bottom: 2rem;">
        <div class="d-flex flex-column align-items-center pb-5">
            <div>
                <img src="resources/icons/user-stroke.svg" class="img-fluid border-circle" style="background-color: white;">
            </div>
           <div class="text-secondary" style="font-weight: bold;">
            </div>
        </div>
        <div class="container-fluid d-flex align-items-center justify-content-center text-secondary pb-2 nav-item">
            <a href="dashboard_admin.php" class="nav-link d-flex align-items-center justify-content-center"><img src="resources/icons/navbar/home.svg" class="img-fluid px-2"> Dashboard</a>
        </div>
        <div class="container-fluid d-flex align-items-center justify-content-center text-secondary nav-item active">
            <a href="role_pick.php" class="nav-link d-flex align-items-center justify-content-center"><img src="resources/icons/navbar/survey.svg" class="img-fluid px-2"> Pilihan Responden</a>
        </div>
        <div style="bottom: 3rem; position: fixed;">
            <a href="landing_page.php" class="btn-secondary d-flex align-items-center"><img src="resources/icons/navbar/logout.svg" class="img-fluid" style="padding-right: 0.25rem;">Keluar</a>
        </div>
    </nav>
    
    <div class="container-fluid bg-secondary d-flex align-content-stretch flex-column" style="margin-left: 20%; width: 80%; min-height: 100%; height: max-content;">
        
        <div class="container-fluid h-auto bg-white" style="max-height: 5rem">
            <div class="d-flex align-items-center justify-content-between px-4 py-3">
                <div class="d-flex align-items-center">
                    <div class="text-primary" style="font-size: 1.5rem;">
                        Jawaban Survey: <?php echo ucfirst($role); ?>
                    </div>
                </div>
                <!-- <div class="d-flex align-items-center">
                    <div class="text-primary py-2 px-4" style="background-color: #F2DEDE;">
                    </div>
                </div> -->
            </div>
        </div>
        
        <div class="container-fluid d-flex align-items-center flex-column" style="height: 100%;">
                <div class="py-5">
                    <h1 class="text-primary">
                        Jawaban Responden
                    </h1>
                </div>
                <div style="width: 80%;">
                    <table class="text-primary user-list">
                        <tr>
                            <th>Responden ID</th>
                            <th>Soal ID</th>
                            <th>Kategori Soal</th>
                            <th>Jawaban</th>
                        </tr>
                        <?php
                        $sql = "SELECT j.$id_column, j.soal_id, k.kategori_nama, j.$answer_column 
                                FROM $table j
                                JOIN m_survey_soal s ON j.soal_id = s.soal_id
                                JOIN m_kategori k ON s.kategori_id = k.kategori_id";
                        $result = $conn->query($sql);

                        if ($result->num_rows > 0) {
                            while($row = $result->fetch_assoc()) {
                                echo "<tr>";
                                echo "<td>" . $row[$id_column] . "</td>";
                                echo "<td>" . $row['soal_id'] . "</td>";
                                echo "<td>" . $row['kategori_nama'] . "</td>";
                                echo "<td>" . $row[$answer_column] . "</td>";
                                echo "</tr>";
                            }
                        } else {
                            echo "<tr><td colspan='4'>Tidak ada data ditemukan</td></tr>";
                        }
                        $conn->close();
                        ?>
                    </table>
                </div>
        </div>

        <div class="container-fluid h-auto bg-white" style="max-height: 5rem; margin-top: 4rem;">
            <div class="d-flex align-items-center justify-content-between px-4 py-4">
                <div class="d-flex align-items-center">
                    <div class="text-head-primary" style="padding-left: 1rem">
                        Survey Kepuasan Pelanggan Polinema
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
