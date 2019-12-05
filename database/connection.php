<?php
// variables de connection
$user='root';
$password='0000';
// Permet d'établir la connection avec la BDD
$dbCo = new PDO('mysql:host=localhost;dbname=repertoire', $user, $password);