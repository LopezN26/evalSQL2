<?php
include 'connection.php';

if(!empty($_POST) && isset($_POST))
{

    var_dump($_POST);

    $query = "DELETE FROM users where id=:id";

    $deleteUser= $dbCo->prepare($query);


    $deleteUser->bindParam(":id", $_POST["user_id"]);


    $deleteUser->execute();

    header('Location:./userslist.php');
}
else
{
    header('Location:./userslist.php');
}