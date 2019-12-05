<?php

include "connection.php";

if(!empty($_POST) && isset($_POST))
{


        var_dump($_POST); // name email password phoneNumber role_id id
    //création requete
        $query = "UPDATE users SET
        name =:name,
        email =:email,
        password =:password,
        phoneNumber =:phoneNumber,
        role_id=:role_id
    WHERE
        id= :id";
    //preparation de la requete
        $update = $dbCo->prepare($query);
    // passage par bindParam pour éviter l'injection SQL
        $update->bindParam(":name", $_POST["name"]);
        $update->bindParam(":email", $_POST["email"]);
        $update->bindParam(":password", $_POST["password"]);
        $update->bindParam(":phoneNumber", $_POST["phoneNumber"]);
        $update->bindParam(":role_id", $_POST["role_id"]);
        $update->bindParam(":id", $_POST["id"]);

    //exectution requete
        $update->execute();

        header('Location:./userslist.php');

}
else
{
    header('Location:./userslist.php');

}