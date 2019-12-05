<?php
include 'connection.php';

if(!empty($_POST) && isset($_POST))
{

    var_dump($_POST);
    //création de la requete
    $query = "DELETE FROM users where id=:id";
    //préparation de la requete
    $deleteUser= $dbCo->prepare($query);

    //eviter la faille injection SQL
    $deleteUser->bindParam(":id", $_POST["user_id"]);

    //executer l'instruction
    $deleteUser->execute();

    header('Location:./userslist.php');
}
else
{
    header('Location:./userslist.php');
}