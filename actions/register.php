<?php
// Ne pas oublie faire quelque chose pour les avatars
require_once('../secret/connect_db.php');
require_once('../classes/User.php');
require_once('../classes/Group.php');
session_start();

function dismount($object)
{
    $reflectionClass = new ReflectionClass(get_class($object));
    $array = array();
    foreach ($reflectionClass->getProperties() as $property) {
        $property->setAccessible(true);
        $array[$property->getName()] = $property->getValue($object);
        $property->setAccessible(false);
    }
    return $array;
}


$username = $_POST['username'];
$lastName = $_POST['last-name'];
$name = $_POST['name'];
$email = $_POST['email'];
$pass = $_POST['password'];
$pass2 = $_POST['password2'];
$code = $_POST['code'];
$avatar = $_POST['avatar'];

if(!isset($username) || $username === "") 
{
    header('Location: ../views/form_register.php?err=Pseudo vide');
} 

elseif(!isset($lastName) || $lastName === "") {
    header('Location: ../views/form_register.php?err=Nom vide');

}

elseif(!isset($name) || $name === "") {
    header('Location: ../views/form_register.php?err=Prenom vide');
}

elseif(!isset($email) || $email === "") {
    header('Location: ../views/form_register.php?err=email vide');
}

elseif(!isset($pass) || !isset($pass2) ||$pass === "" ||$pass2 === "" || $pass !== $pass) {
    header('Location: ../views/form_register.php?err=mot de passe vide');
}

elseif(!isset($code) || $code === "") {
    header('Location: ../views/form_register.php?err=code vide');
}

elseif(!isset($avatar) || $avatar === "") {
    header('Location: ../views/form_register.php?err=avatar non choisie');
}


else
{
    $query = $db->prepare("SELECT * FROM `users` WHERE `username`=?");
    $query->execute(array($username));
    $is_exit = $query->fetch();

    if(!$is_exit===false) {
        header('Location: ../views/form_register.php?err=le pseudo exite deja, veillez choisir un autre');
        exit();
    }


    $query = $db->prepare("SELECT * FROM `groups` WHERE `code` = :groupCode");
    $query->bindParam(":groupCode",$code, PDO::PARAM_STR);
    $query->execute();
    $nbGroupWithName = $query->fetch();

    if(!$nbGroupWithName === false)
    {
        $query = $db->prepare("SELECT * FROM `groups` WHERE code = :groupCode");
        $query->bindParam(":groupCode",$code);
        $query->execute();
        $group = $query->fetchObject("Group");
    
        $user = new User;
        $user->setId(NULl);
        $user->setLastName($lastName);
        $user->setName($name);
        $user->setEmail($email);
        $user->setUsername($username);
        $user->setPassword(password_hash($pass, PASSWORD_ARGON2I));
        $user->setLevel(0);
        $user->setExperience(0);
        $user->setMoney(0);
        $user->setIsAdmin(0);
        $user->setAvatarId($avatar);
        $user->setGroupId($group->getId());
    
        $sql = "INSERT INTO `users`(`id`, `lastName`, `name`, `email`, `username`, `password`, `level`, `experience`, `money`, `isAdmin`, `avatarId`, `groupId`) VALUES (:id, :lastName, :name, :email, :username, :password, :level, :experience, :money, :isAdmin, :avatarId, :groupId)";
    
        $query = $db->prepare($sql);
        $is_success = $query->execute(dismount($user));


        if($is_success) {
            header('Location: ../views/log_in.php');

        } 
        else {
            header('Location: ../views/form_register.php?err=une erreur est survenu, veillez recommencer');
        }

        
    }

    else
    {
        header('Location: ../views/form_register.php?err=code incorrect');
        exit();
    }
    

} 
