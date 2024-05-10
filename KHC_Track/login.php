<?php
session_start();

// Vérifier si le formulaire a été soumis
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Vérifier si les champs de nom d'utilisateur et de mot de passe sont définis et non vides
    if (isset($_POST["username"]) && isset($_POST["password"]) && !empty($_POST["username"]) && !empty($_POST["password"])) {
        // Récupérer les valeurs des champs de formulaire
        $username = $_POST["username"];
        $password = $_POST["password"];

        // Validation des informations d'identification (vous devez remplacer cette logique par la vôtre)
        if ($username === 'admin' && $password === 'khc_admin') {
            // Informations d'identification valides, démarrer une session et rediriger vers la page index.html
            $_SESSION['loggedin'] = true;
            header("Location: index.php");
            exit; // Assurez-vous de terminer l'exécution du script après la redirection
        } else {
            // Informations d'identification invalides, afficher un message d'erreur
            echo "Nom d'utilisateur ou mot de passe incorrect.";
        }
    } else {
        // Champs manquants, afficher un message d'erreur
        echo "Veuillez saisir un nom d'utilisateur et un mot de passe.";
    }
}
?>
