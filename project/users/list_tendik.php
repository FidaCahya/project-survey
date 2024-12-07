<?php
    $included = true;
    include_once '../fungsi.php';

    if (isset($_GET['username'])){
        setcookie("username", $_GET['username']);
        setcookie("role", $_GET['role']);
        $username = $_GET['username'];
        $role = $_GET['role'];
    } else if (isset($_COOKIE['username'])){
        $username = $_COOKIE['username'];
        $role = $_COOKIE['role'];
    } else {
        header("Location:landing_page.php");
    }

    // Koneksi ke database
    $conn = new mysqli("localhost", "root", "", "surveikepuasan");

    // Periksa koneksi
    if ($conn->connect_error) {
        die("Koneksi ke database gagal: " . $conn->connect_error);
    }

    // Query untuk mengambil data responden tendik dari tabel t_responden_tendik
    $sql_responden = "SELECT responden_tendik_id, responden_nama, responden_tanggal FROM t_responden_tendik";
    $result_responden = $conn->query($sql_responden);

    // Tutup koneksi
    $conn->close();
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
        <div class="container-fluid bg-secondary d-flex align-content-stretch flex-column" style="margin-left: 20%; width: 80%; height: 100%; position: absolute;">
            <!-- HEADER -->
            <div class="container-fluid h-auto bg-white" style="max-height: 5rem">
                <div class="d-flex align-items-center justify-content-between px-4 py-3">
                    <div class="d-flex align-items-center">
                        <div class="text-primary" style="font-size: 1.5rem;">
                            Jawaban Tenaga Kependidikan
                        </div>
                    </div>
                    <div class="d-flex align-items-center">
                        <div class="text-primary py-2 px-4" style="background-color: #F2DEDE;">
                            <?php echo ucfirst($role);?>
                        </div>
                    </div>
                </div>
            </div>
            <!-- HEADER END -->
            <!-- MAIN -->
            <div class="container-fluid d-flex align-items-center flex-column" style="height: 100%;">
                <div class="py-5">
                    <h1 class="text-primary">
                        Jawaban Responden
                    </h1>
                </div>
                <div style="width: 80%;">
                    <table class="text-primary user-list">
                        <tr>
                            <th>No</th>
                            <th>Username</th>
                            <th>Tanggal Pengisian</th>
                            <th>Aksi</th>
                        </tr>
                        <?php
                        if ($result_responden->num_rows > 0) {
                            // Output data setiap baris
                            $no = 1;
                            while($row = $result_responden->fetch_assoc()) {
                                echo "<tr>";
                                echo "<td>" . $no . "</td>";
                                echo "<td>" . $row["responden_nama"] . "</td>";
                                echo "<td>" . $row["responden_tanggal"] . "</td>";
                                echo "<td><a href='detail_responden.php?id=" . $row["responden_tendik_id"] . "' class='d-flex justify-content-center btn-primary' style='border-radius: 0.5rem;padding: 0.5rem 0.75rem;'>";
                                echo "<img src='../resources/icons/eye.svg' class='img-fluid' style='padding-right: 0.25rem;'>";
                                echo "Lihat";
                                echo "</a>";
                                echo "</div>";
                                echo "</td>";
                                echo "</tr>";
                                $no++;
                            }
                        } else {
                            echo "<tr><td colspan='4'>Tidak ada data responden</td></tr>";
                        }
              
                        ?>
                    </table>
                </div>

            </div>
            <!-- MAIN END -->
        </div>
    </body>
</html>
