<?php
$titre="Liste Roles";
include "connection.php";
include "../templates/header.php";
//creation requete
$query = "SELECT * FROM roles ";

//préparation de la requête pour execution
$preparedQuery= $dbCo->prepare($query);

//execution de la requete
$preparedQuery->execute();

// permet de récupérer le résultat de la requête exécutée stocker dans la variable roles
$roles = $preparedQuery->fetchAll();
?>
    <div>
        <table>
            <tr> <!-- ligne -->
                <th> <!-- colonne -->
                    Id
                </th>
                <th> <!-- colonne -->
                    Nom
                </th>
            <tr>

                <?php
                foreach ($roles as $role)
                {

                ?>
            <tr>
                <td>
                    <?php echo $role["id"];?>
                </td>

                <td>
                    <?php echo $role["name"];?>
                </td>

                <td>
                    <form method="post" action="editrole.php">
                        <input type="hidden" name="role_id" value="<?php echo $role["id"]; ?>"/>
                        <input type="submit" value="Modifier"/>
                    </form>
                </td><td>
                    <form method="post" action="deleterole.php">
                        <input type="hidden" name="role_id" value="<?php echo $role["id"]; ?>"/>
                        <input type="submit" value="Supprimer"/>
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

