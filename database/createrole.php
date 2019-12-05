<?php

$titrepage='Création Rôle';
include '../templates/header.php';

?>

    <form action="addrole.php" method="post" >
        <div>
            <label for="name">Nom</label>
            <input type="text" name="name"/>
        </div>
        <div>
            <input type="submit" value="Créer"/>
        </div>
    </form>

<?php
