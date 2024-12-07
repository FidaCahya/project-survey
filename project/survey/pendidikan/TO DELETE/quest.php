<?php
    $included = true;
    include "../../../fungsi.php";
    if (isset($_GET['dst'])){
        //check destination
        if (!check_survey_dest($_GET['dst'])){
            header("Location:landing_page.php");
        }
        setcookie("dst",$_GET['dst']);
        $dst = $_GET['dst'];
    } else if (isset($_COOKIE['dst'])){
        $dst = $_COOKIE['dst'];
    } else {
        header("Location:landing_page.php");
    }
    $role_key = $_COOKIE['role_key'];
    $username = $_COOKIE['username'];
    $quests = file_to_array("quest.txt");
?>
<!DOCTYPE html>
<html>
    <head>
        <link rel="stylesheet" href="../../../resources/style.css">
    </head>
    <script type="text/javascript" src="../../../resources/jquery-3.7.1.min.js"></script>
    <body>
        <!-- NAVBAR -->
        <nav class="vh-100 d-flex flex-column align-items-center" style="position: fixed;width: 20%;background-color: var(--primary); padding-top: 5rem; padding-bottom: 2rem;">
            <div class="d-flex flex-column align-items-center pb-5">
                <div>
                    <img src="../../..\resources\icons\user-stroke.svg" class="img-fluid border-circle" style="background-color: white;">
                </div>
                <div class="text-secondary" style="font-weight: bold;">
                    <?php echo ucfirst($username);?>
                </div>
            </div>
            <div class="container-fluid d-flex align-items-center justify-content-center text-secondary pb-2 nav-item active">
                <a href="../../../dashboard.php" class="nav-link d-flex align-items-center justify-content-center"><img src="../../..\resources\icons\navbar\home.svg" class="img-fluid px-2"> Dashboard</a>
            </div>
            <div class="container-fluid d-flex align-items-center justify-content-center text-secondary nav-item">
                <a href=<?php echo "../../../sub-pages/biodata/$role_key.php";?> class="nav-link d-flex align-items-center justify-content-center"><img src="../../..\resources\icons\navbar\biodata.svg" class="img-fluid px-2"> Biodata Diri</a>
            </div>
            <div style="bottom: 3rem; position: fixed;">
                <a href="../../../landing_page.php" class="btn-secondary d-flex align-items-center"><img src="../../..\resources\icons\navbar\logout.svg" class="img-fluid" style="padding-right: 0.25rem;">Keluar</a>
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
                <form method="get" action="kritik.php" class="pb-5">
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
                                    for ($i = 0; $i < count($quests); $i++){
                                        echo "<li class='pb-3'>" . $quests[$i] . "</li>";
                                        echo "<div class='pb-3 px-4 d-flex justify-content-between'>";
                                        foreach($answers as $key=>$val){
                                            echo "<div>";
                                            echo "<input type='checkbox' name='answ[$i]' value='$key'>";
                                            echo "<label for='answ[$i]'>$val</label>";
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
            </div>
            <!-- MAIN END -->
        </div>
        <script type="text/javascript" src="../../../resources/scripts.js"></script>
    </body>
</html>