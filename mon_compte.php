<?php
    session_start()
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

    <form>
        <input type="button" value="Click me" onclick="msg()">
    </form>

    <script>
    function msg() 
    {
        session_unset();
        session_destroy();
        alert("Déconnexion réussie !");
        window.location="index.php";
    }
    </script>
    
    <!-- Le pied de page -->
    
    <?php include("footer.php"); ?>
    
    </body>
</html>