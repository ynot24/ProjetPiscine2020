<?php
    session_start();

    // Identifier le nom de base de données
    $database = "ebayce";

    // Connecter à la base de données
    $db_handle = mysqli_connect('localhost', 'root', '');
    $db_found = mysqli_select_db($db_handle, $database);

    // Si la BDD existe, faire le traitement
    if ($db_found) 
    {
        $sql1 = "SELECT * FROM acheteurs WHERE Mail LIKE '$_SESSION['mail']'";
        $sql2 = "SELECT * FROM administrateurs WHERE Mail LIKE '$_SESSION['mail']'";
        $result1 = mysqli_query($db_handle, $sql1);
        $result2 = mysqli_query($db_handle, $sql2);
        if((mysqli_num_rows($result1) != 0)||(mysqli_num_rows($result2) != 0))
        {   
            ?>
            <!-- a modifier -->
            <!DOCTYPE html>
            <html>
            <head>
            <!-- Source : https://www.w3schools.com/bootstrap/tryit.asp?filename=trybs_theme_band_complete&stacked=h -->

            <title>Achats</title>
            <meta charset="utf-8">
            <meta name="viewport" content="width=device-width, initial-scale=1">
            <link rel="stylesheet" type="text/css" href="categorie.css">
            <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
            <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>
            <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
            <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
            <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>

            </head>


            <body id="myPage" data-spy="scroll" data-target=".navbar" data-offset="50">

            <nav class="navbar navbar-default navbar-fixed-top">
            <div class="container-fluid">
                <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>                        
                </button>
                <a class="navbar-brand" href="pageaccueil.html">
                    <img class="logo" src="EbayCE.png" alt="Logo">
                </a>
                </div>
                <div class="collapse navbar-collapse" id="myNavbar">
                <ul class="nav navbar-nav navbar-right">
                    <li><a href="categorie.html">CATÉGORIE</a></li>
                    <li><a href="achat.html">ACHAT</a></li>
                    <li><a href="vente.html">VENTE</a></li>
                    
                    <li class="dropdown">
                    <a class="dropdown-toggle" data-toggle="dropdown" href="#">PLUS
                    <span class="caret"></span></a>
                    <ul class="dropdown-menu">
                        <li><a href="moncompte.html">MON COMPTE</a></li>
                        <li><a href="mon panier.html">MON PANIER</a></li>
                    </ul>
                    </li>
                </ul>
                </div>
            </div>
            </nav>

            <div class="row">
                <div class="description">
                <div class="col-lg-12 col-md-12 col-sm-12">
                    <br><br><br>
                        <h1> Achat </h1>
                        <br><br><br>
                        <center>
                        <div class="col-lg-4 col-md-4 col-sm-4">
                        <h2><a href="encheres.php">
                        <img alt="" src="">
                        <br>Enchères</a>
                        </h2>
                        </div>

                        <div class="col-lg-4 col-md-4 col-sm-4">
                        <h2><a href="achatsimmediats.php">
                        <img alt="" src="">
                        <br>Achat Immédiat</a>
                        </h2>
                        </div>

                        <div class="col-lg-4 col-md-4 col-sm-4">
                        <h2><a href="meilleuresoffres.php">
                        <img alt="" src="">
                        <br>Meilleures Offres</a>
                        </h2>
                        </div>
                    </center>
                    <br><br><br>
                </div>
                </div>
            </div>
            <br><br><br>
            <div class="container">
                <div class="col-lg-12 col-md-12 col-sm-12"></div>
            </div>

            <!-- Footer -->
            <footer>
                <footer class="page-footer">
                <div class="container">
                    <div class="row">
                    <div class="col-lg-6 col-md-6 col-sm-12">
                    <center><h3>LIENS UTILES</h3><br>
                    <p><a href="compteV2.html">Mon compte</a></p>
                    <p><a href="monpanier.html">Mon panier</a></p>
                    <p><a href="mentionslegales.html">Mentions légales</a></p>
                    </center>
                    </div>
                    <div class="col-lg-6 col-md-6 col-sm-12">
                        <center><h3 class="text-uppercase font-weight-bold">BESOIN D'AIDE ?</h3><br>
                        <p><a href="assistance.html">Assistance</a></p>
                        <p><a href="contacts.html">Nous contacter</a></p>
                    </center>
                    </div>
                    </div>
                </div>
                <div class="footer-copyright text-center">Copyright &copy; 2020 | EbayCE France</div>
                </footer>
            </footer>
            </body>

            <script>
            $(document).ready(function(){
            // Initialize Tooltip
            $('[data-toggle="tooltip"]').tooltip(); 
            
            // Add smooth scrolling to all links in navbar + footer link
            $(".navbar a, footer a[href='#myPage']").on('click', function(event) {

                // Make sure this.hash has a value before overriding default behavior
                if (this.hash !== "") {

                // Prevent default anchor click behavior
                event.preventDefault();

                // Store hash
                var hash = this.hash;

                // Using jQuery's animate() method to add smooth page scroll
                // The optional number (900) specifies the number of milliseconds it takes to scroll to the specified area
                $('html, body').animate({
                    scrollTop: $(hash).offset().top
                }, 900, function(){
            
                    // Add hash (#) to URL when done scrolling (default click behavior)
                    window.location.hash = hash;
                });
                } // End if
            });
            })
            </script>

            </body>
            </html>

            <?php
        }
        else
        {
            ?>
            <!-- a modifier -->
            <!DOCTYPE html>
            <html>
                <head>
                    <meta charset="utf-8" />
                    <title>Achats</title>
                </head>
            
                <body>
            
                <?php include("header.php"); ?>
                
                <?php include("menu.php"); ?>
                
                <!-- Le corps -->
                
                <div id="corps">
                    <h1>Achat</h1>
                    <div>
                        <p>Cet espace vous est indisponible.</p>
                    </div>
                </div>

                <!-- Le pied de page -->
                
                <?php include("footer.php"); ?>
                
                </body>
            </html><?php
        }
    }
    else
    {
        echo "Erreur : accès à la base de donnée échouée !";
    }
    //fermer la connexion
    mysqli_close($db_handle);
?>