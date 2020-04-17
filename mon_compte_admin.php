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
                <h2>PARTIE VENDEUR</h2>
                <h2>PARTIE ITEM</h2>
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