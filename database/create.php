<?php

$titrepage='Création';
include '../templates/header.php';

?>

    <form action="add.php" method="post" >
        <div>
            <label for="name">Nom</label>
            <input type="text" name="name"/>
        </div>
        <div>
            <label for="email">Email</label>
            <input type="text" name="email"/>
        </div>
        <div>
            <label for="phoneNumber">Numéro tél.</label>
            <input type="text" name="phoneNumber"/>
        </div>
        <div>
            <label for="password">Mot de passe</label>
            <input type="text" name="password"/>
        </div>
        <div>
            <label for="role_id">Role</label>
            <input type="text" name="role_id"/>
        </div>
        <div>
            <input type="submit" value="Créer"/>
        </div>
    </form>

<?php
