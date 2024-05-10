<?php
// Connexion à la base de données
$servername = "localhost";
$username = "root";
$password = "root";
$dbname = "tracking_db";

// Création de la connexion
$conn = new mysqli($servername, $username, $password, $dbname);

// Vérifier la connexion
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Requête SQL pour récupérer les données de latitude et de longitude les plus récentes
$sql = "SELECT latitude, longitude FROM locate ORDER BY id DESC LIMIT 1"; // Adapter la requête en fonction de votre base de données

$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // Récupérer les données et les encoder en JSON
    $row = $result->fetch_assoc();
    $data = array(
        'latitude' => $row['latitude'],
        'longitude' => $row['longitude']
    );
    echo json_encode($data);
} else {
    // En cas d'erreur ou si aucune donnée n'est disponible
    echo json_encode(array('error' => 'Aucune donnée disponible'));
}

// Fermer la connexion
$conn->close();
?>
