<?php
    session_start();

    if ($_SESSION['mail'])
    {
        ?>
        <!DOCTYPE html>
        <html>
            <head>
                <meta charset="utf-8" />
                <title>Création Compte : Acheteur</title>
            </head>
        
            <body>
        
            <?php include("header.php"); ?>
            
            <?php include("menu.php"); ?>
            
            <!-- Le corps -->
            
            <div id="corps">
                <h1>Formulaire de vente</h1>
                <p>Veuillez renseigner les champs ci-dessous :</p><br>
            </div>
            
            <form action="ajout_item.php" method="POST">
                <p><label>Intitulé :<input type="text" name="Intitule" /></label></p>
                <p><label>Prix :<input type="number" name="Prix" /> €</label></p>
                <p><label>Catégorie :<input type="text" name="Categorie" /></label></p>
                <p><label>Description :<input type="text area" rows="6" name="Description" /></label></p>
                <p><label>Nature de vente :
                    <div><input type="checkbox" name="NatureVente" value="Encheres" /><label>Encheres</label></div>
                    <div><input type="checkbox" name="NatureVente" value="MeilleuresOffres" /><label>MeilleuresOffres</label></div>
                    <div><input type="checkbox" name="NatureVente" value="AchatImmediat" /><label>AchatImmediat</label></div>
                    </label></p>
                <p><label>Photo :<input type="file" name="Photo" accept="image/*"/></label></p>
                <p><label>Video :<input type="file" name="Video" accept="video/*"/></label></p>
                <p><input type="submit" value="Ajouter l'item" /></p>
            </form>

            <!-- Le pied de page -->
            
            <?php include("footer.php"); ?>
            
            </body>
        </html>

        <?php
    }
    else
    {
        echo "Vous ne pouvez pas avoir accès à cette rubrique.<br>";
        echo "Veuilez vous connecter pour pouvoir y accèder";
        ?><a href="compte.html">Aller à la page de connexion</a><php?
    }
?>