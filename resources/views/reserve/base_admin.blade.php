<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="{{ asset('css/bootstrap.css') }}">

    <style>
        /* Réinitialisation de marges et de paddings */
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        /* Styles de base */
        body {
            font-family: Arial, sans-serif;
            line-height: 1.6;
            background-image: url('image/image2.png');
            background-size: cover;
            /* Pour couvrir tout l'élément */
            background-position: center;
            /* Centrer l'image */
            background-repeat: no-repeat;
            /* Empêcher la répétition de l'image */
            height: 100vh;
            /* Hauteur de la fenêtre d'affichage */
            margin: 0;
            /* Éliminer les marges par défaut */
            height: 100%;
            /* Assurez-vous que le html et le body prennent toute la hauteur */
        }

        /* Style pour le conteneur principal */
        .content {
            padding: 20px;
            flex: 1;
            height: 100vh;
            /* Assurez-vous que le html et le body prennent toute la hauteur */
            margin: 0;
            /* Supprimez les marges par défaut */
            overflow-y: auto;
        }

        /* Styles pour l'en-tête */
        #entete {
            background: transparent;
            /* Couleur de fond */
            color: white;
            /* Couleur du texte */
            padding: 10px 0;
        }

        /* Styles du menu */
        .nav-container {
            list-style: none;
            display: flex;
            justify-content: flex-end;
        }

        .nav-container li {
            margin-left: 20px;
        }

        .nav-container a {
            text-decoration: none;
            color: black;
            padding: 10px 15px;
            transition: background-color 0.3s;
        }

        .nav-container a:hover {
            background-color: rgba(255, 255, 255, 0.2);
        }

        /* Styles pour le bouton hamburger */
        .menu-icon {
            display: none;
            /* Masquer par défaut */
            cursor: pointer;
            font-size: 30px;
        }

        /* Styles pour le menu déroulant */
        .dropdown {
            position: relative;
        }

        .dropdown-content {
            display: none;
            /* Masquer par défaut */
            position: absolute;
            
            /* Couleur de fond */
            min-width: 160px;
            z-index: 1;
        }

        .dropdown-content a {
            display: block;
            padding: 10px;
            color: white;
        }

        .dropdown:hover .dropdown-content {
            display: block;
            /* Afficher lors du survol */
        }

        /* Styles pour le footer */
        footer {
            text-align: center;
            height: 100px;
            color: white;
            background-color: rgb(10, 3, 66);
        }

        /* Adaptation aux écrans plus petits */
        @media (max-width: 768px) {
            .menu-icon {
                display: block;
                /* Afficher le bouton hamburger sur petits écrans */
                margin-left: 20px;
            }

            .nav-container {
                display: none;
                /* Masquer le menu par défaut */
                flex-direction: column;
                /* Changer la direction du menu */
                position: absolute;
                /* Positionner en absolu */
                right: 0;
                /* Aligner à droite */
                background: transparent;
                /* Couleur de fond */
                width: 100%;
                /* Largeur complète */
                top: 50px;
                /* Positionner juste en dessous du hamburger */
                z-index: 1;
                /* Au-dessus des autres éléments */
            }

            .nav-container.show {
                display: flex;
                /* Afficher le menu lorsque 'show' est ajouté */
            }
        }
        #dropdown{
            background: transparent;
        }
        strong{
            color: red;
        }
        #sbtn{
            font-size: 12px;
            background-color: green;
        }
        #btn{
            backdrop-filter: blur(10px);
        }
        #enseigne{
            background-attachment: fixed;

            background: transparent;
            backdrop-filter: blur(30px);
            color: white;
            text-align: center;
            font-family: Impact, Haettenschweiler, 'Arial Narrow Bold', sans-serif;
        }
        #logo{
            width: 50px;
            border-radius: 60px;
        }
    </style>

</head>










<body>
    <div>
        
        <h1 id="enseigne" class="container alert alert-light"><a href="#"><img src="{{ asset('image/logo_lh.jpg') }}" id="logo"></a> LIGHT HOUSE COMPAGNY SARL</h1>
    </div>
    <div class="content">
        <div class="container alert alert-info" id="entete">
            <nav class="container">
                <div class="menu-icon text-light" onclick="toggleMenu()">☰</div>
                <ul id="nav-links" class="hidden nav-container">
                    <li><a href="#home" class="btn btn-outline-info text-cyan" id="btn">ACCUEIL</a></li>
                    <li>
                        <div class="dropdown" id="dropdown">
                            <a href="#" class="btn dropbtn btn-outline-info" id="btn">QUI SOMMES NOUS</a>
                            <div class="dropdown-content">
                                <a href="#" class="btn btn-primary" id="sbtn">À PROPOS DE NOUS</a>
                                <a href="#" class="btn btn-primary" id="sbtn">NOTRE LEADERSHIP</a>
                            </div>
                        </div>
                    </li>
                    <li><a href="#services" class="btn btn-outline-info" id="btn">OPERATIONS</a></li>
                    <li><a href="#contact" class="btn btn-outline-info" id="btn">OFFRE D'EMPLOI</a></li>
                    <li><a href="#contact" class="btn btn-outline-info" id="btn">CONTACT</a></li>
                </ul>
            </nav>
        </div>
        @yield('content')
        <script>
            function toggleMenu() {
                const navLinks = document.getElementById('nav-links');
                navLinks.classList.toggle('show');
            }
        </script>
    </div>
    <footer>
        <p>&copy; {{ date('Y') }} Tous droits réservés à <strong>LIGHT HOUS Company Sarl</strong></p>
    </footer>



</body>

</html>