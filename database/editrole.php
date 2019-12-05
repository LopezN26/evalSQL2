<?php
include '../templates/header.php';
include 'connection.php';

if(!empty($_POST) && isset($_POST))
{

    //creation d'une requete pour édition
    $query = "SELECT * FROM roles where id=:role_id";
    //preparation de la requete
    $editRole = $dbCo->prepare($query);
    //eviter la faille de sécu injection SQL
    $editRole->bindParam(":role_id",  $_POST["role_id"]);

    //execution requete
    $editRole->execute();
    //recupérer ce que SELECT FROM renvoi dans un tableau
    $role=$editRole->fetch();
    ?>

    <form action="updaterole.php" method="post">
        <div class="responsive">
            <label for="name">Nom</label>
            <input type="text" name="name" value="<?php echo $role["name"]; ?>"/>
        </div>
        <div class="responsive">
            <input type="hidden" name="id" value="<?php echo $role["id"] ?>" />
            <input type="submit" value="Modifier"/>
        </div>
    </form>
    <?php

}
else
{
    header('Location:./userslist.php');
}

include '../templates/footer.php';
