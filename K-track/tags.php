<?php
    // Connexion à la base de données
    $servername = "localhost";
    $username = "root";
    $password = "root";
    $dbname = "tracking_db";

    // Créer la connexion
    $conn = new mysqli($servername, $username, $password, $dbname);

    // Vérifier la connexion
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Récupérer l'ID RFID depuis le fichier UIDContainer.php
    include 'UIDContainer.php';
    $rfid_id = $UIDresult;

    // Debug : Afficher la valeur de $rfid_id
    echo "Valeur de \$rfid_id : " . $rfid_id;

    // Insérer la présence dans la base de données
    $sql = "INSERT INTO tags (rfid_id) VALUES ('$rfid_id')";

    // Debug : Afficher la requête SQL
    echo "Requête SQL : " . $sql;

    if ($conn->query($sql) === TRUE) {
        echo "Presence enregistrée avec succès!";
    } else {
        echo "Erreur lors de l'enregistrement de la présence: " . $conn->error;
        echo "Erreur MySQL : " . $conn->errno . " - " . $conn->error;
    }

    // Fermer la connexion
    $conn->close();
?>

