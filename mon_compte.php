<?php
    session_start();

    if($_SESSION['connected'])
    {
        ?>
        <!DOCTYPE html>
        <html>
            <head>
                <meta charset="utf-8" />
                <title>Mon Compte</title>
            </head>
        
            <body>
        
            <?php include("header.php"); ?>
            
            <?php include("menu.php"); ?>
            
            <!-- Le corps -->
            
            <div id="corps">
                <h1>Mon compte</h1>
                <div>
                    <h2>Mes achats</h2>
                </div>
                <div>
                    <h2>Mes ventes</h2>
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