<?php
$titre="Liste";
include "connection.php";
include "../templates/header.php";
//creation requete
$query = "SELECT * FROM users ";

//préparation de la requête pour execution
$preparedQuery= $dbCo->prepare($query);

//execution de la requete
$preparedQuery->execute();

// permet de récupérer le résultat de la requête exécutée stocker dans la variable users
$users = $preparedQuery->fetchAll();
?>
<div>
    <table>
        <tr> <!-- ligne -->
            <th> <!-- colonne -->
                Nom
            </th>
            <th> <!-- colonne -->
                email
            </th>
            <th> <!-- colonne -->
                Numéro tél.
            </th>
            <th> <!-- colonne -->
                Mot de passe
            </th>
            <th> <!-- colonne -->
                Role
            </th>
        <tr>

        <?php
            foreach ($users as $user)
            {
                ?>
                <tr>
                    <td>
                        <?php echo $user["name"];?>
                    </td>

                    <td>
                        <?php echo $user["email"];?>
                    </td>

                    <td>
                        <?php echo $user["phoneNumber"];?>
                    </td>

                    <td>
                        <?php echo $user["password"];?>
                    </td>
                    <td>
                        <?php echo $user["role_id"];?>
                    </td>
                    <td>
                        <form method="post" action="edit.php">
                            <input type="hidden" name="user_id" value="<?php echo $user["id"]; ?>"/>
                            <input type="submit" value="Modifier"/>
                        </form>
                    </td>
                </tr>
                <?php
            }
    ?>
    </table>
</div>

<?php

include "../templates/footer.php";
