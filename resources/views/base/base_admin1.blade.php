<!-- resources/views/layouts/app.blade.php -->

<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Mon Application')</title>

    <link rel="stylesheet" href="{{ asset('css/bootstrap.css') }}">
    <link rel="stylesheet" href="{{ asset('css/styles.css') }}">

    <style>
        /* Styles pour le body et le contenu */
        body {
            display: flex;
            flex-direction: column;
            min-height: 100vh;
            /* Assure que le body prend au moins toute la hauteur de la fenêtre */
            background-image: url("image/blue_night.jpg");
            justify-content: center;
        }

        .content {
            flex: 1;
            /* Permet au contenu de prendre tout l'espace disponible */
        }

        /* Styles pour l'animation de chargement */
        #loader {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-color: rgba(255, 255, 255, 0.8);
            display: flex;
            justify-content: center;
            align-items: center;
            z-index: 9999;
            /* Assurez-vous que le loader est au-dessus du contenu */
        }

        .spinner {
            border: 8px solid #f3f3f3;
            /* Couleur de fond */
            border-top: 8px solid #3498db;
            /* Couleur du spinner */
            border-radius: 50%;
            width: 50px;
            height: 50px;
            animation: spin 1s linear infinite;
        }

        @keyframes spin {
            0% {
                transform: rotate(0deg);
            }

            100% {
                transform: rotate(360deg);
            }
        }

        .partie-haut {
            display: flex;
            /* Utilisation de Flexbox pour aligner les éléments horizontalement */
            align-items: center;
            /* Aligne verticalement les éléments au centre */
            /* justify-content: space-between;*/
            /* Espace entre le logo et les liens */
        }

        .partie-haut img {
            width: 100%;
        }

        /* Styles pour le footer */
        footer {
            background-color: rgb(15, 1, 45);
            /* Couleur de fond du footer */
            color: white;
            text-align: center;
            padding: 1px 0;
            /* Espacement intérieur */
            position: relative;
            /* Pour éviter les problèmes de positionnement */
        }

        #logo {
            width: 15%;
        }

        #bt_nav {
            background: transparent;
            backdrop-filter: blur(10px);
        }

        #bt_nav a {
            margin: 5px;
        }
    </style>
</head>

<body>
    <div id="loader" style="display: none;">
        <div class="spinner"></div>
    </div>

    <div class="sablier">
        <div class="partie-haut">
            <div class="container" id="logo">
                <img src="{{ asset('image/logo_lh.jpg') }}" alt="Logo" class="logo">
            </div>
            <div class="container alert alert alert-info" id="bt_nav">
                <a href="#" class="btn btn-info">ACCUEIL</a>
                <a href="#" class="btn btn-info">QUI SOMMES NOUS</a>
                <a href="#" class="btn btn-info">OPERATION</a>
                <a href="#" class="btn btn-info">OFFRE D'EMPLOI</a>
                <a href="#" class="btn btn-info">CONTACT</a>
            </div>
        </div>
        <div class="partie-bas"></div>
    </div>

    <nav class="container">
        <div class="menu-icon" onclick="toggleMenu()">☰</div>
        <ul id="nav-links" class="hidden">
            <li><a href="#home">Accueil</a></li>
            <li><a href="#about">À propos</a></li>
            <li><a href="#services">Services</a></li>
            <li><a href="#contact">Contact</a></li>
        </ul>
    </nav>


    <div class="content">
        @yield('content')
    </div>

    <footer>
        <p>&copy; {{ date('Y') }} Tous droits réservés à LIGHT HOUS Company</p>
    </footer>

    <script>
        // Afficher le loader lors du chargement de la page
        window.onload = function() {
            document.getElementById('loader').style.display = 'none';
        };

        // Afficher le loader lors du début du chargement d'une nouvelle page
        window.addEventListener('beforeunload', function() {
            document.getElementById('loader').style.display = 'flex';
        });
    </script>
</body>

</html>