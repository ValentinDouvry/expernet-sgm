<?php
require_once("../secret/connect_db.php");

session_start();


if(!isset($_SESSION['userId'])){
    header('Location:../views/log_in.php');
    exit;
} 

if (isset($_POST["inputGroupId"]) && $_POST["inputGroupId"] !== "" && isset($_POST["inputGroupName"]) && $_POST["inputGroupName"] !== "" && isset($_POST["inputGroupChannel"]) && $_POST["inputGroupChannel"] !== "") {
  $groupName = $_POST["inputGroupName"];
  $groupChannel = $_POST["inputGroupChannel"];
  $groupId = $_POST["inputGroupId"];

  $query = $db->prepare("SELECT COUNT(*) FROM `groups` WHERE `name` = :groupName");
  $query->bindParam(":groupName",$groupName, PDO::PARAM_STR);
  $query->execute();
  $nbGroupWithName= $query->fetchColumn();

  if($nbGroupWithName != 0){
    header('Location: ../views/list_group.php?status=danger&text=Erreur, ce nom de groupe existe déjà !');
    exit();
  }
  else{
    $query = $db->prepare("UPDATE `groups` SET `name` = :groupName, `channel` = :groupChannel WHERE `id` = :groupId");

    $query->bindParam(":groupName", $groupName, PDO::PARAM_STR);
    $query->bindParam(":groupChannel", $groupChannel, PDO::PARAM_STR);
    $query->bindParam(":groupId", $groupId, PDO::PARAM_INT);
    $is_valid = $query->execute();
  
    if($is_valid) {
      header("Location: ../views/list_group.php?status=success&text=Goupe modifier avec succès !");
      exit();
    } 
      else {
      header('Location: ../views/list_group.php?status=danger&text=Une erreur est survenue, veuillez réessayer !');
      exit();
    }
  }
  


  $query = $db->prepare("UPDATE `groups` SET `name` = :groupName, `channel` = :groupChannel WHERE `id` = :groupId");

  $query->bindParam(":groupName", $groupName, PDO::PARAM_STR);
  $query->bindParam(":groupChannel", $groupChannel, PDO::PARAM_STR);
  $query->bindParam(":groupId", $groupId, PDO::PARAM_INT);
  $is_valid = $query->execute();

  if($is_valid) {
    header("Location: ../views/list_group.php?status=success&text=Goupe modifier avec succès !");
    exit();
  } 
    else {
    header('Location: ../views/list_group.php?status=danger&text=Une erreur est survenue, veuillez réessayer !');
    exit();
  }
}