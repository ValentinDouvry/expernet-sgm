<?php
require_once("../secret/connect_db.php");
require_once("../classes/User.php");
require_once("../classes/Group.php");

session_start();


$userId = $_SESSION["userId"];
if(!isset($userId)){
    header('Location:../views/log_in.php');
}
else{
    $query = $db->prepare("SELECT * FROM `users` WHERE id = :userId");
    $query->bindParam(":userId",$userId);
    $query->execute();
    $user = $query->fetchObject("User");

    if(!$user->getIsAdmin()){
      header('Location: ../index.php');
    }
    else{
        if(isset($_POST["inputGroupName"]) && isset($_POST["inputGroupChannel"]))
        {
            $groupName = $_POST["inputGroupName"];
            $groupChannel = $_POST["inputGroupChannel"];  
            
            $query = $db->prepare("SELECT COUNT(*) FROM `groups` WHERE name = :groupName");
            $query->bindParam(":groupName",$groupName, PDO::PARAM_STR);
            $query->execute();
            $nbGroupWithName = $query->fetchColumn();

            if($nbGroupWithName != 0)
            {
            // AFFICHER ALERTE/MODAL ?
            header('Location: ../views/create_group.php?err=Ce groupe existe déjà !');
            }
            else
            {
                $code_unique = FALSE;
                while(!$code_unique)
                {
                    $groupCode =  substr(md5(microtime()), 0, 6);
                    $query = $db->prepare("SELECT COUNT(*) FROM `groups` WHERE `code` = :groupCode");
                    $query->bindParam(":groupCode",$groupCode, PDO::PARAM_STR);
                    $query->execute();
                    $nbGroupWithCode= $query->fetchColumn();

                    if($nbGroupWithCode != 0){}
                    else
                    {
                        $code_unique = TRUE;

                    }
                }

                $query = $db->prepare("INSERT INTO `groups` (`name`, `code`, `channel`) VALUES (:groupName, :groupCode, :groupChannel)");
                $query->bindParam(":groupName",$groupName, PDO::PARAM_STR);
                $query->bindParam(":groupCode",$groupCode, PDO::PARAM_STR);
                $query->bindParam(":groupChannel",$groupChannel, PDO::PARAM_STR);
                $query->execute();

                header('Location: ../views/list_group.php');
            }
    
        }
    }
    
    
}


?>