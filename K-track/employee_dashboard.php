<?php
// Assurez-vous que l'authentification et la vérification des droits d'accès sont effectuées ici
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta charset="utf-8">
    <link href="bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <style>
        /* Vos styles existants ici */

        .navbar-nav .nav-item {
            margin-right: 15px; /* Ajouter de l'espace entre les éléments de navigation */
        }

        .navbar-nav .nav-item:last-child {
            margin-right: 0; /* Supprimer la marge droite du dernier élément */
        }

        /* Styles pour les messages de succès et d'erreur */
        .message {
            padding: 5px 10px; /* Padding réduit pour un fond plus petit */
            margin-top: 10px;
            border-radius: 5px;
            max-width: 300px; /* Limiter la largeur du fond */
            display: inline-block; /* Ajuster la largeur du fond à la taille du texte */
            word-wrap: break-word; /* Gérer les retours à la ligne */
        }

        .success-message {
            background-color: #d4edda; /* Fond vert clair */
            color: #155724; /* Texte vert foncé */
            border: 1px solid #c3e6cb; /* Bordure verte */
        }

        .error-message {
            background-color: #f8d7da; /* Fond rouge clair */
            color: #721c24; /* Texte rouge foncé */
            border: 1px solid #f5c6cb; /* Bordure rouge */
        }
    </style>
    <title>K-track</title>
</head>
<body class="d-flex flex-column justify-content-between w-100 h-100 position-absolute">
    <nav class="navbar navbar-expand-sm navbar-light bg-white pe-4 ps-4">
        <div class="container">
            <a class="navbar-brand text-marons fw-bold" href="employee_dashboard.php">
                <img src="logo.png" class="O" alt="">
            </a>
            <button
                class="navbar-toggler d-lg-none"
                type="button"
                data-bs-toggle="collapse"
                data-bs-target="#collapsibleNavId"
                aria-controls="collapsibleNavId"
                aria-expanded="false"
                aria-label="Toggle navigation"
            >
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="collapsibleNavId">
                <ul class="navbar-nav me-auto mt-2 mt-lg-0">
                    <li class="nav-item">
                        <a class="nav-linkss fw-medium" href="mes_missions.php">Mes Missions</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-linkss fw-medium" href="historique.php">Historique</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-linkss fw-medium" href="localisation.php">Localisation</a>
                    </li>
                </ul>
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item dropdown">
                        <a class="nav-linkss dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            <i class="fas fa-user"></i> Profil
                        </a>
                        <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <li><a class="dropdown-item" href="profile.php">Voir le profil</a></li>
                            <li><a class="dropdown-item" href="logout.php">Déconnexion</a></li>
                        </ul>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <div class="container-fluid bg-light">
        <div class="row hover">
            <div class="col-md-6 d-flex flex-column ps-5 justify-content-center">
                <h3 class="text-start text-blues h1">Employee Dashboard</h3>
                <p class="text-muted display-5 text-start">
                    Bienvenue sur votre tableau de bord, où vous pouvez consulter vos missions, historique et localisation.
                </p>
            </div>
            <div class="col-md-6">
                <img src="dashboard_image.png" class="img-fluid" alt="...">
            </div>
        </div>
    </div>

    <script src="bootstrap/js/bootstrap.bundle.min.js"></script>
</body>
</html>
