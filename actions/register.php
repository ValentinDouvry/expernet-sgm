<?php
// Ne pas oublie  pour les groups et les avatars
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

if (
    isset($username) && $username !== ""
    && isset($lastName) && $lastName !== ""
    && isset($name) && $name !== ""
    && isset($email) && $email !== ""
    && isset($pass) && $pass !== ""
    && isset($pass2) && $pass2 !== "" 
    && $pass === $pass2
    && isset($code) && $code !== "" 
) 
{
    $user = new User;
    $user->setId(NULl);
    $user->setLastName($lastName);
    $user->setName($name);
    $user->setEmail($email);
    $user->setUsername($username);
    $user->setPassword($pass);
    $user->setLevel(0);
    $user->setExperience(0);
    $user->setMoney(0);
    $user->setIsAdmin(0);
    $user->setAvatarId(1);
    $user->setGroupId(1);

    $sql = "INSERT INTO `users`(`id`, `lastName`, `name`, `email`, `username`, `password`, `level`, `experience`, `money`, `isAdmin`, `avatarId`, `groupId`) VALUES (:id, :lastName, :name, :email, :username, :password, :level, :experience, :money, :isAdmin, :avatarId, :groupId)";

    $query = $db->prepare($sql);
    $data = $query->execute(dismount($user));

    header('Location: ../views/list_group.php');
} 
else 
{
    header('Location: ../views/form_register.php');
}
