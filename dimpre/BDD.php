<?php

$mysqli = new mysqli("localhost", "root", "", "cinéma", 3306);
if ($mysqli->connect_errno) {
    echo "Échec lors de la connexion à la base de donnée : (" . $mysqli->connect_errno . ") " . $mysqli->connect_error;
}

echo $mysqli->host_info . "\n";

if (!$mysqli->query("SELECT * FROM acteur") || 
    !$mysqli->query("INSERT INTO acteur(ident_acteur, NOM) VALUES (1, 'ROBERT')")) {
    echo "Test : (" . $mysqli->errno . ") " . $mysqli->error;
}
?>