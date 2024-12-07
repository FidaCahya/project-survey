<?php
$included = true;
include "../fungsi.php";

if (isset($_GET['dst'])) {
    // Check destination
    if (!check_survey_dest($_GET['dst'])) {
        header("Location:landing_page.php");
        exit();
    }
    setcookie("dst", $_GET['dst']);
    $dst = $_GET['dst'];
} else if (isset($_COOKIE['dst'])) {
    $dst = $_COOKIE['dst'];
} else {
    header("Location:landing_page.php");
    exit();
}

$role_key = $_COOKIE['role_key'];
$username = $_COOKIE['username'];

switch ($role_key) {
    case 'mahasiswa':
        $survey_id = 14; // Example value, replace with actual value for mahasiswa
        $kategori_id = 4; // Example value, replace with actual value for mahasiswa
        break;
    case 'ortu':
        $survey_id = 14; // Example value, replace with actual value for orangtua
        $kategori_id = 4; // Example value, replace with actual value for orangtua
        break;
    case 'alumni':
        $survey_id = 14; // Example value, replace with actual value for alumni
        $kategori_id = 4; // Example value, replace with actual value for alumni
        break;
    case 'tendik':
        $survey_id = 14; // Example value, replace with actual value for tendik
        $kategori_id = 4; // Example value, replace with actual value for tendik
        break;
     case 'industri':
         $survey_id = 14; // Example value, replace with actual value for industri
         $kategori_id = 4; // Example value, replace with actual value for industri
         break;
    case 'dosen':
        $survey_id = 14; // Example value, replace with actual value for dosen
        $kategori_id = 4; // Example value, replace with actual value for dosen
        break;
    
}


// Set survey_id and kategori_id
//$survey_id = 1; // Example value, replace with actual value or logic to get it
//$kategori_id = 1; // Example value, replace with actual value or logic to get it

// Get survey questions
$questions = get_questions_from_survey($survey_id, $kategori_id);
?>
<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" href="../resources/style.css">
</head>
<script type="text/javascript" src="../resources/jquery-3.7.1.min.js"></script>
<body>
    <!-- NAVBAR -->
    <nav class="vh-100 d-flex flex-column align-items-center" style="position: fixed;width: 20%;background-color: var(--primary); padding-top: 5rem; padding-bottom: 2rem;">
        <div class="d-flex flex-column align-items-center pb-5">
            <div>
                <img src="..\resources\icons\user-stroke.svg" class="img-fluid border-circle" style="background-color: white;">
            </div>
            <div class="text-secondary" style="font-weight: bold;">
                <?php echo ucfirst($username);?>
            </div>
        </div>
        <div class="container-fluid d-flex align-items-center justify-content-center text-secondary pb-2 nav-item active">
            <a href="../dashboard.php" class="nav-link d-flex align-items-center justify-content-center"><img src="..\resources\icons\navbar\home.svg" class="img-fluid px-2"> Dashboard</a>
        </div>
        <div class="container-fluid d-flex align-items-center justify-content-center text-secondary nav-item">
            <a href=<?php echo "../biodata/$role_key.php";?> class="nav-link d-flex align-items-center justify-content-center"><img src="..\resources\icons\navbar\biodata.svg" class="img-fluid px-2"> Biodata Diri</a>
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
                        <?php echo get_survey_label($dst) ?>
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
        <div class="container-fluid d-flex align-items-center flex-column" style="height: 80%;">
            <div class="pb-1">
                <h4 class="px-3 text-primary">
                    Kuesioner <?php echo get_survey_label($dst) ?>
                </h4>
            </div>
            <form method="post" action="proses_jawaban.php" class="pb-5">
    <div class="d-flex flex-column bg-white px-5 py-3" style="width: 50rem; border-radius: 1rem;">
        <div class="d-flex text-primary-black p-5">
            <p>
                <?php
                    // {NAMA VARIABEL} => {LABEL}
                    $answers = [
                        "sangatBaik" => "Sangat Baik",
                        "baik" => "Baik",
                        "cukup" => "Cukup",
                        "buruk" => "Buruk",
                    ];
                    echo "<ol style='margin:0;padding:0;'>";
                    foreach ($questions as $index => $question) {
                        echo "<li class='pb-3'>" . $question['soal_nama'] . "</li>";
                        echo "<div class='pb-3 px-4 d-flex justify-content-between'>";
                        foreach($answers as $key => $val){
                            // Buat nama unik untuk setiap opsi jawaban dengan menambahkan nomor indeks pertanyaan
                            $input_name = "answers[{$question['soal_id']}]"; // use soal_id as key
                            echo "<div>";
                            echo "<input type='radio' name='$input_name' value='$key'>";
                            echo "<label for='$input_name'>$val</label>";
                            echo "</div>";
                        }
                        echo "</div>";
                    }
                    echo "</ol>";
                ?>
            </p>
        </div>
    </div>
    <div class="d-flex justify-content-end pt-3">
        <input type="submit" class="btn-primary" value="SUBMIT">
    </div>
</form>