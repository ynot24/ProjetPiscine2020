<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8" />
        <title>Création Compte : Vendeur</title>
    </head>
 
    <body>
 
    <?php include("header.php"); ?>
    
    <?php include("menu.php"); ?>
    
    <!-- Le corps -->
    
    <div id="corps">
        <h1>CREER UN COMPTE VENDEUR</h1>
        <p>Afin de commencer votre expérience utilisateur sur notre site, veuillez renseigner vos informations personnelles pour créer un nouveau compte sur Ebayce :-)</p>
    </div>
    
    <form action="nouveau_vendeur.php" method="POST">
        <p><label>Nom :<input type="text" name="Nom" /></label></p>
        <p><label>Prénom :<input type="text" name="Prenom" /></label></p>
        <p><label>Date de Naissance :<input type="date" name="DateNaissance" /></label></p>
        <p><label>Mail :<input type="email" name="Mail" /></label></p>
        <p><label>Mot de Passe :<input type="password" name="MotDePasse" /></label></p>
        <p><input type="submit" value="Créer mon compte" /></p>
    </form>

    <!-- Le pied de page -->
    
    <?php include("footer.php"); ?>
    
    </body>
</html>