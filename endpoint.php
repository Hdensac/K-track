<?php
$servername = "localhost";
$username = "root";
$password = "Admin@1234";
$dbname = "locate";

// Connexion à la base de données MySQL
$conn = new mysqli($servername, $username, $password, $dbname);

// Vérifier la connexion
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

// Récupérer les données envoyées par l'ESP32
$longitude = $_POST['longitude'];
$latitude = $_POST['latitude'];
$adresse = $_POST['adresse'];

// Préparer et exécuter la requête SQL pour insérer les données
$sql = "INSERT INTO position (latitude, longitude, adresse) VALUES ('$longitude', '$latitude', '$adresse')";

if ($conn->query($sql) === TRUE) {
  echo "Données insérées avec succès";
} else {
  echo "Erreur lors de l'insertion des données: " . $conn->error;
}

$conn->close();
?>
