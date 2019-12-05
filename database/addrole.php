<?php

include "connection.php";
var_dump($_POST);

if (!empty($_POST) && isset($_POST)) {
    //création de la requete
    $query = "INSERT INTO roles (name) VALUES (:name)";
    //préparation de la requete
    $addRole = $dbCo->prepare($query);
    //utilisattion de param de substitution pour éviter l'injection SQL
    $addRole->bindParam(":name", $_POST["name"]);


    //execution de la requete
    $addRole->execute();

    header('Location:./roleslist.php');
} else {
    header('Location:./roleslist.php');
}

