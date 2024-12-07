<?php
    // session_start();
    // require_once 'fungsi.php';

    // Menentukan jalur login/register
    if (isset($_GET["act"])){
        if ($_GET["act"] == "login"){
            // Jika login pergi ke login.php
            $redirect = "login.php?role=";
        } else if ($_GET["act"] == "register") {
            // Jika register pergi ke /sub-pages/role-register/{role}.php
            $redirect = "register/user/";
        }
    } else {
        //header("Location:landing_page.php");
    }
?>