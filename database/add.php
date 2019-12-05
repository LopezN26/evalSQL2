<?php
include "connection.php";
var_dump($_POST);


//création de la requete
$query="INSERT INTO users (name, email, phoneNumber, password, role_id) VALUES (:name, :email, :phoneNumber, :password, :role_id)";
//préparation de la requete
$addUser = $dbCo -> prepare($query);
//utilisattion de param de substitution pour éviter l'injection SQL
$addUser->bindParam(":name", $_POST["name"]);
$addUser->bindParam(":email", $_POST["email"]);
$addUser->bindParam(":phoneNumber", $_POST["phoneNumber"]);
$addUser->bindParam(":password", $_POST["password"]);
$addUser->bindParam(":role_id", $_POST["role_id"]);

//execution de la requete
$addUser ->execute();

