<?php
require_once 'connec.php';

$errors = [];

if ($_SERVER['REQUEST_METHOD'] === 'POST'){
    if ((empty($_POST['firstname'])) || (strlen($_POST['lastname']) > 45)){
       $errors[] = "Firstname manquant";
    } else {
        $firstname =htmlentities(trim($_POST['firstname']));
    }
    if ((empty($_POST['lastname'])) || (strlen($_POST['lastname']) > 45) ){
        $errors[] = "Lastname manquant";
    } else {
        $lastname = htmlentities(trim($_POST['lastname']));
    }
}

if (!empty($_POST['firstname']) && (!empty($_POST['lastname']))){
    $pdo = new PDO(DNS, USERNAME, PWD);
    $query = "INSERT INTO friend (`firstname`, `lastname`) VALUES (:firstname, :lastname)";
    $statement = $pdo->prepare($query);
    $statement->bindValue(':firstname', $firstname, PDO::PARAM_STR);
    $statement->bindValue(':lastname', $lastname, PDO::PARAM_STR);
    $result = $statement->execute();
    if ($result === true){
        header('Location:index.php');
    } else {
        header('Location : page404.php');
    }
}

