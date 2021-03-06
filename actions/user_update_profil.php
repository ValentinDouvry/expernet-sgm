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
    header('Location:../views/profile.php?status=danger&text=Une erreur est survenue, veuillez réessayer !');
    exit;
}

if(!$currentUser->getIsAdmin() && $_POST["id"] !== $currentUser->getId()) {
    header('Location:../views/profile.php?status=danger&text=Une erreur est survenue, veuillez réessayer !');
    exit;
}

if (isset($_POST["inputLastName"]) && isset($_POST["inputName"]) && isset($_POST["inputUsername"]) && isset($_POST["inputEmail"]) && isset($_POST["id"]) && isset($_POST["inputavatar"]) && $_POST["inputLastName"] != "" && $_POST["inputName"] != "" && $_POST["inputUsername"] != "" && $_POST["inputEmail"] != "" && $_POST["id"] != "" && $_POST["inputavatar"] != "") {

    $lastName = $_POST["inputLastName"];
    $name = $_POST["inputName"];
    $username = $_POST["inputUsername"];
    $email = $_POST["inputEmail"];
    $id = $_POST["id"];
    $avatarId = $_POST["inputavatar"];


    $query = $db->prepare("UPDATE users SET lastName = :lastName,
                name = :name, 
                email = :email, 
                username = :username,
                avatarId = :avatarId
                WHERE id = :userId");

    $query->bindParam(":lastName", $lastName, PDO::PARAM_STR);
    $query->bindParam(":name", $name, PDO::PARAM_STR);
    $query->bindParam(":username", $username, PDO::PARAM_STR);
    $query->bindParam(":email", $email, PDO::PARAM_STR);
    $query->bindParam(":avatarId", $avatarId, PDO::PARAM_STR);
    $query->bindParam(":userId", $id, PDO::PARAM_INT);
    $is_valid = $query->execute();

    if($is_valid) {
        header('Location:../views/profile.php?profileId='.$id.'&status=success&text=Modification effectuée !');
        exit;
    } 
    else {
        header('Location:../views/profile.php?profileId='.$id.'&status=danger&text=Une erreur est survenue, veuillez réessayer !');
        exit;
    }
}

else {
    header('Location:../views/profile.php?status=danger&text=Une erreur est survenue, veuillez réessayer !');
    exit;

}

