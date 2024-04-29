<?php

$config = parse_ini_file('../.env.local.ini');

$dbname = $config['DB_NAME'];
$username = $config['DB_USER'];
$password = $config['DB_PASSWORD'];
$host = $config['DB_HOST'];

try {
    // Établir la connexion à la base de données
    $conn = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
    // Activer le mode d'affichage des erreurs
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    echo "La connexion à la base de données a bien été établie";
} catch (PDOException $e) {
    // Gérer les erreurs de connexion
    echo "La connexion à la base de données a échoué: " . $e->getMessage();
}

if (isset($_POST['envoyer'])) {

}