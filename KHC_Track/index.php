<?php
session_start();

// Vérifier si la session est démarrée
if (!isset($_SESSION)) {
    session_start();
}

// Vérifier si l'utilisateur est connecté
if (!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] !== true) {
    // Rediriger vers la page de connexion
    header('Location:login.html');
    exit;
}
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="bootstrap/css/bootstrap.min.css" rel="stylesheet">
	<link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.4/dist/leaflet.css"
     integrity="sha256-p4NxAoJBhIIN+hmNHrzRCf9tD/miZyoHS5obTRR9BMY="
     crossorigin=""/>
    <title>Kapital track</title>
    <style>
		#map {
			 height: 500px;
			 width: 100%;
		}

		.nav-links{
			display: block;
			padding: 0.5rem 1rem;
			font-size: var(--bs-nav-link-font-size);
			font-weight: var(--bs-nav-link-font-weight);
			color: #954B1B;
			text-decoration: none;
			background: none;
			border: 0;
			transition: color 0.15s ease-in-out, background-color 0.15s ease-in-out, border-color 0.15s ease-in-out;
		}

		.nav-links:hover, .nav-links:focus{
			color: #ff6600;
		}

		.nav-links.active{
			color: #ff6600;
		}

		.nav-link:focus-visible {
			outline: 0;
			box-shadow: 0 0 0 0.25rem rgba(13, 110, 253, 0.25);
		}
		
		.nav-links.disabled, .nav-links:disabled {
			color: #ff6600;
			pointer-events: none;
			cursor: default;
		}

		.text-maron{
			color: #954B1B;
		}
		
		.text-marons{
			color: #ff6600;
			padding-top: 0.3125rem;
			padding-bottom: 0.3125rem;
			margin-right: 1rem;
			font-size: 1.25rem;
			text-decoration: none;
			white-space: nowrap;
		}
		.text-marons:hover, .text-marons:focus {
			color: #ff6600;
		}

		.bg-blues{
			background-color: #264A67;
		}

		.text-blues{
			color: #264A67;
		}

		.btn-marons{
			background-color: #ff6600;
		}

		.btn-marons:hover{
			background-color: #954B1B;
		}

		.O{
			padding: 0px;
			margin: 0px;
			height: auto;
			width: 100px;
		}

		.border-blues{
			border-right: 1px solid #264A67;
		}

		.nav-linkss{
			display: block;
			padding: 0.5rem 1rem;
			font-size: var(--bs-nav-link-font-size);
			font-weight: var(--bs-nav-link-font-weight);
			color: #4f6980;
			text-decoration: none;
			background: none;
			border: 0;
			font-weight: 500;
			transition: color 0.15s ease-in-out, background-color 0.15s ease-in-out, border-color 0.15s ease-in-out;
		}

		.nav-linkss:hover, .nav-linkss:focus{
			color: #264A67;
			font-weight: bold;
		}

		.nav-linkss.active{
			font-weight: bold;
			color: #264A67;
		}

		.nav-linkss:focus-visible {
			outline: 0;
			box-shadow: 0 0 0 0.25rem rgba(13, 110, 253, 0.25);
		}
		
		.nav-linkss.disabled, .nav-linkss:disabled {
			color: #ff6600;
			pointer-events: none;
			cursor: default;
		}

		@media (max-width: 575.98px) {
			.border-sm-l{
				border-left: 1px solid #264A67;
			}
			.border-sm-r{
			border-right: 1px solid #264A67;
			}
			.border-sm-t{
			border-top: 1px solid #264A67;
			}
			.border-sm-b{
			border-bottom: 1px solid #264A67;
			}
		}

		@media (min-width: 576px) {
			.border-sm-l{
				border-left: 1px solid #264A67;
			}
			.border-sm-r{
			border-right: 1px solid #264A67;
			}
			.border-sm-t{
			border-top: 1px solid #264A67;
			}
			.border-sm-b{
			border-bottom: 1px solid #264A67;
			}
		}

		@media (min-width: 768px) {
			.border-md-l{
      			border-left: 1px solid #264A67;
			}
			.border-md-r{
				border-right: 1px solid #264A67;
			}
			.border-md-t{
				border-top: 1px solid #264A67;
			}
			.border-md-b{
				border-bottom: 1px solid #264A67;
			}
		}

		@media (min-width: 992px) {
			.border-lg-l{
				border-left: 1px solid #264A67;
			}
			.border-lg-r{
			border-right: 1px solid #264A67;
			}
			.border-lg-t{
			border-top: 1px solid #264A67;
			}
			.border-lg-b{
			border-bottom: 1px solid #264A67;
			}
		}

		@media (min-width: 1200px) {
			.border-xl-l{
				border-left: 1px solid #264A67;
			}
			.border-xl-r{
			border-right: 1px solid #264A67;
			}
			.border-xl-t{
			border-top: 1px solid #264A67;
			}
			.border-xl-b{
			border-bottom: 1px solid #264A67;
			}
		}

    </style>
   <title>Localisation :K-track</title>
</head>
<body class="bg-light d-flex flex-column justify-content-between w-100 h-100 position-absolute">

		<nav class="navbar navbar-expand-sm navbar-light bg-white pe-4 ps-4">
			<div class="container">
				<a class="navbar-brand text-marons fw-bold" href="home.php">
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
			</div>
			<div class="collapse navbar-collapse" id="collapsibleNavId">
				<ul class="navbar-nav me-auto mt-2 mt-lg-0">
					<li class="nav-item">
						<a class="nav-linkss" href="../K-track/home.php">Home</a>
					</li>
					<li class="nav-item">
						<a class="nav-linkss" href="../K-track/log.php">UserData</a>
					</li>
					<li class="nav-item">
						<a class="nav-linkss" href="../K-track/logi.php">Registration</a>
					</li>
					<li class="nav-item">
						<a class="nav-linkss" href="../K-track/login.php">ReadTagID</a>
					</li>
					<li class="nav-item">
						<a class="nav-linkss active" href="../KHC_Track/login.html">Localisation</a>
					</li>
                                       <li class="nav-item">
                                                <a class="nav-linkss" href="../K-track/Login.php">historique</a>
                                        </li>
				</ul>
			</div>
		</nav>




<!-- <div class="description">
    <h2 style="padding-top: 10%;padding-bottom: 1.5%;">Description du Projet</h2>
    <p>L’un des enjeux majeurs dans la gestion des ressources humaines est la gestion du temps, notamment en ce qui concerne la présence des employés. Dans la poursuite de sa vision, KHC s'entend apporter une solution à cette problématique. La localisation précise des employés, que ce soit pendant leurs heures de travail ou sur terrain, constitue un défi supplémentaire. Ce projet se concentre sur le développement d'un système de détection de présence et de localisation de grande précision.</p>
</div> -->

    <div class="d-flex flex-column justify-content-center flex-wrap align-items-center pt-3 pb-3">
		<h1 class="text-center text-blues">Localisation K-track</h1>
        <h3 class="text-center">Les informations de localisation</h1>
        <div class="d-flex flex-row gap-5 justify-content-center align-items-center flex-wrap">
            <p>Latitude : <span id="Latitude"></span></p>
            <p>Longitude : <span id="Longitude"></span></p>
        </div>
		<button class="d-flex justify-content-center flex-wrap align-items-center btn mb-3 " id="bouttonCentrer" onclick=" fetchDataAndDisplay();">
			<img class="me-1" src="bootstrap/crosshair.svg" alt="">	
			Centrer
		</button>
        <!--button id="bouttonCentrer" style="margin-top:10px;" onclick=" fetchDataAndDisplay();">Centrer</button-->
		<div class="bg-black container mb-4 " id="map"></div>
	</div>

</div>

<footer class="bg-white text-white text-center text-lg-start">
			<!-- Grid container -->
			<div class="container p-4">
				<!--Grid row-->
				<div class="row">
				<!--Grid column-->
				<div class="col-lg-6 col-md-12 mb-4 mb-md-0 border-lg-r border-xl-r">
					<a class="navbar-brand text-marons fw-bold" href="#">
						<img src="logo.png" class="w-25" alt="">
					</a>

					<p class="text-dark">
					Shinji Ikari du manga et de l'anime "Neon Genesis Evangelion". 
					Shinji est souvent décrit comme étant incapable de trouver son chemin même en suivantune direction simple. 
					Son manque de sens de l'orientation est souvent utilisé comme source de comédie dans la série.
					</p>
				</div>
				<!--Grid column-->

				<!--Grid column-->
				<div class="col-lg-6 col-md-6 mb-4 mb-md-0">
					<h5 class="text-uppercase text-marons text-center">Liens</h5>

					<ul class="navbar-nav d-flex flex-row flex-wrap  me-auto mt-2 pt-3 mt-lg-0">
						<li class="nav-item">
							<a class="nav-linkss active" href="../K-track/home.php">Home</a>
						</li>
						<li class="nav-item">
							<a class="nav-linkss" href="../K-track/log.php">UserData</a>
						</li>
						<li class="nav-item">
							<a class="nav-linkss" href="../K-track/logi.php">Registration</a>
						</li>
						<li class="nav-item">
							<a class="nav-linkss" href="../K-track/read tag.php">ReadTagID</a>
						</li>
						<li class="nav-item">
							<a class="nav-linkss" href="login.html">Localisation</a>
						</li>
                                               <li class="nav-item">
                                                <a class="nav-linkss" href="../K-track/Login.php">historique</a>
                                        </li>
					</ul>
				</div>
				<!--Grid column-->
				</div>
				<!--Grid row-->
			</div>
			<!-- Grid container -->
		</footer>
<script src="https://unpkg.com/leaflet@1.9.4/dist/leaflet.js"
     integrity="sha256-20nQCchB9co0qIjJZRGuk2/Z9VM+kNiyxNV1lvTlZBo="
     crossorigin=""></script>
<script src="bootstrap/js/bootstrap.min.js"></script>
<script src="bootstrap/js/bootstrap.bundle.min.js"></script>
<script>
        var map = L.map('map', {
            trackResize: true // Activer le suivi automatique du redimensionnement
        }).setView([9.3077, 2.3158], 8);

        L.tileLayer('https://tile.openstreetmap.org/{z}/{x}/{y}.png', {
            maxZoom: 19,
            attribution: '&copy; <a href="http://www.openstreetmap.org/copyright">OpenStreetMap</a>'
        }).addTo(map);

        var marker = L.marker([6.3670578, 2.4079065]).addTo(map);

        function updateMap(latitude, longitude) {
            map.setView([latitude, longitude], 17); // Centrer la carte sur les nouvelles coordonnées
            marker.setLatLng([latitude, longitude]); // Déplacer le marqueur aux nouvelles coordonnées
        }

        function fetchDataAndDisplay() {
            fetch("fetch_location.php")
                .then(response => response.json())
                .then(data => {
                    var latitude = parseFloat(data.latitude);
                    var longitude = parseFloat(data.longitude);

                    document.getElementById('Latitude').textContent = latitude;
                    document.getElementById('Longitude').textContent = longitude;

                    updateMap(latitude, longitude);
                })
                .catch(error => {
                    console.error('Erreur lors de la récupération des données depuis la base de données:', error);
                });
        }

        var popup = L.popup();

        function onMapClick(e) {
            popup
                .setLatLng(e.latlng)
                .setContent("Vous avez cliqué sur la carte à" + e.latlng.toString())
                .openOn(map);
        }

        map.on('click', onMapClick);

        fetchDataAndDisplay();
        // Appeler fetchDataAndDisplay toutes les 5 secondes pour mettre à jour les données de localisation
        //setInterval(fetchDataAndDisplay, 10000);
    </script>
</body>
</html>
