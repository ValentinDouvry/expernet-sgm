<?php
require_once("../secret/connect_db.php");
require_once('../classes/User.php');
session_start();

if(!isset($_SESSION['userId'])){
    header('Location:../views/log_in.php');
    exit;
} 

$currentUserId = $_SESSION['userId'];

$sql = "SELECT * FROM `users` WHERE id=?";
$query = $db->prepare($sql);
$query->execute(array($currentUserId));
$currentUser = $query->fetchObject("User");

if($currentUser===false) {
    header('Location:../views/profile.php?status=danger&text=probleme pour l\'utilisateur');
    exit;
}

if(!$currentUser->getIsAdmin() && $_POST["id"] !== $currentUser->getId()) {
    header('Location:../views/profile.php?status=danger&text=vous n\'avez pas les droits');
    exit;
}

if (isset($_POST["inputLastName"]) && isset($_POST["inputName"]) && isset($_POST["inputUsername"]) && isset($_POST["inputEmail"]) && isset($_POST["id"])) {
    $lastName = $_POST["inputLastName"];
    $name = $_POST["inputName"];
    $username = $_POST["inputUsername"];
    $email = $_POST["inputEmail"];
    $id = $_POST["id"];


    $query = $db->prepare("UPDATE users SET lastName = :lastName,
                name = :name, 
                email = :email, 
                username = :username
                WHERE id = :userId");

    $query->bindParam(":lastName", $lastName, PDO::PARAM_STR);
    $query->bindParam(":name", $name, PDO::PARAM_STR);
    $query->bindParam(":username", $username, PDO::PARAM_STR);
    $query->bindParam(":email", $email, PDO::PARAM_STR);
    $query->bindParam(":userId", $id, PDO::PARAM_INT);
    $is_valid = $query->execute();

    if($is_valid) {
        header('Location:../views/profile.php?profileId='.$id.'&status=success&text=OK');
        exit;
    } 
    else {
        header('Location:../views/profile.php?profileId='.$id.'&status=danger&text=une erreur est survenu');
        exit;
    }
}

else {
    header('Location:../views/profile.php?status=danger&text=probleme sur les champs rentre');
    exit;

}

