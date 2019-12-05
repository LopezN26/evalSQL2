<?php
include 'connection.php';

var_dump($_POST);


$query = "DELETE FROM users where id=:id";

$deleteUser= $dbCo->prepare($query);


$deleteUser->bindParam(":id", $_POST["user_id"]);


$deleteUser->execute();

header('Location:./userslist.php');