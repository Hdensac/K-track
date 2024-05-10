<?php
session_start();

// Vérification des informations d'identification
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = "admin"; // Remplacez par votre nom d'utilisateur
    $password = "khc_admin"; // Remplacez par votre mot de passe

    // Vérification des informations d'identification saisies
    if ($_POST['username'] === $username && $_POST['password'] === $password) {
        // Informations d'identification valides, redirigez l'utilisateur vers la page souhaitée
        $_SESSION['logged_in'] = true;
        $redirect_url = isset($_SESSION['redirect_url']) ? $_SESSION['redirect_url'] : 'user data.php';

        header("Location: $redirect_url");
        exit;
    } else {
        // Informations d'identification incorrectes, affichez un message d'erreur
        $error = "Nom d'utilisateur ou mot de passe incorrect.";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Connexion</title>
    <link href="bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="style.css">
    <style>
        .text-marons{
            color: #ff6600;
            padding-top: 0.3125rem;
            padding-bottom: 0.3125rem;
            margin-right: 1rem;
            font-size: 1.25rem;
            text-decoration: none;
            white-space: nowrap;
        }

        .btn-marons{
            background-color: #ff6600;
            color: white;
        }

        .btn-marons:hover{
            background-color: #954B1B;
            color: white;
        }
    </style>
</head>
<body>
    <div class="wrapper">
        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post" id="loginForm">
            <h2 class="text-marons text-center fw-bold">Connexion</h2>
            <?php if (isset($error)) echo "<p>$error</p>"; ?>
            <div class="mb-3">
                <label class="form-label text-white text-start">Entrer votre nom d'utilisateur</label>
                <input type="text" id="username" name="username" class="form-control" required>
            </div>
            <div class="mb-3">
                <label class="form-label text-white">Entrer votre mot de passe</label>
                <input type="password" required id="password" class="form-control" name="password">
            </div>
            <button class="btn btn-marons" type="submit">Se connecter</button>
        </form>
    </div>

    <script src="bootstrap/js/bootstrap.min.js"></script>
	<script src="bootstrap/js/bootstrap.bundle.min.js"></script>
    <script>
        document.getElementById('loginForm').addEventListener('submit', function(event) {
            event.preventDefault(); // Empêcher le formulaire de se soumettre normalement

            // Récupérer les valeurs des champs de formulaire
            var username = document.getElementById('username').value;
            var password = document.getElementById('password').value;

            // Validation côté client (vérifier que les champs ne sont pas vides)
            if (username.trim() === '' || password.trim() === '') {
                alert("Veuillez remplir tous les champs !");
                return; // Arrêter la soumission du formulaire si un champ est vide
            }

            // Soumettre le formulaire si tout est valide
            this.submit();
        });
    </script>
</body>
</html>
