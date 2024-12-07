<?php
include '../fungsi.php';

session_start();

if (!isset($_SESSION['role']) || !isset($_SESSION['username'])) {
    header("Location: ../landing_page.php");
    
   
exit();
}
$role_key = $_SESSION['role'];
$username = $_SESSION['username'];
// Koneksi ke database
$servername = "localhost";
$dbusername = "root";
$dbpassword = "";
$dbname = "surveykepuasan";

$conn = new mysqli($servername, $dbusername, $dbpassword, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
$query =  "SELECT responden_nama, responden_hp, responden_jk, responden_umur, responden_pendidikan, responden_pekerjaan, responden_penghasilan, mahasiswa_nama, mahasiswa_prodi 
            FROM t_responden_ortu
            INNER JOIN m_user ON t_responden_ortu.responden_nama = m_user.nama 
            WHERE m_user.username = ?
            ORDER BY t_responden_ortu.responden_tanggal DESC 
            LIMIT 1";
$stmt = $conn->prepare($query);

if ($stmt === false) {
    die("Error preparing statement: " . $conn->error);
}

$stmt->bind_param("s", $username);

if (!$stmt->execute()) {
    die("Error executing statement: " . $stmt->error);
}

$result = $stmt->get_result();

if ($result === false) {
    die("Error getting result: " . $stmt->error);
}

$nama = '';
$hp = '';
$jk = '';
$umur='';
$pendidikan='';
$penghasilan='';
$mahasiswa_nama='';
$mahasiswa_prodi='';



$data = $result->fetch_assoc();

if ($data === null) {
    echo "No data found for respondent.";
} else {
    // Assign values to variables after fetching data from the database
    $nama = $data['responden_nama'];
    $hp = $data['responden_hp'];
    $jk = $data['responden_jk'];
    $umur = $data['responden_umur'];
    $pendidikan = $data['responden_pendidikan'];
    $pekerjaan = $data['responden_pekerjaan'];
    $penghasilan = $data['responden_penghasilan'];
    $mahasiswa_nama = $data['mahasiswa_nama'];
    $mahasiswa_prodi = $data['mahasiswa_prodi'];

}
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
                    <img src="..\resources\icons\user-stroke.svg" class="img-fluid border-circle" style="background-color: white;">
                </div>
                <div class="text-secondary" style="font-weight: bold;">
                    <?php echo ucfirst($username); ?>
                </div>
            </div>
            <div class="container-fluid d-flex align-items-center justify-content-center text-secondary pb-2 nav-item">
                <a href="../dashboard.php" class="nav-link d-flex align-items-center justify-content-center"><img src="..\resources\icons\navbar\home.svg" class="img-fluid px-2"> Dashboard</a>
            </div>
            <div class="container-fluid d-flex align-items-center justify-content-center text-secondary nav-item active">
                <a href=<?php echo "/biodata/$role_key.php";?> class="nav-link d-flex align-items-center justify-content-center"><img src="..\resources\icons\navbar\biodata.svg" class="img-fluid px-2"> Biodata Diri</a>
            </div>
            <div style="bottom: 3rem; position: fixed;">
                <a href="../landing_page.php" class="btn-secondary d-flex align-items-center"><img src="..\resources\icons\navbar\logout.svg" class="img-fluid" style="padding-right: 0.25rem;">Keluar</a>
            </div>
        </nav>
        <!-- NAVBAR END -->
        <div class="container-fluid bg-secondary d-flex align-content-stretch flex-column" style="margin-left: 20%; width: 80%; height: max-content; position: absolute;">
            <!-- HEADER -->
            <div class="container-fluid h-auto bg-white" style="max-height: 5rem">
                <div class="d-flex align-items-center justify-content-between px-4 py-3">
                    <div class="d-flex align-items-center">
                        <div class="text-primary" style="font-size: 1.5rem;">
                            Dashboard
                        </div>
                    </div>
                    <div class="d-flex align-items-center">
                        <div class="text-primary py-2 px-4" style="background-color: #F2DEDE;">
                            <?php echo $registered_roles[$role_key] ?>
                        </div>
                    </div>
                </div>
            </div>
            <!-- HEADER END -->
            <!-- MAIN -->
            <div class="container-fluid py-5 d-flex align-items-center justify-content-center flex-column" style="height: 100%;">
                <div class="text-center pb-5">
                    <h1 class="text-head-primary">
                        Data Diri Anda
                    </h1>
                </div>
                <!-- FORM -->
                <form>
               <div class="card bg-white p-5" style="border-radius: 2rem; max-width: 50rem;">
               <div class="d-flex flex-column justify-content-center align-items-center" style="width: 100%;">
                <div class="d-flex" style="width: 100%; padding-bottom: 1.5rem;">
                    <label for="nama" class="form-label" style="width: 100%;">Nama:</label>
                    <input id="nama" class="form-control" type="text" value="<?php echo ($nama); ?>" readonly style="width: 100%; min-width: 20rem;">
                </div>
                <div class="d-flex" style="width: 100%; padding-bottom: 1.5rem;">
                    <label for="hp" class="form-label" style="width: 100%;">Nomor Telepon:</label>
                    <input id="hp" class="form-control" type="text" value="<?php echo ($hp); ?>" readonly style="width: 100%; min-width: 20rem;">
                </div>
                <div class="d-flex" style="width: 100%; padding-bottom: 1.5rem;">
                    <label for="pendidikan" class="form-label" style="width: 100%;">Pendidikan:</label>
                    <input id="pendidikan" class="form-control" type="text" value="<?php echo ($pendidikan); ?>" readonly style="width: 100%; min-width: 20rem;">
                </div>
                <div class="d-flex" style="width: 100%; padding-bottom: 1.5rem;">
                    <label for="pekerjaan" class="form-label" style="width: 100%;">Pekerjaan:</label>
                    <input id="pekerjaan" class="form-control" type="text" value="<?php echo ($pekerjaan); ?>" readonly style="width: 100%; min-width: 20rem;">
                </div>
                <div class="d-flex" style="width: 100%; padding-bottom: 1.5rem;">
                    <label for="penghasilan" class="form-label" style="width: 100%;">Penghasilan:</label>
                    <input id="penghasilan" class="form-control" type="text" value="<?php echo ($penghasilan); ?>" readonly style="width: 100%; min-width: 20rem;">
                </div>
                <div class="d-flex" style="width: 100%; padding-bottom: 1.5rem;">
                    <label for="mahasiswa_nama" class="form-label" style="width: 100%;">Nama Mahasiswa:</label>
                    <input id="mahasiswa_nama" class="form-control" type="text" value="<?php echo ($mahasiswa_nama); ?>" readonly style="width: 100%; min-width: 20rem;">
                </div>
                <div class="d-flex" style="width: 100%; padding-bottom: 1.5rem;">
                    <label for="mahasiswa_prodi" class="form-label" style="width: 100%;">Prodi Mahasiswa:</label>
                    <input id="mahasiswa_prodi" class="form-control" type="text" value="<?php echo ($mahasiswa_prodi); ?>" readonly style="width: 100%; min-width: 20rem;">
            </div>
        </div>
    </div>
</form>
                <!-- FORM END -->
            </div>
            <!-- MAIN END -->
        </div>
    </body>
</html>