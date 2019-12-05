<?php
$titre="Liste Utilisateurs";
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
<div class="responsive">
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
                //remplacer le role_id par son nom
                $userRole=$user["role_id"]; //facilité l'utilisation de cette variable

                $query2= "SELECT name FROM roles where id=$userRole"; //creation d'une 2eme requete pour récupérer le nom du role dans la table role
                $preparedQuery2 = $dbCo->prepare($query2); //preparation 2eme requete
                $preparedQuery2->execute(); //execution deuxieme requete
                $role = $preparedQuery2->fetch(); //fetch pour récuper ce qui est retourner par l'instru SELECT FROM
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
                        <?php echo $role["name"];?>
                    </td>
                    <td>
                        <form method="post" action="edit.php">
                            <input type="hidden" name="user_id" value="<?php echo $user["id"]; ?>"/>
                            <input type="submit" value="Modifier"/>
                        </form>
                    </td><td>
                        <form method="post" action="delete.php">
                            <input type="hidden" name="user_id" value="<?php echo $user["id"]; ?>"/>
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
