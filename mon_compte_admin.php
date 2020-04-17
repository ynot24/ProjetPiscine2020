<?php
    session_start();

    if($_SESSION['connected'])
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
                    <a href="supprimer_vendeur.html">Supprimer un vendeur</a>
                </div>
                <div>
                    <h2>PARTIE ITEM</h2>
                    <a href="liste_item.html">Voir la liste des items</a>
                    <a href="vendre_item.php">Ajouter un item</a>
                    <a href="supprimer_item.html">Supprimer un item</a>
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
?>