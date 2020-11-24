<?php

session_start();

if(!isset($_SESSION['userId'])) {
    header('Location:../views/log_in.php');
    exit;
}

$is_success = session_destroy();

if($is_success) {
    header('Location:../views/log_in.php');
    exit;
} 

else {
    header('Location:../views/profile.php?status=danger&text=pas reussie a se déconnecter');
    exit;
}

