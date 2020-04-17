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
        $sql= "SELECT * FROM administrateurs WHERE Mail LIKE '$_SESSION['mail']'";
        $result = mysqli_query($db_handle, $sql);
        if (mysqli_num_rows($result) != 0) 
        {
            ?>
            <!DOCTYPE html>
            <html>
                <head>
                    <meta charset="utf-8" />
                    <title>Mon Compte Administrateur</title>
                </head>
            
                <body>
            
                <?php include("header.php"); ?>
                
                <?php include("menu.php"); ?>
                
                <!-- Le corps -->
                
                <div id="corps">
                    <h1>Mon Compte Admin</h1>
                    <div>
                        <h2>PARTIE VENDEUR</h2>
                        <a href="liste_vendeur.html">Voir la liste des vendeurs</a>
                        <a href="creation_compte_vendeur.php">Ajouter un vendeur</a>
                        <a href="supprimer_vendeur.php">Supprimer un vendeur</a>
                    </div>
                    <div>
                        <h2>PARTIE ITEM</h2>
                        <a href="liste_item.html">Voir la liste des items</a>
                        <a href="vendre_item.php">Ajouter un item</a>
                        <a href="supprimer_item.php">Supprimer un item</a>
                    </div>
                </div>

                <form action="deconnexion.php">
                    <input type="submit" value="Déconnexion" onclick="msg()">
                </form>

                <script>
                function msg() 
                {
                    alert("Déconnexion réussie !");
                }
                </script>
                
                <!-- Le pied de page -->
                
                <?php include("footer.php"); ?>
                
                </body>
            </html><?php
        }
        else
        {
            header ("Refresh: 3;URL=PageAccueil.html");
        }
    }
    else
    {
        echo "Erreur : accès à la base de donnée échouée !";
    }
    //fermer la connexion
    mysqli_close($db_handle);
?>