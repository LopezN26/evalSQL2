<?php

include "connection.php";

if(!empty($_POST) && isset($_POST))
{


    var_dump($_POST); // name email password phoneNumber role_id id
    //création requete
    $query = "UPDATE roles SET
        name =:name
    WHERE
        id= :id";
    //preparation de la requete
    $updateRole = $dbCo->prepare($query);
    // passage par bindParam pour éviter l'injection SQL
    $updateRole->bindParam(":name", $_POST["name"]);
    $updateRole->bindParam(":id", $_POST["id"]);

    //exectution requete
    $updateRole->execute();

    header('Location:./roleslist.php');

}
else
{
    header('Location:./roleslist.php');

}