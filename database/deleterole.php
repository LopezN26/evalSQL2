<?php
include 'connection.php';

if(!empty($_POST) && isset($_POST))
{

    var_dump($_POST);

    //creation de la requete
    $query = "DELETE FROM roles where id=:id";
    //preparation de la requete
    $deleteRole= $dbCo->prepare($query);

    //eviter les injections SQL
    $deleteRole->bindParam(":id", $_POST["role_id"]);

    //executer la requete
    $deleteRole->execute();

    header('Location:./roleslist.php');
}
else
{
    header('Location:./roleslist.php');
}
