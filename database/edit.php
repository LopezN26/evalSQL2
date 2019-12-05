<?php
include '../templates/header.php';
include 'connection.php';

//creation d'une requete pour édition
$query = "SELECT * FROM users where id=:user_id";
//preparation de la requete
$editUser = $dbCo->prepare($query);
//eviter la faille de sécu injection SQL
$editUser->bindParam(":user_id",  $_POST["user_id"]);

//execution requete
$editUser->execute();
//recupérer ce que SELECT FROM renvoi dans un tableau
$user=$editUser->fetch();
?>

<form action="update.php" method="post">
    <div>
        <label for="name">Nom</label>
        <input type="text" name="name" value="<?php echo $user["name"]; ?>"/>
    </div>
    <div>
        <label for="email">Email</label>
        <input type="text" name="email" value="<?php echo $user["email"]; ?>"/>
    </div>
    <div>
        <label for="password">Mot de passe</label>
        <input type="text" name="password" value="<?php echo $user["password"]; ?>"/>
    </div>
    <div>
        <label for="phonenumber">Numéro de tel.</label>
        <input type="text" name="phoneNumber" value="<?php echo $user["phoneNumber"]; ?>"/>
    </div>
    <div>
        <label for="role_id">Role</label>
        <input type="text" name="role_id" value="<?php echo $user["role_id"]; ?>"/>
    </div>
    <div>
        <input type="hidden" name="id" value="<?php echo $user["id"] ?>" />
        <input type="submit" value="Modifier"/>
    </div>
</form>
<?php




include '../templates/footer.php';