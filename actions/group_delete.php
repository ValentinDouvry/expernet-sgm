<?php
require_once("../secret/connect_db.php");

session_start();


if(!isset($_SESSION['userId'])){
    header('Location:../views/log_in.php');
    exit;
} 

if (isset($_POST["inputIdGroupDelete"]) && $_POST["inputIdGroupDelete"] !== "") {
    $groupId = $_POST["inputIdGroupDelete"];
    $query = $db->prepare("SELECT COUNT(*) FROM users WHERE groupId = :groupId");
    $query->bindParam(":groupId", $groupId, PDO::PARAM_INT);
    $query->execute();
    $nbUser = $query->fetchColumn();
    if ($nbUser != 0) {

        header('Location: ../views/list_group.php?status=danger&text=Impossible de supprimer un groupe contenant des utilisateurs');
        exit();
    } else {
      $query = $db->prepare("DELETE FROM `groups` WHERE `id`= :groupId");
      $query->bindParam(":groupId", $groupId, PDO::PARAM_STR);
      $query->execute();

      header('Location: ../views/list_group.php?status=success&text=Groupe supprimer');
      exit();
    }
}